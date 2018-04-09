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


<section>
    <div class="container">
        <div class="row">
        {{ Form::open(array('url' => 'type_vehicule/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('modele', 'Modèle')}}
                        {{ Form::text('modele', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('hauteur', 'Hauteur')}}
                        {{ Form::text('hauteur', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
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
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('puissance', 'Puissance')}}
                        {{ Form::text('puissance', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('prix_neuf', 'Prix neuf')}}
                        {{ Form::text('prix_neuf', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
            </div>
            {{ Form::submit('Ajouter', array('class' => 'btn-sm btn-success')) }}
        {{ Form::close() }}
        </div>
    </div>
</section>


<section>
<div class="container">
<div class="row" style="padding-top:15px">
<!--<a class="btn btn-floating btn-large cyan pulse"><i class="material-icons">add</i></a>-->
</div>
        <div class="row" style="padding-top:10px">
        <div>
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
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($typevehicules as $typevehicule)
                        <tr>
                            <td>{{$typevehicule->modele}}</td>
                            <td>{{$typevehicule->hauteur}}</td>
                            <td>{{$typevehicule->largeur}}</td>
                            <td>{{$typevehicule->poids}}</td>
                            <td>{{$typevehicule->puissance}}</td>
                            <td>{{$typevehicule->prix_neuf}}</td>
                            <td>{{$typevehicule->desactive}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
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