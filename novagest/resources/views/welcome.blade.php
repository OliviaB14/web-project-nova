@extends('layout.dashboard')



@section('title', 'Accueil')

@section('content')
	<div class="col l12">
		<h1>Welcome to NovaGest</h1>
	</div>
	<div class='row center-align'>
		<div class="col l6">
			<div class="card purple lighten-1">
	            <div class="card-content">
	              <span class="card-title white-text">15 agences</span>
	            </div>
	            <div class="card-action">
	              <a href="#">Gérer</a>
	            </div>
	        </div>
		</div>
		<div class="col l6">
			<div class="card teal lighten-1">
	            <div class="card-content white-text">
	              <span class="card-title">80 véhicules</span>
	            </div>
	            <div class="card-action">
	              <a href="#">Gérer</a>
	            </div>
	        </div>
		</div>
	</div>
	<div class='row center-align'>
		<div class="col l6">
			<div class="card red lighten-1">
	            <div class="card-content white-text">
	              <span class="card-title">30 agents</span>
	            </div>
	            <div class="card-action">
	              <a href="#">Gérer</a>
	            </div>
	          </div>
		</div>
		<div class="col l6">
			<div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	              <span class="card-title">Statuts</span>
	            </div>
	            <div class="card-action">
	              <a href="#">Gérer</a>
	            </div>
	          </div>
		</div>
	</div>

@stop

