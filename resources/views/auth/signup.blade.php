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
    <form method="post" action="{{route('signup-post')}}">
    @csrf
    <h1 class="text-center">Sign Up</h1>
    <label for="exampleInputUsername">Username</label>
    <div class="form-group mt-4">
  <input name="name" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    @error("name")
                    <span class="text-danger">{{$message}}</span>
                @enderror
</div>
  <div class="form-group mt-4">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    @error("email")
                    <span class="text-danger">{{$message}}</span>
                @enderror
  </div>
  <div class="form-group mt-4">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    @error("password")
                    <span class="text-danger">{{$message}}</span>
                @enderror
  </div>
    <div class="form-group  mt-4">
      <label for="inputState">Select Role</label>
      <select class="form-control" name="role">
         <option value="">choose...</option>
        <option>Admin</option>
        <option>Cashier</option>
        <option>Manager</option>
        <option>Waiter</option>
        <option>Chef</option>  
</select>
    @error("role")
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
  <button type="submit" class="btn btn-primary mt-4" style="margin: 0px 150px 0px 150px;">Submit</button>
  @if (session()->has("success"))
                <div class="alert alert-success mt-4">{{session()->get("success")}}</div>
            @endif
            @if (session()->has("error"))
                <div class="alert alert-danger mt-4">{{session("error")}}</div>
            @endif
</form>
                    <h6 class="mt-4 ms-5">Already have an account?  <a href="{{route("login")}}" class="small ">Login</a></h6>
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
