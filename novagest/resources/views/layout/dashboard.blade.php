
<html>
  @include('includes.head')
<body >

    @include('includes.header')
    <div class="container" id="main">
        <div class="section">
          <div class="col s12 m8 l10" id="dash-content"> <!-- page content -->
            @yield('content')
            <div class="container center-align" style="margin-top:22%">
              <a class="btn btn-floating btn-large animated bounce" id="bottom-arrow"><i class="material-icons">keyboard_arrow_down</i></a>
              <i class="material-icons"></i>
            </div>
          </div>
        </div>
    </div>
     @include('includes.footer')
</body>
