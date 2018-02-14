@extends('layout.dashboard')

@section('title', 'Accueil')

@section('content')
<h1>Gestion des villes</h1>
<section>

<table id="example" class="mdl-data-table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody> 
        @foreach($villes as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->nom}}</td>
            </tr>
          @endforeach
        </tbody>
    </table>

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
