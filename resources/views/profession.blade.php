@extends('layouts.main')
@section('title'){{__('Profession of Faith')}}@endsection
@section('styles')
    <style>
        .article-container{
            box-shadow: -2px 2px 3px -1px #777777;
            background: #e6e6e670;
            height: 100%;
        }

        .article-container:hover{
            transition: all 0.3s ease-out;
            -webkit-transition: all 0.3s ease-out;
            -webkit-transform: translateY(-4px);
            transform: translateY(-4px);
        }

        .title-page{
            font-size: 3em;
        }

        .diviser{
            height: 2px;
            background: black;
        }

        /*---- PERSONAL MEDIAQUERY ----*/

        @media only screen and (max-width: 600px) {
            .title-page{
                font-size: 2em;
            }
        }
    </style>
@endsection
@section('content')
    <main>
        <div class="outer-wrapper mt-4 mb-5" id="outer-wrapper">
        
            <div class="fbt-gallery mb-5">
                <div class="container fbt-elastic-container fbt-gallery-1">
                    <div class="row px-2">
                        <div class="col-md-12">
                            <div>
                                <span class="text-uppercase bree title-page">{{__('Profession of Faith')}}</span>
                            </div>
                        </div>
                        <div class="col-md-12 px-2">
                            <hr class="mt-0 diviser"/>
                        </div>
                    </div>
                    <div class="row px-2">
                        <div v-for="article in serie.articles" class="col-lg-4 col-md-6 mb-4 px-2">
                            <div class="post-item p-3 article-container">
                                <div class="fbt-post-thumbnail">
                                    <a href="./single_mag.html">
                                        <img alt="" class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail"
                                            :src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail">
                                    </a>
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption pt-3">
                                        <div class="post-meta mb-2 merriweather">
                                            <span class="post-author text-capitalize">
                                                @{{article.author.name}}
                                                {{-- <a href="#"></a> --}}
                                            </span>
                                            <span class="post-date published">@{{moment(article.created_at).format('LL')}}</span>
                                        </div>
                                        <h3 class="post-title">
                                            @if (App::getLocale() == 'es')
                                                <a :href="homepath + '/articulo/' + article.url_es">
                                                    @{{article.title_es}}
                                                </a>
                                            @else
                                                <a :href="homepath + '/articulo/' + article.url_en">
                                                    @{{article.title_en}}
                                                </a>
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                                {{-- <div class="description mt-3">
                                    <p class="mb-0">
                                        @{{article.author.name}}
                                    </p>
                                </div> --}}
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
        var serie = {!! json_encode($serie) !!};
        
    </script>
    <script src="{{asset('/js/custom/general/profession.js')}}"></script>
@endsection