@extends('layout.dashboard')

@section('css-links')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css')}}"/>    
    <style>
        .card.horizontal {
        /*display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;*/
    }
    </style>
@stop   

@section('title')
{{$user->prenom}} {{$user->nom}}
@endsection

@section('content')

<section>
    <div class="container">
		<div class="row">
			<div class="col s12" id="card-title"> <i class="material-icons tiny">settings</i> Modifier mon profil</div>
		</div>
		<div class="row" id="main-content">
			<div class="card-image col s12 m12 l4 valign-wrapper">
		    	<img src="{{ asset('images/profile-icon-default.png') }}" id="main" class="responsive-img circle"/>
		    </div>
		    <div class="card-stacked col s12 m12 l8">
		       	<div class="card-content">
		       		<h4><i class="material-icons tiny">info_outline</i> Informations personnelles</h4>
		            <p>Nom d'utilisateur : {{$user->username}}</p>
		            <p>Date de naissance : {{$user->date_naissance}}</p>
		            <p>Telephone : {{$user->telephone}}</p>
		            <p>Fax : {{$user->fax}}</p>
		        </div>
		        <div class="card-action">
		            <a href="{{url('deconnexion')}}" class="waves-effect waves-light btn col s12" id="logout">Deconnexion</a>
		        </div>
		    </div>
		</div>
	</div>
</section>

@endsection