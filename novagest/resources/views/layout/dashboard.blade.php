
<html>
  @include('includes.head')
<body >
    @include('includes.header')
    <div class="row">
      <div class='col s12 m4 l3' id="dash-sidebar"> <!-- sidebar -->
        @include('includes.sidebar')
      </div>
      <div class="col s12 m8 l9" id="dash-content"> <!-- page content -->
        @yield('content')
      </div>
    </div>
    @include('includes.footer')
</body>
