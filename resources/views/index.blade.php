@extends('layouts.main')
@section('title', 'Home')
@section('styles')
    <style>
        .video-image{
            background: #ffffff !important;
            border-radius: 4px;
        }

        .coming-soon-title{
            font-size: 3em;
        }

        .slider-container .post-meta{
            font-family: 'Merriweather', serif;
        }

        .audio-icon {
            background: #6d6d6d;
            color: white;
            height: 35px;
            width: 35px;
            display: inline-block;
            border-radius: 100%;
            font-size: 15px;
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
                                            <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + main_slider_post.attach_reference + '/' + main_slider_post.img_thumbnail"
                                            :src="homepath + '/images/articles/' + main_slider_post.attach_reference + '/' + main_slider_post.img_thumbnail">
                                        </a>
                                    @else
                                        <a :href="homepath + '/article/' + main_slider_post.url_en">
                                            <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + main_slider_post.attach_reference + '/' + main_slider_post.img_thumbnail"
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
                                            <span class="post-author">
                                                @if (App::getLocale() == 'es')
                                                    <a class="text-capitalize" :href="homepath + '/colaborador/' + main_slider_post.author.name">@{{main_slider_post.author.name}}</a>
                                                @else
                                                    <a class="text-capitalize" :href="homepath + '/collaborator/' + main_slider_post.author.name">@{{main_slider_post.author.name}}</a>
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
                                                    <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + middle_slider_post.attach_reference + '/' + middle_slider_post.img_thumbnail"
                                                    :src="homepath + '/images/articles/' + middle_slider_post.attach_reference + '/' + middle_slider_post.img_thumbnail">
                                                </a>
                                            @else
                                                <a :href="homepath + '/article/' + middle_slider_post.url_en">
                                                    <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + middle_slider_post.attach_reference + '/' + middle_slider_post.img_thumbnail"
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
                                                    <span class="post-author">
                                                        @if (App::getLocale() == 'es')
                                                            <a class="text-capitalize" :href="homepath + '/colaborador/' + middle_slider_post.author.name">@{{middle_slider_post.author.name}}</a>
                                                        @else
                                                            <a class="text-capitalize" :href="homepath + '/collaborator/' + middle_slider_post.author.name">@{{middle_slider_post.author.name}}</a>
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
                                        <div v-for="small_slider_post in slider_post.slice(2)" class="col-6 col-md-12 pl-md-1 grid-padding-right">
                                            <div class="post-item small_thumb">
                                                <div class="fbt-post-thumbnail">
                                                    @if (App::getLocale() == 'es')
                                                        <a :href="homepath + '/articulo/' + small_slider_post.url_es">
                                                            <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + small_slider_post.attach_reference + '/' + small_slider_post.img_thumbnail"
                                                            :src="homepath + '/images/articles/' + small_slider_post.attach_reference + '/' + small_slider_post.img_thumbnail">
                                                        </a>
                                                    @else
                                                        <a :href="homepath + '/article/' + small_slider_post.url_en">
                                                            <img class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + small_slider_post.attach_reference + '/' + small_slider_post.img_thumbnail"
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
                                                            <span class="post-author">
                                                                @if (App::getLocale() == 'es')
                                                                    <a class="text-capitalize" :href="homepath + '/colaborador/' + small_slider_post.author.name">@{{small_slider_post.author.name}}</a>
                                                                @else
                                                                    <a class="text-capitalize" :href="homepath + '/collaborator/' + small_slider_post.author.name">@{{small_slider_post.author.name}}</a>
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
                                                        <img alt="" class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail"
                                                        :src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail">
                                                    </a>
                                                @else
                                                    <a :href="homepath + '/articulo/' + dont_miss_item.url_en">
                                                        <img alt="" class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail"
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
                                                <div class="post-meta mb-2 merriweather">
                                                    <span class="post-author">
                                                        @if (App::getLocale() == 'es')
                                                            <a class="text-capitalize" :href="homepath + '/colaborador/' + dont_miss_item.author.name">@{{dont_miss_item.author.name}}</a>
                                                        @else
                                                            <a class="text-capitalize" :href="homepath + '/collaborator/' + dont_miss_item.author.name">@{{dont_miss_item.author.name}}</a>
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
                                                        <img alt="" class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail"
                                                        :src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail">
                                                    </a>
                                                @else
                                                    <a :href="homepath + '/articulo/' + dont_miss_item.url_en">
                                                        <img alt="" class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail"
                                                        :src="homepath + '/images/articles/' + dont_miss_item.attach_reference + '/' + dont_miss_item.img_thumbnail">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="fbt-title-caption text-center pt-3 px-2">
                                                <div class="post-meta mb-2 merriweather">
                                                    <span class="post-author">
                                                        @if (App::getLocale() == 'es')
                                                            <a class="text-capitalize" :href="homepath + '/colaborador/' + dont_miss_item.author.name">@{{dont_miss_item.author.name}}</a>
                                                        @else
                                                            <a class="text-capitalize" :href="homepath + '/collaborator/' + dont_miss_item.author.name">@{{dont_miss_item.author.name}}</a>
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
        
                        <div style="position: relative;width: 100%;" class="p-3 mb-5">
                            <div class="widget fbt-block-2 mb-0" style="width: 100%;height: 100%;top: 0;left: 0;">
                                <div class="fbt-sep-title">
                                    <h4 class="title title-heading-left">Podcasts</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double">
                                            <a href="#" class="view_more bree">View all</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="fbt_mag_block">
                                    <div class="row">
                                        
                                        <div class="col-lg-12 fbt_list_posts">
                                            <article class="post mb-3 p-2 rounded" style="box-shadow: 0px 0px 5px 0px #777777;">
                                                <div class="post-contentalign-items-center">
                                                    <div class="mb-2 fbt-title-caption media-body">
                                                        <h3 class="post-title">
                                                            <a href="./single_mag.html"> Ne amores quidem sanctos alienos esse.</a>
                                                        </h3>
                                                        <div class="post-meta">
                                                            <span class="post-date published merriweather">March 27, 2017</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <hr class="mb-2" style="height: 2px;background: black;border-radius: 50px;">
                                                    </div>
                                                    <div class="clearfix d-flex">
                                                        <span class="align-items-center audio-icon d-flex justify-content-center"><i class="fa fa-step-backward"></i></span>
                                                        <span class="align-items-center audio-icon d-flex justify-content-center mx-3"><i class="fa fa-pause"></i></span>
                                                        <span class="align-items-center audio-icon d-flex justify-content-center"><i class="fa fa-step-forward"></i></span>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="post mb-3 p-2 rounded" style="box-shadow: 0px 0px 5px 0px #777777;">
                                                <div class="post-contentalign-items-center">
                                                    <div class="mb-2 fbt-title-caption media-body">
                                                        <h3 class="post-title">
                                                            <a href="./single_mag.html">Mihi vero, inquit, placet agi subtilius et pressius.</a>
                                                        </h3>
                                                        <div class="post-meta">
                                                            <span class="post-date published merriweather">March 27, 2017</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <hr class="mb-2" style="height: 2px;background: black;border-radius: 50px;">
                                                    </div>
                                                    <div class="clearfix d-flex">
                                                        <span class="align-items-center audio-icon d-flex justify-content-center"><i class="fa fa-step-backward"></i></span>
                                                        <span class="align-items-center audio-icon d-flex justify-content-center mx-3"><i class="fa fa-pause"></i></span>
                                                        <span class="align-items-center audio-icon d-flex justify-content-center"><i class="fa fa-step-forward"></i></span>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="post mb-3 p-2 rounded" style="box-shadow: 0px 0px 5px 0px #777777;">
                                                <div class="post-contentalign-items-center">
                                                    <div class="mb-2 fbt-title-caption media-body">
                                                        <h3 class="post-title">
                                                            <a href="./single_mag.html">Suspendisse sed tortor eget justo aliquam.</a>
                                                        </h3>
                                                        <div class="post-meta">
                                                            <span class="post-date published merriweather">March 28, 2017</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <hr class="mb-2" style="height: 2px;background: black;border-radius: 50px;">
                                                    </div>
                                                    <div class="clearfix d-flex">
                                                        <span class="align-items-center audio-icon d-flex justify-content-center"><i class="fa fa-step-backward"></i></span>
                                                        <span class="align-items-center audio-icon d-flex justify-content-center mx-3"><i class="fa fa-pause"></i></span>
                                                        <span class="align-items-center audio-icon d-flex justify-content-center"><i class="fa fa-step-forward"></i></span>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="post mb-3 p-2 rounded" style="box-shadow: 0px 0px 5px 0px #777777;">
                                                <div class="post-contentalign-items-center">
                                                    <div class="mb-2 fbt-title-caption media-body">
                                                        <h3 class="post-title">
                                                            <a href="./single_mag.html">Nunc accumsan ex ligula, in malesuada sapien.</a>
                                                        </h3>
                                                        <div class="post-meta">
                                                            <span class="post-date published merriweather">March 28, 2017</span>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <hr class="mb-2" style="height: 2px;background: black;border-radius: 50px;">
                                                    </div>
                                                    <div class="clearfix d-flex">
                                                        <span class="align-items-center audio-icon d-flex justify-content-center"><i class="fa fa-step-backward"></i></span>
                                                        <span class="align-items-center audio-icon d-flex justify-content-center mx-3"><i class="fa fa-pause"></i></span>
                                                        <span class="align-items-center audio-icon d-flex justify-content-center"><i class="fa fa-step-forward"></i></span>
                                                    </div>
                                                </div>
                                            </article>
                                         </div><!-- .fbt_list_posts -->
                                        {{-- <div class="col-lg-6 d-none d-md-inline-block">
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
                                        </div> --}}
                                    </div>
                                </div>
                            </div><!-- .fbt-block-2 -->
                            <div class="cover-soon rounded" style="z-index: 10;width: 100%;height: 100%;position: absolute;top: 0;left: 0;background: #000000eb;">
                            {{-- <div class="cover-soon rounded" style="z-index: 10;width: 100%;height: 100%;position: absolute;left: 0;background: #000000eb;"> --}}
                                <div class="container mt-4">
                                    <span class="border-bottom d-inline-block merriweather text-white coming-soon-title">{{__('Podcasts Coming Soon')}}</span>
                                </div>
                            </div>
                        </div>
        
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
        
            <div class="mb-5" style="position: relative;width: 100%;height: 100%;">
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
                                            <div class="post-meta mb-2 merriweather">
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
                        <span class="border-bottom d-inline-block merriweather text-white coming-soon-title">{{__('Videos Coming Soon')}}</span>
                    </div>
                </div>
            </div>
        
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
        var dont_miss = {!! json_encode($dont_miss) !!};
    </script>
    <script src="{{asset('/js/custom/general/index.js')}}"></script>
@endsection