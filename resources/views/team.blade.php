@extends('layouts.main')
@section('title', 'Team')
@section('styles')
    <style>
        .post-meta {
            font-size: calc(15px - 2px);
        }
    </style>
@endsection
@section('content')
    <main>
        <div class="outer-wrapper my-5" id="outer-wrapper">
            <div class="fbt-gallery mb-5">
                <div class="fbt-elastic-container fbt-gallery-1 px-xl-5">
                    <div class="row px-2">
                        <div v-for="member in team" class="col-lg-3 col-md-4 col-sm-6 col-12 mb-5">
                            <div class="post-item">
                                <div class="">
                                    <img style="border-radius: 100%; width: 100%;" alt="" class="lazyloaded" :data-src="homepath + '/images/team/' + member.attach_reference + '/' + member.img_thumbnail"
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
                                    <div class="title-caption text-center pt-3 px-2">
                                        <div class="post-meta mb-2">
                                            {{-- <span class="post-author">
                                                <a href="#">fbtemplates</a>
                                            </span> --}}
                                            <span class="post-date published font-weight-bold font-italic"><span class="text-capitalize">@{{member.role}}</span></span>
                                        </div>
                                        <h3 class="post-title">
                                            @{{member.name}}
                                        </h3>
                                        <div class="mt-2">
                                            <span v-if="member.facebook != null && member.facebook != ''" class="mx-2"><a :href="'//' + member.facebook" target="_blank"><i class="fa fa-facebook fa-lg" aria-hidden="true"></a></i></span>
                                            <span v-if="member.twitter != null && member.twitter != ''" class="mx-2"><a :href="'//' + member.twitter" target="_blank"><i class="fa fa-twitter fa-lg" aria-hidden="true"></a></i></span>
                                            <span v-if="member.instagram != null && member.instagram != ''" class="mx-2"><a :href="'//' + member.instagram" target="_blank"><i class="fa fa-instagram fa-lg" aria-hidden="true"></a></i></span>
                                            <span v-if="member.youtube != null && member.youtube != ''" class="mx-2"><a :href="'//' + member.youtube" target="_blank"><i class="fa fa-youtube fa-lg" aria-hidden="true"></a></i></span>
                                            <span v-if="member.website != null && member.website != ''" class="mx-2"><a :href="'//' + member.website" target="_blank"><i class="fa fa-link fa-lg" aria-hidden="true"></a></i></span>
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