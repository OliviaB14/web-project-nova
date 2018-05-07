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

@section('title', 'Type_utilisateur')

@section('content')
<?php $user = Auth::user();?>

<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Gestion des types utilisateurs</h1></div>
        <div class="card col s12 center-align amber accent-2 main-card">
            <div class="card-content">
              <span class="card-title black-text"><b class="timer" data-to="{{$typeutilisateurs->count()}}" data-speed="1500"></b> Type utilisateurs</span>
            </div>
        </div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
  {{ Form::open(array('url' => 'typeutilisateur/update/', 'id'=>'form', 'files' => true)) }}
    <h4 style="position: fixed;left: 0;top: 0;width: 100%;text-align: center;margin-top:15px;margin-bottom:15px;">Edition</h4>
    <div class="row center-align" id="aphoto-container">
    </div>
            <div class="col s12">
            <div class="row" style="margin-top:30px">
                    <div class="input-field col s12">
                    {{ Form::label('elibelle', 'Libellé du type utilisateur')}}
                        {{ Form::text('elibelle', null,array('class'=>'validate', 'required' => 'required'))}}
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
@if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',44)->exists())
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
      {{ Form::open(array('url' => 'typeutilisateur/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('libelle', 'Libelle')}}
                        {{ Form::text('libelle', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
            </div>
            {{ Form::submit('Ajouter', array('class' => 'btn-sm btn-success')) }}
        {{ Form::close() }}
        </div>
      </div>
    </li>
    @endif
    @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',43)->exists())
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Type utilisateur</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($typeutilisateurs as $typeutilisateur)
                        <tr>
                            <td>{{$typeutilisateur->id}}</td>
                            <td>{{$typeutilisateur->libelle}}</td>
                            <td>{{$typeutilisateur->desactive}}</td>
                            <td>
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',46)->exists())
                            <a class="btn-floating btn-large waves-effect waves-light red" href="typeutilisateur/destroy/{{$typeutilisateur->id}}"><i class="material-icons">cancel</i></a>
                            @endif
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',45)->exists())
                            <a id="{{$typeutilisateur->id}}" class="btn-floating btn-large waves-effect waves-light yellow edit" href="#modal1"><i class="material-icons">edit</i></a>
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

<script>
$(".edit").on('click',function(){
    console.log("ajax");
    var data = $(this).attr('id')
    console.log(data);
    $.ajax({
          url: 'typeutilisateurs/show/' + data,
          type: "get",
           success: function(response){
            console.log(response); 

            $('#modal1').modal('open');
            $('#elibelle').val(response['libelle']);         
            $('#form').attr('action', 'typeutilisateur/update/' + response['id']);
            Materialize.updateTextFields();

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