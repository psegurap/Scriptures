@extends('layouts.main')
@section('title', 'Profession Of Faith')
@section('styles')
    <style>
        
    </style>
@endsection
@section('content')
    <main>
        <div class="outer-wrapper my-5" id="outer-wrapper">
        
            <div class="fbt-gallery mb-5">
                <div class="container fbt-elastic-container fbt-gallery-1">
                    <div class="row px-2">
                        <div v-for="article in serie.articles" class="col-lg-4 col-md-6 mb-4 px-2">
                            <div class="post-item border p-3">
                                <div class="fbt-post-thumbnail">
                                    <a href="./single_mag.html">
                                        <img alt="" class="post-thumbnail lazyloaded" :data-src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail"
                                            :src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail">
                                    </a>
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-3">
                                        {{-- <div class="post-meta mb-2">
                                            <span class="post-author">
                                                <a href="#">fbtemplates</a>
                                            </span>
                                            <span class="post-date published">June 19, 2019</span>
                                        </div> --}}
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
                                <div class="description mt-3">
                                    <p class="mb-0">
                                        @if (App::getLocale() == 'es')
                                            @{{article.short_description_es}}
                                        @else
                                            @{{article.short_description_en}}
                                        @endif
                                    </p>
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
        var serie = {!! json_encode($serie) !!};
        
    </script>
    <script src="{{asset('/js/custom/general/profession.js')}}"></script>
@endsection