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

@section('content')<!-- 
<section>
    <div class="container">
        <div class="row">
        <div class="col m4">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="https://www.2tout2rien.fr/wp-content/uploads/2016/09/Aurore-la-princesse-chatte-1.jpg" alt="DOHHH"/>
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <span class="card-title">Nom agence</span>
                        <p><i class="tiny material-icons" style="color: #3097d1;">home</i> Adresse agence</p>
                        <p><i class="tiny material-icons" style="color: #3097d1;">local_phone</i> Téléphone agence</p>
                    </div>
                    <div class="card-action">
                        <a href="#"><i class="material-icons">edit</i></a>
                        <a href="#"><i class="material-icons">delete</i></a>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <ul class="pagination">
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="waves-effect"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>
</section>-->

<section>
<ul class="collapsible" style="margin-left:2%" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">add</i>Ajouter</div>
      <div class="collapsible-body">
      <div class="row">
        {{ Form::open(array('url' => 'agence/add')) }}
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        {{ Form::label('nom', 'Nom de l\'agence')}}
                        {{ Form::text('nom', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                    <div class="input-field col s6">
                        {{ Form::label('code_postal', 'Code postal')}}
                        {{ Form::text('code_postal', null,array('class'=>'validate', 'required' => 'required'))}}
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
                        <!-- SELECT -->
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
                        {{ Form::label('email', 'Email')}}
                        {{ Form::text('email', null,array('class'=>'validate', 'required' => 'required'))}}
                    </div>
                </div>
            </div>
            
            {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
        {{ Form::close() }}
        </div>
      </div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">edit</i>Editer</div>
      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Code postal</th>
                            <th>Ville</th>
                            <th>Téléphone</th>
                            <th>fax</th>
                            <th>mail</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($agences as $agence)
                        <tr>
                            <td>{{$agence->id}}</td>
                            <td>{{$agence->nom}}</td>
                            <td>{{$agence->adresse}}</td>
                            <td>{{$agence->code_postal}}</td>
                            <td>{{$agence->idville}}</td>
                            <td>{{$agence->telephone}}</td>
                            <td>{{$agence->fax}}</td>
                            <td>{{$agence->mail}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
      </div>
    </li>
  </ul>
</section>

<section>

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