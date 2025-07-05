<!-- Image and text -->
<nav class="navbar navbar-light bg-light shadow p-3 mb-5 bg-white rounded mt-2 me-2 ms-2">
  <a class="navbar-brand" href="#">
    <img src="{{asset("assets\img\logo.png")}}" width="40" height="40" class="d-inline-block" alt="">
    KitchenCloud
  </a>
  <h3 class="ms-5">Hello, {{Auth::user()->name}}</h3>
 <a href="{{route('logout')}}" class="btn btn-danger me-4">Logout</a>
</nav>