<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{ asset('novo/images/icons/favicon.ico') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/Trumbowyg/ui/trumbowyg.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/kartik-file/css/fileinput.min.css') }}" />
    <script src="{{ asset('plugins/jquery/js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('plugins/jquery/js/jquery-2.1.4.js') }}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
    <script src="{{ asset('plugins/Trumbowyg/trumbowyg.js') }}"></script>
    <script src="{{ asset('plugins/kartik-file/js/fileinput.min.js') }}"></script>
    @yield('js')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','default')| Panel de administracion</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .content{ height:600px; padding:10px; overflow:auto;}
		.content img{max-width:100%; -webkit-box-sizing:border-box; -moz-box-sizing:border-box; box-sizing:border-box; padding:4px; border:solid 1px #666;}
		.content p:nth-child(even){color:#999; font-family:Georgia,serif; font-size:17px; font-style:italic;}
		.content p:nth-child(3n+0){color:#c96;}
		.content_1,.content_2,.content_3{float:left;}
		.content_1{margin-top:140px; padding:0 5px; border-top:1px dashed rgba(255,255,255,0.15); border-bottom:1px dashed rgba(255,255,255,0.15);}
		.content_2{height:440px;}
		.content_3{
			border-radius: 5px;
			height:183px;
			overflow-y:auto;
			padding: 0 10px;}
		.content_4{
			border-radius: 5px;
			height:183px;
			overflow-y:auto;
			padding: 0 10px;
		}
		.content_3 p:nth-child(3n+0){color:#26beff;}

    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/css_template1.0/bootstrap.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/css_template1.0/sweetalert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/css_template1.0/sheetstyle4372.css?v=1.13.86') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/css_template1.0/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/css_template1.0/font-awesome-4.7.0/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/css_template1.0/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/css_template1.0/introjs.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/inka-login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/prettify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/css_template1.0/bootstrap.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/css_template1.0/sweetalert.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/css_template1.0/animate.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/css_template1.0/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bitinka/css/css_template1.0/owl.theme.default.min.css') }}">
    <link href="{{ asset('bitinka/css/validationEngine.jquery.css') }}" rel="stylesheet">
    <link href="{{ asset('bitinka/assets/css/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
</head>

<body>
    <script src="{{ asset('bitinka/assets/js/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ asset('bitinka/assets/node_modules/js-cookie/src/js.cookie.js') }}"></script>
    <script src="{{ asset('bitinka/assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bitinka/assets/js/gc_leak_fix.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/js/js_template1.0/intro.js') }}"></script>
    <div id="app">

<section class="new_navbar">

        <header>
            <nav class="navbar nav_bottom" id="nabvar-inver">

<div class="collapse navbar-collapse" id="menu">
                        <ul class="nav navbar-nav pull-right hidden-xs">
                            @guest
                                    <li><a href="{{ route('login') }}" class="b_login">
                                            <img src="{{ asset('bitinka/img/new_img/login.svg')}}" class="login_v">
                                            Iniciar sesión</a></li>

                                    <li><a href="{{ route('register') }}" class="b_login">
                                            <img src="{{ asset('bitinka/img/new_img/login.svg')}}" class="login_v">
                                            Regístrate</a></li>
                            @else
                            @if(Auth::user()->admin()==true)
                            <li><a href="{{ url('admin/users') }}">Usuarios </a></li>
                            <li><a href="{{ url('admin/coins_types') }}">Criptomonedas</a></li>
                            @endif
                            <li class="">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                 Hola &nbsp; {{ Auth::user()->name }}

                                </a>

                                <ul class="nav navbar-nav pull-right text-center">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endguest
                        </ul>

                    </div>
            </nav>
            <hr>
            <nav class="navbar nav_bottom">




                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="nav navbar-nav navbar-right text-center">




                            <li><a href="{{ url('') }}">Inicio</a></li>
                            <li><a href="{{ url('comprar') }}">Comprar</a></li>
                            <li><a href="{{ url('noticias') }}">Noticias</a></li>
                            <li><a href="{{ url('preguntas') }}">Preguntas frecuentes</a></li>
                            <li><a href="#section2">Nosotros</a></li>



                            <div class="hidden">


                                <li class="active"><a href="home.html"> Inicio</a></li>
                                <li><a href="{{ asset('bitinka/pe/broker')}}"> Compra / Venta</a></li>
                                <li><a href="{{ asset('bitinka/trade')}}">Comprar</a></li>




                                <li class="text-capitalize"><a href="faq.html">Información</a></li>

                            </div>
                        </ul>
                    </div>

            </nav>
        </header>
</section>


                                @include('flash::message') @include('admin.templates.partials.errors')

<section class="listas-api vh-5">
        <div class="api_head_bg">
            <div class="container">
               <div class="col-sm-10 col-sm-offset-1">
                   <div class="row">
                       <h1 class="headline size-3"><strong><span>@yield('title','default')</span></strong></h1>

                   </div>
               </div>
            </div>
        </div>
        <hr>
        <div class="container text-justify">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                                @yield('content')


                </div>
            </div>
        </div>

 </section><br><br><br><br><br>
        @include('admin.templates.partials.footer')
    </div>

    <!-- Scripts -->


</body>

</html>