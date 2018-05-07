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

@section('title', 'Type_piece_vehicule')

@section('content')
<?php $user = Auth::user();?>

<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Gestion des types de pièces de véhicules</h1></div>
        <div class="card col s12 center-align amber accent-2 main-card">
            <div class="card-content">
              <span class="card-title black-text"><b class="timer" data-to="{{$typePieceVehicules->count()}}" data-speed="1500"></b> typePieceVehicules</span>
            </div>
        </div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
  {{ Form::open(array('url' => 'typepiecevehicule/update/', 'id'=>'form', 'files' => true)) }}
    <h4 style="position: fixed;left: 0;top: 0;width: 100%;text-align: center;margin-top:15px;margin-bottom:15px;">Edition</h4>
            <div class="row" style="margin-top:30px">
                    <div class="input-field col s6">
                    {{ Form::label('enom', 'Nom du type de piece')}}
                        {{ Form::text('enom', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('eprix_neuf', 'Prix neuf')}}
                        {{ Form::text('eprix_neuf', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    {{ Form::label('eidtypevehicule', 'Type véhicule')}} 
                         </br>
                         {{ Form::select('eidtypevehicule', $typevehicules) }}
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
@if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',75)->exists())
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
      {{ Form::open(array('url' => 'typepiecevehicule/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('nom', 'Nom')}}
                        {{ Form::text('nom', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('idtypevehicule', 'Type Vehicule')}}
                        {{ Form::text('idtypevehicule', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('prix_neuf', 'Prix_neuf')}}
                        {{ Form::text('prix_neuf', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
            </div>
            {{ Form::submit('Ajouter', array('class' => 'btn-sm btn-success')) }}
        {{ Form::close() }}
        </div>
      </div>
    </li>
    @endif
    @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',62)->exists())
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nom de la pièce</th>
                            <th>Type de véhicule</th>
                            <th>Prix neuf</th>
                            <th>Statuts</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($typePieceVehicules as $ty)
                        <tr>
                            <td>{{$ty->nom}}</td>
                            <td>{{$ty->idtypevehicule}}</td>
                            <td>{{$ty->prix_neuf}}</td>
                            <td>{{$ty->desactive}}</td>
                            <td>
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',77)->exists())
                            <a class="btn-floating btn-large waves-effect waves-light red" href="typepiecevehicule/destroy/{{$ty->id}}"><i class="material-icons">cancel</i></a>
                            @endif
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',76)->exists())
                            <a id="{{$ty->id}}" class="btn-floating btn-large waves-effect waves-light yellow edit" href="#modal1"><i class="material-icons">edit</i></a>
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
          url: 'typepiecevehicules/show/' + data,
          type: "get",
           success: function(response){
            console.log(response); 

            $('#modal1').modal('open');
            $('#enom').val(response['nom']);
            $('#eidtypevehicule').val(response['idtypevehicule']);
            $('#eprix_neuf').val(response['prix_neuf']);          
            $('#form').attr('action', 'typepiecevehicule/update/' + response['id']);            
            Materialize.updateTextFields();

            var idtypevehicule = response["idtypevehicule"];
            $('#eidtypevehicule option[value=' + idtypevehicule + ']').attr('selected','selected');
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