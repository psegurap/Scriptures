@extends('layouts.admin')
@section('title', 'Collaborators')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{__('Collaborators')}}</span></li>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/assets/css/apps/contacts.css')}}">

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
    
        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
            <div class="col-lg-12">
                <div class="widget-content searchable-container list">

                    <div class="row">
                        

                        <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center layout-spacing align-self-center pb-0">
                            <div class="d-flex">
                                <div class="switch align-self-center">
                                    <h4 class="font-weight-bold">Collaborators</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center pb-0">
                            <div class="my-2 my-lg-0">
                                <div class="d-flex align-items-center">
                                    <a :href="homepath + '/admin/collaborators/new'">
                                        <svg id="btn-add-contact" class="badge" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                    </a>
                                    <input type="text" class="form-control product-search" id="input-search" placeholder="Search Contacts...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="border-bottom my-3">

                            </div>
                        </div>
                    </div>

                    <div class="searchable-items list">
                        <div v-for="collaborator in collaborators" class="items">
                            <div class="item-content">
                                <div class="user-profile">
                                    <img :src="homepath + '/images/collaborators/' + collaborator.attach_reference + '/' + collaborator.img_thumbnail" alt="avatar">
                                    <div class="user-meta-info">
                                        <p class="user-name" :data-name="collaborator.name">@{{collaborator.name}}</p>
                                        <p class="user-work" :data-email="collaborator.email">@{{collaborator.email}}</p>
                                    </div>
                                </div>
                                <div class="action-btn">
                                    <a :href="homepath + '/admin/collaborators/edit/' + collaborator.id">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    </a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 delete"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
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
        var collaborators = {!! json_encode($collaborators) !!}
    </script>
    
    <script src="{{asset('/js/custom/admin/collaborators.js')}}"></script>

@endsection