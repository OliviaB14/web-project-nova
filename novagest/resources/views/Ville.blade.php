@extends('layout.dashboard')

@section('title', 'Accueil')

@section('content')
 <!-- Modal Trigger -->
 <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>Modal Header</h4>
    <p>A bunch of text</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
  </div>
</div>

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

  $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
          
</script>
@stop
