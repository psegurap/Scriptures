<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') ─ Anclados En Su Palabra</title>
	<link rel="shortcut icon" href="{{asset('/images/logos/icon.png')}}" type="image/x-icon">
    <!-- FONTS -->    
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:600,700%7CNunito:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <!-- FONTS -->    
    <link href="{{asset('/css/animate.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('/css/fonts.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{asset('/css/jquery.toast.css')}}">
    <link rel="stylesheet" href="{{asset('/css/summernote.min.css')}}">
    <link href="{{asset('/plugins/loader/loader.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('/plugins/loader/theme_loader.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" media="screen">
    {{-- <link href="{{asset('/plugins/pace/templates/pace-theme-minimal.tmpl.css')}}" rel="stylesheet" media="screen"> --}}
    <style>
        #toTop{
            z-index: 20;
        }

        .loader{
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #eee;
        }

        .footer-black {
            background-color: #132f66 !important;
        }
        nav.navbar {
            border-bottom: 2px solid #132f66;
        }

        .navbar-fbt .fbt-sidenav, .navbar-fbt .navbar-nav .nav-link, .navbar-fbt .navbar-search {
            color: #132f66 !important;
        }
        .navbar .nav-link {
            font-size: 1.2em !important;
        }
    </style>
    @yield('styles')
</head>

<body onload="$('.loader').fadeOut()">

    <div id="psp_loader" class="loader">
        <div class="m-loader m-loader--danger"></div>
    </div>

    {{-- <div id="fbt-content-overlay" onclick="closeNav()"></div>
    <form autocomplete="off" id="search" role="search">
        <div class="input">
            <input class="search" name="search" placeholder="Search..." type="text" />
            <button class="submit fa fa-search" type="submit" value=""></button>
        </div>
        <button id="close" type="reset" value="">×</button>
    </form><!-- #search --> --}}

    <div id="page-wrapper" class="magazine-view feed-view">

        @if (Auth::check())
        {{-- <div class="fbt-headline clearfix" id="headline">
            <div class="container">
                <div class="row align-items-center justify-content-between py-1 py-md-0">
                    <div class="col-md-7 left-headline-content">
                        <div class="fbt-left-headline" id="left-headline">
                            
                            <ul class="nav justify-content-center justify-content-md-start">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-12 right-headline-content">
                        <div class="fbt-right-headline" id="right-headline">
                            
                            <ul class="nav justify-content-center justify-content-md-end social-icons">
                                <li class="nav-item">
                                    @if (App::getLocale() == 'es')
                                        <a class="nav-link" href="/language/en"><i class="fa fa-language"></i></a>
                                    @else
                                        <a class="nav-link" href="/language/es"><i class="fa fa-language"></i></a>
                                    @endif
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin')}}"><i class="fa fa-cogs"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i></a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .fbt-headline --> --}}
        @endif

        <nav class="navbar navbar-expand-xl navbar-fbt fbt-nav-skin fbt_sticky_nav m-0 py-2">
            <div class="container nav-mobile-px clearfix">
                <div class="navbar-brand order-2 order-xl-1 m-auto">
                    <a href="{{route('index')}}"><img alt="AESP" src="{{asset('/images/logos/top_main_logo_blue.png')}}"></a>
                    {{-- <a href="{{route('index')}}"><img alt="AESP" src="{{asset('/images/logos/top_main_logo_blue.png')}}"></a> --}}
                </div>
                <button aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler order-1 order-xl-2"
                    data-target="#navbar-menu" data-toggle="collapse" type="button">☰</button>
                <div class="collapse navbar-collapse justify-content-end order-4 order-xl-3 clearfix" id="navbar-menu">
                    <ul class="navbar-nav clearfix d-flex">
                        <li class="nav-item">
                            <a href="{{route('index')}}" class="nav-link">{{__('Home')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="/colaboradores" class="nav-link">{{__('Colaboradores')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="/equipo" class="nav-link">{{__('Equipo')}}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">{{__('Articles')}}</a>
                        </li> --}}
                        {{-- <li class="nav-item dropdown">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">{{__('About Us')}}</a>
                            <div class="dropdown-menu pt-0">
                                @if (App::getLocale() == 'es')
                                    <a href="/profesion-de-fe" class="dropdown-item">{{__('Profesión de Fe')}}</a>
                                    <a href="#" class="dropdown-item">{{__('Nuestra Historia')}}</a>
                                    <a href="/equipo" class="dropdown-item">{{__('Equipo')}}</a>
                                    <a href="/colaboradores" class="dropdown-item">{{__('Colaboradores')}}</a>
                                    <a href="/contacto" class="dropdown-item">{{__('Contacto')}}</a>
                                @else
                                    <a href="/profession-of-faith" class="dropdown-item">{{__('Profession of Faith')}}</a>
                                    <a href="#" class="dropdown-item">{{__('Our History')}}</a>
                                    <a href="/team" class="dropdown-item">{{__('Our Team')}}</a>
                                    <a href="/collaborators" class="dropdown-item">{{__('Collaborators')}}</a>
                                    <a href="/contact" class="dropdown-item">{{__('Contact')}}</a>
                                @endif
                            </div>
                        </li> --}}
                        {{-- <li class="nav-item d-inline-block d-md-none">
                            <a href="#" class="nav-link">Donate</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </nav><!-- .navbar end-->

        @yield('content')

        <div id="overall-footer-container">
            <div class="fbt-newsletter-area">
                <div class="fbt-bottom-section clearfix" id="fbt_bottom_section">
            
                    <div class="widget FollowByEmail">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="follow-by-email-inner subscriber-form col-lg-12">
                                    <div class="card-- py-5">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-lg-6">
                                                <h2 class="title mb-4 mb-lg-0 text-center text-lg-left">
                                                    {{__('Subscribe to our Content!')}}
                                                </h2>
                                            </div>
                                            <div class="ml-lg-auto col-lg-6">
                                                <form class="fbt-email-form">
                                                    <input v-model="email_address" v-validate="'required|email'" autocomplete="off" class="follow-by-email-address" name="email" placeholder="{{__('Enter your email...')}}" type="email">
                                                    <input class="follow-by-email-submit" @click="validate(StoreSubscriber)" type="button" value="{{__('Subscribe')}}">
                                                </form>
                                                <span class="text-danger font-weight-bold" style="font-size: 12px;" v-show="errors.has('email')">* @{{ errors.first('email') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .FollowByEmail -->
            
                </div>
            </div>
            <div class="footer-dark footer-black pt-5" id="footer-content">
                <div class="container pb-4">
                    <div class="row clearfix">
                        {{-- <div class="col-lg-4">
                            <div class="footer-1 section">
                                <div class="fbt_list_posts">
                                    <h4 class="title title-heading">
                                        Latest Articles
                                    </h4>
                                    <div class="widget-content">
            
                                        <article class="post mb-3">
                                            <div class="post-content media align-items-center">
                                                <div class="fbt-item-thumbnail clearfix">
                                                    <a href="./single_mag.html">
                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="{{asset('/images/thumb-6.jpg')}}" 
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                    </a>
                                                </div>
                                                <div class="ml-3 fbt-title-caption media-body">
                                                    <span class="pp-post-tag">Design</span>
                                                    <h3 class="post-title">
                                                        <a href="./single_mag.html">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        </a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <span class="post-date published">March 28, 2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
            
                                        <article class="post mb-3">
                                            <div class="post-content media align-items-center">
                                                <div class="fbt-item-thumbnail clearfix">
                                                    <a href="./single_mag.html">
                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="{{asset('/images/thumb-2.jpg')}}" 
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                    </a>
                                                </div>
                                                <div class="ml-3 fbt-title-caption media-body">
                                                    <span class="pp-post-tag">Tech</span>
                                                    <h3 class="post-title">
                                                        <a href="./single_mag.html">
                                                            Nunc tellus libero, tempus id luctus eget, fermentum.
                                                        </a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <span class="post-date published">March 27, 2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
            
                                        <article class="post mb-3">
                                            <div class="post-content media align-items-center">
                                                <div class="fbt-item-thumbnail clearfix">
                                                    <a href="./single_mag.html">
                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="{{asset('/images/thumb-5.jpg')}}" 
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                    </a>
                                                </div>
                                                <div class="ml-3 fbt-title-caption media-body">
                                                    <span class="pp-post-tag">Featured</span>
                                                    <h3 class="post-title">
                                                        <a href="./single_mag.html">
                                                            Mihi vero, inquit, placet agi subtilius et pressius.
                                                        </a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <span class="post-date published">March 27, 2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
            
                                    </div>
                                </div><!-- .fbt_list_posts -->
                            </div>
                        </div> --}}
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="footer-2 section">
                                        <div class="logoImage">
                                            <div class="widget-content">
                                                <img alt="" src="{{asset('/images/logos/bottom_main_logo_white.png')}}">
                                            </div>
                                        </div>
                                        <div class="widget Text">
                                            <div class="widget-content">
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                    Ut porttitor leo vel nulla posuere accumsan. 
                                                    Suspendisse sed tortor eget justo aliquam euismod. 
                                                    Ut interdum diam nec imperdiet elementum. Proin condimentum faucibus placerat. 
                                                    Donec massa justo, porttitor tincidunt eros a, vehicula malesuada tortor. 
                                                    Praesent nec sem ut justo.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="footer-3 section">
                                        <div class="widget">
                                            <h4 class="title title-heading">
                                                {{__('About Us')}}
                                            </h4>
                                            <div class="widget-content list-label-widget-content">
                                                <ul class="list-unstyled">
                                                    @if (App::getLocale() == 'es')

                                                        {{-- <li><a class="label-name" href="/profesion-de-fe">{{__('Profesión De Fe')}}</a></li> --}}
                                                        {{-- <li><a class="label-name" href="#">{{__('Nuestra Historia')}}</a></li> --}}
                                                        <li><a class="label-name" href="/equipo">{{__('Equipo')}}</a></li>
                                                        <li><a class="label-name" href="/colaboradores">{{__('Colaboradores')}}</a></li>
                                                        {{-- <li><a class="label-name" href="/contacto">{{__('Contacto')}}</a></li> --}}
                                                    @else
                                                        {{-- <li><a class="label-name" href="/profession-of-faith">{{__('Profession of Faith')}}</a></li> --}}
                                                        {{-- <li><a class="label-name" href="#">{{__('Our History')}}</a></li> --}}
                                                        <li><a class="label-name" href="/team">{{__('Our Team')}}</a></li>
                                                        <li><a class="label-name" href="/collaborators">{{__('Collaborators')}}</a></li>
                                                        {{-- <li><a class="label-name" href="/contact">{{__('Contact')}}</a></li> --}}
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="footer-4 section">
                                        <div class="widget">
                                            <h4 class="title title-heading">
                                                {{__('Categories')}}
                                            </h4>
                                            <div class="widget-content list-label-widget-content">
                                                <ul class="list-unstyled">
                                                    <li v-for="category in categories">
                                                        @if (App::getLocale() == 'es')
                                                            <a class="label-name" href="#">@{{category.category_es}}</a>
                                                        @else
                                                            <a class="label-name" href="#">@{{category.category_en}}</a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 last">
                                    <div class="footer-5 section">
                                        <div class="widget">
                                            <h4 class="title title-heading">
                                                {{__('Tags')}}
                                            </h4>
                                            <div class="widget-content list-label-widget-content">
                                                <ul class="list-unstyled">
                                                    <li v-for="tag in tags">
                                                        @if (App::getLocale() == 'es')
                                                            <a class="label-name" href="#">@{{tag.tag_es}}</a>
                                                        @else
                                                            <a class="label-name" href="#">@{{tag.tag_en}}</a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="credits">
                    <div class="container">
                        <div class="row divider py-4">
                            <div class="col-lg-6">
                                <div class="copyright-section text-center text-lg-left">
                                    ©
                                    <script>document.write(new Date().getFullYear());</script> Anclados en Su Palabra | {{__('All Rights Reserved')}}
                                </div>
                            </div>
                            {{-- <div class="col-lg-6">
                                <div class="footer-menu section" id="footer-menu">
                                    <div class="widget socialList">
                                        <div class="widget-content">
                                            <ul class="nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#"><i class="fa fa-youtube-play"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div><!-- #footer-content -->
        </div>

    </div><!-- #page-wrapper end -->

    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/js/plugins.js')}}"></script>
    <script src="{{asset('/js/vue.js')}}"></script>
    <script src="{{asset('/js/vee-validate.js')}}"></script>
    <script src="{{asset('/js/jquery.toast.js')}}"></script>
    <script src="{{asset('/js/moment.js')}}"></script>
    <script src="{{asset('/js/moment-with-locales.min.js')}}"></script>
    <script src="{{asset('/js/axios.js')}}"></script>
    <script src="{{asset('/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('/js/loadingoverlay.js')}}"></script>
    <script src="{{asset('/js/summernote.min.js')}}"></script>
    {{-- <script src="{{asset('/plugins/pace/pace.js')}}"></script> --}}

    <script src="{{asset('/js/main.js')}}"></script>
    <script>
        // $(function() {
        //     Pace.on("done", function(){
        //         $("#page-wrapper").fadeIn(1000);
        //     });
        // });
        const homepath = "{{url('/')}}";
        const lang = "{{App::getLocale()}}";
        moment.locale(lang);
    </script>
    <script src="{{asset('/js/custom/general/main.js')}}"></script>
    @yield('scripts')
</body>

</html>