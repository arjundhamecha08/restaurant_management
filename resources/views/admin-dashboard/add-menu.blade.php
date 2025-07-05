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
    <form method="post" action="{{ route('menu.create') }}">
    @csrf
    <h1 class="text-center">Add New Item</h1>
    <label class="mt-1" for="exampleInputitemname">Item Name</label>
    <div class="form-group mt-2">
  <input name="name" type="text" class="form-control" placeholder="Item Name" aria-label="Username" aria-describedby="basic-addon1">
    @error("name")
                    <span class="text-danger">{{$message}}</span>
                @enderror
</div>
  <label class="mt-1" for="exampleInputCategory">Category</label>
    <div class="form-group mt-2">
  <input name="category" type="text" class="form-control" placeholder="Category" aria-describedby="basic-addon1">
    @error("category")
                    <span class="text-danger">{{$message}}</span>
                @enderror

      <label class="mt-1" for="exampleInputPrice">Price</label>
    <div class="form-group mt-2">
  <input name="price" type="number" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1">
    @error("price")
                    <span class="text-danger">{{$message}}</span>
                @enderror
</div>
    <div class="form-group mt-2">
      <label for="inputState">Select Status</label>
      <select class="form-control" name="status">
        <option>Available</option>
        <option>Unavailable</option>
      </select>
    </div>
<button type="submit" class="btn btn-primary mt-4" style="margin: 0px 150px 0px 150px;">Submit</button>
  @if (session()->has("success"))
                <div class="alert alert-success mt-4">{{session()->get("success")}}</div>
            @endif
            @if (session()->has("error"))
                <div class="alert alert-danger mt-4">{{session("error")}}</div>
            @endif
</form>
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