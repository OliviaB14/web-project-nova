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
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($historiqueVehicules as $historique)
                        <tr>
                            <td>{{$historique->id}}</td>
                            <td>{{$historique->date_ligne}}</td>
                            <td>{{$historique->commentaire}}</td>
                            <td>{{$historique->idutilisateur}}</td>
                            <td>{{$historique->idtypeevenement}}</td>
                            <td>{{$historique->idvehicule}}</td>
                            <td>{{$historique->desactive}}</td>
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