@extends('layout.dashboard')

@section('css-links')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vehicules.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css')}}"/>
    <style>

    </style>
@stop   

@section('title', 'Vehicules')

@section('content')
<section>
    <div class="container">
    	<div class="row">
			<div class="info-box col valign-wrapper">
				<div class="col blue">
					<span class="timer" data-from="0" data-to="80"></span>
				</div>
				<div class="col">
			      <span class="blue-text text-darken-2">Nombre total de véhicules</span> 
			    </div>
			</div>
			<div class="info-box col valign-wrapper">
				<div class="col blue">
					<span class="timer" data-from="0" data-to="80"></span>
				</div>
				<div class="col">
			      <span class="blue-text text-darken-2">Nombre total de véhicules</span> 
			    </div>
			</div>
		</div>
	<!-- first tab : vehicule dealing -->
	<div class='row'>
		<ul id="tabs-swipe-demo" class="tabs col s12">
		    <li class="tab col s6"><a href="#test-swipe-1" class="active">Gestion</a></li>
		    <li class="tab col s6"><a href="#test-swipe-2">Historique</a></li>
		  </ul>
		  <div id="test-swipe-1" class="col s12">
		  	<h3>Choisir un véhicule :</h3>
			  <select class="browser-default">
			    <option value="0" selected>N° XX-XXX-XX</option>
			    <option value="1">N° XX-XXX-XX</option>
			    <option value="2">N° XX-XXX-XX</option>
			    <option value="3">N° XX-XXX-XX</option>
			  </select>
		  </div>

  <!-- second tab : history -->
  		<div id="test-swipe-2" class="col s12">
  			<table>
		        <thead>
		          <tr>
		              <th>Modèle</th>
		              <th>Immatriculation</th>
		              <th>Etat</th>
		          </tr>
		        </thead>

		        <tbody>
		          <tr>
		            <td>Peugeot 3008</td>
		            <td>12-345-67</td>
		            <td></td>
		          </tr>
		          <tr>
		            <td>Alan</td>
		            <td>Jellybean</td>
		            <td>$3.76</td>
		          </tr>
		          <tr>
		            <td>Jonathan</td>
		            <td>Lollipop</td>
		            <td>$7.00</td>
		          </tr>
		        </tbody>
		      </table>
  		</div>
	</div>

</div>




</section>


<script type="text/javascript">
  $('.timer').countTo();
</script>
@stop

