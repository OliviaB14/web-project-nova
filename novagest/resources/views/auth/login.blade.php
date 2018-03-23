@extends('layout.dashboard')

@section('css-links')
<style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        
        main {
            flex: 1 0 auto;
        }
        
        body {
            background: #fff;
        }
        
        .input-field input[type=date]:focus+label,
        .input-field input[type=text]:focus+label,
        .input-field input[type=email]:focus+label,
        .input-field input[type=password]:focus+label {
            color: #487AA1;
        }
        
        .input-field input[type=date]:focus,
        .input-field input[type=text]:focus,
        .input-field input[type=email]:focus,
        .input-field input[type=password]:focus {
            border-bottom: 2px solid #487AA1;
            box-shadow: none;
        }
    </style>
@endsection

@section('content')


    <div class="section"></div>

<main>
    <div class="container text-center">
        <center>
            <h5 style="color:#487AA1">Merci de vous connecter</h5>
                <div class="section"></div>
            <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                <div class="panel panel-default">

                    <div class="panel-body">
                    {{ Form::open(array('url' => 'test')) }}

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <div class="input-field col s12">
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Pseudo" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-field col s12">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <a class="pink-text" style='float: right;' href="{{ route('password.request') }}">
                                    Mot de passe oublié?
                                </a>
                            </div>

                            <!--<div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>-->

                            <div class="form-group">
                                <div class="row">
                                    <div class='col s12'>
                                    {{ Form::submit('Ajouter', array('class' => 'waves-effect waves-light btn')) }}
                                    </div>
                                </div>
                            </div>
                            
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </center>
    </div>
</main>
<?php 
echo password_hash('moi', PASSWORD_DEFAULT)."\n";
?>
@endsection
