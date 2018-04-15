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

@section('title', 'Type_vehicule')

@section('content')
<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
  {{ Form::open(array('url' => 'typevehicule/update/', 'id'=>'form')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('emodele', 'Modèle')}}
                        {{ Form::text('emodele', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('ehauteur', 'Hauteur')}}
                        {{ Form::text('ehauteur', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('elargeur', 'Largeur')}}
                        {{ Form::text('elargeur', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('epoids', 'Poids')}}
                        {{ Form::text('epoids', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('epuissance', 'Puissance')}}
                        {{ Form::text('epuissance', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('eprix_neuf', 'Prix neuf')}}
                        {{ Form::text('eprix_neuf', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
            </div>
            {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
</div>
</div>

<ul class="collapsible" style="margin-left:2%" data-collapsible="accordion">
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
      {{ Form::open(array('url' => 'typevehicule/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('modele', 'Modèle')}}
                        {{ Form::text('modele', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('description', 'Description')}}
                        {{ Form::text('description', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('hauteur', 'Hauteur')}}
                        {{ Form::text('hauteur', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('largeur', 'Largeur')}}
                        {{ Form::text('largeur', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('poids', 'Poids')}}
                        {{ Form::text('poids', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('puissance', 'Puissance')}}
                        {{ Form::text('puissance', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('prix_neuf', 'Prix neuf')}}
                        {{ Form::text('prix_neuf', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
            </div>
            {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
        </div>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Modèle</th>
                            <th>Hauteur</th>
                            <th>Largeur</th>
                            <th>Poids</th>
                            <th>Puissance</th>
                            <th>Prix neuf</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($typeVehicules as $typevehicule)
                        <tr>
                            <td>{{$typevehicule->modele}}</td>
                            <td>{{$typevehicule->hauteur}}</td>
                            <td>{{$typevehicule->largeur}}</td>
                            <td>{{$typevehicule->poids}}</td>
                            <td>{{$typevehicule->puissance}}</td>
                            <td>{{$typevehicule->prix_neuf}}</td>
                            <td>{{$typevehicule->desactive}}</td>
                            <td><a class="btn-floating btn-large waves-effect waves-light red" href="typevehicule/destroy/{{$typevehicule->id}}"><i class="material-icons">cancel</i><a id="{{$typevehicule->id}}" class="btn-floating btn-large waves-effect waves-light yellow edit" href="#modal1"><i class="material-icons">edit</i></a></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
      </div>
    </li>
  </ul>
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