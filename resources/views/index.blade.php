@extends('layouts.main')
@section('title', 'Home')
@section('styles')
    <style>
        
    </style>
@endsection
@section('content')
    <main>
        <div class="slider-container m-0 pt-5 pb-0">
            <div class="slider-container-row fbt-mag-slider" id="slider-posts">
                <div class="container-fluid px-xl-5">
                    <div class="row" v-if="slider_post.length == 4">
        
                        <div class="col-lg-6 pr-lg-1 mb-2 mb-lg-0">
                            <div class="post-item large">
                                <div class="fbt-post-thumbnail">
                                    @if (App::getLocale() == 'es')
                                        <a :href="homepath + '/articulo/' + slider_post[0].url_es">
                                            <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + slider_post[0].attach_reference + '/' + slider_post[0].img_thumbnail"
                                            :src="homepath + '/images/articles/' + slider_post[0].attach_reference + '/' + slider_post[0].img_thumbnail">
                                        </a>
                                    @else
                                        <a :href="homepath + '/article/' + slider_post[0].url_en">
                                            <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + slider_post[0].attach_reference + '/' + slider_post[0].img_thumbnail"
                                            :src="homepath + '/images/articles/' + slider_post[0].attach_reference + '/' + slider_post[0].img_thumbnail">
                                        </a>
                                    @endif
                                </div>
                                <div class="fbt-post-caption">
                                    <span v-for="category in slider_post[0].categories" class="post-tag index-post-tag">
                                        @if (App::getLocale() == 'es')
                                            @{{category.category_es}}
                                        @else
                                            @{{category.category_en}}
                                        @endif
                                    </span>
                                    <div class="title-caption p-4">
                                        <div class="post-meta mb-2">
                                            <span class="post-author">
                                                @if (App::getLocale() == 'es')
                                                    <a class="text-capitalize" :href="homepath + '/colaborador/' + slider_post[0].author.name">@{{slider_post[0].author.name}}</a>
                                                @else
                                                    <a class="text-capitalize" :href="homepath + '/collaborator/' + slider_post[0].author.name">@{{slider_post[0].author.name}}</a>
                                                @endif
                                            </span>
                                            <span class="post-time">@{{moment(slider_post[0].created_at).format('LL')}}</span>
                                        </div>
                                        <h1 class="post-title w-75">
                                            @if (App::getLocale() == 'es')
                                                <a :href="homepath + '/articulo/' + slider_post[0].url_es">@{{slider_post[0].title_es}}</a>
                                            @else
                                                <a :href="homepath + '/article/' + slider_post[0].url_en">@{{slider_post[0].title_en}}</a>
                                            @endif
                                        </h1>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-lg-6">
                            <div class="row">
        
                                <div class="col-md-6 pl-lg-1 pr-md-1 mb-2 mb-md-0">
                                    <div class="post-item medium">
                                        <div class="fbt-post-thumbnail">
                                            @if (App::getLocale() == 'es')
                                                <a :href="homepath + '/articulo/' + slider_post[1].url_es">
                                                    <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + slider_post[1].attach_reference + '/' + slider_post[1].img_thumbnail"
                                                    :src="homepath + '/images/articles/' + slider_post[1].attach_reference + '/' + slider_post[1].img_thumbnail">
                                                </a>
                                            @else
                                                <a :href="homepath + '/article/' + slider_post[1].url_en">
                                                    <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + slider_post[1].attach_reference + '/' + slider_post[1].img_thumbnail"
                                                    :src="homepath + '/images/articles/' + slider_post[1].attach_reference + '/' + slider_post[1].img_thumbnail">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="fbt-post-caption">
                                            <span v-for="category in slider_post[1].categories" class="post-tag index-post-tag">
                                                @if (App::getLocale() == 'es')
                                                    @{{category.category_es}}
                                                @else
                                                    @{{category.category_en}}
                                                @endif
                                            </span>
                                            <div class="title-caption p-4">
                                                <div class="post-meta mb-2">
                                                    <span class="post-author">
                                                        @if (App::getLocale() == 'es')
                                                            <a class="text-capitalize" :href="homepath + '/colaborador/' + slider_post[1].author.name">@{{slider_post[1].author.name}}</a>
                                                        @else
                                                            <a class="text-capitalize" :href="homepath + '/collaborator/' + slider_post[1].author.name">@{{slider_post[1].author.name}}</a>
                                                        @endif
                                                    </span>
                                                    <span class="post-time">@{{moment(slider_post[1].created_at).format('LL')}}</span>
                                                </div>
                                                <h3 class="post-title">
                                                    @if (App::getLocale() == 'es')
                                                        <a :href="homepath + '/articulo/' + slider_post[1].url_es">@{{slider_post[1].title_es}}</a>
                                                    @else
                                                        <a :href="homepath + '/article/' + slider_post[1].url_en">@{{slider_post[1].title_en}}</a>
                                                    @endif
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-6 col-md-12 pl-md-1 grid-padding-right">
                                            <div class="post-item small_thumb">
                                                <div class="fbt-post-thumbnail">
                                                    @if (App::getLocale() == 'es')
                                                        <a :href="homepath + '/articulo/' + slider_post[2].url_es">
                                                            <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + slider_post[2].attach_reference + '/' + slider_post[2].img_thumbnail"
                                                            :src="homepath + '/images/articles/' + slider_post[2].attach_reference + '/' + slider_post[2].img_thumbnail">
                                                        </a>
                                                    @else
                                                        <a :href="homepath + '/article/' + slider_post[2].url_en">
                                                            <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + slider_post[2].attach_reference + '/' + slider_post[2].img_thumbnail"
                                                            :src="homepath + '/images/articles/' + slider_post[2].attach_reference + '/' + slider_post[2].img_thumbnail">
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="fbt-post-caption">
                                                    <span v-for="category in slider_post[2].categories" class="post-tag index-post-tag">
                                                        @if (App::getLocale() == 'es')
                                                            @{{category.category_es}}
                                                        @else
                                                            @{{category.category_en}}
                                                        @endif
                                                    </span>
                                                    <div class="title-caption p-4">
                                                        <div class="post-meta mb-2">
                                                            <span class="post-author">
                                                                @if (App::getLocale() == 'es')
                                                                    <a class="text-capitalize" :href="homepath + '/colaborador/' + slider_post[2].author.name">@{{slider_post[2].author.name}}</a>
                                                                @else
                                                                    <a class="text-capitalize" :href="homepath + '/collaborator/' + slider_post[2].author.name">@{{slider_post[2].author.name}}</a>
                                                                @endif
                                                            </span>
                                                            <span class="post-time">@{{moment(slider_post[2].created_at).format('LL')}}</span>
                                                        </div>
                                                        <h3 class="post-title h5">
                                                            @if (App::getLocale() == 'es')
                                                                <a :href="homepath + '/articulo/' + slider_post[2].url_es">@{{slider_post[2].title_es}}</a>
                                                            @else
                                                                <a :href="homepath + '/article/' + slider_post[2].url_en">@{{slider_post[2].title_en}}</a>
                                                            @endif
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-12 pl-md-1 grid-padding-left">
                                            <div class="post-item small_thumb last">
                                                <div class="fbt-post-thumbnail">
                                                    @if (App::getLocale() == 'es')
                                                        <a :href="homepath + '/articulo/' + slider_post[3].url_es">
                                                            <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + slider_post[3].attach_reference + '/' + slider_post[3].img_thumbnail"
                                                            :src="homepath + '/images/articles/' + slider_post[3].attach_reference + '/' + slider_post[3].img_thumbnail">
                                                        </a>
                                                    @else
                                                        <a :href="homepath + '/article/' + slider_post[3].url_en">
                                                            <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + slider_post[3].attach_reference + '/' + slider_post[3].img_thumbnail"
                                                            :src="homepath + '/images/articles/' + slider_post[3].attach_reference + '/' + slider_post[3].img_thumbnail">
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="fbt-post-caption">
                                                    <span v-for="category in slider_post[3].categories" class="post-tag index-post-tag">
                                                        @if (App::getLocale() == 'es')
                                                            @{{category.category_es}}
                                                        @else
                                                            @{{category.category_en}}
                                                        @endif
                                                    </span>
                                                    <div class="title-caption p-4">
                                                        <div class="post-meta mb-2">
                                                            <span class="post-author">
                                                                @if (App::getLocale() == 'es')
                                                                    <a class="text-capitalize" :href="homepath + '/colaborador/' + slider_post[3].author.name">@{{slider_post[3].author.name}}</a>
                                                                @else
                                                                    <a class="text-capitalize" :href="homepath + '/collaborator/' + slider_post[3].author.name">@{{slider_post[3].author.name}}</a>
                                                                @endif
                                                            </span>
                                                            <span class="post-time">@{{moment(slider_post[3].created_at).format('LL')}}</span>
                                                        </div>
                                                        <h3 class="post-title h5">
                                                            @if (App::getLocale() == 'es')
                                                                <a :href="homepath + '/articulo/' + slider_post[3].url_es">@{{slider_post[3].title_es}}</a>
                                                            @else
                                                                <a :href="homepath + '/article/' + slider_post[3].url_en">@{{slider_post[3].title_en}}</a>
                                                            @endif
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                        </div>
        
                    </div>
                </div>
            </div>
        </div><!-- .slider-container -->
        
        <div class="outer-wrapper my-5" id="outer-wrapper">
        
            <div class="container fbt-elastic-container">
                <div class="row justify-content-center">
                    
                    <div class="fbt-magazine-section col-lg-8 mb-5 mb-lg-0">
        
                        <div class="widget fbt-block-1">
                            <div class="fbt-sep-title">
                                <h4 class="title title-heading-left">Don't Miss</h4>
                                <div class="title-sep-container">
                                    <div class="title-sep sep-double">
                                        <a href="#" class="view_more">View all</a>
                                    </div>
                                </div>
                            </div>
                            <div class="fbt_mag_block fbt_list_posts">
                                <div class="fbt-large">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-xl-6 col-md-5">
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-21.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-7">
                                            <div class="fbt-post-caption text-center p-4 p-md-0 pr-md-4">
                                                <span class="post-tag index-post-tag">Design</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    </a>
                                                </h3>
                                                <div class="post-meta mb-2">
                                                    <span class="post-author"><a href="#">fbtemplates</a></span>
                                                    <span class="post-date published">June 19, 2019</span>
                                                </div>
                                                <p class="post-excerpt">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis leo et bibendum pretium. Suspendisse ligula neque, ultrices nec interdum fauc…
                                                    
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .fbt-large-->
        
                                <div class="fbt-small">
                                    <div class="row px-2">
                                        <div class="post col-md-4 mb-4 px-2">
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-4.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                            <div class="fbt-title-caption text-center pt-3 px-2">
                                                <div class="post-meta mb-2">
                                                    <span class="post-author"><a href="#">fbtemplates</a></span>
                                                    <span class="post-date published">March 28, 2017</span>
                                                </div>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="post col-md-4 mb-4 px-2">
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-8.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                            <div class="fbt-title-caption text-center pt-3 px-2">
                                                <div class="post-meta mb-2">
                                                    <span class="post-author"><a href="#">fbtemplates</a></span>
                                                    <span class="post-date published">March 28, 2017</span>
                                                </div>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">
                                                        Sed odio eros, dictum non augue et, tincidunt.
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="post col-md-4 mb-4 px-2">
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/img-3.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                            <div class="fbt-title-caption text-center pt-3 px-2">
                                                <div class="post-meta mb-2">
                                                    <span class="post-author"><a href="#">fbtemplates</a></span>
                                                    <span class="post-date published">March 28, 2017</span>
                                                </div>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">
                                                        Nunc tellus libero, tempus id luctus eget, fermentum.
                                                    </a>
                                                </h3>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div><!-- .fbt-small -->
        
                            </div>
                        </div><!-- .fbt-block-1 -->
        
                        <div class="widget fbt-block-2">
                            <div class="fbt-sep-title">
                                <h4 class="title title-heading-left">Technology</h4>
                                <div class="title-sep-container">
                                    <div class="title-sep sep-double">
                                        <a href="#" class="view_more">View all</a>
                                    </div>
                                </div>
                            </div>
                            <div class="fbt_mag_block">
                                <div class="row">
                                    
                                    <div class="col-lg-6 fbt_list_posts">
                                        <article class="post mb-3">
                                            <div class="post-content media align-items-center">
                                                <div class="fbt-item-thumbnail clearfix">
                                                    <a href="./single_mag.html">
                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-16.jpg"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                    </a>
                                                </div>
                                                <div class="ml-3 fbt-title-caption media-body">
                                                    <span class="pp-post-tag">Tech</span>
                                                    <h3 class="post-title">
                                                        <a href="./single_mag.html"> Ne amores quidem sanctos alienos esse.</a>
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
                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-15.jpg"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                    </a>
                                                </div>
                                                <div class="ml-3 fbt-title-caption media-body">
                                                    <span class="pp-post-tag">Family</span>
                                                    <h3 class="post-title">
                                                        <a href="./single_mag.html">Mihi vero, inquit, placet agi subtilius et pressius.</a>
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
                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-14.jpg"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                    </a>
                                                </div>
                                                <div class="ml-3 fbt-title-caption media-body">
                                                    <span class="pp-post-tag">Featured</span>
                                                    <h3 class="post-title">
                                                        <a href="./single_mag.html">Suspendisse sed tortor eget justo aliquam.</a>
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
                                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-13.jpg"
                                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                    </a>
                                                </div>
                                                <div class="ml-3 fbt-title-caption media-body">
                                                    <span class="pp-post-tag">Sport</span>
                                                    <h3 class="post-title">
                                                        <a href="./single_mag.html">Nunc accumsan ex ligula, in malesuada sapien.</a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <span class="post-date published">March 28, 2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div><!-- .fbt_list_posts -->
                                    <div class="col-lg-6">
                                        <div class="post-item large">
                                        
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-20.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                            <div class="fbt-post-caption">
                                                <span class="post-tag index-post-tag">Design</span>
                                                <div class="title-caption p-4">
                                                    <div class="post-meta mb-2">
                                                        <span class="post-author"><a href="#">fbtemplates</a></span>
                                                        <span class="post-date published">June 19, 2019</span>
                                                    </div>
                                                    <h3 class="post-title">
                                                        <a href="./single_mag.html">
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        </a>
                                                    </h3>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .fbt-block-2 -->
        
                    </div><!-- .fbt-magazine-section -->
        
                    <div class="fbt-magazine-sidebar col-lg-4">
                        <div class="fbt-magazine-sidebar__content h-100 pl-lg-3">
                            
                            <div class="sidebar-block fbt-social-counter mb-5">
                                <div class="fbt-sep-title">
                                    <h4 class="title title-heading-left">Connect with Us</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double"></div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <ul class="social-list">
                                        <li class="social-item facebook fb">
                                            <a href="#">
                                                <span class="soc-ic"><i class="item-icon fa fa-facebook"></i></span>
                                                <span class="item-counter">2340</span>
                                                <span class="item-text soc-btn">Fans</span>
                                            </a>
                                        </li>
                                        <li class="social-item twitter tw">
                                            <a href="#">
                                                <span class="soc-ic"><i class="item-icon fa fa-twitter"></i></span>
                                                <span class="item-counter">3290</span>
                                                <span class="item-text soc-btn">Followers</span>
                                            </a>
                                        </li>
                                        <li class="social-item instagram instg">
                                            <a href="#">
                                                <span class="soc-ic"><i class="item-icon fa fa-instagram"></i></span>
                                                <span class="item-counter">5212</span>
                                                <span class="item-text soc-btn">Followers</span>
                                            </a>
                                        </li>
                                        <li class="social-item delicious dl">
                                            <a href="#">
                                                <span class="soc-ic"><i class="item-icon fa fa-delicious"></i></span>
                                                <span class="item-counter">214</span>
                                                <span class="item-text soc-btn">Followers</span>
                                            </a>
                                        </li>
                                        <li class="social-item foursquare fbt-foursquare">
                                            <a href="#">
                                                <span class="soc-ic"><i class="item-icon fa fa-foursquare"></i></span>
                                                <span class="item-counter">732k</span>
                                                <span class="item-text soc-btn">Friends</span>
                                            </a>
                                        </li>
                                        <li class="social-item behance fbt-behance">
                                            <a href="#">
                                                <span class="soc-ic"><i class="item-icon fa fa-behance"></i></span>
                                                <span class="item-counter">1.3m</span>
                                                <span class="item-text soc-btn">Followers</span>
                                            </a>
                                        </li>
                                    </ul><!-- .social-list -->
                                </div>
                            </div>
        
                            <div class="fbt-sticky-content sticky-top fbt-ad-block mb-5">
                                <div class="fbt_ad text-center">
                                    <span class="fbt-ad-title">
                                        Advertisement <span class="ad_block"></span>
                                    </span>
                                    <div class="widget-content">
                                        <a href="#">
                                            <img alt="Advertisement" class="lazyloaded img-fluid" data-src="./images/city-300x600.jpg"
                                                src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                        </a>
                                    </div>
                                </div>
                            </div><!-- .fbt-ad-block -->
        
                        </div>
                    </div><!-- .fbt-magazine-sidebar -->
        
                </div>
            </div>
        
            <div class="fbt-gallery mb-5">
                <div class="container fbt-elastic-container fbt-gallery-1">
                    <div class="row px-2">
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 px-2">
        
                            <div class="post-item">
                                <div class="fbt-post-thumbnail">
                                    <a href="./single_mag.html">
                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-16.jpg"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                    </a>
                                    <span class="video-icon"><i class="fa fa-play"></i></span>
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-3 px-2">
                                        <div class="post-meta mb-2">
                                            <span class="post-author">
                                                <a href="#">fbtemplates</a>
                                            </span>
                                            <span class="post-date published">June 19, 2019</span>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="./single_mag.html">
                                                Ne amores quidem sanctos alienos esse.
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 px-2">
                            
                            <div class="post-item">
                                <div class="fbt-post-thumbnail">
                                    <a href="./single_mag.html">
                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-14.jpg"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                    </a>
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-3 px-2">
                                        <div class="post-meta mb-2">
                                            <span class="post-author">
                                                <a href="#">fbtemplates</a>
                                            </span>
                                            <span class="post-date published">June 19, 2019</span>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="./single_mag.html">
                                                Mihi vero, inquit, placet agi subtilius et pressius.
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0 px-2">
                            
                            <div class="post-item">
                                <div class="fbt-post-thumbnail">
                                    <a href="./single_mag.html">
                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-15.jpg"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                    </a>
                                    <span class="video-icon"><i class="fa fa-play"></i></span>
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-3 px-2">
                                        <div class="post-meta mb-2">
                                            <span class="post-author">
                                                <a href="#">fbtemplates</a>
                                            </span>
                                            <span class="post-date published">June 19, 2019</span>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="./single_mag.html">
                                                Suspendisse sed tortor eget justo aliquam.
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                        <div class="col-lg-3 col-md-6 px-2">
                            
                            <div class="post-item">
                                <div class="fbt-post-thumbnail">
                                    <a href="./single_mag.html">
                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-13.jpg"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                    </a>
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-3 px-2">
                                        <div class="post-meta mb-2">
                                            <span class="post-author">
                                                <a href="#">fbtemplates</a>
                                            </span>
                                            <span class="post-date published">June 19, 2019</span>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="./single_mag.html">
                                                Nunc accumsan ex ligula, in malesuada.
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div><!-- .fbt-gallery -->
        
            <div class="fbt-video-gallery mb-5">
                <div class="container fbt-elastic-container fbt-gallery-2">
                    <h4 class="title title-heading h2">
                        Featured Videos
                    </h4>
                    <div class="row">
                        <div class="fbt-main-gallery col-lg-8 mb-4 mb-lg-0">
                            <div class="post-item large">
                                        
                                <div class="fbt-post-thumbnail">
                                    <a href="./single_mag.html">
                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/single-1.jpg"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                    </a>
                                    <span class="video-icon"><i class="fa fa-play"></i></span>
                                </div>
                                <div class="fbt-post-caption">
                                    <span class="post-tag index-post-tag">Movie</span>
                                    <div class="title-caption p-4">
                                        <div class="post-meta mb-2">
                                            <span class="post-author">
                                                <a href="#">fbtemplates</a>
                                            </span>
                                            <span class="post-date published">June 19, 2019</span>
                                        </div>
                                        <h3 class="post-title h1 w-75">
                                            <a href="./single_mag.html">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 fbt_list_posts">
                            <div class="post-content pl-lg-3">
                                <article class="post mb-3">
                                    <div class="post-content media align-items-center">
                                        <div class="fbt-item-thumbnail clearfix">
                                            <a href="./single_mag.html">
                                                <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-16.jpg"
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                            </a>
                                            <span class="video-icon"><i class="fa fa-play"></i></span>
                                        </div>
                                        <div class="ml-3 fbt-title-caption media-body">
                                            <span class="pp-post-tag">Tech</span>
                                            <h3 class="post-title">
                                                <a href="./single_mag.html"> Ne amores quidem sanctos alienos esse.</a>
                                            </h3>
                                        </div>
                                    </div>
                                </article>
                                <article class="post mb-3">
                                    <div class="post-content media align-items-center">
                                        <div class="fbt-item-thumbnail clearfix">
                                            <a href="./single_mag.html">
                                                <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-15.jpg"
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                            </a>
                                            <span class="video-icon"><i class="fa fa-play"></i></span>
                                        </div>
                                        <div class="ml-3 fbt-title-caption media-body">
                                            <span class="pp-post-tag">Family</span>
                                            <h3 class="post-title">
                                                <a href="./single_mag.html">Mihi vero, inquit, placet agi subtilius et pressius.</a>
                                            </h3>
                                        </div>
                                    </div>
                                </article>
                                <article class="post mb-3">
                                    <div class="post-content media align-items-center">
                                        <div class="fbt-item-thumbnail clearfix">
                                            <a href="./single_mag.html">
                                                <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-14.jpg"
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                            </a>
                                            <span class="video-icon"><i class="fa fa-play"></i></span>
                                        </div>
                                        <div class="ml-3 fbt-title-caption media-body">
                                            <span class="pp-post-tag">Featured</span>
                                            <h3 class="post-title">
                                                <a href="./single_mag.html">Suspendisse sed tortor eget justo aliquam.</a>
                                            </h3>
                                        </div>
                                    </div>
                                </article>
                                <article class="post mb-3">
                                    <div class="post-content media align-items-center">
                                        <div class="fbt-item-thumbnail clearfix">
                                            <a href="./single_mag.html">
                                                <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-13.jpg"
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                            </a>
                                            <span class="video-icon"><i class="fa fa-play"></i></span>
                                        </div>
                                        <div class="ml-3 fbt-title-caption media-body">
                                            <span class="pp-post-tag">Sport</span>
                                            <h3 class="post-title">
                                                <a href="./single_mag.html">Nunc accumsan ex ligula, in malesuada sapien.</a>
                                            </h3>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .fbt-video-gallery -->
        
            <div class="fbt-gallery mb-5">
                <div class="container fbt-elastic-container fbt-gallery-1">
                    <div class="row px-2">
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 px-2">
        
                            <div class="post-item">
                                <div class="fbt-post-thumbnail">
                                    <a href="./single_mag.html">
                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-18.jpg"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                    </a>
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-3 px-2">
                                        <div class="post-meta mb-2">
                                            <span class="post-author">
                                                <a href="#">fbtemplates</a>
                                            </span>
                                            <span class="post-date published">June 19, 2019</span>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="./single_mag.html">
                                                Ne amores quidem sanctos alienos esse.
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 px-2">
                            
                            <div class="post-item">
                                <div class="fbt-post-thumbnail">
                                    <a href="./single_mag.html">
                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-19.jpg"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                    </a>
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-3 px-2">
                                        <div class="post-meta mb-2">
                                            <span class="post-author">
                                                <a href="#">fbtemplates</a>
                                            </span>
                                            <span class="post-date published">June 19, 2019</span>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="./single_mag.html">
                                                Mihi vero, inquit, placet agi subtilius et pressius.
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0 px-2">
                            
                            <div class="post-item">
                                <div class="fbt-post-thumbnail">
                                    <a href="./single_mag.html">
                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-21.jpg"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                    </a>
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-3 px-2">
                                        <div class="post-meta mb-2">
                                            <span class="post-author">
                                                <a href="#">fbtemplates</a>
                                            </span>
                                            <span class="post-date published">June 19, 2019</span>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="./single_mag.html">
                                                Suspendisse sed tortor eget justo aliquam.
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                        <div class="col-lg-3 col-md-6 px-2">
                            
                            <div class="post-item">
                                <div class="fbt-post-thumbnail">
                                    <a href="./single_mag.html">
                                        <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-12.jpg"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                    </a>
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-3 px-2">
                                        <div class="post-meta mb-2">
                                            <span class="post-author">
                                                <a href="#">fbtemplates</a>
                                            </span>
                                            <span class="post-date published">June 19, 2019</span>
                                        </div>
                                        <h3 class="post-title">
                                            <a href="./single_mag.html">
                                                Nunc accumsan ex ligula, in malesuada.
                                            </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div><!-- .fbt-gallery -->
        
            <div class="container fbt-elastic-container mb-5">
                <div class="widget fbt-ad-block">
                    <div class="fbt_ad text-center">
                        <div class="widget-content">
                            <a href="#">
                                <img alt="" class="img-fluid lazyloaded" data-src="./images/horizontal_ad.jpg" 
                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="container fbt-elastic-container">
                <div class="row justify-content-center">
        
                    <!-- Main Wrapper -->
                    <div class="fbt-main-wrapper col-lg-8 mb-5 mb-lg-0">
        
                        <div id="main-wrapper">
                            <div class="main-section" id="main_content">
                                
                                <div class="fbt-sep-title">
                                    <h4 class="title title-heading-left">Recent posts</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double"></div>
                                    </div>
                                </div>
                                
                                <div class="blog-posts fbt-index-post-wrap">
        
                                    <div class="fbt_magazine-blog-post fbt-index-post row align-items-center justify-content-between">
                                        <div class="col-xl-6 col-md-5">
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-13.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-7">
                                            <div class="fbt-post-caption mt-3 mt-md-0">
                                                <span class="post-tag index-post-tag">Design</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    </a>
                                                </h3>
                                                <div class="post-meta mb-2">
                                                    <span class="post-author"><a href="#">fbtemplates</a></span>
                                                    <span class="post-date published">June 19, 2019</span>
                                                </div>
                                                <p class="post-excerpt">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis leo
                                                    et bibendum pretium. Suspendisse ligula neque, ultrices nec interdum fauc…
                                                </p>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="fbt_magazine-blog-post hentry fbt-index-post row align-items-center justify-content-between">
                                        <div class="col-xl-6 col-md-5">
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-14.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-7">
                                            <div class="fbt-post-caption mt-3 mt-md-0">
                                                <span class="post-tag index-post-tag">Friends</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">
                                                        Nunc tellus libero, tempus id luctus eget, fermentum.
                                                    </a>
                                                </h3>
                                                <div class="post-meta mb-2">
                                                    <span class="post-author"><a href="#">fbtemplates</a></span>
                                                    <span class="post-date published">June 05, 2019</span>
                                                </div>
                                                <p class="post-excerpt">
                                                    Donec dolor elit, pellentesque a massa pellentesque, euismod sagittis ipsum.
                                                    Nullam a diam ac turpis iaculis vulputate. Nunc tellus libero, tempus id…
                                                </p>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="fbt_magazine-blog-post hentry fbt-index-post row align-items-center justify-content-between">
                                        <div class="col-xl-6 col-md-5">
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-15.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-7">
                                            <div class="fbt-post-caption mt-3 mt-md-0">
                                                <span class="post-tag index-post-tag">Slider</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">
                                                        Nulla sed eros sit amet ipsum mattis pulvinar quis quis sem.
                                                    </a>
                                                </h3>
                                                <div class="post-meta mb-2">
                                                    <span class="post-author"><a href="#">fbtemplates</a></span>
                                                    <span class="post-date published">September 13, 2018</span>
                                                </div>
                                                <p class="post-excerpt">
                                                    Fames dictumst massa massa, qui sapien per, mauris id sed cubilia
                                                    suspendisse neque. Proin natoque consectetuer urna sed sodales, dignissim condiment…
                                                </p>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="fbt_magazine-blog-post hentry fbt-index-post row align-items-center justify-content-between">
                                        <div class="col-xl-6 col-md-5">
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-16.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                                <span class="video-icon"><i class="fa fa-play"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-7">
                                            <div class="fbt-post-caption mt-3 mt-md-0">
                                                <span class="post-tag index-post-tag">Lifestyle</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">
                                                        Lorem ipsum dolor sit amet. Custom Post Gallery.
                                                    </a>
                                                </h3>
                                                <div class="post-meta mb-2">
                                                    <span class="post-author"><a href="#">fbtemplates</a></span>
                                                    <span class="post-date published">May 25, 2018</span>
                                                </div>
                                                <p class="post-excerpt">
                                                    Phasellus deserunt. Convallis perspiciatis fusce fermentum accumsan, arcu
                                                    aliquam, velit venenatis augue proin, enim etiam dolor. Mi ac lectus vitae …
                                                </p>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="fbt_magazine-blog-post hentry fbt-index-post row align-items-center justify-content-between">
                                        <div class="col-xl-6 col-md-5">
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-17.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-7">
                                            <div class="fbt-post-caption mt-3 mt-md-0">
                                                <span class="post-tag index-post-tag">Friends</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">
                                                        Lorem ipsum sit amet, consectetur adipiscing elit.
                                                    </a>
                                                </h3>
                                                <div class="post-meta mb-2">
                                                    <span class="post-author"><a href="#">fbtemplates</a></span>
                                                    <span class="post-date published">April 02, 2017</span>
                                                </div>
                                                <p class="post-excerpt">
                                                    Phasellus deserunt. Convallis perspiciatis fusce fermentum accumsan, arcu
                                                    aliquam, velit venenatis augue proin, enim etiam dolor. Mi ac lectus vitae …
                                                </p>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="fbt_magazine-blog-post hentry fbt-index-post row align-items-center justify-content-between">
                                        <div class="col-xl-6 col-md-5">
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-18.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-7">
                                            <div class="fbt-post-caption mt-3 mt-md-0">
                                                <span class="post-tag index-post-tag">Friends</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">
                                                        Nunc accumsan ex ligula, in sapien consectetur.
                                                    </a>
                                                </h3>
                                                <div class="post-meta mb-2">
                                                    <span class="post-author"><a href="#">fbtemplates</a></span>
                                                    <span class="post-date published">March 31, 2017</span>
                                                </div>
                                                <p class="post-excerpt">
                                                    Donec dolor elit, pellentesque a massa pellentesque, euismod sagittis ipsum.
                                                    Nullam a diam ac turpis iaculis vulputate. Nunc tellus libero, tempus id…
                                                </p>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="fbt_magazine-blog-post hentry fbt-index-post row align-items-center justify-content-between">
                                        <div class="col-xl-6 col-md-5">
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-19.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-7">
                                            <div class="fbt-post-caption mt-3 mt-md-0">
                                                <span class="post-tag index-post-tag">Carousel</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    </a>
                                                </h3>
                                                <div class="post-meta mb-2">
                                                    <span class="post-author"><a href="#">fbtemplates</a></span>
                                                    <span class="post-date published">March 30, 2017</span>
                                                </div>
                                                <p class="post-excerpt">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut porttitor leo
                                                    vel nulla posuere accumsan. Suspendisse sed tortor eget justo aliquam euismod.…
                                                </p>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="fbt_magazine-blog-post hentry fbt-index-post row align-items-center justify-content-between">
                                        <div class="col-xl-6 col-md-5">
                                            <div class="fbt-post-thumbnail">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-20.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-7">
                                            <div class="fbt-post-caption mt-3 mt-md-0">
                                                <span class="post-tag index-post-tag">People</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">
                                                        Suspendisse posuere mi lacus, leo gravida eu.
                                                    </a>
                                                </h3>
                                                <div class="post-meta mb-2">
                                                    <span class="post-author"><a href="#">fbtemplates</a></span>
                                                    <span class="post-date published">March 28, 2017</span>
                                                </div>
                                                <p class="post-excerpt">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut porttitor leo
                                                    vel nulla posuere accumsan. Suspendisse sed tortor eget justo aliquam euism…
                                                </p>
                                            </div>
                                        </div>
                                    </div>
        
                                </div><!-- .fbt-index-post-wrap -->
        
                                <div class="pagenav" id="blog-pager">
                                    <span class="showpageOf">2 / 3</span>
                                    <span class="showpage firstpage">
                                        <a href="#">
                                            <i class="fa fa-angle-double-left"></i>
                                        </a>
                                    </span>
                                    <span class="showpage">
                                        <a href="#">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </span>
                                    <span class="displaypageNum">
                                        <a href="#">1</a>
                                    </span>
                                    <span class="page current">2</span>
                                    <span class="displaypageNum">
                                        <a href="#">3</a>
                                    </span>
                                    <span class="displaypageNum">
                                        <a href="#">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </span>
                                    <span class="displaypageNum lastpage">
                                        <a href="#">
                                            <i class="fa fa-angle-double-right"></i>
                                        </a>
                                    </span>
                                </div><!-- .pagenav -->
        
                            </div>
                        </div><!-- #main-wrapper -->
        
                    </div><!-- .fbt-main-wrapper -->
        
                    <div class="fbt-main-sidebar col-lg-4">
                        <div class="fbt-main-sidebar__content h-100 pl-lg-3">
        
                            <div class="widget FeaturedPost mb-5">
                                <div class="fbt-sep-title">
                                    <h4 class="title title-heading-left">Featured Post</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double"></div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div class="FeaturedPostContainer">
                                        <div class="fbt-item-thumbnail">
                                            <a class="post-image-link" href="./single_mag.html">
                                                <img alt=" " class="post-thumbnail lazyloaded" data-src="./images/mag-img-20.jpg" 
                                                    src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                            </a>
                                        </div>
                                        <div class="fbt-title-section mt-3">
                                            <div class="post-meta mb-2">
                                                <span class="post-author">fbtemplates</span>
                                                <span class="post-date published">March 08, 2017</span>
                                            </div>
                                            <h3 class="post-title">
                                                <a href="./single_mag.html">
                                                    Etiam nec enim id mi maximus consequat sed ut tortor.
                                                </a>
                                            </h3>
                                            <p class="post-excerpt">
                                                Suspendisse posuere mi lacus, vitae fringilla leo gravida eu. Donec a nisi
                                                vel ligula fringilla tem…
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="widget fbt_list_posts mb-5">
                                <div class="fbt-sep-title">
                                    <h4 class="title title-heading-left">Popular Posts</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double"></div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <article class="post mb-3">
                                        <div class="post-content media align-items-center">
                                            <div class="fbt-item-thumbnail clearfix">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/thumb-1.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                            <div class="ml-3 fbt-title-caption media-body">
                                                <span class="pp-post-tag">Lifestyle</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">Sed odio eros, dictum non augue et, tincidunt.</a>
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
                                                <span class="pp-post-tag">Technology</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html"> Ne amores quidem sanctos alienos esse.</a>
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
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/thumb-3.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                            <div class="ml-3 fbt-title-caption media-body">
                                                <span class="pp-post-tag">Featured</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">Suspendisse sed tortor eget justo aliquam euismod.</a>
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
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/thumb-4.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                            <div class="ml-3 fbt-title-caption media-body">
                                                <span class="pp-post-tag">Sport</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">Nunc accumsan ex ligula, in malesuada sapien.</a>
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
                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/thumb-5.jpg"
                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                </a>
                                            </div>
                                            <div class="ml-3 fbt-title-caption media-body">
                                                <span class="pp-post-tag">Family</span>
                                                <h3 class="post-title">
                                                    <a href="./single_mag.html">Mihi vero, inquit, placet agi subtilius et pressius.</a>
                                                </h3>
                                                <div class="post-meta">
                                                    <span class="post-date published">March 27, 2017</span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div><!-- .fbt_list_posts -->
        
                            <div class="widget fbt-sticky-content sticky-top fbt-ad-block">
                                <div class="fbt_ad text-center">
                                    <span class="fbt-ad-title">
                                        Advertisement <span class="ad_block"></span>
                                    </span>
                                    <div class="widget-content">
                                        <a href="#">
                                            <img alt="Advertisement" class="lazyloaded img-fluid" data-src="./images/ad-300x600.jpg"
                                                src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                        </a>
                                    </div>
                                </div>
                            </div><!-- .fbt-ad-block -->
        
                        </div>    
                    </div><!-- .fbt-main-sidebar -->
        
                    <!-- Sidebar Wrapper -->
                    <div class="sidebar-wrapper" id="sidebar-wrapper">
                        <div class="sidebar-wrapper__content">
                            <div class="navigation-container clearfix">
                                <span class="closebtn" onclick="closeNav()">×</span>
                            </div>
                            <div class="sidebar-top section" id="menu_sidebar">
                                <div class="widget LinkList mt-0">
                                    <div class="widget-content fbt-sidebar--menu">
                                        <ul class="list-group">
                                            <li class="list-group-item"><a href="/">HOME</a></li>
                                            <li class="list-group-item"><a href="#">ABOUT</a></li>
                                            <li class="list-group-item"><a href="#">SERVICES</a></li>
                                            <li class="list-group-item"><a href="#">CONTACT</a></li>
                                            <li class="list-group-item"><a href="#">PRIVACY</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar section" id="main_sidebar">
                                <div class="widget Label">
        
                                    <div class="fbt-sep-title">
                                        <h4 class="title title-heading-left">Categories</h4>
                                        <div class="title-sep-container">
                                            <div class="title-sep sep-double"></div>
                                        </div>
                                    </div>
        
                                    <div class="widget-content cloud-label--widget-content">
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Business</span></a>
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Carousel</span></a>
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Design</span></a>
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Entertainment</span></a>
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Featured</span></a>
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Friends</span></a>
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Home</span></a>
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Lifestyle</span></a>
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">People</span></a>
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Slider</span></a>
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Sport</span></a>
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Technology</span></a>
                                        <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Training</span></a>
                                    </div>
                                </div>
                                <div class="widget BlogArchive">
                                    <div class="fbt-sep-title">
                                        <h4 class="title title-heading-left">Archive</h4>
                                        <div class="title-sep-container">
                                            <div class="title-sep sep-double"></div>
                                        </div>
                                    </div>
                                    <div class="widget-content">
                                        <div id="ArchiveList">
                                            <div id="BlogArchive1_ArchiveList">
                                                <ul class="flat list-unstyled">
                                                    <li class="archivedate">
                                                        <a href="#">June<span class="post-count float-right badge badge-primary">2</span></a>
                                                    </li>
                                                    <li class="archivedate">
                                                        <a href="#">September<span class="post-count float-right badge badge-primary">1</span></a>
                                                    </li>
                                                    <li class="archivedate">
                                                        <a href="#">May<span class="post-count float-right badge badge-primary">1</span></a>
                                                    </li>
                                                    <li class="archivedate">
                                                        <a href="#">April<span class="post-count float-right badge badge-primary">1</span></a>
                                                    </li>
                                                    <li class="archivedate">
                                                        <a href="#">March<span class="post-count float-right badge badge-primary">26</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div><!-- #sidebar-wrapper -->
                </div>
            </div>
        </div><!-- .outer-wrapper -->
        
        
    </main>
@endsection
@section('scripts')
    <script>
        var slider_post = {!! json_encode($slider_post) !!};
        
    </script>
    <script src="{{asset('/js/custom/general/index.js')}}"></script>
@endsection