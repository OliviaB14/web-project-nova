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

@section('title', 'Agences')

@section('content')
<?php $user = Auth::user();?>
<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Gestion des agences</h1></div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
  {{ Form::open(array('url' => 'agence/update/', 'id'=>'form')) }}
    <h4 style="position: fixed;left: 0;top: 0;width: 100%;text-align: center;margin-top:15px;margin-bottom:15px;">Edition</h4>
    
            <div class="col s12">
            <div class="row" style="margin-top:30px">
                    <div class="input-field col s12">
                    {{ Form::label('enom', 'Nom de l\'agence')}}
                        {{ Form::text('enom', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('eadresse', 'Adresse')}}
                        {{ Form::text('eadresse', null,array('class'=>'validate', 'required' => 'required'))}}
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
                <div class="row">
                    <div class="input-field col s12">
                    {{ Form::label('eidville', 'Ville')}} 
                         </br>
                         {{ Form::select('eidville', $villes) }}
                    </div>
                </div>
            </div>
            {{ Form::submit('Modifier', array('class' => 'waves-effect waves-light btn','style' => 'position: fixed;left: 0;bottom: 0;width: 100%;text-align: center;')) }}
  </div>
  
  {{ Form::close() }}
</div>

<script>
$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>


<section>
<ul class="collapsible" style="margin-left:2%" data-collapsible="accordion">
@if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',41)->exists())
    <li>
      <div class="collapsible-header"><i class="material-icons">add</i>Ajouter</div>
      <div class="collapsible-body">
      <div class="row">
      @if ($errors->any())
        <div style="font-color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w3-red">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
        {{ Form::open(array('url' => 'agence/add', 'files' => true)) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                    {{ Form::label('nom', 'Nom de l\'agence')}}
                        {{ Form::text('nom', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('adresse', 'Adresse')}}
                        {{ Form::text('adresse', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('telephone', 'Téléphone')}}
                        {{ Form::text('telephone', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('fax', 'Fax')}}
                        {{ Form::text('fax', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('mail', 'Email')}} 
                        {{ Form::text('mail', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    {{ Form::label('idville', 'Ville')}} 
                         </br>
                         {{ Form::select('idville', $villes) }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                         {{ Form::file('photo') }}
                    </div>
                </div>
            </div>
            <!--TODO REPORT-->
            {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
        </div>
      </div>
    </li>
    @endif
    @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',40)->exists())
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Ville</th>
                            <th>Téléphone</th>
                            <th>fax</th>
                            <th>mail</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($agences as $agence)
                        <tr>
                            <td>{{$agence->id}}</td>
                            <td>{{$agence->nom}}</td>
                            <td>{{$agence->adresse}}</td>
                            
                            <td><?php
                            $test = DB::table('ville')->where('id', '=',$agence->idville)->first();
                            //echo $test["nom"];?>
                            {{$test->nom}}
                            </td>
                            <td>{{$agence->telephone}}</td>
                            <td>{{$agence->fax}}</td>
                            <td>{{$agence->mail}}</td>
                            <td>{{$agence->desactive}}</td>
                            <td>
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',42)->exists())
                            <a class="btn-floating btn-large waves-effect waves-light red" href="agence/destroy/{{$agence->id}}"><i class="material-icons">cancel</i></a>
                            @endif
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',43)->exists())
                            <a id="{{$agence->id}}" class="btn-floating btn-large waves-effect waves-light yellow edit" href="#modal1"><i class="material-icons">edit</i></a>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
      </div>
    </li>
    @endif
  </ul>
</section>

<section>
<div class="">
<div class="row" style="padding-top:15px">
<!--<a class="btn btn-floating btn-large cyan pulse"><i class="material-icons">add</i></a>-->
</div>
        <div class="row" style="padding-top:10px">
        <div>
            
        </div>
    </div>
</div>
</section>
<script>
$(".edit").on('click',function(){
    console.log("ajax");
    var data = $('.edit').attr('id')
    $.ajax({
          url: 'agences/show/' + data,
          type: "get",
           success: function(response){
            console.log(response); 
            $('#modal1').modal('open');
            $('#enom').val(response['nom']);
            $('#ecode_postal').val(response['code_postal']);
            $('#eadresse').val(response['adresse']);
            $('#etelephone').val(response['telephone']);
            $('#efax').val(response['fax']);
            $('#email').val(response['mail']);
            $('#eville').val(response['idville']);
            
            $('#form').attr('action', 'agence/update/' + response['id']);
            Materialize.updateTextFields();
            var ville = response["idville"];
            $('#eville option[value=' + ville + ']').attr('selected','selected');
            },
            error: function(response){
                alert('Error'+response);
                }
        });
});

$(document).ready(function() {
        $('#example').DataTable( {
            columnDefs: [
                {
                    targets: [ 0, 1],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        } );
    $(document).ready(function(){
    $('.collapsible').collapsible();
  });


  $(document).ready(function() {
    $('select').material_select();
});
} );
          
</script>
@stop