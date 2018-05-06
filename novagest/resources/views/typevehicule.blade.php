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

@section('title', 'Type_vehicule')

@section('content')
<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
  {{ Form::open(array('url' => 'typevehicule/update/', 'id'=>'form')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('emodele', 'Modèle')}}
                        {{ Form::text('emodele', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('edescription', 'Description')}}
                        {{ Form::text('edescription', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('ehauteur', 'Hauteur')}}
                        {{ Form::text('ehauteur', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('elargeur', 'Largeur')}}
                        {{ Form::text('elargeur', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('epoids', 'Poids')}}
                        {{ Form::text('epoids', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('epuissance', 'Puissance')}}
                        {{ Form::text('epuissance', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('eprix_neuf', 'Prix neuf')}}
                        {{ Form::text('eprix_neuf', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
            </div>
            {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
</div>
</div>

<script>
$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>
  <?php $user = Auth::user();?>

<section>
<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Type Vehicule</h1></div>
</div>
<ul class="collapsible" style="margin-left:2%" data-collapsible="accordion">
@if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',70)->exists())
<li>
<div class="collapsible-header"><i class="material-icons">add</i>Ajouter</div>
      <div class="collapsible-body">
      <div class="row">
      {{ Form::open(array('url' => 'typevehicule/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('modele', 'Modèle')}}
                        {{ Form::text('modele', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('description', 'Description')}}
                        {{ Form::text('description', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('hauteur', 'Hauteur')}}
                        {{ Form::text('hauteur', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('largeur', 'Largeur')}}
                        {{ Form::text('largeur', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('poids', 'Poids')}}
                        {{ Form::text('poids', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('puissance', 'Puissance')}}
                        {{ Form::text('puissance', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('prix_neuf', 'Prix neuf')}}
                        {{ Form::text('prix_neuf', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
            </div>
            {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
        </div>
      </div>
    </li>
    @endif
    @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',69)->exists())
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Modèle</th>
                            <th>Hauteur</th>
                            <th>Largeur</th>
                            <th>Poids</th>
                            <th>Puissance</th>
                            <th>Prix neuf</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($typeVehicules as $typeVehicule)
                        <tr>
                            <td>{{$typeVehicule->modele}}</td>
                            <td>{{$typeVehicule->hauteur}}</td>
                            <td>{{$typeVehicule->largeur}}</td>
                            <td>{{$typeVehicule->poids}}</td>
                            <td>{{$typeVehicule->puissance}}</td>
                            <td>{{$typeVehicule->prix_neuf}}</td>
                            <td>{{$typeVehicule->desactive}}</td>
                            <td>
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',72)->exists())
                            <a class="btn-floating btn-large waves-effect waves-light red" href="typevehicule/destroy/{{$typeVehicule->id}}"><i class="material-icons">cancel</i></a>
                            @endif
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',71)->exists())
                            <a id="{{$typeVehicule->id}}" class="btn-floating btn-large waves-effect waves-light yellow edit" href="#modal1"><i class="material-icons">edit</i></a>
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
    var data = $('.edit').attr('id')
    $.ajax({
          url: 'typevehicule/show/' + data,
          type: "get",
           success: function(response){
            console.log(response); 
            $('#modal1').modal('open');
            $('#emodele').val(response['modele']);
            $('#edescription').val(response['description']);
            $('#ehauteur').val(response['hauteur']);
            $('#elargeur').val(response['largeur']);
            $('#epoids').val(response['poids']);
            $('#epuissance').val(response['puissance']);
            $('#eprix_neuf').val(response['prix_neuf']);
            
            $('#form').attr('action', 'typevehicule/update/' + response['id']);
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


  $(document).ready(function() {
    $('select').material_select();
});
} );
          
</script>
@stop