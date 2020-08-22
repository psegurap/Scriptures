@extends('layouts.admin')
@section('title', 'Review Article')
@section('styles')
    <link href="{{asset('/admin/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/assets/css/forms/theme-checkbox-radio.css')}}">
    <style>
        .dropzone{
            background: none;
            border: 2px solid rgba(255, 255, 255, 0.795);
        }
        .dropzone .dz-preview.dz-image-preview{
            background: none;
        }
    </style>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item"><a href="/admin/articles">{{__('Articles')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{__('Article Review')}}</span></li>
@endsection
@section('content')
<main>
    <div class="layout-px-spacing">

        <div class="row layout-spacing">

            <!-- Content -->
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                <div class="user-profile layout-spacing">
                    <div class="widget-content widget-content-area pt-3">
                        <div class="text-right mb-2">
                            @if (App::getLocale() == 'es')
                                <a :href="homepath + '/articulo/' + article.url_es" target="_blank">
                                    <span class="btn badge badge-primary">
                                        <i data-feather="eye"></i>
                                    </span>
                                </a>
                            @else
                                <a :href="homepath + '/articulo/' + article.url_es" target="_blank">
                                    <span class="btn badge badge-primary">
                                        <i data-feather="eye"></i>
                                    </span>
                                </a>
                            @endif
                        </div>
                        <div class="text-center user-info mt-0">
                            <img class="img-thumbnail rounded-0" :src="homepath + '/images/articles/' + article.attach_reference + '/' + article.img_thumbnail" style="width: 100%;" alt="avatar">
                            <p class="border-bottom border-top mb-0 py-1">
                                @if (App::getLocale() == 'es')
                                    <a :href="homepath + '/articulo/' + article.url_es" target="_blank">@{{article.title_es}}</a>
                                @else
                                    <a :href="homepath + '/articulo/' + article.url_es" target="_blank">@{{article.title_en}}</a>
                                @endif
                            </p>
                        </div>
                        <div class="user-info-list">
                            <div class="">
                                <ul class="contacts-block list-unstyled mt-4 mb-0">
                                    <li class="contacts-block__item" v-for="author in article.authors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>@{{author.name}}
                                    </li>
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>@{{moment(article.created_at).format('ll')}}
                                    </li>
                                    <li class="contacts-block__item" v-for="category in article.categories">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>@if (App::getLocale() == 'es')@{{category.category_es}} @else@{{category.category_en}} @endif
                                    </li>
                                </ul>
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
                <div class="user-profile layout-spacing">
                    <div class="widget-content widget-content-area review_area">
                        <div class="border-bottom text-light mb-2 pb-2">
                            <label for="">{{__('Choose your answer')}}:</label>
                            <div class="d-flex">
                                <div class="n-chk">
                                    <label class="new-control new-radio new-radio-text radio-success">
                                      <input v-validate="'required'" type="radio" class="new-control-input" v-model="review.desicion" value="Approved" name="answer">
                                      <span class="new-control-indicator"></span><span class="new-radio-content text-white">{{__('Approved')}}</span>
                                    </label>
                                </div>
                                <div class="n-chk">
                                    <label class="new-control new-radio new-radio-text radio-warning">
                                      <input v-validate="'required'" type="radio" class="new-control-input" v-model="review.desicion" value="Revision" name="answer">
                                      <span class="new-control-indicator"></span><span class="new-radio-content text-white">{{__('Revision')}}</span>
                                    </label>
                                </div>
                                <div class="n-chk">
                                    <label class="new-control new-radio new-radio-text radio-danger">
                                      <input v-validate="'required'" type="radio" class="new-control-input" v-model="review.desicion" value="Declined" name="answer">
                                      <span class="new-control-indicator"></span><span class="new-radio-content text-white">{{__('Declined')}}</span>
                                    </label>
                                </div>
                            </div>
                            <span class="text-danger" style="font-size: 12px;" v-show="errors.has('answer')">* @{{ errors.first('answer') }}</span>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">{{__('Leave a comment')}}:</label>
                                    <textarea v-validate="'required'" v-model="review.comment" class="form-control rounded-0" name="comments" cols="30" rows="5" placeholder="{{__('Type your comment...')}}"></textarea>
                                    <span class="text-danger" style="font-size: 12px;" v-show="errors.has('comments')">* @{{ errors.first('comments') }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-right">
                                    <button v-if="article.reviews.length == 0" @click="validate(SaveReview)" class="btn btn-primary rounded-0 text-uppercase font-weight-bold">{{__('Save Review')}}</button>
                                    <button v-else @click="validate(UpdateReview)" class="btn btn-primary rounded-0 text-uppercase font-weight-bold">{{__('Update Review')}}</button>
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
        var article = {!! json_encode($article) !!}
    </script>
    <script src="{{asset('/js/custom/admin/review_article.js')}}"></script>

@endsection