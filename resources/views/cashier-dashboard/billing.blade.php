<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bill - Table {{ $table_number }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Bill for Table {{ $table_number }}</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price (₹)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ number_format($order->price, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No orders found for this table.</td>
                </tr>
            @endforelse
            <tr class="table-success">
                <th colspan="2">Total</th>
                <th>₹{{ number_format($total, 2) }}</th>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('complete', [$table_number,$total] ) }}" class="btn btn-primary">Pay</a>
</div>
</body>
</html>