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


<section>
    <div class="container">
        <div class="row">
        {{ Form::open(array('url' => 'piece_vehicule/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('id', 'Id')}}
                        {{ Form::text('id', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('date_entree', 'Date_entree')}}
                        {{ Form::text('date_entree', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('typeetatpiece', 'Typeetatpiece')}}
                        {{ Form::text('typeetatpiece', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('typepiece', 'Typepiece')}}
                        {{ Form::text('typepiece', null,array('class'=>'validate', 'required' => 'required'))}}
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
                            <th>Date d'entrée</th>
                            <th>Etat de la pièce</th>
                            <th>Type de pièce</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pieceVehicules as $pieceVehicule)
                        <tr>
                            <td>{{$pieceVehicule->id}}</td>
                            <td>{{$pieceVehicule->date_entree}}</td>
                            <td>{{$pieceVehicule->idtypeetatpiece}}</td>
                            <td>{{$pieceVehicule->idtypepiece}}</td>
                            <td>{{$pieceVehicule->desactive}}</td>
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