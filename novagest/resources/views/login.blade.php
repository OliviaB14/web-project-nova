<html><head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link href="{{ URL::asset('css/login.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="section"></div>
    <main>
        <center>
            
            <!--<img class="responsive-img" style="width: 250px;" src="https://i.imgur.com/ax0NCsK.gif" />-->
            <div class="section"></div>
    <h1>NOVAGEST</h1>
            <h5 class="blue-text">Merci de vous connecter</h5>
            <div class="section"></div> 

            <div class="container">
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

                    <form class="col s12" method="post">
                        <div class="row">
                            <div class="col s12">
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input class="validate" type="email" name="email" id="email">
                                <label for="email">Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input class="validate" type="password" name="password" id="password">
                                <label for="password">Mot de passe</label>
                            </div>
                            <label style="float: right;">
								<a class="pink-text" href="#!"><b>Mot de passe oublié?</b></a>
							</label>
                        </div>

                        <br>
                        <center>
                            <div class="row">
                                <button type="submit" name="btn_login" class="col s12 btn btn-large waves-effect blue">Connection</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
            <!--<a href="#!">Create account</a>-->
        </center>

        <div class="section"></div>
        <div class="section"></div>
    </main>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>


<div class="hiddendiv common"></div></body></html>