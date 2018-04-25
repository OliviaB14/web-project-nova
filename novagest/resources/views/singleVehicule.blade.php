<html>
<header>
@include('includes.head')

    <title></title>
</header>

<style>

</style>
<body  style="background-color:#487AA1">
<div id="section-to-print" class="container" style="margin-top:25px;background-color:white">
      <br><br>
      <h1 class="header center orange-text">{{$type_vehicule->modele}}</h1>
      <div class="row center">
        <h5 class="header col s12 light">{{$type_vehicule->description}}</h5>
      </div>
      <div class="row center">
        <?php 
              $blob = DB::table('type_vehicule')->where('id' ,'=', $vehicule->idtypevehicule)->select('photo')->first();
              echo '<img style="width:30%;" src="data:image/jpeg;base64,'.base64_encode( $blob->photo ).'"/>';
                ?>
      </div>
      <div class="row center">
      <button id="printBTN" class="btn btn-primary" onclick="myFunction()">Print this page</button>
      </div>

<script>
function myFunction() {
  $("#printBTN").hide();
    window.print();
    setTimeout(
    function() {
      $("#printBTN").show();
    }, 100);
}
</script>
      <div class="row center">
      <div class="col s3"></div>
      <table class="col s6 striped centered">
        <tbody>
          <tr>
            <td>Immatriculation</td>
            <td>{{$vehicule->immatriculation}}</td>
          </tr>
          <tr>
            <td>Date d'achat</td>
            <td>{{$vehicule->date_achat}}</td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="col s3"></div>
      <div class="row ">
        <div class="col s12">
            <div style="height: 30%; width :70%; margin-left:auto; margin-right:auto;" id="map"></div>
        </div>
      </div>
      <br><br>

    </div>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
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
            console.log('Geocode was not successful for the following reason: ' + status);
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