<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Cryptoperu</title>

    <!-- Styles -->
    <link rel="icon" type="image/png" href="{{ asset('novo/images/icons/favicon.ico"') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('novo/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('novo/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('novo/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('novo/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('novo/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('novo/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('novo/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('novo/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('novo/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('novo/css/main.css') }}">
</head>

<body>
    <div id="app">

        <section>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <div class="panel panel-default">

                            <div class="panel-body table-responsive ">
                                @include('flash::message') @include('admin.templates.partials.errors')

	<div class="limiter">
        <div class="text-right"><a class="btn btn-link" href="{{ url('') }}"><i class="fa fa-angle-left"></i> Regresar al inicio</a></div>
		<div class="container-login100">
			<div class="wrap-login100 p-t-10 p-b-10">

                    {!! Form::open(['route'=>'login','method'=>'POST','class'=>'login100-form validate-form']) !!}
                        {{ csrf_field() }}

                        <div >
                                <a class="btn-login-with bg1 m-b-10" href="redirectF">
                                    <i class="fa fa-facebook-official"></i>
                                   Inicia con Facebook
                                </a>

                                <a class="btn-login-with bg2 m-b-10" href="redirectT">
                                    <i class="fa fa-twitter"></i>
                                   Inicia con Twitter
                                </a>

                                <a class="btn-login-with bg3 m-b-10" href="redirectG">
                                    <i class="fa fa-google"></i>
                                   Inicia con Google
                                </a>
                        </div>
                        <div class="text-center p-t-25 p-b-30">
                            <span class="txt1">
                                Iniciar sesión
                            </span>
                        </div>
                        <div class='wrap-input100 validate-input m-b-16 {{ $errors->has('email') ? ' has-error' : '' }}'>

                                {!! Form::text('email',null,['class'=>'input100','placeholder'=>'Nombre Completo','required']) !!}
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <!--<strong>{{ $errors->first('email') }}</strong>-->
                                </span>
                                @endif
                        </div>
                        <div class='wrap-input100 validate-input m-b-20 {{ $errors->has('password') ? ' has-error' : '' }}'>

                                {!! Form::password('password',['class'=>'input100','placeholder'=>'Contraseña','required']) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                       <!-- <strong>{{ $errors->first('password') }}</strong>-->
                                    </span>
                                @endif
                        </div>

                        <div class='form-group'>
                                {!! Form::submit('Ingresar',['class'=>'btn btn-primary']) !!}
                        </div>


                        <div class="form-group">

                        </div>

                            <span class="txt2 p-b-10">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                   ¿Te olvidaste la contraseña?
                                </a>
                            </span>

                            <a href="{{ route('register') }}" class="txt3 bo1 hov1">
                                Regístrate ahora
                            </a>


                        {!! Form::close() !!}
			</div>
		</div>
	</div>


                            </div>
                        </div>
                    </div>
                </div>

        </section>
        @include('admin.templates.partials.footer')
    </div>

    <!-- Scripts -->

<!--===============================================================================================-->
	<script src="{{ asset('novo/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('novo/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('novo/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('novo/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('novo/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('novo/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('novo/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('novo/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('novo/js/main.js') }}"></script>




</body>

</html>