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

@section('title', 'Droit_type_utilisateur')

@section('content')
<?php $user = Auth::user();?>

<div class="row">
    <div class="col s12"><h1><i class="material-icons">build</i> Matrice des droits</h1></div>
</div>

<section>
@if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',22)->exists())
<ul class="collapsible" style="margin-left:2%" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">dvr</i>Données</div>
      <div class="collapsible-body">
      <table id="example" class="mdl-data-table responsive-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th>Droits</th>
                        @foreach($typeUtilisateurs as $tu)
                            <th id="{{$tu->id}}">{{$tu->libelle}}</th>
                        @endforeach
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($droits as $d)
                        <tr>
                            <td id="{{$d->id}}">{{$d->libelle}}</td>
                            @foreach($typeUtilisateurs as $tu)
                                <td id="{{$tu->id}}">
                                <div class="switch">
                                    <label>
                                    Off
                                    <?php 
                                        $switchexist =  DB::table('droit_type_utilisateur')->where('iddroit', '=', $d->id)->where('idtypeutilisateur', '=',$tu->id)->first();
                                    ?>
                                    @if($switchexist)
                                        @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',23)->exists())
                                            <input checked class="{{$d->id}} btnDroit" id="{{$tu->id}}" type="checkbox">
                                        @else
                                            <input disabled checked class="{{$d->id}} btnDroit" id="{{$tu->id}}" type="checkbox">
                                        @endif
                                    @else
                                    @if(DB::table('droit_type_utilisateur')->where('idtypeutilisateur','=',$user->idtypeutilisateur)->where('iddroit','=',23)->exists())
                                            <input class="{{$d->id}} btnDroit" id="{{$tu->id}}" type="checkbox">
                                        @else
                                            <input disabled class="{{$d->id}} btnDroit" id="{{$tu->id}}" type="checkbox">
                                        @endif
                                    @endif
                                    
                                    <span  class="lever"></span>
                                    On
                                    </label>
                                </div>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
      </div>
    </li>
  </ul>
  @else
  <p>Vous n'avez pas l'autorisation de visualiser la matrice des droits</p>
  @endif

<script>
$(".btnDroit").on("click",function(){
    console.log("click");
    var val = $(this).attr('class');
    
    var split = val.split(' ');
    data = split[0];
    console.log(data);
    var data2 = $(this).attr('id');
    
    $.ajax({
          url: 'switch/' + data + "/" + data2,
          type: "post",
          data: {   
            '_token': '{!! csrf_token() !!}'
        },
           success: function(response){
            console.log(response);
            },
            error: function(xhr, status, error){
                console.log(xhr + " + " + status + " + " + error);
                }
        });
});
          

$('#example').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ]
    } );
</script>
@stop