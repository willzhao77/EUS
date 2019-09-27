<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container">

      <div class="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">
            <img src="{{ asset('img/2degreeslogo.png') }}" width="30" height="30" class="d-inline-block align-top" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li> -->
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown link
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li> -->
            </ul>
          </div>
        </nav>
      </div>


      <div class="menu">
        <ul>
          <li>
            <a href="{{ url('device') }}">Device Management</a>
          </li>
          <li>
            <a href="{{ url('type') }}">Device Type</a>
          </li>
          <li>
            <a href="{{ url('itemmodel') }}">Device  Model</a>
          </li>
          <li>
            <a href="{{ url('manufacturer') }}">Device  Manufacturer</a>
          </li>
        </ul>
      </div>



      <div class="content">
        @yield('content')
      </div>

      <div class="footer">
        2degrees EUS
      </div>
    </div>

  </body>
</html>
