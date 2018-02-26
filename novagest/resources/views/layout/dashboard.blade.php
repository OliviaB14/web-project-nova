
<html>
  @include('includes.head')
<body >
    @include('includes.header')
    <div class="container" style="padding-left: 0px;">
        <div class="section">
          <div class="col s12 m8 l10" id="dash-content"> <!-- page content -->
            @yield('content')
          </div>
        </div>
    </div>
    @include('includes.footer')
</body>
