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
@if (session()->has("success"))
                <div class="alert alert-success mt-4">{{session()->get("success")}}</div>
            @endif
            @if (session()->has("error"))
                <div class="alert alert-danger mt-4">{{session("error")}}</div>
            @endif
<h2 class="mt-3 mb-4 text-center">Manage Tables</h2>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Table_Number</th>
                <th>Capacity</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tables as $table)
            <tr>
                <td>{{ $table->id }}</td>
                <td>{{ $table->table_number }}</td>
                <td>{{ $table->capacity }}</td>
                <td>{{ $table->status }}</td>
                <td><a href="{{route('tables.destroy', $table->id)}}" class="btn btn-danger">Delete</a></td>
            </tr>
             @endforeach
        </tbody>
    </table>

<div class="d-flex justify-content-center">
    {{ $tables->links('pagination::bootstrap-5') }}
</div>
<div class="d-flex justify-content-center mt-4 mb-4">

@if(Auth::user()->role == "Admin" || Auth::user()->role == "Manager")
    <a href="{{ route('add-table') }}" class="btn btn-primary me-2">Add Table</a>
    <a href="{{ route('admin') }}" class="btn btn-secondary ">Back to Dashboard</a>
@endif
</div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>
</html>
