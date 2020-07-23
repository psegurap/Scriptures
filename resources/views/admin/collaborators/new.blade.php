@extends('layouts.admin')
@section('title', 'New Collaborator')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item"><a href="/admin/collaborators">{{__('Collaborators')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{__('New Collaborator')}}</span></li>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/dropify/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/assets/css/users/account-setting.css')}}">
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
@section('content')
<main>
    <div class="layout-px-spacing">
    
        <div class="account-settings-container layout-top-spacing">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-chart-one px-4 py-3">
                        <div class="widget-heading mb-0">
                            <h5 class=" font-weight-bold">{{__('New Collaborator')}}</h5>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div id="general-info" class="section general-info">
                                <div class="info pt-4">
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-12 col-md-4">
                                                    <div class="">
                                                        <div class="dropzone-container rounded text-center">
                                                            <form class="dropzone dz-clickable " id="Dropzone">
                                                            @csrf
                                                            <input type="hidden" name="attach_reference" v-model="collaborator.attach_reference">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                    <div class="form" style="width:100%;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="fullName">{{__('Full Name')}}</label>
                                                                    <input v-validate="'required'" type="text" class="form-control" name="name" id="fullName" v-model="collaborator.nombre" placeholder="{{__('Full Name')}}">
                                                                    <span class="text-danger" style="font-size: 12px;" v-show="errors.has('name')">* @{{ errors.first('name') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="profession">{{__('Email')}}</label>
                                                            <input v-validate="'required'" type="email" class="form-control" id="profession" name="email" v-model="collaborator.email" placeholder="{{__('Email Address')}}">
                                                            <span class="text-danger" style="font-size: 12px;" v-show="errors.has('email')">* @{{ errors.first('email') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="border-top my-3"></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country">{{__('Country')}}</label>
                                                        <select class="form-control" v-model="collaborator.country" name="country" id="country">
                                                            <option value="" disabled>{{__('Select Country')}}</option>
                                                            <option>United States</option>
                                                            <option>India</option>
                                                            <option>Japan</option>
                                                            <option>China</option>
                                                            <option>Brazil</option>
                                                            <option>Norway</option>
                                                            <option>Canada</option>
                                                            <option>República Dominicana</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone">{{__('Phone')}}</label>
                                                        <input type="text" class="form-control mb-4" name="phone" id="phone" v-model="collaborator.phone" placeholder="{{__('Write the phone number here')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="website1">{{__('Website')}}</label>
                                                        <input type="text" class="form-control mb-4" id="website1" v-model="collaborator.website" placeholder="{{__('Write the website here')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="website1">{{__('Biography')}} (es)</label>
                                                        <textarea v-validate="'required|max:500'" class="form-control" name="biography (es)" id="aboutBio" style="height: 100%;" v-model="collaborator.biography_es" placeholder="{{__('Write biography on spanish')}}" rows="5"></textarea>
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('biography (es)')">* @{{ errors.first('biography (es)') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="website1">{{__('Biography')}} (en)</label>
                                                        <textarea v-validate="'required|max:500'" class="form-control" name="biography (en)" id="aboutBio" style="height: 100%;" v-model="collaborator.biography_en" placeholder="{{__('Write biography on english')}}" rows="5"></textarea>
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('biography (en)')">* @{{ errors.first('biography (en)') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group text-right">
                                                        <button @click="validate(SaveCollaborator)" class="btn btn-primary rounded-0 font-weight-bold text-uppercase">{{__('Save Collaborator')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        
    </script>
    <script src="{{asset('/js/custom/admin/new_collaborator.js')}}"></script>

@endsection