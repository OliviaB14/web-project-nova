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

<section>
<div class="container">
<div class="row" style="padding-top:15px">
<!--<a class="btn btn-floating btn-large cyan pulse"><i class="material-icons">add</i></a>-->
</div>
        <div class="row" style="padding-top:10px">
        <div>
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
                                        <input checked class="{{$d->id}} btnDroit" id="{{$tu->id}}" type="checkbox">
                                    @else
                                        <input  class="{{$d->id}} btnDroit" id="{{$tu->id}}" type="checkbox">
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
    </div>
</div>
</section>
</section>

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