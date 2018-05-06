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

@section('title', 'villes')

@section('content')
<?php $user = Auth::user();?>
<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Gestion des villes</h1></div>
</div>

<div class='center-align'>
    <div class="col s12">
        <div class="card amber accent-2">
            <div class="card-content">
              <span class="card-title black-text"><b class="timer" data-to="{{$villes->count()}}" data-speed="1500"></b> villes enregistrées</span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
  {{ Form::open(array('url' => 'ville/update/', 'id'=>'form')) }}
    <h4 style="position: fixed;left: 0;top: 0;width: 100%;text-align: center;margin-top:15px;margin-bottom:15px;">Edition</h4>
    
            <div class="col s12">
            <div class="row" style="margin-top:30px">
                    <div class="input-field col s12">
                    {{ Form::label('enom', 'Nom de la ville')}}
                        {{ Form::text('enom', null,array('class'=>'validate', 'required' => 'required')) }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('ecode_postal', 'Code Postal')}}
                        {{ Form::text('ecode_postal', null,array('class'=>'validate', 'required' => 'required'))}}
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
<ul class="collapsible" data-collapsible="accordion">
@if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',28)->exists())
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
        {{ Form::open(array('url' => 'ville/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                    {{ Form::label('nom', 'Nom de la ville')}}
                        {{ Form::text('nom', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('code_postal', 'Code postal')}}
                        {{ Form::text('code_postal', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
            </div>
            
            {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
        </div>
      </div>
    </li>
    @endif
    @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',27)->exists())
    <li >
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table highlight" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Code Postal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($villes as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->nom}}</td>
                <td>{{$task->code_postal}}</td>
                <td>
                @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',30)->exists())
                <a class="btn-floating btn-large waves-effect waves-light red" href="ville/destroy/{{$task->id}}"><i class="material-icons">cancel</i></a>
                @endif
                @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',29)->exists())
                <a id="{{$task->id}}" class="btn-floating btn-large waves-effect waves-light yellow edit" href="#modal1"><i class="material-icons">edit</i></a>
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
    var data = $(this).attr('id')
    $.ajax({
          url: 'villes/show/' + data,
          type: "get",
           success: function(response){
            console.log(response); 
            $('#modal1').modal('open');
            $('#enom').val(response['nom']);
            $('#ecode_postal').val(response['code_postal']);

            $('#form').attr('action', 'ville/update/' + response['id']);
            Materialize.updateTextFields();
            var ville = response["id"];
            $('#eville option[value=' + ville + ']').attr('selected','selected');
            },
            error: function(response){
                alert('Error'+response);
                }
        });
});

$(document).ready(function() {
    $(document).ready(function() {
    $('select').material_select();
}); 

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


  
} );
          
</script>
@stop