@extends('layouts.admin')
@section('title', 'Articles')
@section('content')
    <main>
        <div class="outer-wrapper my-5" id="outer-wrapper">
        
            <div class="fbt-gallery mb-5">
                <div class="container fbt-elastic-container fbt-gallery-1">
                    <div class="row px-2">
                        <div v-for="article in articles" class="col-lg-3 col-md-6 mb-4 mb-lg-0 px-2">
                            <div class="post-item border oswald">
                                <div class="fbt-post-thumbnail">
                                    @if (App::getLocale() == 'es')
                                        <a :href="homepath + '/articulo/' + article.url_es">
                                            <img alt="" class="post-thumbnail lazyloaded" 
                                            :src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail">
                                        </a>
                                    @else
                                        <a :href="homepath + '/article/' + article.url_en">
                                            <img alt="" class="post-thumbnail lazyloaded" 
                                                :src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail">
                                        </a>
                                    @endif
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-3 px-2">
                                        <div class="post-meta mb-2">
                                            <span class="post-author">
                                                <a v-for="category in article.categories" href="#">
                                                    @if (App::getLocale() == 'es')
                                                        @{{category.category_es}}
                                                    @else
                                                        @{{category.category_en}}
                                                    @endif
                                                </a>
                                            </span>
                                            <span class="post-date published text-uppercase">@{{moment(article.created_at).format('LL')}}</span>
                                        </div>
                                        <h3 class="post-title">
                                            @if (App::getLocale() == 'es')
                                                <a :href="homepath + '/articulo/' + article.url_es">@{{article.title_es}}</a>
                                            @else
                                                <a :href="homepath + '/article/' + article.url_en">@{{article.title_en}}</a>
                                            @endif
                                        </h3>
                                        <div class="mt-2 pb-2 rounded-0 d-flex justify-content-between">
                                            <div>
                                                <a href="#">
                                                    <span class="btn btn-sm rounded-0 btn-info border-0" style="box-shadow: 2px 3px 3px rgba(0, 0, 0, 0.1); background-color: darkblue">Editar</span>
                                                </a>
                                                <a href="#">
                                                    <span class="btn btn-sm rounded-0 btn-success border-0" style="box-shadow: 2px 3px 3px rgba(0, 0, 0, 0.1); background-color: green">Visualizar</span>
                                                </a>
                                            </div>
                                            <div>
                                                <span class="btn btn-sm rounded-0 btn-danger border-0" style="box-shadow: 2px 3px 3px rgba(0, 0, 0, 0.1); background-color: red"><i class="fa fa-trash fa-lg align-baseline" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .fbt-gallery -->
        </div><!-- .outer-wrapper -->
    </main>
@endsection

@section('scripts')
    <script>
        var articles = {!! json_encode($articles) !!}
    </script>
    <script src="{{asset('/js/custom/admin/articles.js')}}"></script>

@endsection