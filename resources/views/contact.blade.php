@extends('layouts.main')
@section('title', 'Contact')
@section('styles')
@endsection
@section('content')
<main>
    <div class="outer-wrapper my-5" id="outer-wrapper">

        <div class="container fbt-elastic-container">
            <div class="row justify-content-center">

                <!-- Main Wrapper -->
                <div class="fbt-main-wrapper col-lg-8 mb-5 mb-lg-0">

                    <div id="main-wrapper">
                        <div class="main-section" id="main_content">
                            
                            
                            
                            <div class="blog-posts fbt-item-post-wrap">

                                <div class="blog-post fbt-item-post">
                                    
                                    <div class="fbt-sep-title">
                                        <h4 class="title title-heading-left">Contact Us</h4>
                                        <div class="title-sep-container">
                                            <div class="title-sep sep-double"></div>
                                        </div>
                                    </div>
                                    <div class="post-body post-content">
                                        <p class="mb-4">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                            Ut porttitor leo vel nulla posuere accumsan. 
                                            Suspendisse sed tortor eget justo aliquam euismod. 
                                            Morbi ut massa et neque iaculis lacinia a eu...
                                        </p>
                                        <div id="fbt-contact-form" class="contact-form">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Name*</label>
                                                        <input v-model="message.name" v-validate="'required'" class="form-control shadow-none radius-0" id="name" name="name" type="text">
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('name')">* @{{ errors.first('name') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mail">E-mail*</label>
                                                        <input v-model="message.email" v-validate="'required|email'" class="form-control shadow-none radius-0" id="email" name="email" type="text">
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('email')">* @{{ errors.first('email') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group">
                                                        <label for="name">Subject*</label>
                                                        <input v-model="message.subject" v-validate="'required'" class="form-control shadow-none radius-0" id="subject" name="subject" type="text">
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('subject')">* @{{ errors.first('subject') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="message">Message*</label>
                                                        <textarea v-model="message.message" v-validate="'required'" class="form-control shadow-none radius-0" rows="8" id="message" name="message"></textarea>
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('message')">* @{{ errors.first('message') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-success radius-0" @click="validate(SendMessage)" type="button" id="submit-contact">
                                                Submit Message
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

                        <div class="fbt-contact-info">

                            <div class="fbt-contact-info-box">
                                <div class="fbt-contact-info-box-content">
                                    <div class="fbt-sep-title">
                                        <h4 class="title title-heading-left">Webagency</h4>
                                        <div class="title-sep-container">
                                            <div class="title-sep sep-double"></div>
                                        </div>
                                    </div>
                                    <p>Vouliagmenis Ave 325, <br/>Athens CA 17575</p>
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
                                    <p>info@nemesis.com</p>
                                </div>
                            </div>
                        
                            <div class="fbt-contact-info-box">
                                <div class="fbt-contact-info-box-content">
                                    <div class="fbt-sep-title">
                                        <h4 class="title title-heading-left">Call Us</h4>
                                        <div class="title-sep-container">
                                            <div class="title-sep sep-double"></div>
                                        </div>
                                    </div>
                                    <p>+123-456-7890</p>
                                </div>
                            </div>
                        
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

