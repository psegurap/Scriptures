@extends('layouts.admin')
@section('title', 'Users')
@section('styles')
    <link rel="stylesheet" href="{{asset('admin/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/forms/switches.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/components/custom-modal.css')}}">
    
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{__('Users')}}</span></li>
@endsection
@section('content')
<main>
    <div class="layout-px-spacing">
    
        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-4 layout-spacing">
                <div class="px-4 py-3 widget widget-chart-one">
                    <div class="widget-heading mb-0">
                        <h5 class="align-self-center font-weight-bold text-uppercase mb-0">Users</h5>
                        <a href="/register">
                            <button class="btn btn-primary font-weight-bold">{{__('New User')}}</button>
                        </a>
                    </div>
                </div>
            </div>
    
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-2">
                        <table id="table" class="table table-hover category-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Permissions')}}</th>
                                    <th>{{__('Edit')}}</th>
                                    {{-- <th class="no-content"></th> --}}
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="PermissonsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title">{{__('Update Permissions')}}</h5>
                <button @click="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="form-contact comment_form row border-bottom pb-3">
                    <aside class="col-md-6">
                        <label for="">{{__('Name')}}:</label>
                        <input type="text" v-model="user.name" disabled class="form-control rounded-0">
                    </aside>
                    <aside class="col-md-6">
                        <label for="">{{__('Email')}}:</label>
                        <input type="text" v-model="user.email" disabled class="form-control rounded-0">
                    </aside>
                </section>
                <div class="row mt-3">
                    <div class="col-sm-6">
                        <div class="align-items-center d-flex flex-column">
                            <span class="font-weight-bold h6 text-uppercase text-white">Content Checker</span>
                            <label class="switch s-outline s-outline-primary mt-1 mb-0">
                                <input type="checkbox" id="checker-input" :checked="user.filter">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2 mt-sm-0">
                        <div class="align-items-center d-flex flex-column">
                            <span class="font-weight-bold h6 text-uppercase text-white">Administrador</span>
                            <label class="switch s-outline s-outline-primary mt-1 mb-0">
                                <input type="checkbox" id="admin-input" :checked="user.admin">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" @click="closeModal" class="btn btn-danger rounded-0" data-dismiss="modal">{{__('Close')}}</button>
                {{-- <button type="button" @click="closeModal()" class="btn btn-danger rounded-0" data-dismiss="modal">{{__('Close')}}</button> --}}
            </div>
        </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')

<script src="{{asset('/admin/plugins/table/datatable/datatables.js')}}"></script>
<script src="{{asset('/js/custom/admin/users.js')}}"></script>
<script>
    var users = {!! json_encode($users); !!}
    var user_id = '{{Auth::user()->id}}';

</script>
@endsection