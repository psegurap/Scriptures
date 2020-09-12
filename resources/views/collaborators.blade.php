@extends('layouts.main')
@section('title'){{__('Collaborators')}}@endsection
@section('styles')
    <style>

        .post-meta {
            font-size: calc(20px - 2px);
        }

        .member-image{
            box-shadow: 0px 2px 10px 0px #777777;
        }

        .member-image:hover{
            transition: all 0.3s ease-out;
            -webkit-transition: all 0.3s ease-out;
            -webkit-transform: translateY(-3px);
            transform: translateY(-3px);
        }

        .title-page{
            font-size: 3em;
        }

        .diviser{
            height: 2px;
            background: black;
        }

        .social-link i:hover{
            transition: all 0.3s ease-out;
            -webkit-transition: all 0.3s ease-out;
            -webkit-transform: translateY(-3px);
            transform: translateY(-3px);
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
        <div class="outer-wrapper mb-5 mt-4" id="outer-wrapper">
            <div class="fbt-gallery mb-5">
                <div class="fbt-elastic-container fbt-gallery-1 px-xl-5">
                    <div class="row px-2">
                        <div class="col-md-12">
                            <div>
                                <span class="text-uppercase bree title-page">{{__('Collaborators')}}</span>
                            </div>
                        </div>
                        <div class="col-md-12 px-md-0">
                            <hr class="mt-1 mb-4 diviser"/>
                        </div>
                    </div>
                    <div class="row px-2">
                        <div v-for="collaborator in collaborators" class="col-lg-3 col-md-6 mb-5">
                            <div class="border-bottom pb-3 post-item">
                                <div class="px-5 px-md-0">
                                    @if (App::getLocale() == 'es')
                                        <a :href="homepath + '/colaborador/' + collaborator.name">
                                            <img v-if="collaborator.img_thumbnail != '---'" style="border-radius: 100%; width: 100%;" alt="" class="lazyloaded member-image" :data-src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail"
                                            :src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail">
                                            <img v-else style="border-radius: 100%; width: 100%;" alt="" class="lazyloaded member-image" :data-src="homepath + '/images/collaborator_default.png'"
                                            :src="homepath + '/images/collaborator_default.png'">
                                        </a>
                                    @else
                                        <a :href="homepath + '/collaborator/' + collaborator.name">
                                            <img v-if="collaborator.img_thumbnail != '---'" style="border-radius: 100%; width: 100%;" alt="" class="lazyloaded member-image" :data-src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail"
                                            :src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail">
                                            <img v-else style="border-radius: 100%; width: 100%;" alt="" class="lazyloaded member-image" :data-src="homepath + '/images/collaborator_default.png'"
                                            :src="homepath + '/images/collaborator_default.png'">
                                        </a>
                                    @endif
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-4 px-2">
                                        <h3 class="post-title">
                                            @if (App::getLocale() == 'es')
                                                <a :href="homepath + '/colaborador/' + collaborator.name">@{{collaborator.name}}</a>
                                            @else
                                                <a :href="homepath + '/collaborator/' + collaborator.name">@{{collaborator.name}}</a>
                                            @endif
                                        </h3>
                                        <div class="post-meta mb-0">
                                            <span class="font-italic post-date published">@{{collaborator.country}}</span>
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
        var collaborators = {!! json_encode($collaborators) !!};
        
    </script>
    <script src="{{asset('/js/custom/general/collaborators.js')}}"></script>
@endsection