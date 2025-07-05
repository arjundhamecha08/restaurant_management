<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Group Bills by Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Grouped Bills by Table</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Table Number</th>
                <th>Total Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $bills as $bill )
                <tr>
                    <td>{{ $bill->table_number }}</td>
                    <td>₹{{ number_format($bill->total_amount, 2) }}</td>
                    <td><a href="{{ route('generatebill', $bill->table_number) }}" class="btn btn-primary btn-sm">View Bill</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>