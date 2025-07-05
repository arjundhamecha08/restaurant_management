FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Enable Apache rewrite
RUN a2enmod rewrite

# Fix Apache to use port 8080 (Render requires this)
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf && \
    sed -i 's/:80/:8080/' /etc/apache2/sites-available/000-default.conf

# Set document root to /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Set working dir
WORKDIR /var/www/html

# Copy files
COPY . /var/www/html

# Copy Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Copy .env from example and disable debug
RUN cp .env.example .env && \
    sed -i 's/APP_DEBUG=true/APP_DEBUG=false/' .env

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Cache config & routes
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Expose correct port
EXPOSE 8080

ENV APP_ENV=production
