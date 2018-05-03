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

@section('title', 'Droit')

@section('content')
<?php $user = Auth::user();?>
<section>
<ul class="collapsible" style="margin-left:2%" data-collapsible="accordion">
@if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',39)->exists())
<li>
      <div class="collapsible-header"><i class="material-icons">settings_application</i>Données</div>
      <div class="collapsible-body">
      <div class="row">
        {{ Form::open(array('url' => 'droit/add')) }}
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
    @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',38)->exists())
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Libelle</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($droits as $droit)
                        <tr>
                            <td>{{$droit->libelle}}</td>
                            <td>{{$droit->desactive}}</td>
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
$(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ]
    } );
} );
          
</script>
@stop