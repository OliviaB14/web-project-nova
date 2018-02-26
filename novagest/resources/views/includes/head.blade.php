<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>NovaGest - @yield('title')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">


    <!-- stylesheets -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection"/>

    @yield('css-links')
   
    
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script src="{{ asset('js/init.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
     <script src="http://code.jquery.com/qunit/qunit-1.11.0.js"></script>
     <script type="text/javascript" src="{{ asset('js/jqueryCountTo.js') }}"></script>


    <script>
        
        $(".dropdown-button").dropdown();
                
    </script>

     <!-- Compiled and minified JavaScript -->
     <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
     <script src="http://code.jquery.com/qunit/qunit-1.11.0.js"></script>
     <script type="text/javascript" src="{{ asset('js/jqueryCountTo.js') }}"></script> -->
  </head>