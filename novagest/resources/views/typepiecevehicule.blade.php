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

<section>
<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Type de piéces de véhicule</h1></div>
</div>
<ul class="collapsible" style="margin-left:2%" data-collapsible="accordion">
@if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',26)->exists())
<li>
<div class="collapsible-header"><i class="material-icons">add</i>Ajouter</div>
      <div class="collapsible-body">
      <div class="row">
      {{ Form::open(array('url' => 'type_piece_vehicule/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('nom', 'Nom')}}
                        {{ Form::text('nom', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('type_vehicule', 'Type_vehicule')}}
                        {{ Form::text('type_vehicule', null,array('class'=>'validate', 'required' => 'required'))}}
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
    @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',25)->exists())
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nom de la pièce</th>
                            <th>Type de véhicule</th>
                            <th>Prix neuf</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($typePieceVehicules as $ty)
                        <tr>
                            <td>{{$ty->nom}}</td>
                            <td>{{$ty->idtypevehicule}}</td>
                            <td>{{$ty->prix_neuf}}</td>
                            <td>{{$ty->desactive}}</td>
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
$(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ]
    } );
} );
          
</script>
@stop