
<html>
  @include('includes.head')
<body >
    @include('includes.header')
    <div class="container-fluid" style="padding-left: 0px;">
    <div class="row">
      <div class="col s12 m4 l2" id="dash-sidebar"> <!-- sidebar -->
        @include('includes.sidebar')
      </div>
      <div class="col s12 m8 l10" id="dash-content"> <!-- page content -->
        @yield('content')
      </div>
    </div>
</div>
</body>
