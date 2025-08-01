<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Template</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap@5.0.2_dist_css_bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.min.css') }}">
    <script src="{{ asset('assets/js/code.jquery.com_jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

    <!-- bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js') }}"></script>
  </head>
  <body>
        @yield('content')

  </body>
</html>
