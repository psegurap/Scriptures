@extends('layouts.admin')
@section('title', 'New Member')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item"><a href="/admin/team">{{__('Team')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{__('New Member')}}</span></li>
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
                            <h5 class=" font-weight-bold">{{__('New Member')}}</h5>
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
                                                            <input type="hidden" name="attach_reference" v-model="member.attach_reference">
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
                                                                    <input v-validate="'required'" type="text" class="form-control" name="name" id="fullName" v-model="member.nombre" placeholder="{{__('Full Name')}}">
                                                                    <span class="text-danger" style="font-size: 12px;" v-show="errors.has('name')">* @{{ errors.first('name') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="profession">{{__('Email')}}</label>
                                                            <input v-validate="'required'" type="email" class="form-control" id="profession" name="email" v-model="member.email" placeholder="{{__('Email Address')}}">
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
                                                        <label for="">{{__('Role')}} (es)</label>
                                                        <input v-validate="'required'" type="text" class="form-control" name="role (es)" id="rolees" v-model="member.role_es" placeholder="{{__('Write the role...')}}">
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('role (es)')">* @{{ errors.first('role (es)') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">{{__('Role')}} (en)</label>
                                                        <input v-validate="'required'" type="text" class="form-control" name="role (en)" id="roleen" v-model="member.role_en" placeholder="{{__('Write the role...')}}">
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('role (en)')">* @{{ errors.first('role (en)') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country">{{__('Country')}}</label>
                                                        <select v-validate="'required'" class="form-control" v-model="member.country" name="country" id="country">
                                                            <option disabled value="">{{__('Select Country')}}</option>
                                                            {{-- <option>United States</option>
                                                            <option>India</option>
                                                            <option>Japan</option>
                                                            <option>China</option>
                                                            <option>Brazil</option>
                                                            <option>Norway</option>
                                                            <option>Canada</option> --}}
                                                            <option>República Dominicana</option>
                                                        </select>
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('country')">* @{{ errors.first('country') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">{{__('Website')}}</label>
                                                        <input type="text" class="form-control " id="website1" v-model="member.website" placeholder="{{__('Write the website here')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Facebook</label>
                                                        <input  type="text" class="form-control " name="facebook" id="facebook" v-model="member.facebook" placeholder="{{__('Write the Facebook Account...')}}">
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('facebook')">* @{{ errors.first('facebook') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Instagram</label>
                                                        <input  type="text" class="form-control" name="instagram" id="instagram" v-model="member.instagram" placeholder="{{__('Write the Instagram Account...')}}">
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('instagram')">* @{{ errors.first('instagram') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Twitter</label>
                                                        <input  type="text" class="form-control " name="twitter" id="twitter" v-model="member.twitter" placeholder="{{__('Write the Twitter Account...')}}">
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('twitter')">* @{{ errors.first('twitter') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">YouTube</label>
                                                        <input  type="text" class="form-control " name="youtube" id="youtube" v-model="member.youtube" placeholder="{{__('Write the Youtube Account...')}}">
                                                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('youtube')">* @{{ errors.first('youtube') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group text-right">
                                                        <button @click="validate(SaveMember)" class="btn btn-primary rounded-0 font-weight-bold text-uppercase">{{__('Save Member')}}</button>
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
    <script src="{{asset('/js/custom/admin/new_team.js')}}"></script>

@endsection