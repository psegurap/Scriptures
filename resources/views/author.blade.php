@extends('layouts.main')
@section('title') {{$collaborator->name}} @endsection
@section('styles')
    <style>
        
    </style>
@endsection
@section('content')
    <main class="item-view">
        <div class="outer-wrapper my-5" id="outer-wrapper">

            <div class="fbt-elastic-container">
                <div class="row justify-content-center">

                    
                    <!-- Main Wrapper -->
                    <div class="fbt-main-wrapper col-lg-10 mb-5 mb-lg-0">

                        <div id="main-wrapper">
                            <div class="main-section" id="main_content">
                                <div class="blog-posts fbt-item-post-wrap">

                                    <div class="blog-post fbt-item-post">
                                        
                                        <div class="post-body post-content px-1">
                                            <div class="fbt-elastic-container fbt-gallery-1 px-xl-5">
                                                <div class="row px-2">
                                                    <div class="col-lg-3 col-md-6 mb-5">
                                                        <div class="post-item">
                                                            <div class="">
                                                                @if (App::getLocale() == 'es')
                                                                    <a :href="homepath + '/colaborador/' + collaborator.name">
                                                                        <img style="border-radius: 100%; width: 100%;" alt="" class="lazyloaded" :data-src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail"
                                                                        :src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail">
                                                                    </a>
                                                                @else
                                                                    <a :href="homepath + '/collaborator/' + collaborator.name">
                                                                        <img style="border-radius: 100%; width: 100%;" alt="" class="lazyloaded" :data-src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail"
                                                                        :src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="fbt-post-caption">
                                                                <div class="title-caption text-center pt-3 px-2">
                                                                    <div class="post-meta mb-2">
                                                                        {{-- <span class="post-author">
                                                                            <a href="#">fbtemplates</a>
                                                                        </span> --}}
                                                                        <span class="post-date published font-weight-bold font-italic">Collaborating since <span class="text-capitalize">@{{moment(collaborator.created_at).format('MMMM YYYY')}}</span></span>
                                                                    </div>
                                                                    <h3 class="post-title">
                                                                        @if (App::getLocale() == 'es')
                                                                            <a :href="homepath + '/colaborador/' + collaborator.name">@{{collaborator.name}}</a>
                                                                        @else
                                                                            <a :href="homepath + '/collaborator/' + collaborator.name">@{{collaborator.name}}</a>
                                                                        @endif
                                                                        
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                    
                                                    </div>
                                                </div>
                                            </div>
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
                                                    {{-- <div class="col-lg-12">
                                                        <div class="post-pager row bg-secondary" style="background-color: rgb(205, 217, 228) !important;">
                                                            <div class="previous col-lg-3 px-4 py-4 text-left">
                                                                <img style="width: 100%; border-radius: 100%;" :src="homepath + '/images/collaborators/' + article.author.attach_reference + '/' + article.author.img_thumbnail" alt="">
                                                            </div>
                                                            <div class="next col-lg-9 py-4">
                                                                @if (App::getLocale() == 'es')
                                                                    <a class="fbt-older-link h5"  :href="homepath + '/colaborador/' + article.author.name">
                                                                        <strong class="pr-3">@{{article.author.name}}</strong>
                                                                    </a>
                                                                @else
                                                                    <a class="fbt-older-link h5" style="color: black;" :href="homepath + '/collaborator/' + article.author.name">
                                                                        <strong class="pr-3">@{{article.author.name}}</strong>
                                                                    </a>
                                                                @endif
                                                                <div class="fbt-np-title mt-2 pr-3" style="color: black;">
                                                                    @if (App::getLocale() == 'es')
                                                                        @{{article.author.info_es}}
                                                                    @else
                                                                        @{{article.author.info_en}}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        
                                            <div class="fbt-rel-post-wrapper mb-5">
                                                <div class="title-wrap fbt-sep-title">
                                                    <h4 class="title title-heading-left">Related Articles</h4>
                                                    <div class="title-sep-container">
                                                        <div class="title-sep sep-double"></div>
                                                    </div>
                                                </div>
                                                {{-- <div id="related-posts" v-for="category in article.categories">
                                                    <div class="row px-2">
                                                        <div v-for="article_category in category.articles" class="col-xl-4 col-lg-6 col-md-4 col-sm-6 mb-4 rp-item px-2">
                                                            <div class="fbt-post-thumbnail">
                                                                @if (App::getLocale() == 'es')
                                                                    <a :href="homepath + '/articulo/' + article_category.url_es">
                                                                        <img alt="" class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + article_category.attach_reference + '/' + article_category.img_thumbnail"
                                                                        :src="homepath + '/images/articles/' + article_category.attach_reference + '/' + article_category.img_thumbnail">
                                                                    </a>
                                                                @else
                                                                    <a :href="homepath + '/article/' + article_category.url_en">
                                                                        <img alt="" class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + article_category.attach_reference + '/' + article_category.img_thumbnail"
                                                                        :src="homepath + '/images/articles/' + article_category.attach_reference + '/' + article_category.img_thumbnail">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="fbt-post-caption text-center mt-2 px-2">
                                                                <h5>
                                                                    @if (App::getLocale() == 'es')
                                                                        <a :href="homepath + '/articulo/' + article_category.url_es">@{{article_category.title_es}}</a>
                                                                    @else
                                                                        <a :href="homepath + '/article/' + article_category.url_en">@{{article_category.title_en}}</a>
                                                                    @endif
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div><!-- .fbt-rel-post-wrapper -->
                                        </div>
                                    </div>

                                </div><!-- .fbt-item-post-wrap -->
                            </div>
                        </div><!-- #main-wrapper -->

                    </div><!-- .fbt-main-wrapper -->

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
        {{-- var article = {!! json_encode($article) !!};
        var others_posts = {!! json_encode($others_posts) !!}; --}}
        
        var collaborator = {!! json_encode($collaborator) !!};
    </script>
    <script src="{{asset('/js/custom/general/author.js')}}"></script>
@endsection