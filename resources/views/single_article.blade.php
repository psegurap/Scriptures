@extends('layouts.main')
@section('title')
    @if (App::getLocale() == 'es')
        {{$article->title_es}}
    @else
        {{$article->title_en}}
    @endif
@endsection
@section('styles')
    <style>
        
    </style>
@endsection
@section('content')
    <main class="item-view">
        <div class="outer-wrapper my-5" id="outer-wrapper">

            <div class="container fbt-elastic-container">
                <div class="row justify-content-center">

                    <!-- Main Wrapper -->
                    <div class="fbt-main-wrapper col-lg-8 mb-5 mb-lg-0">

                        <div id="main-wrapper">
                            <div class="main-section" id="main_content">
                                <div class="blog-posts fbt-item-post-wrap">

                                    <div class="blog-post fbt-item-post">
                                        
                                        <div class="featuredImageContainer">
                                            <div class="fbt-item-thumbnail">
                                                <img alt="" class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail"
                                                    :src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail">
                                            </div>
                                            <div class="fbt-item-caption mt-3 px-1">
                                                <h1 class="post-title">
                                                    @if (App::getLocale() == 'es')
                                                        @{{article.title_es}}
                                                    @else
                                                        @{{article.title_en}}
                                                    @endif
                                                </h1>
                                                <div class="item-post-meta mt-3">
                                                    <div class="post-meta mb-3">
                                                        <span v-for="category in article.categories" class="post-author">
                                                            <a href="" target="_blank" title="fbtemplates">
                                                                @if (App::getLocale() == 'es')
                                                                    @{{category.category_es}}
                                                                @else
                                                                    @{{category.category_en}}
                                                                @endif
                                                            </a>
                                                        </span>
                                                        <span class="post-date published text-uppercase">@{{moment(article.created_at).format('LL')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-body post-content px-1">
                                            <textarea id="summernote" data-toolbar="slim"></textarea>
                                        </div>
                                        <div class="post-footer">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-12">
                                                    <div class="row align-items-center my-4">
                                                        <div class="col-xl-7 text-center text-xl-left mb-3 mb-xl-0">
                                                            <div class="post-labels pl-xl-5">
                                                                <span class="mr-2">Categories:</span>
                                                                <span class="label-head Label">
                                                                    <a class="label-link badge badge-secondary py-1 px-3" href="#">Lifestyle</a>
                                                                    <a class="label-link badge badge-secondary py-1 px-3" href="#">People</a>
                                                                    <a class="label-link badge badge-secondary py-1 px-3" href="#">Slider</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-5 text-center text-xl-right">
                                                            <div class="sharepost clearfix pr-xl-5">
                                                                <div class="post-share clearfix">
                                                                    <ul>
                                                                        <li><a class="facebook fbt-share" href="#" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                                                        <li><a class="twitter fbt-share" href="#" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a> </li>
                                                                        <li><a class="linkedin fbt-linkedin" href="#" rel="nofollow" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                                                        <li><a class="pinterest fbt-pinterest" href="#" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                                                        <li><a class="email fbt-email" href="#" rel="nofollow"><i class="fa fa-envelope-o"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fbt-item-post-pager">
                                                <div class="card- mt-3 mb-5">
                                                    <div class="col-lg-12">
                                                        <div class="post-pager row">
                                                            <div class="previous col-lg-6 bg-dark px-4 py-4 text-left">
                                                                <a class="fbt-newer-link text-white" href="./single_mag.html">
                                                                    <strong class="text-left pl-3">
                                                                        <i class="fa fa-angle-left"></i> Previous
                                                                    </strong>
                                                                    <div class="h5 text-white fbt-np-title mt-2 pl-3">
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="next col-lg-6 bg-secondary px-4 py-4 text-right">
                                                                <a class="fbt-older-link text-white" href="./single_mag.html">
                                                                    <strong class="text-right pr-3">
                                                                        Next <i class="fa fa-angle-right"></i>
                                                                    </strong>
                                                                    <div class="h5 text-white text-right fbt-np-title mt-2 pr-3">
                                                                        Nulla sed eros sit amet ipsum mattis pulvinar quis quis sem.
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="fbt-rel-post-wrapper mb-5">
                                                <div class="title-wrap fbt-sep-title">
                                                    <h4 class="title title-heading-left">Related Articles</h4>
                                                    <div class="title-sep-container">
                                                        <div class="title-sep sep-double"></div>
                                                    </div>
                                                </div>
                                                <div id="related-posts">
                                                    <div class="row px-2">
                                                        <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 mb-4 rp-item px-2">
                                                            <div class="fbt-post-thumbnail">
                                                                <a href="./single_mag.html">
                                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-1.jpg"
                                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                </a>
                                                            </div>
                                                            <div class="fbt-post-caption text-center mt-2 px-2">
                                                                <h5>
                                                                    <a href="./single_mag.html">
                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 mb-4 rp-item px-2">
                                                            <div class="fbt-post-thumbnail">
                                                                <a href="./single_mag.html">
                                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-7.jpg"
                                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                </a>
                                                            </div>
                                                            <div class="fbt-post-caption text-center mt-2 px-2">
                                                                <h5>
                                                                    <a href="./single_mag.html">
                                                                        Quae quo sunt excelsiores, eo dant clariora indicia naturae.
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 mb-4 rp-item px-2">
                                                            <div class="fbt-post-thumbnail">
                                                                <a href="./single_mag.html">
                                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-13.jpg"
                                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                </a>
                                                            </div>
                                                            <div class="fbt-post-caption text-center mt-2 px-2">
                                                                <h5>
                                                                    <a href="./single_mag.html">
                                                                        Sed quod proximum fuit non vidit. Tu quidem reddes.
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 mb-4 rp-item px-2">
                                                            <div class="fbt-post-thumbnail">
                                                                <a href="./single_mag.html">
                                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-21.jpg"
                                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                </a>
                                                            </div>
                                                            <div class="fbt-post-caption text-center mt-2 px-2">
                                                                <h5>
                                                                    <a href="./single_mag.html">
                                                                        Nulla profecto est, quin suam vim retineat extremum.
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 mb-4 rp-item px-2">
                                                            <div class="fbt-post-thumbnail">
                                                                <a href="./single_mag.html">
                                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-18.jpg"
                                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                </a>
                                                            </div>
                                                            <div class="fbt-post-caption text-center mt-2 px-2">
                                                                <h5>
                                                                    <a href="./single_mag.html">
                                                                        Non dolere, inquam, istud quam vim habeat postea.
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 mb-4 rp-item px-2">
                                                            <div class="fbt-post-thumbnail">
                                                                <a href="./single_mag.html">
                                                                    <img alt="" class="post-thumbnail lazyloaded" data-src="./images/mag-img-19.jpg"
                                                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==">
                                                                </a>
                                                            </div>
                                                            <div class="fbt-post-caption text-center mt-2 px-2">
                                                                <h5>
                                                                    <a href="./single_mag.html">
                                                                        Nulla profecto est, quin suam vim retineat a primo ad.
                                                                    </a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .fbt-rel-post-wrapper -->

                                            <div class="row justify-content-center mt-n4">
                                                <div class="col-lg-12">
                                                    <div class="blog-post-comments">
                                                        <section class="comments embed" id="comments">
                                                            <div class="fbt-sep-title">
                                                                <h4 class="title title-heading-left">Comments</h4>
                                                                <div class="title-sep-container">
                                                                    <div class="title-sep sep-double"></div>
                                                                </div>
                                                            </div>
                                                            <div class="comment-list--form">
                                                                <div class="comment-list">
                                                                    <div class="media comment mb-4 border">
                                                                        <a class="mr-4" href="#">
                                                                            <img src="./images/user-1.jpg" alt="">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <h5 class="mb-2">John Doe</h5>
                                                                            <p>
                                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut porttitor leo vel nulla posuere accumsan. 
                                                                                Suspendisse sed tortor eget justo aliquam euismod.
                                                                            </p>
                                                                            <div class="comments__actions">
                                                                                <span class="button">
                                                                                    <a href="#">
                                                                                        <i class="fa fa-comments"></i>Reply
                                                                                    </a>
                                                                                </span>
                                                                            </div>
        
                                                                            <div class="comment-reply media mt-4">
                                                                                <a class="mr-4" href="#">
                                                                                    <img src="./images/user-2.jpg" alt="">
                                                                                </a>
                                                                                <div class="media-body">
                                                                                    <h5 class="mb-2">John Doe</h5>
                                                                                    <p>
                                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut porttitor leo vel nulla posuere accumsan.
                                                                                    </p>
                                                                                    <div class="comments__actions">
                                                                                        <span class="button">
                                                                                            <a href="#">
                                                                                            <i class="fa fa-comments"></i>Reply
                                                                                            </a>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div><!-- .comment-reply -->
        
                                                                        </div>
                                                                    </div><!-- .comment -->
        
                                                                    <div class="media comment mb-4">
                                                                        <a class="mr-4" href="#">
                                                                            <img src="./images/user-4.jpg" alt="">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <h5 class="mb-2">John Doe</h5>
                                                                            <p>
                                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut porttitor leo vel nulla posuere accumsan. 
                                                                                Suspendisse sed tortor eget justo aliquam euismod.
                                                                            </p>
                                                                            <div class="comments__actions">
                                                                                <span class="button">
                                                                                    <a href="#">
                                                                                        <i class="fa fa-comments"></i>Reply
                                                                                    </a>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- .comment -->
        
                                                                    <div class="media comment mb-4">
                                                                        <a class="mr-4" href="#">
                                                                            <img src="./images/user-3.jpg" alt="">
                                                                        </a>
                                                                        <div class="media-body">
                                                                            <h5 class="mt-0">John Doe</h5>
                                                                            <p>
                                                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut porttitor leo vel nulla posuere accumsan. 
                                                                                Suspendisse sed tortor eget justo aliquam euismod.
                                                                            </p>
                                                                            <div class="comments__actions">
                                                                                <span class="button">
                                                                                    <a href="#">
                                                                                        <i class="fa fa-comments"></i>Reply
                                                                                    </a>
                                                                                </span>
                                                                            </div>
        
                                                                            <div class="comment-reply media mt-4">
                                                                                <a class="mr-4" href="#">
                                                                                    <img src="./images/user-4.jpg" alt="">
                                                                                </a>
                                                                                <div class="media-body">
                                                                                    <h5 class="mt-0">John Doe</h5>
                                                                                    <p>
                                                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut porttitor leo vel nulla posuere accumsan.
                                                                                    <div class="comments__actions">
                                                                                        <span class="button">
                                                                                            <a href="#">
                                                                                                <i class="fa fa-comments"></i>Reply
                                                                                            </a>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div><!-- .comment-reply -->
        
                                                                        </div>
                                                                    </div><!-- .comment -->
        
                                                                    <div class="fbt-sep-title mt-5">
                                                                        <h4 class="title title-heading-left">Leave Your Comment</h4>
                                                                        <div class="title-sep-container">
                                                                            <div class="title-sep sep-double"></div>
                                                                        </div>
                                                                    </div>
        
                                                                </div><!-- .comment-list -->
        
                                                                <form class="comment-form" method="POST" action="index.html">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="name">Name*</label>
                                                                                <input class="form-control shadow-none radius-0" id="name" name="name" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="mail">E-mail*</label>
                                                                                <input class="form-control shadow-none radius-0" id="mail" name="mail" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="website">Website</label>
                                                                                <input class="form-control shadow-none radius-0" id="website" name="website" type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="comment">Comment*</label>
                                                                                <textarea class="form-control shadow-none radius-0" rows="5" id="comment" name="comment"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-primary radius-0" type="submit" id="submit-contact">
                                                                        <i class="fa fa-comment"></i> Post Comment
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </section>
                                                    </div><!-- .blog-post-comments -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div><!-- .fbt-item-post-wrap -->
                            </div>
                        </div><!-- #main-wrapper -->

                    </div><!-- .fbt-main-wrapper -->

                    <div class="fbt-main-sidebar col-lg-4">
                        <div class="fbt-main-sidebar__content h-100 pl-lg-3">
                            <div class="sidebar-block fbt-social-counter mb-5">
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
                                        
                                    </ul><!-- .social-list -->
                                </div>
                            </div>
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
                                                <img alt=" " class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + featured_post.attach_reference + '/' + featured_post.img_thumbnail" 
                                                    :src="homepath + '/images/articles/' + featured_post.attach_reference + '/' + featured_post.img_thumbnail">
                                            </a>
                                        </div>
                                        <div class="fbt-title-section mt-3">
                                            <div class="post-meta mb-2">
                                                <span v-for="category in featured_post.categories" class="post-author">
                                                        @if (App::getLocale() == 'es')
                                                            @{{category.category_es}}
                                                        @else
                                                            @{{category.category_en}}
                                                        @endif
                                                </span>
                                                <span class="post-date published text-uppercase">@{{moment(featured_post.created_at).format('LL')}}</span>
                                            </div>
                                            <h3 class="post-title">
                                                <a :href="homepath + '/article/' + featured_post.url_en">
                                                    @if (App::getLocale() == 'es')
                                                        @{{featured_post.title_es}}
                                                    @else
                                                        @{{featured_post.title_en}}
                                                    @endif
                                                </a>
                                            </h3>
                                            <p class="post-excerpt">
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
                                            <img alt="Advertisement" class="lazyloaded img-fluid" data-src="{{asset('/images/ad-300x600.jpg')}}"
                                                src="{{asset('/images/ad-300x600.jpg')}}">
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
                                                Subscribe to our Newsletter!!!
                                            </h2>
                                        </div>
                                        <div class="ml-lg-auto col-lg-6">
                                            <form action="#" class="fbt-email-form" method="post">
                                                <input autocomplete="off" class="follow-by-email-address" name="email" placeholder="Enter your Email" type="email">
                                                <input class="follow-by-email-submit" type="submit" value="Subscribe">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .FollowByEmail -->
    
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>
        var article = {!! json_encode($article) !!};
        var featured_post = {!! json_encode($featured_post) !!};
        
    </script>
    <script src="{{asset('/js/custom/general/single_article.js')}}"></script>
@endsection