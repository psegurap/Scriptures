@extends('layouts.main')
@section('title'){{__('Contact')}}@endsection
@section('styles')
    <style>
        .title-page{
            font-size: 3em;
        }

        .diviser{
            height: 2px;
            background: black;
        }

        .contact-form .form-control {
            border-width: 1px;
            border-color: #ccc;
        }
        .contact-form{
            box-shadow: 0px 1px 3px 0px #777777;
        }
        
        .fbt-contact-info{
            box-shadow: 0px 1px 3px 0px #777777;
        }

        .single-input-form {
            border: 1px solid #d2d2d2;
            /* border-radius: 0px; */
            height: 45px;
            padding-left: 18px;
            font-size: 13px;
            /* background: transparent; */
        }

        .single-input-form:focus {
            outline: 0;
            box-shadow: none;
        }

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

        <div class="container fbt-elastic-container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <span class="text-uppercase bree title-page">{{__('Contact')}} - Anclados en Su Palabra</span>
                    </div>
                </div>
                <div class="col-md-12 px-2">
                    <hr class="mt-1 mb-4 diviser"/>
                </div>
            </div>
            <div class="row justify-content-center">

                <!-- Main Wrapper -->
                <div class="fbt-main-wrapper col-lg-8 mb-5 mb-lg-0">

                    <div id="main-wrapper">
                        <div class="main-section" id="main_content">
                            
                            <div class="blog-posts fbt-item-post-wrap">

                                <div class="blog-post fbt-item-post">
                                   
                                    <div class="post-body post-content">
                                        
                                        <div id="fbt-contact-form" class="border contact-form p-3 rounded bree">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">{{__('Name')}}*</label>
                                                        <input v-model="message.name" v-validate="'required'" class="form-control single-input-form" id="name" name="name" type="text" placeholder="{{__('Write your name...')}}">
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('name')">* @{{ errors.first('name') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mail">{{__('Email Address')}}*</label>
                                                        <input v-model="message.email" v-validate="'required|email'" class="form-control single-input-form" id="email" name="email" type="text" placeholder="{{__('Write your email...')}}">
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('email')">* @{{ errors.first('email') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="name">{{__('Subject')}}*</label>
                                                        <input v-model="message.subject" v-validate="'required'" class="form-control single-input-form" id="subject" name="subject" type="text" placeholder="{{__('Write the subject...')}}">
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('subject')">* @{{ errors.first('subject') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="message">{{__('Message')}}*</label>
                                                        <textarea v-model="message.message" v-validate="'required'" class="form-control single-input-form" rows="8" id="message" name="message" placeholder="{{__('Write the message...')}}"></textarea>
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('message')">* @{{ errors.first('message') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-success radius-0" @click="validate(SendMessage)" type="button" id="submit-contact">
                                                {{__('Submit Message')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .fbt-item-post-wrap -->
                        </div>
                    </div><!-- #main-wrapper -->

                </div><!-- .fbt-main-wrapper -->

                <div class="fbt-main-sidebar col-lg-4">
                    <div class="fbt-main-sidebar__content h-100 pl-lg-3">

                        <div class="fbt-contact-info p-3">

                            <div class="fbt-contact-info-box">
                                <div class="fbt-contact-info-box-content">
                                    <div class="fbt-sep-title">
                                        <h4 class="title title-heading-left">Webagency</h4>
                                        <div class="title-sep-container">
                                            <div class="title-sep sep-double"></div>
                                        </div>
                                    </div>
                                    <p class="merriweather">Santo Domingo, <br/>{{__('Dominican Republic')}}</p>
                                </div>
                            </div>
                        
                            <div class="fbt-contact-info-box">
                                <div class="fbt-contact-info-box-content">
                                    <div class="fbt-sep-title">
                                        <h4 class="title title-heading-left">Email Us</h4>
                                        <div class="title-sep-container">
                                            <div class="title-sep sep-double"></div>
                                        </div>
                                    </div>
                                    <p class="merriweather">{{env('APP_EMAIL')}}</p>
                                </div>
                            </div>
                        
                            {{-- <div class="fbt-contact-info-box">
                                <div class="fbt-contact-info-box-content">
                                    <div class="fbt-sep-title">
                                        <h4 class="title title-heading-left">Call Us</h4>
                                        <div class="title-sep-container">
                                            <div class="title-sep sep-double"></div>
                                        </div>
                                    </div>
                                    <p>+123-456-7890</p>
                                </div>
                            </div> --}}
                        
                        </div><!-- Widget end -->

                    </div>    
                </div><!-- .fbt-main-sidebar -->

                <!-- Sidebar Wrapper -->
                <div class="sidebar-wrapper" id="sidebar-wrapper">
                    <div class="sidebar-wrapper__content">
                        <div class="navigation-container clearfix">
                            <span class="closebtn" onclick="closeNav()">×</span>
                        </div>
                        <div class="sidebar-top section" id="menu_sidebar">
                            <div class="widget LinkList mt-0">
                                <div class="widget-content fbt-sidebar--menu">
                                    <ul class="list-group">
                                        <li class="list-group-item"><a href="/">HOME</a></li>
                                        <li class="list-group-item"><a href="#">ABOUT</a></li>
                                        <li class="list-group-item"><a href="#">SERVICES</a></li>
                                        <li class="list-group-item"><a href="#">CONTACT</a></li>
                                        <li class="list-group-item"><a href="#">PRIVACY</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar section" id="main_sidebar">
                            <div class="widget Label">

                                <div class="fbt-sep-title">
                                    <h4 class="title title-heading-left">Categories</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double"></div>
                                    </div>
                                </div>

                                <div class="widget-content cloud-label--widget-content">
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Business</span></a>
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Carousel</span></a>
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Design</span></a>
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Entertainment</span></a>
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Featured</span></a>
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Friends</span></a>
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Home</span></a>
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Lifestyle</span></a>
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">People</span></a>
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Slider</span></a>
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Sport</span></a>
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Technology</span></a>
                                    <a href="#"><span class="badge badge-success py-1 px-2 mb-1">Training</span></a>
                                </div>
                            </div>
                            <div class="widget BlogArchive">
                                <div class="fbt-sep-title">
                                    <h4 class="title title-heading-left">Archive</h4>
                                    <div class="title-sep-container">
                                        <div class="title-sep sep-double"></div>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <div id="ArchiveList">
                                        <div id="BlogArchive1_ArchiveList">
                                            <ul class="flat list-unstyled">
                                                <li class="archivedate">
                                                    <a href="#">June<span class="post-count float-right badge badge-primary">2</span></a>
                                                </li>
                                                <li class="archivedate">
                                                    <a href="#">September<span class="post-count float-right badge badge-primary">1</span></a>
                                                </li>
                                                <li class="archivedate">
                                                    <a href="#">May<span class="post-count float-right badge badge-primary">1</span></a>
                                                </li>
                                                <li class="archivedate">
                                                    <a href="#">April<span class="post-count float-right badge badge-primary">1</span></a>
                                                </li>
                                                <li class="archivedate">
                                                    <a href="#">March<span class="post-count float-right badge badge-primary">26</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- #sidebar-wrapper -->
            </div>
        </div>
    </div><!-- .outer-wrapper -->
</main>
@endsection
@section('scripts')
    <script>
        
    </script>
    <script src="{{asset('/js/custom/general/contact.js')}}"></script>
@endsection

