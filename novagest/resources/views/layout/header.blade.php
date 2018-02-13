<html>
  <head>
    <title>Laravel test</title>
    <!-- Includes sa race-->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ URL::asset('css/materialize.css') }}" />
    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet" />
    
    <!-- Includes sa race-->
  </head>
  <body class="theme-blue">
  <p>Test layout</p>
    @yield('dashboard')

    <!-- JS -->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
  </body>
</html>