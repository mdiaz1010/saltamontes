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
                            <li>@include('flash::message')</li>
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
                            @else
                            <li><a href="{{ route('payment.editar',Auth::user()->id) }}">Usuario </a></li>
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

    <section id="section1" class="new_fondo">

        <div class="user_img hidden-xs animated fadeIn">
            <img src="{{ asset('bitinka/img/new_img/usuario.png') }}" alt="" class="center-block img-responsive">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="texto-principal">
                        <div id="textos" class="carousel slide" data-ride="carousel">
                            <div class="button_controls">
                                <a class="left carousel-control back-not not-opacity" href="#textos" data-slide="prev">
                                    <span class="fa fa-chevron-left fa-2x txt-dark-gray"></span>
                                </a>
                                <a class="right carousel-control back-not not-opacity" href="#textos" data-slide="next">
                                    <span class="fa fa-chevron-right fa-2x txt-dark-gray"></span>
                                </a>
                            </div>

                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="carousel-caption animated zoomIn">
                                        <h2><b>Compra y vende criptomonedas con tu moneda local.</b></h2>
                                    </div>
                                </div>



                                <div class="item">
                                    <div class="carousel-caption">
                                        <h2>Disfruta de los <b>precios y tarifas</b> más competitivas del mercado.</h2>
                                    </div>
                                </div>


                            </div>
                            <h2 class='subt_'></h2>
                        </div>



                    </div>
                </div>

            </div>
        </div>
        <div class="cont_precios">
            <div class="container">
                <div id="carouselPrices" class="owl-carousel owl-theme">
                </div>
            </div>
        </div>
    </section>




    <section id="section3" class="bg_3">
        <div class="container">
            <h2 class="efecto" data-effect="fadeInUp">Nuestros <span>servicios</span></h2>
            <div class="row">
                <div class="col-md-2 " data-effect="flipInX">
                </div>
                <div class="col-md-3 " data-effect="flipInX">
                    <img src="{{ asset('bitinka/img/new_img/exchange.svg')}}" class="efecto" alt="" data-effect="flipInX">
                    <div class="text_serv line_right">
                        <h3>Determinar el monto a comprar</h3>
                        <p align="justify">Calcule el precio que va a obtener por la venta de sus Bitcoins en la calculadora, ese será
                            el precio que nosotros le vamos a transferir.</p>
                    </div>
                </div>
                <div class="col-md-3 " data-effect="flipInX">
                    <img src="{{ asset('bitinka/img/new_img/broker.svg')}}" class="efecto" alt="" data-effect="flipInX">
                    <div class="text_serv line_right">
                        <h3>Cryptoperu pasarela de pago</h3>
                        <p align="justify">A través de nuestra pasarela de pago damos diversas facilidades de realizar esta transacción
                            ya sea por <b>Culqi</b> o <b>Paypal</b> .</p>
                    </div>
                </div>
                <div class="col-md-3 " data-effect="flipInX">
                    <img src="{{ asset('bitinka/img/new_img/exchange.svg')}}" class="efecto" alt="" data-effect="flipInX">
                    <div class="text_serv">
                        <h3>Transferencia de Bitcoins</h3>
                        <p align="justify">De forma inmediata y segura se realizará la transacción .</p>
                    </div>
                </div>
                <div class="col-md-2 " data-effect="flipInX">
                </div>
            </div>
        </div>
    </section>

    <section id="section5" class="bg_5">
        <div class="container">

            <div class="row hidden">
                <div class="mitad-top efecto" data-effect="fadeInUp">
                    <div class="col-sm-6 col-md-4">
                        <img src="{{ asset('bitinka/img/img_template1.0/1.png')}}" class="img-responsive center-block">
                        <div class="text-center size-4"></div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <img src="{{ asset('bitinka/img/img_template1.0/2.png')}}" class="img-responsive center-block">
                        <div class="text-center size-4">Haz <b><a href="#"
                                    intercambios </a> en tu moneda local</b> con comodidad y seguridad.</div> </div>
                                    <div class="col-sm-12 visible-sm"><br><br></div>

                        <div class="col-sm-6 col-md-4">
                            <img src="{{ asset('bitinka/img/img_template1.0/3.png')}}" class="img-responsive center-block">
                            <div class="text-center size-4"></div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <img src="{{ asset('bitinka/img/img_template1.0/4.png')}}" class="img-responsive center-block">
                            <div class="text-center size-4"><strong>Invierte en <a href="#"
                                        </a> </strong>, el activo con mayor crecimiento de los últimos años.</div> </div>
                                        <div class="col-sm-12 visible-sm"><br><br></div>
                            <div class="col-sm-6 col-md-4">
                                <img src="{{ asset('bitinka/img/img_template1.0/5.png')}}" class="img-responsive center-block">
                                <div class="text-center size-4">Ofrecemos las <b><a href="#">tasas
                                            y comisiones más competitivas</a> </b> del mercado.</div> </div> <div class="col-sm-6 col-md-4">
                                            <img src="{{ asset('bitinka/img/img_template1.0/6.png')}}" class="img-responsive center-block">
                                            <div class="text-center size-4">Contamos con la mejor integración bancaria:
                                                <b>más de 29 bancos recaudadores</b> en América, Europa y Asia para su
                                                comodidad.</div>
                                </div>
                            </div>
                        </div>


                    </div>
    </section>






    <footer>
        <div class="container-fluid">
            <div class="col-xs-6 col-md-3 hidden-xs hidden-sm">
                <div class="logo_foot">
                    <img src="https://www.bitinka.com/img/new_img/bitinka_gray.svg" class="img-responsive">
                </div>
                <div class="copy_right">
                    &copy;
                    2018 Cryptoperu.com. Todos los derechos reservados </div>

                <div class="text-uppercase hidden size-5">
                    Sobre nosotros </div>
            </div>
            <div class="col-xs-6 col-md-3 col_foot_1">
                <div class="small_col size-5">
                    <h3>Mapa del sitio</h3>
                    <ul class="list-unstyled">
                            <li><a href="{{ url('') }}">Inicio</a></li>
                            <li><a href="{{ url('comprar') }}">Comprar</a></li>
                            <li><a href="{{ url('noticias') }}">Noticias</a></li>
                            <li><a href="{{ url('preguntas') }}">Preguntas frecuentes</a></li>
                            <li><a href="#section2">Nosotros</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-xs-6 col-md-3 col_foot_2">
                <div class="small_col size-5">
                    <h3>Menú</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('noticias') }}">Preguntas frecuentes</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-xs-12 col-md-3">
                <div class="small_col2">
                    <div class="text-uppercase size-5">
                        <h3>Síguenos</h3>
                    </div>
                    <ul class="social">
                        <li><a target="_blank" href="#"> <i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a target="_blank" href="#"><i class="fa fa-linkedin"></i>
                            </a> </li>
                        <li><a target="_blank" href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li><a target="_blank" href="#"><i class="fa fa-youtube-play"></i></a></li>
                        <li class="telegram"><a target="_blank" href="#"><i
                                    class="fa fa-telegram" aria-hidden="true"></i></a></li>
                    </ul>
                    <div class="hidden">
                        <h3>Suscríbete</h3>
                        <form>
                            <input type="text" name="suscribete" placeholder="Tu email" class="form-control">
                        </form>
                    </div>
                </div>

                <div class="col-sm-6 hidden">
                    <ul class="list-unstyled text-center">
                        <li class="especial-padding2">
                            <a href="#"><img src="https://www.bitinka.com/img/img_template1.0/PCI-DSS.png" class="center-block" width="100"
                                    alt="pci"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 hidden">
                    <ul class="list-unstyled text-center">
                        <li class="text-center">
                            <script src="https://www.bitinka.com/sealserver.trustwave.com/seal23f3.js?style=normal"></script>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-md-3 visible-xs visible-sm">
                <div class="logo_foot">
                    <img src="https://www.bitinka.com/img/new_img/bitinka_foot.svg" class="img-responsive">
                </div>
                <div class="copy_right">
                    &copy;
                    2018 Cryptoperu.com. Todos los derechos reservados </div>

                <div class="text-uppercase hidden size-5">
                    Sobre nosotros </div>
            </div>
        </div>
        <hr>
        <div class="made text-center">
            POWERED BY Cryptoperu
        </div>








        <script src="https://www.bitinka.com/assets/js/form-validation.js"></script>
        <script src="https://www.bitinka.com/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="https://www.bitinka.com/assets/js/validatorinput.js"></script>
        <script src="https://www.bitinka.com/assets/js/md5.js"></script>
        <script src="https://www.bitinka.com/assets/js/pwstrength-bootstrap.js"></script>
        <script src="https://www.bitinka.com/js/footer.js"></script>
        <script src="https://www.bitinka.com/js/inner_header.js"></script>


        <script src="https://www.bitinka.com/assets/js/jquery.alphanum.js"></script>
        <script src="https://www.bitinka.com/js/validaciones.js"></script>
        <script src="https://www.bitinka.com/assets/js/general.js"></script>
        <!--Activa la libreria del ValidationEngine según el lenguaje activo en la aplicación-->
        <script src="https://www.bitinka.com/assets/js/jquery.validationEngine.js"></script>
        <script src="https://www.bitinka.com/assets/js/jquery.validationEngine-en.js"></script>
    </footer>
    <!-- footer -->

    <!-- Modal -->


    <style>
        #example-progress-bar-container { width:220px;
																			margin-left:180px;
		}
		#formato-password {
				float: left;
				width: 160px;
				padding-top: 5px;
				text-align: right;
		}
		.panel {
				margin-top: 10px;
				margin-bottom: 10px;
				background-color: #FAFAFA;
				border: 1px solid transparent;
				border-radius: 4px;
				-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
				box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}
</style>

    <!-- Modal -->

    <!-- Modal -->



    <script type="text/javascript" src="{{ asset('bitinka/js/md5.js') }}"></script>
    <script src="{{ asset('bitinka/js/validatorinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/js/password-strength/prettify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/js/password-strength/password-score.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/js/password-strength/password-score-options.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/js/password-strength/bootstrap-strength-meter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/assets/js/form-validation.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bitinka/js/js_template1.0/owl.carousel.min.js') }}"></script>


    <script>
        $(document).ready(function () {
            $('body').tooltip({
                selector: '[data-toggle="tooltip"]'
            });
        });
    </script>

    <script>
        $(window).scroll(function () {
            $(".efecto").each(function () {
                var pos = $(this).offset().top;
                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    var f = $(this).attr('data-effect');
                    $(this).addClass("slide-animated " + f + "");
                }
            });
        });
    </script>
    
</body>

</html>