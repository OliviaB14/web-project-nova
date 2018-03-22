@extends('layout.dashboard')

@section('css-links')

    <style>

    </style>
@stop   

@section('title', 'Vehicules')

@section('content')


<ul class="collapsible">
    <li>
      <div class="collapsible-header"><i class="material-icons">filter_drama</i>Vehicules</div>
      <div class="collapsible-body">
          <div class='row'> 
      <div class="page-header"> 
        <h3>Véhicules</h3> 
      </div> 
    </div> 
    <button class="active btn" id="all">Show All</button>
@foreach($typevehicules as $type)
    <button class="btn" id="{{$type->id}}">{{$type->modele}}</button>
@endforeach
    <div class="row" id="parent">
      @foreach($vehicules as $car)
      <?php
        $test = DB::table('type_vehicule')->where('id', '=',$car->idtypevehicule)->first();
        ?>
          <div class="col s12 m12 l12 xl6 {{$test->id}}">
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
                  <p>Immatriculation : {{$car->immatriculation}}</p>
                  <p>Immatriculation : {{$car->immatriculation}}</p>
                  <p>Immatriculation : {{$car->immatriculation}}</p>
              </div>
            </div>
          </div>
        @endforeach 
    </div>
      </span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">place</i>Tableau de vehicules</div>
      <div class="collapsible-body">
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
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
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
@stop

