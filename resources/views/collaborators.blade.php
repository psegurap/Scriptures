@extends('layouts.main')
@section('title', 'Collaborators')
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
                        <div v-for="collaborator in collaborators" class="col-lg-3 col-md-6 mb-5">
        
                            <div class="post-item">
                                <div class="">
                                    @if (App::getLocale() == 'es')
                                        <a :href="homepath + '/colaborador/' + collaborator.name">
                                            <img style="border-radius: 100%; width: 100%;" alt="" class="lazyloaded" :data-src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail"
                                            :src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail">
                                        </a>
                                    @else
                                        <a :href="homepath + '/collaborator/' + collaborator.name">
                                            <img style="border-radius: 100%; width: 100%;" alt="" class="lazyloaded" :data-src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail"
                                            :src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail">
                                        </a>
                                    @endif
                                </div>
                                <div class="fbt-post-caption">
                                    <div class="title-caption text-center pt-3 px-2">
                                        <div class="post-meta mb-2">
                                            {{-- <span class="post-author">
                                                <a href="#">fbtemplates</a>
                                            </span> --}}
                                            <span class="post-date published font-weight-bold font-italic">Collaborating since <span class="text-capitalize">@{{moment(collaborator.created_at).format('MMMM YYYY')}}</span></span>
                                        </div>
                                        <h3 class="post-title">
                                            @if (App::getLocale() == 'es')
                                                <a :href="homepath + '/colaborador/' + collaborator.name">@{{collaborator.name}}</a>
                                            @else
                                                <a :href="homepath + '/collaborator/' + collaborator.name">@{{collaborator.name}}</a>
                                            @endif
                                            
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
        var collaborators = {!! json_encode($collaborators) !!};
        
    </script>
    <script src="{{asset('/js/custom/general/collaborators.js')}}"></script>
@endsection