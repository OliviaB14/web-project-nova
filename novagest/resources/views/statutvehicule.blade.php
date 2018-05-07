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

@section('title', 'Statut_vehicule')

@section('content')
<?php $user = Auth::user();?>

<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Statuts des véhicules</h1></div>
</div>

<section>


<ul class="collapsible" style="margin-left:2%" data-collapsible="accordion">
@if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',64)->exists())
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
        {{ Form::open(array('url' => 'statut/add')) }}
        {!! Form::token() !!}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                    {{ Form::label('libelle', 'Libellé')}}
                        {{ Form::text('libelle', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
            </div>
            
            {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
        </div>
      </div>
    </li>
    @endif
    @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',63)->exists())
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Statut du véhicule</th>
                            <td>Statuts</td>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($statutvehicule as $statut)
                        <tr>
                            <td>{{$statut->id}}</td>
                            <td>{{$statut->libelle}}</td>
                            <td>{{$statut->desactive}}</td>
                            <td>
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',66)->exists())
                            <a class="btn-floating btn-large waves-effect waves-light red" href="statut/destroy/{{$statut->id}}"><i class="material-icons">cancel</i></a>
                            @endif
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',65)->exists())
                            <a id="{{$statut->id}}" class="btn-floating btn-large waves-effect waves-light yellow edit" href="#modal1"><i class="material-icons">edit</i></a>
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


<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
  {{ Form::open(array('url' => 'statut/update/', 'id'=>'form')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                    {{ Form::label('elibelle', 'Nom du statut')}}
                        {{ Form::text('elibelle', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
            </div>
            
            {{ Form::submit('Modifier', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
        </div>
  </div>

  <script>
$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('#modal1').modal();
  });
</script>

<script>
$(".edit").on('click',function(){
    console.log("ajax");
    var data = $(this).attr('id')
    console.log(data);
    $.ajax({
          url: 'statuts/show/' + data,
          type: "get",
           success: function(response){
            console.log(response); 
            $('#modal1').modal('open');
            $('#elibelle').val(response['libelle']);
            //$('#ecode_postal').val(response['code_postal']);
            
            $('#form').attr('action', 'statut/update/' + response['id']);
            Materialize.updateTextFields();
            // var ville = response["idville"];
            // $('#eville option[value=' + ville + ']').attr('selected','selected');
            },
            error: function(response){
                console.log('Error'+response);
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

// $(document).ready(function() {
//     $('#example').DataTable( {
//         columnDefs: [
//             {
//                 targets: [ 0, 1],
//                 className: 'mdl-data-table__cell--non-numeric'
//             }
//         ]
//     } );
//     $(document).ready(function(){
//     // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
//     $('.modal').modal();
//   });
// } );
          
</script>
@stop