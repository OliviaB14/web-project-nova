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


<section>
    <div class="container">
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
</section>


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
                            <th>Libelle</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($droits as $droit)
                        <tr>
                            <td>{{$droit->libelle}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
} );
          
</script>
@stop