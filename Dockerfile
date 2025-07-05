# Use the official PHP image with Apache
FROM php:8.2-apache

# Install necessary system packages & PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Copy example.env to .env and set debug false
RUN cp .env.example .env && \
    sed -i 's/APP_DEBUG=true/APP_DEBUG=false/' .env

# Set correct permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Set environment to production
ENV APP_ENV=production