@extends('layouts.admin')
@section('title', 'Articles Reviews')

@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/assets/css/apps/contacts.css')}}">
    <link href="{{asset('/admin/plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/admin/plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">

    <style>
        .searchable-container .searchable-items.list .items .item-content{
            min-width: 100%;
        }
    </style>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item" aria-current="page"><span>{{__('Articles')}}</span></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{__('Reviews')}}</span></li>
@endsection
@section('content')
<main>
    <div class="layout-px-spacing">
    
        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
            <div class="col-lg-12">
                <div class="widget-content searchable-container list">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-7 col-sm-6 text-sm-right text-center layout-spacing align-self-center pb-0">
                            <div class="d-flex">
                                <div class="switch align-self-center">
                                    <h4 class="font-weight-bold">{{__('Articles Reviews')}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-6 filtered-list-search layout-spacing align-self-center pb-0">
                            <div class="my-2 my-lg-0">
                                <div class="d-flex align-items-center">
                                    <div class="input-group">
                                        <input id="dateTimeFlatpickr" v-model="date" class="form-control flatpickr flatpickr-input" type="text" placeholder="Select Month...">
                                        <div class="input-group-append">
                                          <button class="btn btn-primary" type="button" @click="searchArticles()">{{__('Search')}}</button>
                                        </div>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border-bottom mt-3 mb-2">
                            </div>
                        </div>
                    </div>
                    <div class="searchable-items list row">
                        <div class="col-md-6 mb-2">
                            <div class="d-flex text-white font-weight-bold">
                                <div class="mr-3 ml-1 d-flex">
                                    <div class="d-flex align-items-center">
                                        <span class="bg-dark d-inline-block p-2 rounded-circle mr-1"></span>
                                    </div>
                                    <span>{{__('Not reviewed')}}</span>
                                </div>
                                <div class="d-flex">
                                    <div class="d-flex align-items-center">
                                        <span class="bg-info d-inline-block p-2 rounded-circle mr-1"></span>
                                    </div>
                                    <span>{{__('Reviewed')}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="text-right">
                                <div class="my-2 my-lg-0">
                                    <div class="d-flex align-items-center">
                                        <input type="text" v-model="search_article" class="form-control product-search" id="input-search" placeholder="{{__('Search articles...')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="articles.length == 0" class="items col-md-12">
                            <div class="item-content">
                                <div class="user-profile">  
                                    <div class="user-meta-info">
                                        <p data-name="" class="user-name">{{__('No results for this date')}}</p> 
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div v-for="article in SearchedArticles" class="items col-md-12">
                            <div class="item-content">
                                <div class="user-profile">
                                    <div class="align-items-center d-flex">
                                        <span v-if="article.reviews.length > 0" class="bg-info d-inline-block p-2 rounded-circle mr-2"></span>
                                        <span v-else class="bg-dark d-inline-block p-2 rounded-circle mr-2"></span>
                                    </div>
                                    <img class="ml-0" :src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail" alt="avatar">
                                    <div class="user-meta-info">
                                        @if (App::getLocale() == 'es')
                                            <p class="user-name" :data-name="article.title_es">@{{article.title_es}}</p>
                                        @else
                                            <p class="user-name" :data-name="article.title_en">@{{article.title_en}}</p>
                                        @endif
                                        <p v-for="author in article.authors" class="user-work" :data-email="author.name">@{{author.name}}</p>
                                    </div>
                                </div>
                                <div class="action-btn">
                                    <a class="badge badge-primary" :href="homepath + '/admin/articles/review/' + article.id">
                                        <i data-feather="check-circle"></i>
                                    </a>
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
    <script src="{{asset('admin/plugins/flatpickr/flatpickr.js')}}"></script>
    {{-- <script src="{{asset('admin/plugins/flatpickr/custom-flatpickr.js')}}"></script> --}}

    <script src="{{asset('/js/custom/admin/articles_reviews.js')}}"></script>

@endsection