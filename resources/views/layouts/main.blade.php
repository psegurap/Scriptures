<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
	<link rel="shortcut icon" href="{{asset('/images/icon.favicon')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed:600,700%7CNunito:300,400" rel="stylesheet">
    <link href="{{asset('/css/animate.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('/css/fonts.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
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

        <div class="fbt-headline clearfix" id="headline">
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
                    <div class="col-md-5 right-headline-content">
                        <div class="fbt-right-headline" id="right-headline">
                            
                            <ul class="nav justify-content-center justify-content-md-end social-icons">
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
        </div><!-- .fbt-headline -->

        <nav class="navbar navbar-expand-xl navbar-fbt fbt-nav-skin fbt_sticky_nav m-0">
            <div class="container nav-mobile-px clearfix">
                <div class="navbar-brand order-2 order-xl-1 m-auto">
                    <a href="./index-5.html"><img alt="Nemesis" src="./images/logo_nemesis.png"></a>
                </div>
                <button aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler order-1 order-xl-2"
                    data-target="#navbar-menu" data-toggle="collapse" type="button">☰</button>
                <div class="header-buttons order-3 order-lg-4">
                    <span class="fa fa-search navbar-search search-trigger"></span>
                    <span class="fbt-sidenav ml-1 active" onclick="openNav()">☰</span>
                </div>
                <div class="collapse navbar-collapse order-4 order-xl-3 clearfix" id="navbar-menu">
                    <ul class="navbar-nav m-auto clearfix">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">Home</a>
                            <div class="dropdown-menu">
                                <a href="./index.html" class="dropdown-item">Home 1</a>
                                <a href="./index-2.html" class="dropdown-item">Home 2</a>
                                <a href="./index-3.html" class="dropdown-item">Home 3</a>
                                <a href="./index-4.html" class="dropdown-item">Home 4</a>
                                <a href="./index-5.html" class="dropdown-item">Home 5</a>
                                <a href="./blog.html" class="dropdown-item">Home 6</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="./contact_mag.html" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="./blog.html" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item dropdown fbt-megamenu mega-category d-none d-xl-block">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Favorites</a>
                            <div class="dropdown-menu fullwidth sub-mega-category py-0">
                                <div class="container">
                                    <div class="row px-3">
                                        <div class="col-3 fbt-childs-cats px-0 py-3 border-left border-right">
                                            <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link fbt-child-cat active" data-toggle="pill" href="#child-cat_1" role="tab" aria-selected="true">All</a>
                                                <a class="nav-link fbt-child-cat" data-toggle="pill" href="#child-cat_2" role="tab" aria-selected="false">Politics</a>
                                                <a class="nav-link fbt-child-cat" data-toggle="pill" href="#child-cat_3" role="tab" aria-selected="false">Lifestyle</a>
                                                <a class="nav-link fbt-child-cat" data-toggle="pill" href="#child-cat_4" role="tab" aria-selected="false">Sport</a>
                                            </div>
                                        </div>
                                        <div class="col-9 pr-0 py-4">
                                            <div class="tab-content fbt-megablock-cats">
                                                <div class="tab-pane fade show active" id="child-cat_1" role="tabpanel">
                                                    <div class="row px-2">
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-2.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-3.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Quisque lorem nulla, lacinia risus a, varius tempor est.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-4.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                    <span class="video-icon"><i class="fa fa-play"></i></span>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Suspendisse nec vehicula ipsum, a luctus metus.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-5.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Duis lacinia lobortis, mollis magna vel, auctor tellus.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- tab-1 -->
                                                <div class="tab-pane fade" id="child-cat_2" role="tabpanel">
                                                    <div class="row px-2">
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-6.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-7.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Quisque lorem nulla, lacinia risus a, varius tempor est.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-8.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Suspendisse nec vehicula ipsum, a luctus metus.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-9.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Duis lacinia lobortis, mollis magna vel, auctor tellus.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- tab-2 -->
                                                <div class="tab-pane fade" id="child-cat_3" role="tabpanel">
                                                    <div class="row px-2">
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-10.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-11.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Quisque lorem nulla, lacinia risus a, varius tempor est.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-12.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Suspendisse nec vehicula ipsum, a luctus metus.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-13.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Duis lacinia lobortis, mollis magna vel, auctor tellus.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- tab-3 -->
                                                <div class="tab-pane fade" id="child-cat_4" role="tabpanel">
                                                    <div class="row px-2">
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-14.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-15.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Quisque lorem nulla, lacinia risus a, varius tempor est.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-16.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Suspendisse nec vehicula ipsum, a luctus metus.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col px-2">
                                                            <div class="fbt-mega-item">
                                                                <div class="fbt-post-thumbnail">
                                                                    <a href="./single_mag.html">
                                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-17.jpg"
                                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                    </a>
                                                                </div>
                                                                <div class="title-caption pt-2 px-2">
                                                                    <h3><a href="#">Duis lacinia lobortis, mollis magna vel, auctor tellus.</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- tab-4 -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li><!-- .fbt-megamenu.mega-category -->
                        <li class="nav-item">
                            <a href="./error.html" class="nav-link">Error Page</a>
                        </li>
                        <li class="nav-item dropdown fbt-megamenu mega-grid d-none d-xl-block">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lifestyle</a>
                            <div class="dropdown-menu fullwidth sub-mega-grid py-4">
                                <div class="container px-3">
                                    <div class="row px-2">
                                        <div class="col px-2">
                                            <div class="fbt-mega-item">
                                                <div class="fbt-post-thumbnail">
                                                    <a href="./single_mag.html">
                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-5.jpg"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                    </a>
                                                </div>
                                                <div class="title-caption pt-2 px-2">
                                                    <h3><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col px-2">
                                            <div class="fbt-mega-item">
                                                <div class="fbt-post-thumbnail">
                                                    <a href="./single_mag.html">
                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-8.jpg"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                    </a>
                                                </div>
                                                <div class="title-caption pt-2 px-2">
                                                    <h3><a href="#">Quisque lorem nulla, lacinia risus a, varius tempor est.</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col px-2">
                                            <div class="fbt-mega-item">
                                                <div class="fbt-post-thumbnail">
                                                    <a href="./single_mag.html">
                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-9.jpg"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                    </a>
                                                </div>
                                                <div class="title-caption pt-2 px-2">
                                                    <h3><a href="#">Suspendisse nec vehicula ipsum, a luctus metus.</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col px-2">
                                            <div class="fbt-mega-item">
                                                <div class="fbt-post-thumbnail">
                                                    <a href="./single_mag.html">
                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-11.jpg"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                    </a>
                                                </div>
                                                <div class="title-caption pt-2 px-2">
                                                    <h3><a href="#">Morbi lobortis dolor eget dapibus lobortis.</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col px-2">
                                            <div class="fbt-mega-item">
                                                <div class="fbt-post-thumbnail">
                                                    <a href="./single_mag.html">
                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-16.jpg"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                    </a>
                                                </div>
                                                <div class="title-caption pt-2 px-2">
                                                    <h3><a href="#">
                                                        Design Lorem ipsum dolor sit amet, consectetur.</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li><!-- .fbt-megamenu.mega-grid -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">Policy</a>
                        </li>
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
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/thumb-6.jpg" 
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
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/thumb-2.jpg" 
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
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/thumb-5.jpg" 
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
                                            <img alt="" src="./images/logo-light.png">
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
    <script src="{{asset('/js/main.js')}}"></script>

    @yield('scripts')
</body>

</html>