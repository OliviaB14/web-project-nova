@extends('layout.dashboard')

@section('css-links')

    <style>

    </style>
@stop   

@section('title', 'Vehicules')

@section('content')
    	<div class="row">
			<div class="info-box col valign-wrapper">
				<div class="col blue">
					<span><b class="timer" id="lollipop" data-to="3" data-speed="1500"></b></span>
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
		<ul class="tabs col">
		    <li class="tab col"><a href="#gestion" class="active">Gestion</a></li>
		    <li class="tab col"><a href="#historique">Historique</a></li>
		  </ul>
		  <div id="gestion" class="col s12">
		  	<h3>Choisir un véhicule :</h3>
			  <select class="browser-default">
			    <option value="0" selected>N° XX-XXX-XX</option>
			    <option value="1">N° XX-XXX-XX</option>
			    <option value="2">N° XX-XXX-XX</option>
			    <option value="3">N° XX-XXX-XX</option>
			  </select>
		  </div>

  <!-- second tab : history -->
  		<div id="historique" class="col s12">
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




  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Test 1</a></li>
        <li class="tab col s3"><a class="active" href="#test2">Test 2</a></li>
        <li class="tab col s3 disabled"><a href="#test3">Disabled Tab</a></li>
        <li class="tab col s3"><a href="#test4">Test 4</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12">Test 1</div>
    <div id="test2" class="col s12">Test 2</div>
    <div id="test3" class="col s12">Test 3</div>
    <div id="test4" class="col s12">Test 4</div>
  </div>


<script type="text/javascript">
  $('.timer').countTo();
</script>
@stop

