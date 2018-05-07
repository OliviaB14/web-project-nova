@extends('layout.dashboard')

@section('css-links')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@stop   

@section('title', 'Vehicules')

@section('content')
<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Gestion des véhicules</h1></div>
    <div class="card col s12 center-align amber accent-2 main-card">
        <div class="card-content">
          <span class="card-title black-text"><b class="timer" data-to="{{$vehicules->count()}}" data-speed="1500"></b> véhicules</span>
        </div>
    </div>
</div>



<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
  {{ Form::open(array('url' => 'vehicule/update', 'id'=>'form', 'files' => true)) }}
  <h4 style="position: fixed;left: 0;top: 0;width: 100%;text-align: center;margin-top:15px;margin-bottom:15px;">Edition</h4>
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('eimmatriculation', 'Immatriculation')}}
                         {{ Form::text('eimmatriculation', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('edate_achat', 'Date d\'achat')}}
                         {{ Form::text('edate_achat', null,array('class'=>'datepicker', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('edate_misecirculation', 'Date de mise en circulation')}}
                         {{ Form::text('edate_misecirculation', null,array('class'=>'datepicker', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        {{ Form::label('eidtypevehicule', 'Type de vehicule')}} 
                         </br>
                         {{ Form::select('eidtypevehicule', $idtypevehicule) }}
                    </div>
                    <div class="input-field col s4">
                        {{ Form::label('eidtypeetatvehicule', 'Etat du vehicule')}} 
                         </br>
                         {{ Form::select('eidtypeetatvehicule', $idtypeetatvehicule) }}
                    </div>
                    <div class="input-field col s4">
                        {{ Form::label('eidstatut', 'Statut du vehicule')}} 
                         </br>
                         {{ Form::select('eidstatut', $idstatut) }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('eidclient', 'Client')}} 
                         </br>
                         {{ Form::select('eidclient', $idclient) }}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('eidagence', 'Agence')}} 
                         </br>
                         {{ Form::select('eidagence', $idagence) }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                         {{ Form::file('ephotomain') }}
                    </div>
                    <div class="input-field col s4">
                         {{ Form::file('ephoto_2') }}
                    </div>
                    <div class="input-field col s4">
                         {{ Form::file('ephoto_3') }}
                    </div>
                </div>
            </div>
            
            {{ Form::submit('Modifier', array('class' => 'waves-effect waves-light btn','style' => 'position: fixed;left: 0;bottom: 0;width: 100%;text-align: center;')) }}
        {{ Form::close() }}
</div>
</div>

<ul class="collapsible">
<li>
      <div class="collapsible-header"><i class="material-icons">add</i>Ajouter un vehicule</div>
      <div class="collapsible-body">
      {{ Form::open(array('url' => 'vehicule/add', 'files' => true)) }}
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
                <div class="row">
                    <div class="input-field col s4">
                         {{ Form::file('photo1') }}
                    </div>
                    <div class="input-field col s4">
                         {{ Form::file('photo2') }}
                    </div>
                    <div class="input-field col s4">
                         {{ Form::file('photo3') }}
                    </div>
                </div>
            </div>
            
            {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">apps</i>Vehicules</div>
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
              <?php 
              $blob = DB::table('type_vehicule')->where('id' ,'=', $car->idtypevehicule)->select('photo')->first();
              if(!empty($car->photo_1)){
                echo "<img style='width:300px;height:200px' src='".$car->photo_1."'/>";
              } else{
                echo '<img style="width:300px;height:200px" src="data:image/jpeg;base64,'.base64_encode( $blob->photo ).'"/>';
              }
              
                ?>
                @if($car->desactive == 0)
                <a class="btn-floating halfway-fab waves-effect waves-light red" style="margin-bottom:20%" href="vehicule/destroy/{{$car->id}}"><i class="material-icons">cancel</i></a>
                @else
                <a class="btn-floating halfway-fab waves-effect waves-light green" style="margin-bottom:20%" href="vehicule/destroy/{{$car->id}}"><i class="material-icons">check</i></a>
                @endif
                <a id="{{$car->id}}" class="btn-floating halfway-fab waves-effect waves-light yellow edit"style="margin-bottom:10%" href="#modal1"><i class="material-icons">edit</i></a>
                <a href="single/{{$car->id}}" class="btn-floating halfway-fab waves-effect waves-light blue"><i class="material-icons">archive</i></a>
              </div>
              <div class="card-content">
                <h1>
                <?php
                  $test = DB::table('type_vehicule')->where('id', '=',$car->idtypevehicule)->first();
                  ?>
                  {{$test->modele}} 
                  </h1>
                  <p>Immatriculation : {{$car->immatriculation}}</p>
                  <p>Mise en circulation : {{$car->date_misecirculation}}</p>
                  <p>Date d'achat : {{$car->date_achat}}</p>
              </div>
            </div>
          </div>
        @endforeach 
    </div>
      </span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">dehaze</i>Tableau de vehicules</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table responsive no-wrap" cellspacing="0" width="100%"> 
                <thead> 
                    <tr> 
                        <th class="mobile">Id</th> 
                        <th>Immatriculation</th> 
                        <th>Date d'achat</th> 
                        <th>Date de mise en circulation</th>
                        <th>Statuts</th>
                        <th>Actions</th>
                    </tr> 
                </thead> 
                <tbody> 
                @foreach($vehicules as $car) 
                    <tr> 
                        <td>{{$car->id}}</td> 
                        <td>{{$car->immatriculation}}</td> 
                        <td>{{$car->date_achat}}</td> 
                        <td>{{$car->date_misecirculation}}</td>
                        <td>{{$car->desactive}}</td> 
                        <td>
                        @if($car->desactive == 0)
                        <a class="btn-floating btn-large waves-effect waves-light red" href="vehicule/destroy/{{$car->id}}"><i class="material-icons">cancel</i></a>
                        @else
                        <a class="btn-floating btn-large waves-effect waves-light green" href="vehicule/destroy/{{$car->id}}"><i class="material-icons">check</i></a>
                        @endif
                        <a id="{{$car->id}}" class="btn-floating btn-large waves-effect waves-light yellow edit" href="#modal1"><i class="material-icons">edit</i></a>
                        <a id="{{$car->id}}" class="btn-floating btn-large waves-effect waves-light blue edit" href="single/{{$car->id}}"><i class="material-icons">archive</i></a>
                        </td>
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
$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });

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
           
$(".edit").on('click',function(){
    console.log("ajax");
    var data = $(this).attr('id');
    $.ajax({
          url: 'vehicule/show/' + data,
          type: "get",
           success: function(response){
            console.log(response); 
            $('#modal1').modal('open');
            $('#eimmatriculation').val(response['immatriculation']);
            $('#edate_achat').val(response['date_achat']);
            $('#edate_misecirculation').val(response['date_misecirculation']);
            $('#eidtypevehicule').val(response['idtypevehicule']);
            $('#eidtypeetatvehicule').val(response['idtypeetatvehicule']);
            $('#eidstatut').val(response['idstatut']);
            $('#eidclient').val(response['idclient']);
            $('#eidagence').val(response['idagence']);
            console.log(response['photo_1']);
            $('#form').attr('action', 'vehicule/update/' + response['id']);
            Materialize.updateTextFields();
            },
            error: function(response){
                alert('Error'+response);
                }
        });
});



var $btns = $('.btn').click(function() {
  if (this.id == 'all') {
    $("#parent > div").fadeIn(450);
  } else {
    var $el = $('.' + this.id).fadeIn(450);
    $("#parent > div").not($el).hide();
  }
});

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

