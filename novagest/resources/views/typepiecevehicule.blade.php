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


<section>
    <div class="container">
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
                            <th>Nom de la pièce</th>
                            <th>Type de véhicule</th>
                            <th>Prix neuf</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($typepiecevehicules as $typepiecevehicule)
                        <tr>
                            <td>{{$typepiecevehicule->nom}}</td>
                            <td>{{$typepiecevehicule->idtypevehicule}}</td>
                            <td>{{$typepiecevehicule->prix_neuf}}</td>
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