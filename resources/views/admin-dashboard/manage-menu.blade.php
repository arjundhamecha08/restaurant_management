<!doctype html>
<html lang="en">

<head>
    <title>Manage Menu</title>
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

<h2 class="mt-3 mb-4 text-center">Manage Menu</h2>
    <table class=" table table-striped table-bordered ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
                @if(Auth::user()->role == "Admin")
                <th>Delete</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $menu->id }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $menu->category }}</td>
                    <td>{{ $menu->price }}</td>
                    @if(Auth::user()->role == "Chef")
                    <td> <select class="form-control" name="status">
         <option >available</option>
        <option>Unavailable</option> 
</select></td>
@endif
                    @if(Auth::user()->role == "Admin")
                    <td>{{ $menu->status }}</td>
                    <td>
                        <a href="{{ route('remove-menu',$menu->id) }}" class="btn btn-danger btn-sm">Remove Item</a>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{ $menus->links('pagination::bootstrap-5') }}
</div>
    <div class="d-flex justify-content-center mt-4 mb-4">

@if(Auth::user()->role == "Admin")
    <a href="{{ route('add-menu-item') }}" class="btn btn-primary me-2">Add Item</a>
@endif
@if (Auth::user()->role == "Chef")
    <a href="{{ route('chef') }}" class="btn btn-secondary ">Back to Dashboard</a>
@endif
@if (Auth::user()->role == "Admin")
    <a href="{{ route('admin') }}" class="btn btn-secondary ">Back to Dashboard</a>
@endif
@if (Auth::user()->role == "Manager")
    <a href="{{ route('manager') }}" class="btn btn-secondary">Back to Dashboard</a>
@endif
</div>
    
    
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
