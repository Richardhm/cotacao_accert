<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>BmSys 11</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="assets/img/favicon.png"
    />
    <!-- Place favicon.ico in the root directory -->

    <!-- ======== CSS here ======== -->
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('lineicons.css')}}" />
    <link rel="stylesheet" href="{{asset('animate.css')}}" />
    <link rel="stylesheet" href="{{asset('main.css')}}" />
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a> to improve
    your experience and security.
</p>
<![endif]-->

<!-- ======== preloader start ======== -->
<div class="preloader">
    <div class="loader">
        <div class="spinner">
            <div class="spinner-container">
                <div class="spinner-rotator">
                    <div class="spinner-left">
                        <div class="spinner-circle"></div>
                    </div>
                    <div class="spinner-right">
                        <div class="spinner-circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- preloader end -->

<!-- ======== header start ======== -->
<header class="header">
    <div class="navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{asset('img/logo/logo-bmsys.png')}}" alt="Logo" />
                        </a>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div
                            class="collapse navbar-collapse sub-menu-bar"
                            id="navbarSupportedContent"
                        >
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="page-scroll active" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#features">Planos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#about">Sobre</a>
                                </li>
                            </ul>
                        </div>
                        <!-- navbar collapse -->
                    </nav>
                    <!-- navbar -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- navbar area -->
</header>
<!-- ======== header end ======== -->

<!-- ======== hero-section start ======== -->
<section id="home" class="hero-section">
    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="wow fadeInUp" data-wow-delay=".4s">
                        Realizar Cotação
                    </h1>
                    <p class="wow fadeInUp" data-wow-delay=".6s">
                        O sistema de cotação de plano de saúde permite aos usuários selecionarem operadora, plano e cidade para visualizarem uma tabela de preços. Eles podem gerar uma imagem da cotação para enviar aos clientes, tornando o processo de comunicação mais ágil e profissional.
                    </p>
                    <a
                        href="{{route('listar.planos')}}"
                        class="main-btn border-btn btn-hover wow fadeInUp"
                        data-wow-delay=".6s"
                    >Assinatura Aqui</a
                    >
                    <a href="#features" class="scroll-bottom">
                        <i class="lni lni-arrow-down"></i
                        ></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
                    <img src="{{asset('img/hero/tela-inicial2.png')}}" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======== hero-section end ======== -->

<!-- ======== feature-section start ======== -->
<section id="features" class="feature-section">
        <h2>Planos</h2>
        <p class="text-center">Faça um teste, cadastre-se Gratuitamente</p>
        <div class="feature-section-content">

            <div class="feature-section-content-card">
                <div class="">
                    <div class="content">
                        <h3>Basico</h3>
                        <div class="font-bold">
                            <span>R$ 35,00</span>
                            <p>POR Mês</p>
                        </div>
                    </div>
                    <div class="">
                        <ul>
                            <li class="font-bold border-b-2 border-t-2 text-center">Direito a 1 email</li>
                            <li class="font-bold border-b-2 text-center">Cancelar a qualquer momento</li>
                            <li class="font-bold border-b-2 text-center">Direito a 1 tabela</li>
                        </ul>
                    </div>
                    <div class="w-full">
                        <a href="{{route('perfil.cadastrar.basico')}}" type="button" class="text-purple-900 w-full bg-white font-medium rounded-full px-5 py-2.5 text-center mb-2" style="color:#8907BB;">Assinar</a>
                    </div>
                </div>
            </div>

            <div class="feature-section-content-card">
                <div class="">
                    <div class="content">
                        <h3>Intermediario</h3>
                        <div class="font-bold">
                            <span>R$ 35,00</span>
                            <p>POR Mês</p>
                        </div>
                    </div>
                    <div class="">
                        <ul>
                            <li class="font-bold border-b-2 border-t-2 text-center">Direito a 1 email</li>
                            <li class="font-bold border-b-2 text-center">Cancelar a qualquer momento</li>
                            <li class="font-bold border-b-2 text-center">Direito a 1 tabela</li>
                        </ul>
                    </div>
                    <div class="w-full">
                        <a href="{{route('perfil.cadastrar.intermediario')}}" type="button" class="text-purple-900 w-full bg-white font-medium rounded-full px-5 py-2.5 text-center mb-2" style="color:#8907BB;">Assinar</a>
                    </div>
                </div>
            </div>


            <div class="feature-section-content-card">
                <div class="">
                    <div class="content">
                        <h3>Empresarial</h3>
                        <div class="font-bold">
                            <span>R$ 35,00</span>
                            <p>POR Mês</p>
                        </div>
                    </div>
                    <div class="">
                        <ul>
                            <li class="font-bold border-b-2 border-t-2 text-center">Direito a 1 email</li>
                            <li class="font-bold border-b-2 text-center">Cancelar a qualquer momento</li>
                            <li class="font-bold border-b-2 text-center">Direito a 1 tabela</li>
                        </ul>
                    </div>
                    <div class="w-full">
                        <a href="{{route('perfil.cadastrar.empresarial')}}" type="button" class="text-purple-900 w-full bg-white font-medium rounded-full px-5 py-2.5 text-center mb-2" style="color:#8907BB;">Assinar</a>
                    </div>
                </div>
            </div>


        </div>


</section>
<!-- ======== feature-section end ======== -->

<!-- ======== about-section start ======== -->
<section id="about" class="about-section pt-150">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="about-img">
                    <div style="width:550px;height:421px;background-color: #51A351;border-radius: 5px;border:10px solid #A78BFA;">
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/gXN9acC9edU?si=LGbE8WDUe-0BGAts" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>

                    <img
                        src="{{asset('img/about/about-left-shape.svg')}}"
                        alt=""
                        class="shape shape-1"
                    />
                    <img
                        src="{{asset('img/about/left-dots.svg')}}"
                        alt=""
                        class="shape shape-2"
                    />
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="about-content">
                    <div class="section-title mb-30">
                        <h2 class="mb-25 wow fadeInUp" data-wow-delay=".2s">
                            Perfect Solution Thriving Online Business
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay=".4s">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                            dinonumy eirmod tempor invidunt ut labore et dolore magna
                            aliquyam erat, sed diam voluptua. At vero eos et accusam et
                            justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                            sea takimata sanctus est Lorem.Lorem ipsum dolor sit amet.
                        </p>
                    </div>
                    <a
                        href="javascript:void(0)"
                        class="main-btn btn-hover border-btn wow fadeInUp"
                        data-wow-delay=".6s"
                    >Discover More</a
                    >
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======== about-section end ======== -->

<!-- ======== about2-section start ======== -->
<section id="about" class="about-section pt-150">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-4 col-lg-4">
                <div class="about-content">
                    <div class="section-title mb-30">
                        <h2 class="mb-25 wow fadeInUp" data-wow-delay=".2s">
                            Easy to Use with Tons of Awesome Features
                        </h2>
                        <p class="wow fadeInUp" data-wow-delay=".4s">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                            diam nonumy eirmod tempor invidunt ut labore et dolore magna
                            aliquyam erat, sed diam voluptua.
                        </p>
                    </div>
                    <ul>
                        <li>Quick Access</li>
                        <li>Easily to Manage</li>
                        <li>24/7 Support</li>
                    </ul>
                    <a
                        href="javascript:void(0)"
                        class="main-btn btn-hover border-btn wow fadeInUp"
                        data-wow-delay=".6s"
                    >Learn More</a
                    >
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 order-first order-lg-last">
                <div class="about-img-2">
                    <img src="{{asset('img/hero/tela-inicial2.png')}}" alt="" style="width:1000px;height:450px;" />
                    <img
                        src="{{asset('img/about/about-right-shape.svg')}}"
                        alt=""
                        class="shape shape-1"
                    />
                    <img
                        src="{{asset('img/about/right-dots.svg')}}"
                        alt=""
                        class="shape shape-2"
                    />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======== about2-section end ======== -->



<!-- ======== subscribe-section start ======== -->
<section id="contact" class="subscribe-section pt-120">
    <div class="container">
        <div class="subscribe-wrapper img-bg">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title mb-15">
                        <h2 class="text-white mb-25">Receber Email?</h2>
                        <p class="text-white pr-5">
                            Quer ficar por dentro das novidades, quando sair uma tabela nova...
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <form action="#" class="subscribe-form">
                        <input
                            type="email"
                            name="subs-email"
                            id="subs-email"
                            placeholder="Seu Email"
                        />
                        <button type="submit" class="main-btn btn-hover">
                            Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======== subscribe-section end ======== -->

<!-- ======== footer start ======== -->
<footer class="footer">
    <div class="container">
        <div class="widget-wrapper">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <div class="mb-30">
                            <a href="index.html">
                                <img src="{{asset('img/logo/logo-bmsys.png')}}" style="padding:5px;width:400px;height:120px;"  alt="" />
                            </a>
                        </div>
                        <p class="desc mb-30 text-white">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                            dinonumy eirmod tempor invidunt.
                        </p>
                        <ul class="socials">
                            <li>
                                <a href="jvascript:void(0)">
                                    <i class="lni lni-facebook-filled"></i>
                                </a>
                            </li>
                            <li>
                                <a href="jvascript:void(0)">
                                    <i class="lni lni-twitter-filled"></i>
                                </a>
                            </li>
                            <li>
                                <a href="jvascript:void(0)">
                                    <i class="lni lni-instagram-filled"></i>
                                </a>
                            </li>
                            <li>
                                <a href="jvascript:void(0)">
                                    <i class="lni lni-linkedin-original"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h3>About Us</h3>
                        <ul class="links">
                            <li><a href="javascript:void(0)">Home</a></li>
                            <li><a href="javascript:void(0)">Feature</a></li>
                            <li><a href="javascript:void(0)">About</a></li>
                            <li><a href="javascript:void(0)">Testimonials</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3>Features</h3>
                        <ul class="links">
                            <li><a href="javascript:void(0)">How it works</a></li>
                            <li><a href="javascript:void(0)">Privacy policy</a></li>
                            <li><a href="javascript:void(0)">Terms of service</a></li>
                            <li><a href="javascript:void(0)">Refund policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3>Other Products</h3>
                        <ul class="links">
                            <li><a href="jvascript:void(0)">Accounting Software</a></li>
                            <li><a href="jvascript:void(0)">Billing Software</a></li>
                            <li><a href="jvascript:void(0)">Booking System</a></li>
                            <li><a href="jvascript:void(0)">Tracking System</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ======== footer end ======== -->

<!-- ======== scroll-top ======== -->
<a href="#" class="scroll-top btn-hover">
    <i class="lni lni-chevron-up"></i>
</a>

<!-- ======== JS here ======== -->
<script src="{{asset('bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('wow.min.js')}}"></script>
<script src="{{asset('main.js')}}"></script>
</body>
</html>
