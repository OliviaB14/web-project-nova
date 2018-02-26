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

@section('title', 'Historique_vehicule')

@section('content')


<section>
    <div class="container">
        <div class="row">
        {{ Form::open(array('url' => 'historique_vehicule/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('id', 'N°')}}
                        {{ Form::text('id', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('date_ligne', 'Date')}}
                        {{ Form::text('date_ligne', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('commentaire', 'Commentaire')}}
                        {{ Form::text('commentaire', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('utilisateur', 'Utilisateur')}}
                        {{ Form::text('utilisateur', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('type_evenement', 'Type_evenementFax')}}
                        {{ Form::text('type_evenement', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('vehicule', 'Vehicule')}}
                        {{ Form::text('vehicule', null,array('class'=>'validate', 'required' => 'required'))}}
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
                            <th>N°</th>
                            <th>Date</th>
                            <th>Commentaire</th>
                            <th>Utilisateur</th>
                            <th>Type d'évènement</th>
                            <th>Véhicule</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($historique_vehicules as $historique_vehicule)
                        <tr>
                            <td>{{$client->id}}</td>
                            <td>{{$client->date_ligne}}</td>
                            <td>{{$client->commentaire}}</td>
                            <td>{{$client->idutilisateur}}</td>
                            <td>{{$client->idtypeevenement}}</td>
                            <td>{{$client->idvehicule}}</td>
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