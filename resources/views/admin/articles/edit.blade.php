@extends('layouts.admin')
@section('title', 'Edit Article')
@section('styles')
    <link rel="stylesheet" href="{{asset('admin/assets/css/forms/switches.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/forms/theme-checkbox-radio.css')}}">
    
    <style>
        .dropzone{
            background: none;
            border: 2px solid rgba(255, 255, 255, 0.795);
        }
        .dropzone .dz-preview.dz-image-preview{
            background: none;
        }

        .article_options{
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item"><a href="/admin/articles">{{__('Articles')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{__('New Article')}}</span></li>
@endsection
@section('content')
<main>
    <div class="layout-px-spacing">
        
        <div class="row layout-top-spacing">
        
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="border-bottom flex-column flex-sm-row pb-2 widget-heading">
                        <h5 class="align-self-center font-weight-bold">{{__('Editing article')}}:</h5>
                        <div class="d-flex">
                            @if (App::getLocale() == 'es')
                                <a :href="homepath + '/articulo/' + current_article.url_es" target="_blank">
                                    <span style="height: 100%" class="btn badge badge-warning d-flex align-items-center mr-2">
                                        <i data-feather="eye"></i>
                                    </span>
                                </a>
                            @else
                                <a :href="homepath + '/article/' + current_article.url_en" target="_blank">
                                    <span style="height: 100%" class="btn badge badge-warning d-flex align-items-center mr-2">
                                        <i data-feather="eye"></i>
                                    </span>
                                </a>
                            @endif
                            <button @click="validate(UpdateArticle)" class="btn btn-primary btn-sm-block font-weight-bold rounded-0 text-uppercase">{{__('Update Article')}}</button>
                        </div>
                    </div>
    
                    <div class="widget-content">
                        <div class="tabs tab-content">
                            <div id="content_1" class="tabcontent"> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input v-validate="'required'" type="text" v-model="article.title" class="form-control rounded-0" name="title" id="tile" placeholder="{{__('Type the title')}}">
                                            <span class="text-danger" style="font-size: 12px;" v-show="errors.has('title')">* @{{ errors.first('title') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea v-validate="'required|max:250'" v-model="article.short_description" class="form-control rounded-0" name="short description" cols="30" rows="5" placeholder="{{__('Type short description')}}"></textarea>
                                            <span class="text-danger" style="font-size: 12px;" v-show="errors.has('short description')">* @{{ errors.first('short description') }}</span>
                                         </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea id="summernote" data-toolbar="slim"></textarea>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-two">
                    <div class="widget-content py-3">
                        <!-- <div class="col-md-12 mb-3">
                            <div class="d-flex pb-2 border-bottom text-white">
                                {{__('Spanish')}}
                                <label class="mb-0 s-outline s-outline-default switch mx-2">
                                    <input type="checkbox" id="language-switch" type="checkbox" :checked="lang == 'en'">
                                    <span class="slider round"></span>
                                </label>
                                {{__('English')}}
                            </div>
                        </div> -->
                        <div class="col-md-12 mb-4">
                            <div class="">
                                <span @click="change_picture = !change_picture" class="btn btn-block font-weight-bold mb-2 px-2 py-1 rounded-0">{{__('Change Picture')}}</span>
                                <img v-show="!change_picture" class="img-thumbnail rounded-0" style="width: 100%; box-shadow: 3px 4px 3px black;" :src="homepath + '/images/articles/' + current_article.attach_reference + '/' + current_article.img_thumbnail" alt="">
                                <div v-show="change_picture" class="dropzone-container rounded text-center">
                                    <form class="dropzone dz-clickable " id="Dropzone">
                                        @csrf
                                        <input type="hidden" name="attach_reference" v-model="article.attach_reference">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="border-bottom widget-heading px-0">
                                <h6 class="">{{__('Select Collaborator')}}:</h6>
                                <span class="text-danger" style="font-size: 12px;" v-show="errors.has('collaborator')">* @{{ errors.first('collaborator') }}</span>
                            </div>
                            <div class="form-group">
                                <select v-validate="'required'" multiple data-live-search="true" name="collaborator" title="Choose an author..." class="selectpicker form-control rounded-0" v-model="article.collaborator">
                                    <option v-for="collaborator in collaborators" :value=collaborator.id>
                                            @{{collaborator.name}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="border-bottom widget-heading px-0">
                                <h6 class="">{{__('Select Serie (Optional)')}}:</h6>
                            </div>
                            <div class="form-groups">
                                <select class="selectpicker form-control rounded-0" v-model="article.serie">
                                    <option value="" disabled selected>Choose a serie</option>
                                    <option v-for="serie in series" :value=serie.id>
                                        @if (App::getLocale() == 'es')
                                            @{{serie.serie_es}}
                                        @else
                                            @{{serie.serie_en}}
                                        @endif
                                    </option>
                                    
                                </select>
                                
                            </div>
                        </div>
                        
                        <div class="col-md-12 mb-2">
                            <div class="border-bottom widget-heading px-0">
                                <h6 class="">{{__('Select Category')}}:</h6>
                                <span class="text-danger" style="font-size: 12px;" v-show="errors.has('category')">* @{{ errors.first('category') }}</span>
                            </div>
                            <div class="article_options">
                                <div class="n-chk" v-for="category in categories">
                                    <label class="new-control new-radio radio-primary">
                                      <input v-validate="'required'" type="radio" class="new-control-input" v-model="article.category" :value="category.id" :id="'category' + category.id" name="category">
                                      <span class="new-control-indicator"></span>
                                      @if (App::getLocale() == 'es')
                                          @{{category.category_es}}
                                      @else
                                          @{{category.category_en}}
                                      @endif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="border-bottom widget-heading px-0">
                                <h6 class="">{{__('Choose Tags')}}:</h6>
                                <span class="text-danger" style="font-size: 12px;" v-show="errors.has('category')">* @{{ errors.first('category') }}</span>
                            </div>
                            <div class="article_options">
                                <div class="n-chk" v-for="tag in tags">
                                    <label class="new-control new-checkbox checkbox-primary">
                                      <input v-validate="'required'" type="checkbox" name="tags" :value="tag.id" v-model="article.tags" :id="'tag' + tag.id" class="new-control-input">
                                      <span class="new-control-indicator"></span>
                                      @if (App::getLocale() == 'es')
                                          @{{tag.tag_es}}
                                      @else
                                          @{{tag.tag_en}}
                                      @endif
                                    </label>
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
    var tags = {!! json_encode($tags) !!};
    var categories = {!! json_encode($categories) !!};
    var series = {!! json_encode($series) !!};
    var collaborators = {!! json_encode($collaborators) !!};
    var article = {!! json_encode($article) !!};
</script>
<script src="{{asset('/js/custom/admin/edit_article.js')}}"></script>
@endsection