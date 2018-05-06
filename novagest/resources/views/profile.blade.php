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

<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
  {{ Form::open(array('url' => 'profil/update/', 'id'=>'form', 'files' => true)) }}
    <h4 style="position: fixed;left: 0;top: 0;width: 100%;text-align: center;margin-top:15px;margin-bottom:15px;">Edition</h4>
    <div class="row center-align" id="aphoto-container">
        <div class="col l12" id="aphoto"></div>
    </div>
            <div class="col s12">
            <div class="row" style="margin-top:30px">
                    <div class="input-field col s12">
                    {{ Form::label('eusername', 'Nom d\'utilisateur')}}
                        {{ Form::text('eusername', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('etelephone', 'Téléphone')}}
                        {{ Form::text('etelephone', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('efax', 'Fax')}}
                        {{ Form::text('efax', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('email', 'Email')}} 
                        {{ Form::text('email', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
            </div>
            {{ Form::submit('Modifier', array('class' => 'waves-effect waves-light btn','style' => 'position: fixed;left: 0;bottom: 0;width: 100%;text-align: center;')) }}
  </div>
  
  {{ Form::close() }}
</div>

<section>
    <div class="container">
		<div class="row">
			<div class="col s12" id="card-title"> <i class="material-icons tiny">folder</i> {{$user->prenom}} {{$user->nom}}</div>
		</div>
		<div class="row" id="main-content">
			<div class="card-image col s12 m12 l4 valign-wrapper">
		    	<img src="{{ asset('images/profile-icon-default.jpg') }}" id="main" class="responsive-img"/>
		    </div>
		    <div class="card-stacked col s12 m12 l8">
		       	<div class="card-content">
		       		
		       		<h4 class="center-align" id="statut">
		            		<?php
                            $typeutilisateurs = DB::table('type_utilisateur')->where('id', '=',$user->idtypeutilisateur)->first();
                            //echo $test["nom"];?>
                            {{$typeutilisateurs->libelle}}
		            </h4>
		            <p><i class="material-icons tiny">person_outline</i> {{$user->username}}</p>
		            <p><i class="material-icons tiny">today</i> {{$user->date_naissance}}</p>
		            <p><i class="material-icons tiny">phone</i> {{$user->telephone}} | <i class="material-icons tiny">perm_phone_msg</i> {{$user->fax}}</p>
		            <p></p>
		            <p><i class="material-icons tiny">mail_outline</i> {{$user->mail}}</p>

		            <a href="#modal1" class="waves-effect waves-light btn col edit s6" id="{{$user->id}}"><i class="material-icons tiny">edit</i></a>
		            <a href="{{url('deconnexion')}}" class="waves-effect waves-light btn col s6" id="logout"><i class="material-icons tiny">exit_to_app</i></a>
		        </div>
		        <div class="card-action">
		        	
		        	
		        </div>
		    </div>
		</div>
	</div>
</section>

<script>

$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();


	
  });

var statut = $('#statut');

console.log(statut.text());
if ((statut.text().indexOf("Agent") >= 0)){
	statut.attr('style', 'background:#d4e157;');
} 
if ((statut.text().indexOf("Administrateur") >= 0)){
	statut.attr('style', 'background:#FFD740;');
} 
if ((statut.text().indexOf("Développeur") >= 0)){
	statut.attr('style', 'background:#AEDEDD;');
} 
if ((statut.text().indexOf("Péon") >= 0)){
    statut.attr('style', 'background:#F08080;');
} 


$(".edit").on('click',function(){
    console.log("ajax");
    var data = $(this).attr('id')
    $.ajax({
          url: 'profil/show/' + data,
          type: "get",
           success: function(response){
            console.log(response); 
            $('#modal1').modal('open');

            $('#eusername').val(response['username']);
            $('#etelephone').val(response['telephone']);
            $('#efax').val(response['fax']);
            $('#email').val(response['mail']);
            
            $('#form').attr('action', 'profil/update/' + response['id']);
            Materialize.updateTextFields();
            },
            error: function(response){
                alert('Error'+response);
                }
        });
});

</script>

@endsection