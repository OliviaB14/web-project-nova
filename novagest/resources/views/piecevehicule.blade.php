@extends('layout.dashboard')

@section('css-links')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css')}}"/>
    <style>
        .card.horizontal {
        /*display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;*/
    }
    </style>
@stop   

@section('title', 'Piece_vehicule')

@section('content')
<?php $user = Auth::user();?>

<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Gestion des pièces de véhicules</h1></div>
        <div class="card col s12 center-align amber accent-2 main-card">
            <div class="card-content">
              <span class="card-title black-text"><b class="timer" data-to="{{$piecevehicules->count()}}" data-speed="1500"></b> Pièces de Véhicules</span>
            </div>
        </div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
  {{ Form::open(array('url' => 'piecevehicule/update/', 'id'=>'form', 'files' => true)) }}
    <h4 style="position: fixed;left: 0;top: 0;width: 100%;text-align: center;margin-top:15px;margin-bottom:15px;">Edition</h4>
            <div class="row" style="margin-top:30px">
                    <div class="input-field col s6">
                    {{ Form::label('eidtypepiece', 'Type de pièce')}} 
                         </br>
                         {{ Form::select('eidtypepiece', $typepiece) }}
                    </div>
                    <div class="input-field col s6">
                    {{ Form::label('eidtypeetatpiece', 'Etat de la pièce')}} 
                         </br>
                         {{ Form::select('eidtypeetatpiece', $typeetatpiece) }}
                    </div>
                </div>
            {{ Form::submit('Modifier', array('class' => 'waves-effect waves-light btn','style' => 'position: fixed;left: 0;bottom: 0;width: 100%;text-align: center;')) }}
  </div>  
  {{ Form::close() }}
</div>

<script>
  $(document).ready(function() {
    $('select').material_select();
});
$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>

<section>
<ul class="collapsible" style="margin-left:2%" data-collapsible="accordion">
@if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',26)->exists())
    <li>
      <div class="collapsible-header"><i class="material-icons">add</i>Ajouter</div>
      <div class="collapsible-body">
      <div class="row">
      @if ($errors->any())
        <div style="font-color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w3-red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      {{ Form::open(array('url' => 'piece_vehicule/add')) }}
          <div class="row">        
              <div class="input-field col s12">
                  {{ Form::label('typeetatpiece', 'Typeetatpiece')}}
                  {{ Form::text('typeetatpiece', null,array('class'=>'validate', 'required' => 'required'))}}
              </div>
            <div class="row">  
              <div class="input-field col s12">
                    {{ Form::label('typepiece', 'Type Piéce')}} 
                         </br>
                         {{ Form::select('typepiece', $typepiece) }}
                </div>
             </div>
        </div>
      {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
  {{ Form::close() }}
        </div>
      </div>
    </li>
    @endif
    @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',25)->exists())
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Date d'entrée</th>
                            <th>Etat de la pièce</th>
                            <th>Type de pièce</th>
                            <th>Statuts</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($piecevehicules as $pieceVehicule)
                        <tr>
                            <td>{{$pieceVehicule->id}}</td>
                            <td>{{$pieceVehicule->date_entree}}</td>
                            <td>{{$pieceVehicule->idtypeetatpiece}}</td>
                            <td>{{$pieceVehicule->idtypepiece}}</td>
                            <td>{{$pieceVehicule->desactive}}</td>
                            <td>
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',77)->exists())
                            <a class="btn-floating btn-large waves-effect waves-light red" href="typeetatpiece/destroy/{{$pieceVehicule->id}}"><i class="material-icons">cancel</i></a>
                            @endif
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',76)->exists())
                            <a id="{{$pieceVehicule->id}}" class="btn-floating btn-large waves-effect waves-light yellow edit" href="#modal1"><i class="material-icons">edit</i></a>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
      </div>
    </li>
    @endif
  </ul>
</section>

<script>
$(".edit").on('click',function(){
    console.log("ajax");
    var data = $(this).attr('id')
    $.ajax({
          url: 'piecevehicules/show/' + data,
          type: "get",
           success: function(response){
            console.log(response); 

            $('#modal1').modal('open');
            $('#eidtypeetatpiece').val(response['idtypeetatpiece']);
            $('#eidtypepiece').val(response['idtypepiece']);       
            $('#form').attr('action', 'piecevehicule/update/' + response['id']);            
            Materialize.updateTextFields();

            var idtypeetatpiece = response["idtypeetatpiece"];
            $('#eidtypeetatpiece option[value=' + idtypeetatpiece + ']').attr('selected','selected');
            var idtypepiece = response["idtypepiece"];
            $('#eidtypepiece option[value=' + idtypepiece + ']').attr('selected','selected');
            },
            error: function(response){
                alert('Error'+response);
                }
        });
});
$(document).ready(function() {
        $('#example').DataTable( {
            columnDefs: [
                {
                    targets: [ 0, 1],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        } );
    $(document).ready(function(){
    $('.collapsible').collapsible();
  });
} );          
</script>

@stop