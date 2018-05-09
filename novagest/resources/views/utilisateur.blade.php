@extends('layout.dashboard')

@section('css-links')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/user.css')}}"/>
    <style>
        .card.horizontal {
        /*display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;*/
    }
    </style>
@stop   

@section('title', 'utilisateurs')

@section('content')
<?php $user = Auth::user();?>
<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Gestion des utilisateurs</h1></div>

    <?php
        // count clients for each type : "Commune", "Entreprise"
        $type['admin'] = DB::table('utilisateur')->where('idtypeutilisateur', '=','4')->count();
        $type['agent'] = DB::table('utilisateur')->where('idtypeutilisateur', '=','2')->count();
        $type['modo'] = DB::table('utilisateur')->where('idtypeutilisateur', '=','1')->count();
    ?>

    <div class="col l8 s12">
        <div class="card s12 main-card center-align">
            <div class="card-content">
              <span class="card-title black-text"><b class="timer" data-to="{{$utilisateurs->count()}}" data-speed="1500"></b> utilisateurs</span>
            </div>
        </div>
        <div class="card col l6 s12 m6" id="admin_card">
            <div class="card-content">
              <span class="card-title black-text"><i class="material-icons">business</i> <b class="timer" data-to="{{$type['modo']}}" data-speed="1500"></b> modérateur<?php if($type['modo'] > 1){ echo 's'; } ?></span>
              <input type="hidden" value="{{$type['modo']}}" id="modo_nb"/>
            </div>
        </div>
        <div class="card col l6 s12 m6" id="agent_card">
            <div class="card-content">
              <span class="card-title black-text"><i class="material-icons">business_center</i> <b class="timer" data-to="{{$type['agent']}}" data-speed="1500"></b> agent<?php if($type['agent'] > 1){ echo 's'; } ?></span>
              <input type="hidden" value="{{$type['agent']}}" id="agent_nb"/>
            </div>
        </div>

        <div class="card col l12 s12 m6" id="peon_card">
            <div class="card-content">
              <span class="card-title black-text"><i class="material-icons">business_center</i> <b class="timer" data-to="{{$type['admin']}}" data-speed="1500"></b> administrateur<?php if($type['admin'] > 1){ echo 's'; } ?></span>
              <input type="hidden" value="{{$type['admin']}}" id="admin_nb"/>
            </div>
        </div>
    </div>
    <div class="col l4 s12">
        <div class="card white" id="pie-clients">
            <div class="card-content">
              <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
  <div class="modal-content">
  {{ Form::open(array('url' => 'utilisateur/update', 'id'=>'form')) }}
    <h4 style="position: fixed;left: 0;top: 0;width: 100%;text-align: center;margin-top:15px;margin-bottom:15px;">Edition</h4>
    <div class="col s12">
        <div class="row" style="margin-top:30px">
            <div class="input-field col s12">
                {{ Form::label('enom', 'Nom de l\'utilisateur')}}
                {{ Form::text('enom', null,array('class'=>'validate', 'required' => 'required'))}}
            </div>
        </div>
        <div class="input-field col s12">
            {{ Form::label('eprenom', 'Prenom')}}
            {{ Form::text('eprenom', null,array('class'=>'validate', 'required' => 'required'))}}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            {{ Form::label('edate_naissance', 'Date de naissance')}}
            {{ Form::text('edate_naissance', null,array('class'=>'validate', 'required' => 'required'))}}
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            {{ Form::label('eidtypeutilisateur', 'Type Utilisateur')}} 
             </br>
             {{ Form::select('eidtypeutilisateur', $typeutilisateurs) }}
        </div>
        <div class="input-field col s12">
                {{ Form::label('eusername', 'Nom d\'utilisateur')}} 
                {{ Form::text('eusername', null,array('class'=>'validate', 'required' => 'required'))}}
        </div>
        <div class="input-field col s12">
                {{ Form::label('epassword', 'Password')}} 
                {{ Form::text('epassword', null,array('class'=>'validate', 'required' => 'required'))}}
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
@if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',36)->exists())
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
        {{ Form::open(array('url' => 'utilisateur/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                    {{ Form::label('nom', 'Nom de l\'utilisateur')}}
                        {{ Form::text('nom', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('prenom', 'Prenom')}}
                        {{ Form::text('prenom', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('date_naissance', 'Date de naissance')}}
                        {{ Form::text('date_naissance', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    {{ Form::label('idtypeutilisateur', 'Type Utilisateur')}} 
                         </br>
                         {{ Form::select('idtypeutilisateur', $typeutilisateurs) }}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('username', 'Username')}} 
                        {{ Form::text('username', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('password', 'Password')}} 
                        {{ Form::text('password', null,array('class'=>'validate', 'required' => 'required'))}}
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

            </div>
            
            {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
        </div>
      </div>
    </li>
    @endif
    @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',35)->exists())
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date de naissance</th>
                            <th>Type utilisateur</th>
                            <th>Nom d'utilisateur</th>
                            <th>Telephone</th>
                            <th>Mail</th>
                            <th>Desactive</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($utilisateurs as $utilisateur)
                        <tr>
                            <td>{{$utilisateur->id}}</td>
                            <td>{{$utilisateur->nom}}</td>
                            <td>{{$utilisateur->prenom}}</td>
                            <td>{{$utilisateur->date_naissance}}</td>
                            
                            <td><?php
                            $typeutilisateurs = DB::table('type_utilisateur')->where('id', '=',$utilisateur->idtypeutilisateur)->first();
                            //echo $test["nom"];?>
                            {{$typeutilisateurs->libelle}}
                            </td>
                            <td>{{$utilisateur->username}}</td>
                            <td>{{$utilisateur->telephone}}</td>
                            <td>{{$utilisateur->mail}}</td>
                            <td>{{$utilisateur->desactive}}</td>
                            <td>
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',38)->exists())
                            <a class="btn-floating btn-large waves-effect waves-light red" href="utilisateur/destroy/{{$utilisateur->id}}"><i class="material-icons">cancel</i></a>
                            @endif
                            @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',37)->exists())
                            <a id="{{$utilisateur->id}}" class="btn-floating btn-large waves-effect waves-light yellow edit" href="#modal1"><i class="material-icons">edit</i></a>
                            
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<script>



  $(document).ready(function() {
    $('select').material_select();
});

$(".edit").on('click',function(){
    console.log("ajax");
    var data = $(this).attr('id');
    $.ajax({
        url: 'utilisateurs/show/' + data,
        type: "get",
        success: function(response){
        console.log(response); 
        $('#modal1').modal('open');
        $('#enom').val(response['nom']);
        $('#eprenom').val(response['prenom']);
        $('#edate_naissance').val(response['date_naissance']);
        $('#eidtypeutilisateur').val(response['idtypeutilisateur']);
        $('#eusername').val(response['username']);
        $('#epassword').val(response['password']);
        $('#etelephone').val(response['telephone']);
        $('#efax').val(response['fax']);
        $('#email').val(response['mail']);
        
        $('#form').attr('action', 'utilisateur/update/' + response['id']);
         var idtypeutilisateur = response["idtypeutilisateur"];
        $('#eidtypeutilisateur option[value=' + idtypeutilisateur + ']').attr('selected','selected');
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
    });

    $(document).ready(function(){
        $('.collapsible').collapsible();
    });

} );

var ctx = document.getElementById("myChart");


var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Modérateurs', 'Agents', 'Administrateurs'],
        datasets: [{
            data: [$("#modo_nb").val(),$('#agent_nb').val(),$('#admin_nb').val()],
            backgroundColor: [
                "#FFD740",
                "#d4e157",
                "#F08080"
            ]
        }]
    },
    options: {
        cutoutPercentage: 50
    }
});
          
</script>
@stop