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

@section('title', 'typeetatpiece')

@section('content')
<?php $user = Auth::user();?>

<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Gestion des types d'états des pièces'</h1></div>
        <div class="card col s12 center-align amber accent-2 main-card">
            <div class="card-content">
              <span class="card-title black-text"><b class="timer" data-to="{{$typeetatpiece->count()}}" data-speed="1500"></b> Type Etat Pieces</span>
            </div>
        </div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
  {{ Form::open(array('url' => 'typeetatpiece/update/', 'id'=>'form', 'files' => true)) }}
    <h4 style="position: fixed;left: 0;top: 0;width: 100%;text-align: center;margin-top:15px;margin-bottom:15px;">Edition</h4>
            <div class="row" style="margin-top:30px">
                    <div class="input-field col s12">
                    {{ Form::label('elibelle', 'Type d\'état d\'une pièce de véhicule')}}
                        {{ Form::text('elibelle', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
            </div>
            {{ Form::submit('Modifier', array('class' => 'waves-effect waves-light btn','style' => 'position: fixed;left: 0;bottom: 0;width: 100%;text-align: center;')) }}
  </div>  
  {{ Form::close() }}
</div>

<script>
  $(document).ready(function() {
    $('select').material_select();
});
$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>

<section>
<ul class="collapsible" style="margin-left:2%" data-collapsible="accordion">
@if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',58)->exists())
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
      {{ Form::open(array('url' => 'typeetatpiece/add')) }}
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
    @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',58)->exists())
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Type d'état - pièces de véhicule</th>
                            <th>Statuts</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($typeetatpiece as $typ)
                        <tr>
                            <td>{{$typ->libelle}}</td>
                            <td>{{$typ->desactive}}</td>
                            <td>
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',81)->exists())
                            <a class="btn-floating btn-large waves-effect waves-light red" href="typeetatpiece/destroy/{{$typ->id}}"><i class="material-icons">cancel</i></a>
                            @endif
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',80)->exists())
                            <a id="{{$typ->id}}" class="btn-floating btn-large waves-effect waves-light yellow edit" href="#modal1"><i class="material-icons">edit</i></a>
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
    $.ajax({
          url: 'typeetatpieces/show/' + data,
          type: "get",
           success: function(response){
            console.log(response); 

            $('#modal1').modal('open');
            $('#elibelle').val(response['libelle']);        
            $('#form').attr('action', 'typeetatpiece/update/' + response['id']);            
            Materialize.updateTextFields();
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
} );
          
</script>
@stop