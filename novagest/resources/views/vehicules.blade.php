@extends('layout.dashboard')

@section('css-links')

    <style>

    </style>
@stop   

@section('title', 'Vehicules')

@section('content')
<div class='row'> 
	<div class="page-header"> 
		<h3>Véhicules</h3> 
	</div> 
</div> 

<ul class="collapsible" style="margin-left:2%" data-collapsible="accordion"> 
    <li> 
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div> 
        <div class="collapsible-body"> 
          <div> 
            <table id="example" class="mdl-data-table responsive-table responsive no-wrap" cellspacing="0" width="100%"> 
                <thead> 
                    <tr> 
                        <th class="mobile">Id</th> 
                        <th>Immatriculation</th> 
                        <th>Date d'achat</th> 
                        <th>Date de mise en circulation</th> 
                    </tr> 
                </thead> 
                <tbody> 
                @foreach($vehicules as $car) 
                    <tr> 
                        <td>{{$car->id}}</td> 
                        <td>{{$car->immatriculation}}</td> 
                        <td>{{$car->date_achat}}</td> 
                        <td>{{$car->date_misecirculation}}</td> 
                    </tr> 
                @endforeach 
                </tbody> 
            </table> 
                      </div> 
                    </div> 
              </li> 
            </ul> 


<script type="text/javascript">
  $('.timer').countTo();
</script>
<script> 
$(document).ready(function() { 
    $('#example').DataTable( { 
        columnDefs: [ 
            { 
                targets: [ 0, 1], 
                className: 'mdl-data-table__cell--non-numeric', 
                responsive: true 
            } 
        ] 
    } ); 
    $(document).ready(function(){ 
    $('.collapsible').collapsible(); 
  }); 
} ); 
           
</script> 
@stop

