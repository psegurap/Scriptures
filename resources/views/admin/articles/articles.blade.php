@extends('layouts.admin2')
@section('title', 'Home')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item"><a href="/admin/articles">{{__('Articles')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{__('All Articles')}}</span></li>
@endsection
@section('content')
<main>
    <div class="layout-px-spacing">
    
        <div class="row layout-top-spacing">
    
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading mb-0">
                        <h5 class="text-uppercase font-weight-bold">Articles</h5>
                    </div>
    
                    {{-- <div class="widget-content">
                        <div class="tabs tab-content">
                            <div id="content_1" class="tabcontent"> 
                                <div id="revenueMonthly"></div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
    
    
            <div v-for="article in articles" class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                <div class="widget-three">
                    <div class="widget-heading mb-3 border-bottom pb-2">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a :href="homepath + '/admin/articles/edit/' + article.id">
                                    <span class="btn badge badge-warning">
                                        <i data-feather="edit-2"></i>
                                    </span>
                                </a>
                                <a :href="homepath + '/articulo/' + article.url_es">
                                    <span class="btn badge badge-primary">
                                        <i data-feather="eye"></i>
                                    </span>
                                </a>
                            </div>
                            <div>
                                <span class="btn badge badge-danger">
                                    <i data-feather="trash-2"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="row">
                            <div class="col-md-12 pb-2">
                                <div>
                                    <img style="width: 100%;" class="img-thumbnail rounded-0" :src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail" alt="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div>
                                    <h6 class="border-top mt-2 pt-2 ">
                                        @if (App::getLocale() == 'es')
                                            <a :href="homepath + '/articulo/' + article.url_es">@{{article.title_es}}</a>
                                        @else
                                            <a :href="homepath + '/article/' + article.url_en">@{{article.title_en}}</a>
                                        @endif
                                    </h6>
                                    <div class="mb-1">
                                        <span class="badge badge-primary">{{__('Created')}}: </span> <span class="badge badge-light">@{{moment(article.created_at).format('L')}}</span> 
                                    </div>
                                    <div>
                                        <span class="badge badge-primary">{{__('Translated')}}: </span> <span v-if="article.title_es != '' && article.full_content_es != '' && article.short_description_es != ''" class="badge badge-light">es</span> <span v-if="article.title_en != '' && article.full_content_en != '' && article.short_description_en != ''" class="badge badge-light">en</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
    
        </div>
    
    </div>
</main>
@endsection

@section('scripts')
    <script>
        var articles = {!! json_encode($articles) !!}
    </script>
    <script src="{{asset('/js/custom/admin/articles.js')}}"></script>

@endsection