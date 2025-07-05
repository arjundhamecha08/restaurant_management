<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>


<h2 class="mt-3 mb-4 text-center">🧾 Completed Orders - Monthly Report</h2>

<table class=" text-center table table-bordered table-striped">
    <thead class=" text-center table-dark">
        <tr class="text-center">
            <th>📅 Month</th>
            <th>🧾 Total Orders</th>
            <th>💰 Total Revenue (₹)</th>
        </tr>
    </thead>
    <tbody>
        @forelse($monthlyReport as $row)
            <tr>
                <td>{{ \Carbon\Carbon::parse($row->month . '-01')->format('F Y') }}</td>
                <td>{{ $row->total_orders }}</td>
                <td>₹{{ number_format($row->total_sales, 2) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center text-muted">No data available.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $monthlyReport->links('pagination::bootstrap-5') }}
</div>






    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
