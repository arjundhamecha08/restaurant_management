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
    @include('include.header')
    <div class="position-absolute top-50 start-50 translate-middle shadow p-3 mb-5 bg-white rounded mt-2 me-2 ms-2">
        <h1 class="text-center">Manager Dashboard</h1>
        <div class="d-flex justify-content-center mt-4">
            <a href="" class="btn btn-primary me-3">Manage Reservation</a>
            <a href="{{ route('display-table') }}" class="btn btn-secondary me-3">Manage Table</a>
            <a href="{{ route('menu-display') }}" class="btn btn-success">View Menu</a>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <a href="{{ route('bill')}}" class="btn btn-primary me-3">View Billing and Payments</a>
            <a href="{{ route('view-report')}}" class="btn btn-secondary me-3">View Report</a>
        </div>






    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
