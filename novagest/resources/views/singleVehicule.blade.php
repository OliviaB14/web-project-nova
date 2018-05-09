<html>
<header>
@include('includes.head')

    <title>{{$vehicule->immatriculation}} - {{$type_vehicule->modele}}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/single.css')}}"/>
</header>

<?php
  $imgs = [$vehicule->photo_1, $vehicule->photo_2, $vehicule->photo_3];
  $final = [];
?>
<body>



<div id="section-to-print" class="container">

      <br>
      <h1 class="header center orange-text">{{$type_vehicule->modele}} -{{$vehicule->immatriculation}}</h1>
      <h3 id="statut">{{$idstatut->libelle}}</h3>
      <div class="row center">
        <h5 class="header col s12 light">{{$type_vehicule->description}}</h5>
      </div>
      <div class="row center">
        <?php 
          $blob = DB::table('type_vehicule')->where('id' ,'=', $vehicule->idtypevehicule)->select('photo')->first(); //default image

          foreach ($imgs as $img) {
            if(!empty($img)){
              array_push($final, "<img style='width:200px;height:auto' src='".$img."'/>");
            }
          }

          if(!empty($final)){
            foreach ($final as $photo) {
              print_r($photo);
            }
          } else{
            echo '<img style="width:200px;height:auto" src="data:image/jpeg;base64,'.base64_encode( $blob->photo ).'"/>';
          }
         
        ?>
      </div>
      <div class="row center">
      <button id="printBTN" class="btn btn-primary" onclick="myFunction()">IMPRIMER CETTE PAGE</button>
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
      <div class="col s1"></div>
      <table class="col s10 striped centered">
        <thead>
            <tr>
                <th>Date d'achat</th>
                <th>Largeur</th>
                <th>Hauteur</th>
                <th>Puissance</th>
                <th>Prix neuf</th>
            </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$vehicule->date_achat}}</td>
            <td>{{$type_vehicule->largeur}}m</td>
            <td>{{$type_vehicule->hauteur}}m</td>
            <td>{{$type_vehicule->puissance}}cv</td>
            <td>@if($type_vehicule->prix_neuf==0)
                    NC
                @else
                    {{$type_vehicule->prix_neuf}} €
                @endif
            </td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="s12"><p>
        Etat actuel : <b>{{$etatvehicule->libelle}}</b>
        @if(isset($agence))
            , actuellement à <b>{{$agence->nom}}</b> située au {{$agence->adresse}} {{$ville->nom}}
        @endif
        @if(isset($client))
            , actuellement à <b>{{$client->adresse}}</b>, {{$ville->nom}}
        @endif
      </p>
      </div>
      <div class="col s3"></div>
      <div class="row ">
        <div class="col s12">
            <div id="map"></div>
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