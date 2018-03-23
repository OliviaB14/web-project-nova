@extends('layout.dashboard')

@section('css-links')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css')}}"/>
    <style>
        .card.horizontal {
        /*display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;*/
    }
    #pie-clients{
            border: 1px dotted #FFC107;
    }

    .center-align .row {
        display: flex;
        flex-wrap: wrap;
           
    }
    .card{
        flex-direction: column;
        height:400px;
    }

    .main-card{
        height: auto;
    }
    </style>
@stop   

@section('title', 'Clients')

@section('content')

<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Gestion des clients</h1></div>
</div>

<div class='center-align row'>
    <div class="col s12">
        <div class="card amber accent-2 main-card">
            <div class="card-content">
              <span class="card-title black-text"><b class="timer" data-to="{{$clients->count()+1}}" data-speed="1500"></b> clients</span>
            </div>
        </div>
    </div>

    <?php
        // count clients for each type : "Commune", "Entreprise"
        $type['commune'] = DB::table('client')->where('idtypeclient', '=','1')->count();
        $type['entreprise'] = DB::table('client')->where('idtypeclient', '=','2')->count();
    ?>

    <div class="col l4 s12">
        <div class="card teal lighten-3">
            <div class="card-content">
              <span class="card-title black-text"><b class="timer" data-to="{{$type['commune']}}" data-speed="1500"></b> communes</span>
              <input type="hidden" value="{{$type['commune']}}" id="communes_nb"/>
            </div>
        </div>
    </div>
    <div class="col l4 s12" >
        <div class="card brown lighten-3" height="400">
            <div class="card-content">
              <span class="card-title black-text"><b class="timer" data-to="{{$type['entreprise']}}" data-speed="1500" ></b> entreprises</span>
              <input type="hidden" value="{{$type['entreprise']}}" id="entreprises_nb"/>
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
  {{ Form::open(array('url' => 'client/update/', 'id'=>'form')) }}
    <h4>Edition</h4>
    
            <div class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    {{ Form::label('eraison_sociale', 'Raison sociale')}}
                        {{ Form::text('eraison_sociale', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('eadresse', 'Adresse')}}
                        {{ Form::text('eadresse', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    {{ Form::label('eidville', 'Ville')}} 
                         </br>
                         {{ Form::select('eidville', $villes) }}
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
                    {{ Form::label('eidtypeclient', 'Type client')}} 
                         </br>
                         {{ Form::select('eidtypeclient', $typeclients) }}
                    </div>
                </div>
            </div>
            
            {{ Form::submit('Modifier', array('class' => 'waves-effect waves-light btn yellow')) }}
        
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat " href="#">Modifier</a>
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
    <li>
      <div class="collapsible-header"><i class="material-icons">add</i>Ajouter</div>
      <div class="collapsible-body">
      <div class="row">
      @if ($errors->any())
        <div style="font-color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
        {{ Form::open(array('url' => 'client/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('raison_sociale', 'Raison sociale')}}
                        {{ Form::text('raison_sociale', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        {{ Form::label('adresse', 'Adresse')}}
                        {{ Form::text('adresse', null,array('class'=>'validate', 'required' => 'required'))}}
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
                    <div class="input-field col s6">
                        {{ Form::label('telephone', 'Téléphone')}}
                        {{ Form::text('telephone', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('fax', 'Fax')}}
                        {{ Form::text('fax', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('mail', 'E-mail')}}
                        {{ Form::text('mail', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    {{ Form::label('idtypeclient', 'idtypeclient')}} 
                         </br>
                         {{ Form::select('idtypeclient', $typeclients) }}
                    </div>
                </div>
            </div>
            {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
        </div>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                   <thead>
                        <tr>
                            <th>Raison sociale</th>
                            <th>Adresse</th>
                            <th>Ville</th>
                            <th>Téléphone</th>
                            <th>Fax</th>
                            <th>Mail</th>
                            <th>Type de client</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{$client->raison_sociale}}</td>
                            <td>{{$client->adresse}}</td>
                            <td>{{$client->idville}}</td>
                            <td>{{$client->telephone}}</td>
                            <td>{{$client->fax}}</td>
                            <td>{{$client->mail}}</td>
                            <td>{{$client->idtypeclient}}</td>
                            <td><a class="btn-floating btn-large waves-effect waves-light red" href="client/destroy/{{$client->id}}"><i class="material-icons">cancel</i><a id="{{$client->id}}" class="btn-floating btn-large waves-effect waves-light yellow edit" href="#modal1"><i class="material-icons">edit</i></a></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
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

var ctx = document.getElementById("myChart");


var myDoughnutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Communes', 'Entreprises'],
        datasets: [{
            data: [$("#communes_nb").val(),$('#entreprises_nb').val()],
            backgroundColor: [
                "#AB82FF",
                "#F08080"
            ]
        }]
    },
    options: {
        cutoutPercentage: 50
    }
});

$(document).ready(function(){
    $('select').material_select();
});

$(".edit").on('click',function(){
    console.log("ajax");
    var data = $('.edit').attr('id')
    $.ajax({
          url: 'clients/show/' + data,
          type: "get",
           success: function(response){
            console.log(response); 
            $('#modal1').modal('open');
            $('#eraison_sociale').val(response['raison_sociale']);
            $('#eadresse').val(response['adresse']);
            $('#eville').val(response['ville']);
            $('#etelephone').val(response['telephone']);
            $('#efax').val(response['fax']);
            $('#email').val(response['mail']);
            $('#eidtypeclient').val(response['idtypeclient']);
            $('#form').attr('action', 'client/update/' + response['id']);
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