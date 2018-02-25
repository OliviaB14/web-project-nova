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

@section('content')
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
</section>
@stop