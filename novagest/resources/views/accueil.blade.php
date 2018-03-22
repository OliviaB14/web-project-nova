@extends('layout.dashboard')



@section('title', 'Accueil')

@section('content')
	<div class="col l12 center-align">
		<h1>Welcome to NovaGest</h1>
	</div>
	<div class='row center-align'>
		<div class="col s12 m6">
			<div class="card amber accent-2">
	            <div class="card-content">
	              <span class="card-title black-text"><b class="timer" data-to="{{$agences}}" data-speed="1500"></b> agences</span>
	            </div>
	            <div class="card-action">
	              <a href="agences">Gérer</a>
	            </div>
	        </div>
		</div>
		<div class="col s12 m6">
			<div class="card teal lighten-3">
	            <div class="card-content black-text">
	              <span class="card-title"><b class="timer" id="lollipop" data-to="{{$vehicules}}" data-speed="1500"></b> véhicules</span>
	            </div>
	            <div class="card-action">
	              <a href="vehicules">Gérer</a>
	            </div>
	        </div>
		</div>
	</div>
	<div class='row center-align'>
		<div class="col s12 m6">
			<div class="card brown lighten-3">
	            <div class="card-content black-text">
	              <span class="card-title"><b class="timer" id="lollipop" data-to="{{$utilisateurs}}" data-speed="1500"></b> agents</span>
	            </div>
	            <div class="card-action">
	              <a href="utilisateur">Gérer</a>
	            </div>
	          </div>
		</div>
		<div class="col s12 m6">
			<div class="card lime lighten-1">
	            <div class="card-content black-text">
	              <span class="card-title">Statuts</span>
	            </div>
	            <div class="card-action">
	              <a href="statutvehicule">Gérer</a>	
	            </div>
	          </div>
		</div>
	</div>



<script type="text/javascript">
  $('.timer').countTo();
</script>
@stop

