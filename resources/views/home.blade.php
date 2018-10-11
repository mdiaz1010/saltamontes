@extends('layouts.app') @section('title','') @section('content2')


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





    <section id="section2" class="fondo2">
        <div class="fondo2-inter">
            <div class="borde">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 efecto col-md-push-6" data-effect="fadeInUp">
                            <h2><b>UNA PLATAFORMA</b> PENSADA Y DESARROLLADA <b>POR Y PARA TRADERS</b></h2>
                            <p align="justify">Cryptoperu es una plataforma de <b>intercambio de Bitcoins, Ethereum, Dash, Ripple y
                                    otras
                                    criptomonedas, </b> que le permite realizar transacciones de compra y venta en más
                                de <b>10 monedas de América, Europa y Asia.</b></p>
                        </div>
                        <div class="col-sm-12 col-md-6 efecto col-md-pull-6" data-effect="fadeInLeft">
                            <div class="row"><img src="{{ asset('bitinka/img/new_img/plataforma-bitinka.png')}}" alt="plataforma bitinka"></div>
                        </div>
                    </div>
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




<!--
<h3 class="title-from left">Ultimos articulos</h3>
<div class="row" class="col-md-12">
    <div class="col-md-9">
        <div class="row">
            @foreach($articles as $article)
            <div class="col-md-6">
                <div class="panel-body">
                    <a href="{{route('view.article',$article->slug)}}" class="thumbnail">
                        @foreach($article->images as $image)
                        <img class="img-responsive img-article" src="/images/articles/{{$image->name}}" alt="..."> @endforeach
                    </a>
                    <a href="{{route('view.article',$article->slug)}}">
                            <h3 class="text-center">{{$article->title}}</h3>
                    </a>

                    <hr>
                    <i class="fa fa-folder-open-o"></i>
                    <a href="{{ route('search.category',$article->category->name) }}">{{$article->category->name}}</a>
                    <div class="pull-right">
                        <i class="fa fa-clock-o"></i>{{$article->created_at->diffForHumans()}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            {!! $articles->render() !!}
        </div>
    </div>
        <div class="col-md-3 aside">
            @include('admin.templates.partials.aside')
        </div>


</div>
-->
@endsection