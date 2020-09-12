@extends('layouts.main')
@section('title'){{__('Home')}}@endsection
@section('styles')
    <style>
        .video-image{
            background: #ffffff !important;
            border-radius: 4px;
        }

        .coming-soon-title{
            font-size: 3em;
        }

        .audio-icon {
            background: #ffffff;
            color: black;
            height: 35px;
            width: 35px;
            display: inline-block;
            border-radius: 100%;
            font-size: 15px;
        }

        .other_pictures{
            box-shadow: -2px 2px 8px -1px #777777;
        }

        @media only screen and (max-width: 600px) {
            .coming-soon-title{
                font-size: 2em;
            }
        }
    </style>
@endsection
@section('content')
    <main>
        <div class="slider-container m-0 pt-5 pb-0">
            <div class="slider-container-row fbt-mag-slider" id="slider-posts">
                <div class="container-fluid px-xl-5">
                    <div class="row" v-if="slider_post.length == 4">
        
                        <div v-for="main_slider_post in slider_post.slice(0,1)" class="col-lg-6 pr-lg-1 mb-2 mb-lg-0">
                            <div class="post-item large">
                                <div class="fbt-post-thumbnail">
                                    @if (App::getLocale() == 'es')
                                        <a :href="homepath + '/articulo/' + main_slider_post.url_es">
                                            <img class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + main_slider_post.attach_reference + '/' + main_slider_post.img_thumbnail"
                                            :src="homepath + '/images/articles/' + main_slider_post.attach_reference + '/' + main_slider_post.img_thumbnail">
                                        </a>
                                    @else
                                        <a :href="homepath + '/article/' + main_slider_post.url_en">
                                            <img class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + main_slider_post.attach_reference + '/' + main_slider_post.img_thumbnail"
                                            :src="homepath + '/images/articles/' + main_slider_post.attach_reference + '/' + main_slider_post.img_thumbnail">
                                        </a>
                                    @endif
                                </div>
                                <div class="fbt-post-caption">
                                    <span v-for="category in main_slider_post.categories" class="post-tag index-post-tag">
                                        @if (App::getLocale() == 'es')
                                            @{{category.category_es}}
                                        @else
                                            @{{category.category_en}}
                                        @endif
                                    </span>
                                    <div class="title-caption p-4">
                                        <div class="post-meta mb-2">
                                            <span class="post-author" v-for="author in main_slider_post.authors">
                                                @if (App::getLocale() == 'es')
                                                    <a class="text-capitalize" :href="homepath + '/colaborador/' + author.name">@{{author.name}}</a>
                                                @else
                                                    <a class="text-capitalize" :href="homepath + '/collaborator/' + author.name">@{{author.name}}</a>
                                                @endif
                                            </span>
                                            <span class="post-time">@{{moment(main_slider_post.created_at).format('LL')}}</span>
                                        </div>
                                        <h1 class="post-title w-75">
                                            @if (App::getLocale() == 'es')
                                                <a :href="homepath + '/articulo/' + main_slider_post.url_es">@{{main_slider_post.title_es}}</a>
                                            @else
                                                <a :href="homepath + '/article/' + main_slider_post.url_en">@{{main_slider_post.title_en}}</a>
                                            @endif
                                        </h1>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-lg-6">
                            <div class="row">
                                <div v-for="middle_slider_post in slider_post.slice(1,2)" class="col-md-6 pl-lg-1 pr-md-1 mb-2 mb-md-0">
                                    <div class="post-item medium">
                                        <div class="fbt-post-thumbnail">
                                            @if (App::getLocale() == 'es')
                                                <a :href="homepath + '/articulo/' + middle_slider_post.url_es">
                                                    <img class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + middle_slider_post.attach_reference + '/' + middle_slider_post.img_thumbnail"
                                                    :src="homepath + '/images/articles/' + middle_slider_post.attach_reference + '/' + middle_slider_post.img_thumbnail">
                                                </a>
                                            @else
                                                <a :href="homepath + '/article/' + middle_slider_post.url_en">
                                                    <img class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + middle_slider_post.attach_reference + '/' + middle_slider_post.img_thumbnail"
                                                    :src="homepath + '/images/articles/' + middle_slider_post.attach_reference + '/' + middle_slider_post.img_thumbnail">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="fbt-post-caption">
                                            <span v-for="category in middle_slider_post.categories" class="post-tag index-post-tag">
                                                @if (App::getLocale() == 'es')
                                                    @{{category.category_es}}
                                                @else
                                                    @{{category.category_en}}
                                                @endif
                                            </span>
                                            <div class="title-caption p-4">
                                                <div class="post-meta mb-2">
                                                    <span class="post-author" v-for="author in middle_slider_post.authors">
                                                        @if (App::getLocale() == 'es')
                                                            <a class="text-capitalize" :href="homepath + '/colaborador/' + author.name">@{{author.name}}</a>
                                                        @else
                                                            <a class="text-capitalize" :href="homepath + '/collaborator/' + author.name">@{{author.name}}</a>
                                                        @endif
                                                    </span>
                                                    <span class="post-time">@{{moment(middle_slider_post.created_at).format('LL')}}</span>
                                                </div>
                                                <h3 class="post-title">
                                                    @if (App::getLocale() == 'es')
                                                        <a :href="homepath + '/articulo/' + middle_slider_post.url_es">@{{middle_slider_post.title_es}}</a>
                                                    @else
                                                        <a :href="homepath + '/article/' + middle_slider_post.url_en">@{{middle_slider_post.title_en}}</a>
                                                    @endif
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-md-6">
                                    <div class="row">
                                        <div v-for="small_slider_post in slider_post.slice(2)" class="col-md-12 pl-md-1 ">
                                            <div class="post-item small_thumb">
                                                <div class="fbt-post-thumbnail">
                                                    @if (App::getLocale() == 'es')
                                                        <a :href="homepath + '/articulo/' + small_slider_post.url_es">
                                                            <img class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + small_slider_post.attach_reference + '/' + small_slider_post.img_thumbnail"
                                                            :src="homepath + '/images/articles/' + small_slider_post.attach_reference + '/' + small_slider_post.img_thumbnail">
                                                        </a>
                                                    @else
                                                        <a :href="homepath + '/article/' + small_slider_post.url_en">
                                                            <img class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + small_slider_post.attach_reference + '/' + small_slider_post.img_thumbnail"
                                                            :src="homepath + '/images/articles/' + small_slider_post.attach_reference + '/' + small_slider_post.img_thumbnail">
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="fbt-post-caption">
                                                    <span v-for="category in small_slider_post.categories" class="post-tag index-post-tag">
                                                        @if (App::getLocale() == 'es')
                                                            @{{category.category_es}}
                                                        @else
                                                            @{{category.category_en}}
                                                        @endif
                                                    </span>
                                                    <div class="title-caption p-4">
                                                        <div class="post-meta mb-2">
                                                            <span class="post-author" v-for="author in small_slider_post.authors">
                                                                @if (App::getLocale() == 'es')
                                                                    <a class="text-capitalize" :href="homepath + '/colaborador/' + author.name">@{{author.name}}</a>
                                                                @else
                                                                    <a class="text-capitalize" :href="homepath + '/collaborator/' + author.name">@{{author.name}}</a>
                                                                @endif
                                                            </span>
                                                            <span class="post-time">@{{moment(small_slider_post.created_at).format('LL')}}</span>
                                                        </div>
                                                        <h3 class="post-title h5">
                                                            @if (App::getLocale() == 'es')
                                                                <a :href="homepath + '/articulo/' + small_slider_post.url_es">@{{small_slider_post.title_es}}</a>
                                                            @else
                                                                <a :href="homepath + '/article/' + small_slider_post.url_en">@{{small_slider_post.title_en}}</a>
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
                                <h4 class="title title-heading-left">{{__('Don\'t Miss')}}</h4>
                                <div class="title-sep-container">
                                    <div class="title-sep sep-double">
                                        {{-- <a href="#" class="view_more">View all</a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="fbt_mag_block fbt_list_posts">
                                <div class="fbt-large" v-for="dont_miss_item in dont_miss.slice(0,1)">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-xl-6 col-md-5">
                                            <div class="fbt-post-thumbnail">
                                                @if (App::getLocale() == 'es')
                                                    <a :href="homepath + '/articulo/' + dont_miss_item.url_es">
                                                        <img alt="" class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail"
                                                        :src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail">
                                                    </a>
                                                @else
                                                    <a :href="homepath + '/articulo/' + dont_miss_item.url_en">
                                                        <img alt="" class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail"
                                                        :src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail">
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-7">
                                            <div class="fbt-post-caption text-center p-4 p-md-0 pr-md-4">
                                                <span v-for="category in dont_miss_item.categories" class="post-tag index-post-tag">
                                                    @if (App::getLocale() == 'es')
                                                        @{{category.category_es}}
                                                    @else
                                                        @{{category.category_en}}
                                                    @endif
                                                </span>
                                                <h3 class="post-title">
                                                    @if (App::getLocale() == 'es')
                                                        <a :href="homepath + '/articulo/' + dont_miss_item.url_es">
                                                            @{{dont_miss_item.title_es}}
                                                        </a>
                                                    @else
                                                        <a :href="homepath + '/articulo/' + dont_miss_item.url_en">
                                                            @{{dont_miss_item.title_es}}
                                                        </a>
                                                    @endif
                                                </h3>
                                                <div class="post-meta mb-2 " >
                                                    <span class="post-author" v-for="author in dont_miss_item.authors">
                                                        @if (App::getLocale() == 'es')
                                                            <a class="text-capitalize" :href="homepath + '/colaborador/' + author.name">@{{author.name}}</a>
                                                        @else
                                                            <a class="text-capitalize" :href="homepath + '/collaborator/' + author.name">@{{author.name}}</a>
                                                        @endif
                                                    </span>
                                                    <span class="post-date published">@{{moment(dont_miss_item.created_at).format('LL')}}</span>
                                                </div>
                                                <p class="post-excerpt">
                                                    @if (App::getLocale() == 'es')
                                                        @{{dont_miss_item.short_description_es}}
                                                    @else
                                                        @{{dont_miss_item.short_description_en}}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .fbt-large-->
        
                                <div class="fbt-small">
                                    <div class="row px-2">
                                        <div v-for="dont_miss_item in dont_miss.slice(1)" class="post col-md-4 mb-4 px-2">
                                            <div class="fbt-post-thumbnail">
                                                @if (App::getLocale() == 'es')
                                                    <a :href="homepath + '/articulo/' + dont_miss_item.url_es">
                                                        <img alt="" class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail"
                                                        :src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail">
                                                    </a>
                                                @else
                                                    <a :href="homepath + '/articulo/' + dont_miss_item.url_en">
                                                        <img alt="" class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail"
                                                        :src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="fbt-title-caption text-center pt-3 px-2">
                                                <div class="post-meta mb-2 ">
                                                    <span class="post-author" v-for="author in dont_miss_item.authors">
                                                        @if (App::getLocale() == 'es')
                                                            <a class="text-capitalize" :href="homepath + '/colaborador/' + author.name">@{{author.name}}</a>
                                                        @else
                                                            <a class="text-capitalize" :href="homepath + '/collaborator/' + author.name">@{{author.name}}</a>
                                                        @endif
                                                    </span>
                                                    <span class="post-date published">@{{moment(dont_miss_item.created_at).format('LL')}}</span>
                                                </div>
                                                <h3 class="post-title">
                                                    @if (App::getLocale() == 'es')
                                                        <a :href="homepath + '/articulo/' + dont_miss_item.url_es">
                                                            @{{dont_miss_item.title_es}}
                                                        </a>
                                                    @else
                                                        <a :href="homepath + '/articulo/' + dont_miss_item.url_en">
                                                            @{{dont_miss_item.title_es}}
                                                        </a>
                                                    @endif
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .fbt-small -->
        
                            </div>
                        </div><!-- .fbt-block-1 -->
        
                        {{-- <div class="widget fbt-block-2 mb-0">
                            <div class="fbt-sep-title">
                                <h4 class="title title-heading-left text-white">Podcasts</h4>
                                <div class="title-sep-container">
                                    <div class="title-sep sep-double">
                                        <a href="#" class="view_more bree text-white">View all</a>
                                    </div>
                                </div>
                            </div>
                            <div class="fbt_mag_block">
                                <div class="row">
                                    
                                    <div class="col-lg-12 fbt_list_posts">
                                        <article class="post mb-3 p-2 rounded" style="box-shadow: rgb(255 255 255) -1px 1px 0px 0px">
                                            <div class="post-contentalign-items-center">
                                                <div class="mb-2 fbt-title-caption media-body">
                                                    <h3 class="post-title">
                                                        <a href="./single_mag.html" class="text-white"> Ne amores quidem sanctos alienos esse.</a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <span class="post-date published  text-white">March 27, 2017</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <hr class="mb-2" style="height: 1px;background: white;border-radius: 50px;">
                                                </div>
                                                <div class="clearfix d-flex">
                                                    <span class="video-icon" style="position: initial"><i class="fa fa-play"></i></span>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="post mb-3 p-2 rounded" style="box-shadow: rgb(255 255 255) -1px 1px 0px 0px">
                                            <div class="post-contentalign-items-center">
                                                <div class="mb-2 fbt-title-caption media-body">
                                                    <h3 class="post-title">
                                                        <a href="./single_mag.html" class="text-white">Mihi vero, inquit, placet agi subtilius et pressius.</a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <span class="post-date published  text-white">March 27, 2017</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="text-right">
                                                        <span class=" mr-1 text-white">Playing now</span>
                                                    </div>
                                                    <hr class="mb-2 mt-0" style="height: 1px; background: white; border-radius: 50px;">
                                                </div>
                                                
                                                <div class="clearfix d-flex">
                                                    <span class="video-icon" style="position: initial"><i class="fa fa-pause  ml-0"></i></span>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="post mb-3 p-2 rounded" style="box-shadow: rgb(255 255 255) -1px 1px 0px 0px">
                                            <div class="post-contentalign-items-center">
                                                <div class="mb-2 fbt-title-caption media-body">
                                                    <h3 class="post-title">
                                                        <a href="./single_mag.html" class="text-white">Suspendisse sed tortor eget justo aliquam.</a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <span class="post-date published  text-white">March 28, 2017</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <hr class="mb-2" style="height: 1px;background: white;border-radius: 50px;">
                                                </div>
                                                <div class="clearfix d-flex">
                                                    <span class="video-icon" style="position: initial"><i class="fa fa-play"></i></span>
                                                </div>
                                            </div>
                                        </article>
                                        <article class="post mb-3 p-2 rounded" style="box-shadow: rgb(255 255 255) -1px 1px 0px 0px">
                                            <div class="post-contentalign-items-center">
                                                <div class="mb-2 fbt-title-caption media-body">
                                                    <h3 class="post-title">
                                                        <a href="./single_mag.html" class="text-white">Nunc accumsan ex ligula, in malesuada sapien.</a>
                                                    </h3>
                                                    <div class="post-meta">
                                                        <span class="post-date published  text-white">March 28, 2017</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <hr class="mb-2" style="height: 1px;background: white;border-radius: 50px;">
                                                </div>
                                                <div class="clearfix d-flex">
                                                    <span class="video-icon" style="position: initial"><i class="fa fa-play"></i></span>
                                                </div>
                                            </div>
                                        </article>
                                     </div><!-- .fbt_list_posts -->
                                    <div class="col-lg-6 d-none d-md-inline-block">
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
                        </div><!-- .fbt-block-2 --> --}}
                        {{-- <div style="position: relative;width: 100%;background: black;" class="p-3 mb-5 rounded">
                            <div class="cover-soon rounded" style="z-index: 10;width: 100%;height: 100%;position: absolute;top: 0;left: 0;background: #000000eb;">
                            <div class="cover-soon rounded" style="z-index: 10;width: 100%;height: 100%;position: absolute;left: 0;background: #000000eb;">
                                <div class="container mt-4">
                                    <span class="border-bottom d-inline-block  text-white coming-soon-title">{{__('Podcasts Coming Soon')}}</span>
                                </div>
                            </div>
                        </div> --}}
        
                    </div><!-- .fbt-magazine-section -->
        
                    <div class="fbt-magazine-sidebar col-lg-4">
                        <div class="fbt-magazine-sidebar__content h-100 pl-lg-3">
                            
                            {{-- <div class="sidebar-block fbt-social-counter mb-5">
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
                            </div> --}}
        
                            <div class="fbt-sticky-content sticky-top fbt-ad-block mb-5">
                                <div class="fbt_ad text-center">
                                    <span class="fbt-ad-title">
                                        {{__('Advertisement')}} <span class="ad_block"></span>
                                    </span>
                                    <div class="widget-content px-3">
                                        <a href="#">
                                            <img alt="Advertisement" class="lazyloaded img-fluid" data-src="{{asset('/images/ad-300x600.jpg')}}"
                                                src="{{asset('/images/ad-300x600.jpg')}}">
                                        </a>
                                    </div>
                                </div>
                            </div><!-- .fbt-ad-block -->
        
                        </div>
                    </div><!-- .fbt-magazine-sidebar -->
        
                </div>
            </div>
        
            {{-- <div class="fbt-gallery mb-5">
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
            </div><!-- .fbt-gallery --> --}}
        
            {{-- <div class="mb-5" style="position: relative;width: 100%;height: 100%;">
                <div class="fbt-video-gallery" style="width: 100%;height: 100%;top: 0;left: 0;">
                    <div class="container fbt-elastic-container fbt-gallery-2">
                        <h4 class="title title-heading h2">
                            {{__('VIDEOS')}}
                        </h4>
                        <div class="row">
                            <div class="fbt-main-gallery col-lg-8 mb-4 mb-lg-0 d-none d-md-inline-block">
                                <div class="post-item large video-image">
                                            
                                    <div class="fbt-post-thumbnail">
                                        <a href="./single_mag.html">
                                            <img alt="" class="post-thumbnail lazyloaded rounded " data-src=""
                                                src="">
                                        </a>
                                        <span class="video-icon"><i class="fa fa-play"></i></span>
                                    </div>
                                    <div class="fbt-post-caption">
                                        <span class="post-tag index-post-tag">Movie</span>
                                        <div class="title-caption p-4">
                                            <div class="post-meta mb-2 ">
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
                                            <div class="fbt-item-thumbnail clearfix video-image">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded rounded video-image" data-src=""
                                                        src="">
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
                                            <div class="fbt-item-thumbnail clearfix video-image">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded rounded video-image" data-src=""
                                                        src="">
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
                                            <div class="fbt-item-thumbnail clearfix video-image">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded rounded video-image" data-src=""
                                                        src="">
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
                                            <div class="fbt-item-thumbnail clearfix video-image">
                                                <a href="./single_mag.html">
                                                    <img alt="" class="post-thumbnail lazyloaded rounded video-image" data-src=""
                                                        src="">
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
                <div class="cover-soon" style="z-index: 10;width: 100%;height: 100%;position: absolute;top: 0;left: 0;background: #000000eb;">
                    <div class="container mt-4">
                        <span class="border-bottom d-inline-block  text-white coming-soon-title">{{__('Videos Coming Soon')}}</span>
                    </div>
                </div>
            </div> --}}
        
            {{-- <div class="fbt-gallery mb-5">
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
            </div><!-- .fbt-gallery --> --}}
        
            <div class="container fbt-elastic-container mb-5">
                <div class="widget fbt-ad-block">
                    <div class="fbt_ad text-center">
                        <div class="widget-content">
                            <a href="#">
                                <img alt="" class="img-fluid lazyloaded other_pictures" data-src="./images/horizontal_ad.jpg" 
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
                                    <h4 class="title title-heading-left">{{__('Recent posts')}}</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double"></div>
                                    </div>
                                </div>
                                
                                <div class="blog-posts fbt-index-post-wrap">
        
                                    <div v-for="article in recent_posts_pagination.data" class="fbt_magazine-blog-post fbt-index-post row align-items-center justify-content-between">
                                        <div class="col-xl-6 col-md-5">
                                            <div class="fbt-post-thumbnail">
                                                @if (App::getLocale() == 'es')
                                                    <a :href="homepath + '/articulo/' + article.url_es">
                                                        <img alt="" class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail"
                                                        :src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail">
                                                    </a>
                                                @else
                                                    <a :href="homepath + '/articulo/' + article.url_en">
                                                        <img alt="" class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail"
                                                        :src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail">
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-7">
                                            <div class="fbt-post-caption mt-3 mt-md-0">
                                                <span v-for="category in article.categories" class="post-tag index-post-tag">
                                                    @if (App::getLocale() == 'es')
                                                        @{{category.category_es}}
                                                    @else
                                                        @{{category.category_en}}
                                                    @endif
                                                </span>
                                                <h3 class="post-title">
                                                    @if (App::getLocale() == 'es')
                                                        <a :href="homepath + '/articulo/' + article.url_es">
                                                            @{{article.title_es}}
                                                        </a>
                                                    @else
                                                        <a :href="homepath + '/articulo/' + article.url_en">
                                                            @{{article.title_es}}
                                                        </a>
                                                    @endif
                                                </h3>
                                                <div class="post-meta mb-2 ">
                                                    <span class="post-author" v-for="author in article.authors">
                                                        @if (App::getLocale() == 'es')
                                                            <a class="text-capitalize" :href="homepath + '/colaborador/' + author.name">@{{author.name}}</a>
                                                        @else
                                                            <a class="text-capitalize" :href="homepath + '/collaborator/' + author.name">@{{author.name}}</a>
                                                        @endif
                                                    </span>
                                                    <span class="post-date published">@{{moment(article.created_at).format('LL')}}</span>
                                                </div>
                                                <p class="post-excerpt">
                                                    @if (App::getLocale() == 'es')
                                                        @{{article.short_description_es}}
                                                    @else
                                                        @{{article.short_description_en}}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
        
                                </div><!-- .fbt-index-post-wrap -->
        
                                <div class="pagenav" id="blog-pager">
                                    <span class="showpageOf">@{{recent_posts_pagination.current_page}} / @{{recent_posts_pagination.last_page}}</span>
                                    <span class="showpage firstpage">
                                        <a v-if="recent_posts_pagination.prev_page_url != null" :href="recent_posts_pagination.first_page_url">
                                            <i class="fa fa-angle-double-left"></i>
                                        </a>
                                        <a v-else class="current">
                                            <i class="fa fa-angle-double-left"></i>
                                        </a>
                                    </span>
                                    <span class="showpage">
                                        <a class="" :disabled="recent_posts_pagination.prev_page_url == null" :class="[recent_posts_pagination.prev_page_url == null ? 'current' : '']" :href="recent_posts_pagination.prev_page_url">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </span>

                                    <span v-for="index in 1, recent_posts_pagination.last_page" class="displaypageNum" :class="[index != recent_posts_pagination.last_page ? 'mr-1' : '']">
                                        <a class="" v-if="index != recent_posts_pagination.current_page" :href="homepath + '/?page=' + index">@{{index}}</a>
                                        <a class=" page current" v-else>@{{index}}</a>
                                    </span>
                                    
                                    <span class="displaypageNum">
                                        <a :disabled="recent_posts_pagination.next_page_url == null" :class="[recent_posts_pagination.next_page_url == null ? 'current' : '']" :href="recent_posts_pagination.next_page_url">
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </span>
                                    <span class="displaypageNum lastpage">
                                        <a v-if="recent_posts_pagination.next_page_url != null" :href="recent_posts_pagination.last_page_url" >
                                            <i class="fa fa-angle-double-right"></i>
                                        </a>
                                        <a v-else class="current" >
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
                                    <h4 class="title title-heading-left">{{__('Featured Post')}}</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double"></div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div class="FeaturedPostContainer">
                                        <div class="fbt-item-thumbnail">
                                            @if (App::getLocale() == 'es')
                                                <a class="post-image-link" :href="homepath + '/articulo/' + featured_post.url_es">
                                                    <img alt="" class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + featured_post.attach_reference + '/' + featured_post.img_thumbnail"
                                                    :src="homepath + '/images/articles/' + featured_post.attach_reference + '/' + featured_post.img_thumbnail">
                                                </a>
                                            @else
                                                <a class="post-image-link" :href="homepath + '/articulo/' + featured_post.url_en">
                                                    <img alt="" class="post-thumbnail lazyloaded other_pictures" :data-src="homepath + '/images/articles/' + featured_post.attach_reference + '/' + featured_post.img_thumbnail"
                                                    :src="homepath + '/images/articles/' + article.attach_reference + '/' + featured_post.img_thumbnail">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="fbt-title-section mt-3">
                                            <div class="post-meta mb-2 ">
                                                <span v-for="author in featured_post.authors" class="post-author text-capitalize">
                                                    @{{author.name}}
                                                </span>
                                                <span class="post-date published">@{{moment(featured_post.created_at).format('LL')}}</span>
                                            </div>
                                            <h3 class="post-title">
                                                @if (App::getLocale() == 'es')
                                                    <a :href="homepath + '/articulo/' + featured_post.url_es">@{{featured_post.title_es}}</a>
                                                @else
                                                    <a :href="homepath + '/article/' + featured_post.url_en">@{{featured_post.title_en}}</a>
                                                @endif
                                            </h3>
                                            <p class="post-excerpt ">
                                                @if (App::getLocale() == 'es')
                                                    @{{featured_post.short_description_es}}
                                                @else
                                                    @{{featured_post.short_description_en}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            {{-- <div class="widget fbt_list_posts mb-5">
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
                            </div><!-- .fbt_list_posts --> --}}
        
                            <div class="widget fbt-sticky-content sticky-top fbt-ad-block">
                                <div class="fbt_ad text-center">
                                    <span class="fbt-ad-title">
                                        {{__('Advertisement')}} <span class="ad_block"></span>
                                    </span>
                                    <div class="widget-content px-3">
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
        var dont_miss = {!! json_encode($dont_miss) !!};
        var recent_posts_pagination = {!! json_encode($recent_posts_pagination) !!};
        var featured_post = {!! json_encode($featured_post) !!};
        
        
    </script>
    <script src="{{asset('/js/custom/general/index.js')}}"></script>
@endsection