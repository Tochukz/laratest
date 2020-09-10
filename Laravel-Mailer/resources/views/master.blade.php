<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
  @yield('title')
</head>
<body>
  <div class="container pt-5">
    <div class="row">
      <div class="col-sm-12">
         <h2>Email App</h2>
      </div>
    </div>
    @yield('content')
  </div>
</body>
</html>