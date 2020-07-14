@extends('layouts.admin')
@section('title', 'User Profile')
@section('styles')
    <link href="{{asset('/admin/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
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
    <li class="breadcrumb-item active" aria-current="page"><span>{{__('User Profile')}}</span></li>
@endsection
@section('content')
<main>
    <div class="layout-px-spacing">
        <div class="row layout-spacing">
            <!-- Content -->
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                <div class="user-profile layout-spacing">
                    <div class="widget-content widget-content-area">
                        <div class="d-flex justify-content-between">
                            <h3 class="">Profile</h3>
                            <a @click="change_info = !change_info" href="javascript:void(0)" class="mt-2 edit-profile badge"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                        </div>
                        <div class="text-center user-info">
                            <img v-if="user.img_thumbnail != null && user.img_thumbnail != ''" :src="homepath + '/images/admin/' + user.attach_reference + '/' + user.img_thumbnail" style="width: 100px;" alt="avatar">
                            <img v-else :src="homepath + '/images/admin/default_user.png'" style="width: 100px;" alt="avatar">
                            <p class="">@{{user.name}}</p>
                        </div>
                        <div class="user-info-list">
                            <div class="">
                                <ul class="contacts-block list-unstyled">
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg><span v-if="user.developer == 1">{{__('Developer')}}</span><span v-else-if="user.admin == 1">{{__('Administrador')}}</span><span v-else>{{__('Content Checker')}}</span>
                                    </li>
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>@{{user.email}}
                                    </li>
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>@{{user.phone}}
                                    </li>
                                    <li class="contacts-block__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>@{{moment(user.created_at).format('ll')}}
                                    </li>
                                </ul>
                            </div>                                    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
                <div class="user-profile layout-spacing" v-show="change_info">
                    <div class="widget-content widget-content-area">
                        <div class="d-flex justify-content-between mb-3">
                            <h3 class="">Edit Information</h3>
                            <a href="/admin/users/password/change" class="mt-2 edit-profile badge"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg></a>
                        </div>
                        <div class="row">
                            <div class="col-xl-5 col-lg-12 col-md-4">
                                <div class="">
                                    <div class="dropzone-container rounded text-center mb-md-2">
                                        <form class="dropzone dz-clickable " id="Dropzone">
                                        @csrf
                                        <input type="hidden" name="attach_reference" v-model="profile.attach_reference">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-12 col-md-8 mt-md-0 mt-4">
                                <div class="form" style="width:100%;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="fullName">Name</label>
                                                <input v-validate="'required'" type="text" class="form-control" name="name" v-model="profile.name" id="fullName" placeholder="Write your name...">
                                                <span class="text-danger" style="font-size: 12px;" v-show="errors.has('name')">* @{{ errors.first('name') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Email</label>
                                        <input type="text" class="form-control" name="emal" v-model="profile.email" id="email" placeholder="Write your email...">
                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('emal')">* @{{ errors.first('emal') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" v-model="profile.phone" id="phone" placeholder="Write your phone number here">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="border-top my-3"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-right">
                                    <button @click="validate(UpdateProfile)" class="btn btn-primary rounded-0 font-weight-bold text-uppercase">Update Profile</button>
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
        var user = {!! json_encode($user) !!}
    </script>
    <script src="{{asset('/js/custom/admin/user_profile.js')}}"></script>

@endsection