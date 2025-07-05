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
    <div class="position-absolute top-50 start-50 translate-middle shadow p-3 mb-5 bg-white rounded mt-2 me-2 ms-2">

    <form method="POST" id="orderForm" action="">
    @csrf
    <h1 class="text-center">Order Items</h1>
    <div class="form-group  mt-4">
      <label for="inputState">Item Name</label>
      <select class="form-control" id="menuSelect" name="name">
         <option value="">choose...</option>
         @foreach ($menus as $menu)
         <option value="{{ $menu->id }}">{{ $menu->name }}</option>
         @endforeach

         
</select>
    @error("name")
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-3 mt-3">
                <label for="qunatity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" />
                @error("quantity")
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="mb-3 mt-3">
                <label for="table_numnber" class="form-label">Select Table</label>
                <select class="form-control" id="table_number" name="table_number">
         <option value="">choose...</option>
         @foreach ($tables as $table)
         <option value="{{ $table->table_number }}">{{ $table->table_number }}</option>
         @endforeach

         
</select>
                @error("table_number")
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
       <button type="submit" class="btn btn-primary mt-4" style="margin: 0px 150px 0px 150px;">Submit</button>
       <br>
        <a href="{{ route('waiter') }}" class="mt-4 btn btn-secondary" style="margin: 0px 150px 0px 100px;">Back to Dashboard</a>

  @if (session()->has("success"))
                <div class="alert alert-success mt-4">{{session()->get("success")}}</div>
            @endif

    </form>
    </div>
 





<script>
    document.getElementById('orderForm').addEventListener('submit', function(e) {
        const menuId = document.getElementById('menuSelect').value;
        if (!menuId) {
            e.preventDefault();
            alert('Please select a menu item.');
            return;
        }

        // Set form action dynamically
        this.action = `/add-order-post/${menuId}`;
    });
</script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
