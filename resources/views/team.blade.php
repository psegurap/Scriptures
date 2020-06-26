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
                        <div v-for="member in team" class="col-lg-3 col-md-6 mb-5">
        
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
                                    </div>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
            </div><!-- .fbt-gallery -->
        </div><!-- .outer-wrapper -->
        
        <div class="fbt-newsletter-area">
            <div class="fbt-bottom-section clearfix" id="fbt_bottom_section">
        
                <div class="widget FollowByEmail">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="follow-by-email-inner subscriber-form col-lg-12">
                                <div class="card-- py-5">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-6">
                                            <h2 class="title mb-4 mb-lg-0 text-center text-lg-left">
                                                Subscribe to our Newsletter!!!
                                            </h2>
                                        </div>
                                        <div class="ml-lg-auto col-lg-6">
                                            <form action="#" class="fbt-email-form" method="post">
                                                <input autocomplete="off" class="follow-by-email-address" name="email" placeholder="Enter your Email" type="email">
                                                <input class="follow-by-email-submit" type="submit" value="Subscribe">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .FollowByEmail -->
        
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>
        var team = {!! json_encode($team) !!};
        
    </script>
    <script src="{{asset('/js/custom/general/team.js')}}"></script>
@endsection