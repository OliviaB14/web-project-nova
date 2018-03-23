@extends('layout.dashboard')

@section('css-links')

    <style>

    </style>
@stop   

@section('title', 'Vehicules')

@section('content')
<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Gestion des véhicules</h1></div>
</div>

<ul class="collapsible">
<li>
      <div class="collapsible-header"><i class="material-icons">whatshot</i>Ajouter un vehicule</div>
      <div class="collapsible-body">
      {{ Form::open(array('url' => 'vehicule/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('immatriculation', 'Immatriculation')}}
                         {{ Form::text('immatriculation', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('date_achat', 'Date d\'achat')}}
                         {{ Form::text('date_achat', null,array('class'=>'datepicker', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('date_misecirculation', 'Date de mise en circulation')}}
                         {{ Form::text('date_misecirculation', null,array('class'=>'datepicker', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        {{ Form::label('idtypevehicule', 'Type de vehicule')}} 
                         </br>
                         {{ Form::select('idtypevehicule', $idtypevehicule) }}
                    </div>
                    <div class="input-field col s4">
                        {{ Form::label('idtypeetatvehicule', 'Etat du vehicule')}} 
                         </br>
                         {{ Form::select('idtypeetatvehicule', $idtypeetatvehicule) }}
                    </div>
                    <div class="input-field col s4">
                        {{ Form::label('idstatut', 'Statut du vehicule')}} 
                         </br>
                         {{ Form::select('idstatut', $idstatut) }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('idclient', 'Client')}} 
                         </br>
                         {{ Form::select('idclient', $idclient) }}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('idagence', 'Agence')}} 
                         </br>
                         {{ Form::select('idagence', $idagence) }}
                    </div>
                </div>
            </div>
            
            {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
      </div>
    </li>
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
                <a href="single/{{$car->id}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
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
  </ul>


<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
});




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

  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Aujourd\'hui',
    clear: 'Effacer',
    close: 'Valider',
    closeOnSelect: false // Close upon selecting a date,
  });
</script>
@stop

