@extends('layouts.main')
@section('title') {{$collaborator->name}} @endsection
@section('styles')
    <style>
        
    </style>
@endsection
@section('content')
    <main class="item-view">
        <div class="outer-wrapper mt-5" id="outer-wrapper">

            <div class="fbt-elastic-container">
                <div class="row justify-content-center">

                    
                    <!-- Main Wrapper -->
                    <div class="fbt-main-wrapper col-lg-10 mb-5 mb-lg-0">

                        <div id="main-wrapper">
                            <div class="main-section container" id="main_content">
                                <div class="blog-posts fbt-item-post-wrap">

                                    <div class="blog-post fbt-item-post">
                                        
                                        <div class="post-body post-content px-1">
                                            <div class="fbt-elastic-container fbt-gallery-1">
                                                <div class="row px-2">
                                                    <div class="col-lg-3 mb-5">
                                                        <div class="post-item">
                                                            <div class="text-center">
                                                                <img style="border-radius: 100%; max-width: 200px;" alt="" class="lazyloaded" :data-src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail"
                                                                :src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail">
                                                            </div>
                                                            {{-- <div class="fbt-post-caption">
                                                                <div class="title-caption text-center pt-3 px-2">
                                                                    <div class="post-meta mb-2">
                                                                    </div>
                                                                    <h3 class="post-title">
                                                                        @if (App::getLocale() == 'es')
                                                                            <a :href="homepath + '/colaborador/' + collaborator.name">@{{collaborator.name}}</a>
                                                                        @else
                                                                            <a :href="homepath + '/collaborator/' + collaborator.name">@{{collaborator.name}}</a>
                                                                        @endif
                                                                        
                                                                    </h3>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9 align-items-center d-flex">
                                                        <div class="post-item">
                                                            <p class="post-title display-2 font-weight-bold d-none d-lg-inline-block">
                                                                @{{collaborator.name}}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 align-items-center d-flex">
                                                        <div class="post-item">
                                                            <h2 class="border-bottom d-block d-lg-none font-weight-bold h1 pb-1 post-title">
                                                                @{{collaborator.name}}
                                                            </h2>
                                                            <p class="mb-1">
                                                                @if (App::getLocale() == 'es')
                                                                    @{{collaborator.info_es}}
                                                                @else
                                                                    @{{collaborator.info_en}}
                                                                @endif
                                                            </p>
                                                            <span v-if="collaborator.website != '' && collaborator.website != null">Website: <a  :href="collaborator.website">@{{collaborator.website}}</a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-footer">
                                            
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
                                                <div id="related-posts">
                                                    <div class="row px-2">
                                                        <div v-for="article_collaborator in collaborator.articles" class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4 col-6 rp-item px-2">
                                                            <div class="fbt-post-thumbnail">
                                                                @if (App::getLocale() == 'es')
                                                                    <a :href="homepath + '/articulo/' + article_collaborator.url_es">
                                                                        <img alt="" class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + article_collaborator.attach_reference + '/' + article_collaborator.img_thumbnail"
                                                                        :src="homepath + '/images/articles/' + article_collaborator.attach_reference + '/' + article_collaborator.img_thumbnail">
                                                                    </a>
                                                                @else
                                                                    <a :href="homepath + '/article/' + article_collaborator.url_en">
                                                                        <img alt="" class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + article_collaborator.attach_reference + '/' + article_collaborator.img_thumbnail"
                                                                        :src="homepath + '/images/articles/' + article_collaborator.attach_reference + '/' + article_collaborator.img_thumbnail">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <div class="fbt-post-caption text-center mt-2 px-2">
                                                                <h5>
                                                                    @if (App::getLocale() == 'es')
                                                                        <a :href="homepath + '/articulo/' + article_collaborator.url_es">@{{article_collaborator.title_es}}</a>
                                                                    @else
                                                                        <a :href="homepath + '/article/' + article_collaborator.url_en">@{{article_collaborator.title_en}}</a>
                                                                    @endif
                                                                </h5>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
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