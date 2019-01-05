<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="direction:rtl;">

<head>
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="{{ asset('assets/css/material-kit.min.css?v=2.1.1') }}" rel="stylesheet" />
  <link href="{{ asset('assets/demo/vertical-nav.css') }}" rel="stylesheet" />
</head>

<body class="@yield('bodystyle') text-right">
  <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/">
          سامانه مزایده </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          @guest
          <li class="nav-item">
            <a href="/login" class="nav-link text-right" >
               ورود
            </a>
          </li>
		  <li class="nav-item">
            <a href="/register" class="nav-link text-right">
               عضویت
            </a>
          </li>
          @else
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              محصولات
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="/products/" class="dropdown-item">
                لیست محصولات
              </a>
              <a href="/products/add" class="dropdown-item">
                افزودن محصول
              </a>
            </div>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              مزایدات
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="/auctions/" class="dropdown-item">
                لیست مزایدات
              </a>
              <a href="/auctions/add" class="dropdown-item">
                افزودن مزایده
              </a>
            </div>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              بخض کاربر
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="/bids/" class="dropdown-item">
                تاریخچه پیشنهادات
              </a>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  
  @yield('content')
  <script src="{{ asset('assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/plugins/moment.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="{{ asset('assets/js/material-kit.js?v=2.0.5') }}" type="text/javascript"></script>
  <script async defer src="{{ asset('https://buttons.github.io/buttons.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/jquery.sharrre.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/plugins/jasny-bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/plugins/jquery.flexisel.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/demo/modernizr.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/demo/vertical-nav.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/demo/demo.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/material-kit.min.js?v=2.1.1') }}" type="text/javascript"></script>
  @yield('script')
</body>

</html>