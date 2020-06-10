@extends('layouts.admin')
@section('title', 'New Article')
@section('styles')
    <style>
        .article_options{
            max-height: 172px;
            overflow-y: auto;
        }
        .custom-control-input:focus ~ .custom-control-label::before {
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .note-toolbar button{
            border: 1px solid lightgray;
        }
        .modal-header .close{
            padding: 0px;
            margin: 0px
        }

    </style>
@endsection
@section('content')
    <main class="">        
        <div class="outer-wrapper my-5" id="outer-wrapper">
            <div class="container fbt-elastic-container">
                <div class="row justify-content-center all_content">
                    <!-- Main Wrapper -->
                    <div class="fbt-main-wrapper col-lg-12 mb-3">
                        <div class="row oswald">
                            <div class="col-md-12">
                                <div class="header-pages d-flex justify-content-between text-right pb-3" style="border-bottom: 1px solid #17a2b8;">
                                    <h2 class="h1" style="font-family: 'Oswald', sans-serif;">{{__('New Article')}}</h2>
                                    <button @click="validate(SaveArticle)" class="btn btn-info rounded-0">
                                        <span class="font-weight-bold text-uppercase">
                                            {{__('Save Article')}}
                                        </span> 
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fbt-main-wrapper col-lg-8 mb-5 mb-lg-0">
                        <div class="row">
                            <div class="col-md-12 oswald">
                                <div class="form-group">
                                    <input v-validate="'required'" v-model.lazy="article.title" class="form-control admin-input" name="title" id="tile" type="text" name="title" placeholder="{{__('Type the title')}}">
                                    <span class="text-danger" style="font-size: 12px;" v-show="errors.has('title')">* @{{ errors.first('title') }}</span>
                                 </div>
                            </div>
                            <div class="col-md-12 oswald">
                                <div class="form-group">
                                    <textarea v-validate="'required|max:157'" class="form-control w-100 admin-area" v-model.lazy="article.short_description" name="short description" cols="30" rows="7" placeholder="{{__('Type short description')}}"></textarea>
                                    <span class="text-danger" style="font-size: 12px;" v-show="errors.has('short description')">* @{{ errors.first('short description') }}</span>
                                 </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="summernote" data-toolbar="slim"></textarea>
                                 </div>
                            </div>
                        </div>
                    </div><!-- .fbt-main-wrapper -->
                    <div class="fbt-main-sidebar col-lg-4 oswald">
                        <div class="fbt-main-sidebar__content h-100 pl-lg-3">
                            <div class="widget mb-4">
                                <div class="fbt-sep-title">
                                    <h4 class="title title-heading-left">{{__('Picture')}}:</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double"></div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div class="">
                                        <div class="dropzone-container rounded text-center">
                                            <form class="dropzone dz-clickable " id="Dropzone">
                                            @csrf
                                            <input type="hidden" name="attach_reference" v-model="article.attach_reference">
                                            </form>
                                         </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget mb-4">
                                <div class="fbt-sep-title">
                                    <h4 class="title title-heading-left">{{__('Select Serie (Optional)')}}:</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double"></div>
                                    </div>
                                </div>
                                <div class="widget-content border p-2">
                                    <div class="">
                                        <select v-model.lazy="article.serie" id="select-category" class="mdb-select md-form m-0" searchable="Search here...">
                                            <option value="" disabled selected>Choose a serie</option>
                                            <option v-for="serie in series" :value="serie.id">
                                                @if (App::getLocale() == 'es')
                                                    @{{serie.serie_es}}
                                                @else
                                                    @{{serie.serie_en}}
                                                @endif
                                            </option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <div class="widget mb-4">
                                <div class="fbt-sep-title">
                                    <h4 class="title title-heading-left">{{__('Select Category')}}:</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double"></div>
                                    </div>
                                </div>
                                <span class="text-danger" style="font-size: 12px;" v-show="errors.has('category')">* @{{ errors.first('category') }}</span>
                                <div class="widget-content border p-2">
                                    <div class="article_options">
                                        <div v-for="category in categories" class="custom-control custom-radio">
                                            <input v-validate="'required'" type="radio" class="custom-control-input" v-model.lazy="article.category" :value="category.id" :id="'category' + category.id" name="category">
                                            <label class="custom-control-label" :for="'category' + category.id">
                                                @if (App::getLocale() == 'es')
                                                    @{{category.category_es}}
                                                @else
                                                    @{{category.category_en}}
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="widget mb-4">
                                <div class="fbt-sep-title">
                                    <h4 class="title title-heading-left">{{__('Choose Tags')}}:</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double"></div>
                                    </div>
                                </div>
                                <span class="text-danger" style="font-size: 12px;" v-show="errors.has('tags')">* @{{ errors.first('tags') }}</span>
                                <div class="widget-content border p-2">
                                    <div class="article_options">
                                        <div v-for="tag in tags" class="custom-control custom-checkbox">
                                            <input v-validate="'required'" type="checkbox" name="tags" class="custom-control-input" :value="tag.id" v-model.lazy="article.tags" :id="'tag' + tag.id">
                                            <label class="custom-control-label" :for="'tag' + tag.id">
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
                    </div><!-- .fbt-main-sidebar -->
                </div>
            </div>
        </div><!-- .outer-wrapper -->
    </main>
@endsection
@section('scripts')

<script>
    var tags = {!! json_encode($tags) !!};
    var categories = {!! json_encode($categories) !!};
    var series = {!! json_encode($series) !!};
</script>
<script src="{{asset('/js/custom/admin/new_article.js')}}"></script>
    
@endsection