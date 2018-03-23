<html>
<header>
@include('includes.head')

    <title></title>
</header>
<body style="background-color:#487AA1">
<div class="container z-depth-2" style="margin-top:25px;background-color:white">
      <br><br>
      <h1 class="header center orange-text">{{$type_vehicule->modele}}</h1>
      <div class="row center">
        <h5 class="header col s12 light">{{$type_vehicule->description}}</h5>
      </div>
      <div class="row center">
        <image style="width:450px" src="http://shiny4kwallpapers.com/Uploads/2-3-2017/1368/thumb2-mercedes-benz-cls63-vorsteiner-tuning-mercedes-blue-cls-black-wheels.jpg"></image>
      </div>
      <div class="row ">
        <div class="col s12">
            <div style="height: 30%; width :70%; margin-left:auto; margin-right:auto;" id="map"></div>
        </div>
      </div>
      <br><br>

    </div>

    <div id="floating-panel">
      <input id="address" type="textbox" style="visibility:hidden" value="">
      <input id="submit" type="button" class="btnmaps" style="visibility:hidden" value="Geocode">
    </div>
    
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        });
      }

      function geocodeAddress(geocoder, resultsMap) {
          var address = "paris";
          @if(isset($client))
             address = "{{$client->adresse}} {{$ville->nom}}";
          @elseif(isset($agence))
             address = "{{$agence->adresse}} {{$ville->nom}}";
          @endif
        console.log(address);
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

      $(document).ready(function(){
          $('.btnmaps').trigger('click');
      });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCawgd6BZZOvIVSpCaean7Hdc9Wv-Bscdk&callback=initMap">
    </script>
    

  </body>
    
</body>
</html>