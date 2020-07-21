@extends('layouts.main')
@section('title'){{__('Team')}}@endsection
@section('styles')
    <style>
        .post-meta {
            font-size: calc(16px - 0px);
        }

        .member-image{
            box-shadow: 0px 2px 10px 0px #777777;
        }

        .member-image:hover{
            transition: all 0.3s ease-out;
            -webkit-transition: all 0.3s ease-out;
            -webkit-transform: translateY(-2px);
            transform: translateY(-2px);
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
                                <span class="text-uppercase bree title-page">{{__('Team')}} - Anclados en Su Palabra</span>
                            </div>
                        </div>
                        <div class="col-md-12 px-2">
                            <hr class="mt-1 mb-4 diviser"/>
                        </div>
                    </div>
                    <div class="row px-2">
                        <div v-for="member in team" class="col-lg-3 col-md-4 col-sm-6 col-12 mb-5">
                            <div class="post-item">
                                <div class="">
                                    <img style="border-radius: 100%; width: 100%;" alt="" class="lazyloaded member-image" :data-src="homepath + '/images/team/' + member.attach_reference + '/' + member.img_thumbnail"
                                    :src="homepath + '/images/team/' + member.attach_reference + '/' + member.img_thumbnail">
                                    {{-- @if (App::getLocale() == 'es')
                                    <a :href="homepath + '/colaborador/' + member.name">
                                        </a>
                                    @else
                                        <a :href="homepath + '/member/' + member.name">
                                            <img style="border-radius: 100%; width: 100%;" alt="" class="lazyloaded" :data-src="homepath + '/images/team/' + member.attach_reference + '/' + member.img_thumbnail"
                                            :src="homepath + '/images/team/' + member.attach_reference + '/' + member.img_thumbnail">
                                        </a>
                                    @endif --}}
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-4 px-2">
                                        <h3 class="post-title">
                                            @{{member.name}}
                                        </h3>
                                        <div class="post-meta mb-0">
                                            <span class="post-date published font-weight-bold font-italic merriweather"><span class="text-capitalize">@{{member.role}}</span></span>
                                        </div>
                                        <div class="mt-2 border-bottom border-top py-2 text-left">
                                            <span v-if="member.facebook != null && member.facebook != ''" class="mx-2"><a :href="'//' + member.facebook" target="_blank" class="social-link"><i class="fa fa-facebook fa-lg d-inline-block badge badge-primary" aria-hidden="true"></a></i></span>
                                            <span v-if="member.twitter != null && member.twitter != ''" class="mx-2"><a :href="'//' + member.twitter" target="_blank" class="social-link"><i class="fa fa-twitter fa-lg d-inline-block badge badge-primary" aria-hidden="true"></a></i></span>
                                            <span v-if="member.instagram != null && member.instagram != ''" class="mx-2"><a :href="'//' + member.instagram" target="_blank" class="social-link"><i class="fa fa-instagram fa-lg d-inline-block badge badge-primary" aria-hidden="true"></a></i></span>
                                            <span v-if="member.youtube != null && member.youtube != ''" class="mx-2"><a :href="'//' + member.youtube" target="_blank" class="social-link"><i class="fa fa-youtube-play fa-lg d-inline-block badge badge-primary" aria-hidden="true"></a></i></span>
                                            <span v-if="member.website != null && member.website != ''" class="mx-2"><a :href="'//' + member.website" target="_blank" class="social-link"><i class="fa fa-link fa-lg d-inline-block badge badge-primary" aria-hidden="true"></a></i></span>
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
        var team = {!! json_encode($team) !!};
        
    </script>
    <script src="{{asset('/js/custom/general/team.js')}}"></script>
@endsection