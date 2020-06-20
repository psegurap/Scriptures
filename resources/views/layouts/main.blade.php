<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') ─ Anclados En Su Palabra</title>
	<link rel="shortcut icon" href="{{asset('/images/icon.favicon')}}" type="image/x-icon">
    <!-- FONTS -->    
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:600,700%7CNunito:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
    <!-- FONTS -->    
    <link href="{{asset('/css/animate.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('/css/fonts.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{asset('/css/jquery.toast.css')}}">
    <link rel="stylesheet" href="{{asset('/css/summernote.min.css')}}">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" media="screen">
    @yield('styles')
</head>

<body>

    
    <div id="fbt-content-overlay" onclick="closeNav()"></div>
    <form autocomplete="off" id="search" role="search">
        <div class="input">
            <input class="search" name="search" placeholder="Search..." type="text" />
            <button class="submit fa fa-search" type="submit" value=""></button>
        </div>
        <button id="close" type="reset" value="">×</button>
    </form><!-- #search -->

    <div id="page-wrapper" class="magazine-view feed-view">

        @if (Auth::check())
        <div class="fbt-headline clearfix" id="headline">
            <div class="container">
                <div class="row align-items-center justify-content-between py-1 py-md-0">
                    {{-- <div class="col-md-7 left-headline-content">
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
                    </div> --}}
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
        </div><!-- .fbt-headline -->
        @endif

        <nav class="navbar navbar-expand-xl navbar-fbt fbt-nav-skin fbt_sticky_nav m-0 py-2">
            <div class="container nav-mobile-px clearfix">
                <div class="navbar-brand order-2 order-xl-1 m-auto">
                    <a href="{{route('index')}}"><img alt="Nemesis" src="{{asset('/images/logo_black.png')}}"></a>
                </div>
                <button aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler order-1 order-xl-2"
                    data-target="#navbar-menu" data-toggle="collapse" type="button">☰</button>
                <div class="collapse navbar-collapse justify-content-end order-4 order-xl-3 clearfix oswald" id="navbar-menu">
                    <ul class="navbar-nav clearfix d-flex">
                        <li class="nav-item">
                            <a href="{{route('index')}}" class="nav-link">{{__('Home')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">{{__('Articles')}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">{{__('About Us')}}</a>
                            <div class="dropdown-menu">
                                @if (App::getLocale() == 'es')
                                    <a href="#" class="dropdown-item">{{__('Profession Of Faith')}}</a>
                                    <a href="#" class="dropdown-item">{{__('Our History')}}</a>
                                    <a href="#" class="dropdown-item">{{__('Our Team')}}</a>
                                    <a href="/colaboradores" class="dropdown-item">{{__('Collaborators')}}</a>
                                    <a href="#" class="dropdown-item">{{__('Contact')}}</a>
                                @else
                                    <a href="#" class="dropdown-item">{{__('Profession Of Faith')}}</a>
                                    <a href="#" class="dropdown-item">{{__('Our History')}}</a>
                                    <a href="#" class="dropdown-item">{{__('Our Team')}}</a>
                                    <a href="/collaborators" class="dropdown-item">{{__('Collaborators')}}</a>
                                    <a href="#" class="dropdown-item">{{__('Contact')}}</a>
                                @endif
                            </div>
                        </li>
                        {{-- <li class="nav-item d-inline-block d-md-none">
                            <a href="#" class="nav-link">Donate</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </nav><!-- .navbar end-->

        @yield('content')

        <div class="footer-dark footer-black pt-5" id="footer-content">
            <div class="container pb-4">
                <div class="row clearfix">
                    <div class="col-lg-4">
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
                    </div>
                    <div class="col-lg-6 ml-lg-auto">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="footer-2 section">
                                    <div class="logoImage">
                                        <div class="widget-content">
                                            <img alt="" src="{{asset('/images/logo_white.png')}}">
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
                                            About
                                        </h4>
                                        <div class="widget-content list-label-widget-content">
                                            <ul class="list-unstyled">
                                                <li><a class="label-name" href="#">Home</a></li>
                                                <li><a class="label-name" href="#">Lifestyle</a></li>
                                                <li><a class="label-name" href="#"> People</a></li>
                                                <li><a class="label-name" href="#">Slider</a></li>
                                                <li><a class="label-name" href="#">Sport</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="footer-4 section">
                                    <div class="widget">
                                        <h4 class="title title-heading">
                                            Categories
                                        </h4>
                                        <div class="widget-content list-label-widget-content">
                                            <ul class="list-unstyled">
                                                <li><a class="label-name" href="#">Business</a></li>
                                                <li><a class="label-name" href="#">Design</a></li>
                                                <li><a class="label-name" href="#">Lifestyle</a></li>
                                                <li><a class="label-name" href="#">Technology</a></li>
                                                <li><a class="label-name" href="#">Training</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 last">
                                <div class="footer-5 section">
                                    <div class="widget">
                                        <h4 class="title title-heading">
                                            Account
                                        </h4>
                                        <div class="widget-content list-label-widget-content">
                                            <ul class="list-unstyled">
                                                <li><a class="label-name" href="#">Business</a></li>
                                                <li><a class="label-name" href="#">Design</a></li>
                                                <li><a class="label-name" href="#">Entertainment</a></li>
                                                <li><a class="label-name" href="#">Featured</a></li>
                                                <li><a class="label-name" href="#">Technology</a></li>
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
                                <script>document.write(new Date().getFullYear());</script> Nemesis | All Rights Reserved
                            </div>
                        </div>
                        <div class="col-lg-6">
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
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- #footer-content -->

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

    <script src="{{asset('/js/main.js')}}"></script>
    <script>
        const homepath = "{{url('/')}}";
        const lang = "{{App::getLocale()}}";
        moment.locale(lang);
    </script>
    @yield('scripts')
</body>

</html>