@extends('layout.dashboard')

@section('css-links')

    <style>

    </style>
@stop   

@section('title', 'Vehicules')

@section('content')
<button class="active btn" id="all">Show All</button>
@foreach($typevehicules as $type)
    <button class="btn" id="{{$type->id}}">{{$type->modele}}</button>
@endforeach

<script>
var $btns = $('.btn').click(function() {
  if (this.id == 'all') {
    $('#parent > div').fadeIn(450);
    console.log("1");
  } else {
    var $el = $('.' + this.id).fadeIn(450);
    $('#parent > div').not($el).hide();
    console.log($el);
  }
})
</script>

<div class='row'> 
	<div class="page-header"> 
		<h3>Véhicules</h3> 
	</div> 
</div> 
<div class="row" id="parent">
  @foreach($vehicules as $car)
  <?php
    $test = DB::table('type_vehicule')->where('id', '=',$car->idtypevehicule)->first();
    ?>
      <div class="col s6 m6 {{$test->id}}">
        <div class="card">
          <div class="card-image">
            <img style="width:300px" src="https://goo.gl/XdBFhy">
            <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
          </div>
          <div class="card-content">
            <h1>
            <?php
              $test = DB::table('type_vehicule')->where('id', '=',$car->idtypevehicule)->first();
              ?>
              {{$test->modele}}
            </h1>
          </div>
        </div>
      </div>
    @endforeach 
</div>
  


<ul class="collapsible" style="margin-left:2%" data-collapsible="accordion"> 
    <li> 
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div> 
        <div class="collapsible-body"> 
          <div> 
            <table id="example" class="mdl-data-table responsive-table responsive no-wrap" cellspacing="0" width="100%"> 
                <thead> 
                    <tr> 
                        <th class="mobile">Id</th> 
                        <th>Immatriculation</th> 
                        <th>Date d'achat</th> 
                        <th>Date de mise en circulation</th> 
                    </tr> 
                </thead> 
                <tbody> 
                @foreach($vehicules as $car) 
                    <tr> 
                        <td>{{$car->id}}</td> 
                        <td>{{$car->immatriculation}}</td> 
                        <td>{{$car->date_achat}}</td> 
                        <td>{{$car->date_misecirculation}}</td> 
                    </tr> 
                @endforeach 
                </tbody> 
            </table> 
                      </div> 
                    </div> 
              </li> 
            </ul> 


<script type="text/javascript">
  $('.timer').countTo();
</script>
<script> 
$(document).ready(function() { 
    $('#example').DataTable( { 
        columnDefs: [ 
            { 
                targets: [ 0, 1], 
                className: 'mdl-data-table__cell--non-numeric', 
                responsive: true 
            } 
        ] 
    } ); 
    $(document).ready(function(){ 
    $('.collapsible').collapsible(); 
  }); 
} ); 
           
</script> 
@stop

