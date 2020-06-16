@extends('layouts.admin2')
@section('title', 'Categories')
@section('styles')
    <link rel="stylesheet" href="{{asset('admin/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/components/custom-modal.css')}}">
    
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">{{__('Maintenance')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{__('Categories')}}</span></li>
@endsection
@section('content')
<main>
    <div class="layout-px-spacing">
    
        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-4 layout-spacing">
                <div class="px-4 py-3 widget widget-chart-one">
                    <div class="widget-heading mb-0">
                        <h5 class="align-self-center font-weight-bold text-uppercase mb-0">Categories</h5>
                        <button @click="addCategory()" class="btn btn-primary font-weight-bold">{{__('Create Category')}}</button>
                    </div>
                </div>
            </div>
    
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-2">
                        <table id="table" class="table table-hover category-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{__('Category (es)')}}</th>
                                    <th>{{__('Category (en)')}}</th>
                                    <th>{{__('Articles')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th class="no-content"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
            <h5 v-if="view == 'create'" class="modal-title">{{__('Create Category')}}</h5>
            <h5 v-if="view == 'edit'" class="modal-title">{{__('Update Category')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <section class="form-contact comment_form row">
                <aside class="col-md-6">
                    <label for="">{{__('Category Name (ES)')}}:</label>
                    <input type="text" v-validate="'required'" v-model="category.category_name_es" name="category es" class="form-control rounded-0" placeholder="{{__('Type the name')}}...">
                    <span class="text-danger" style="font-size: 12px;" v-show="errors.has('category es')">* @{{ errors.first('category es') }}</span>
                </aside>
                <aside class="col-md-6">
                    <label for="">{{__('Category Name (EN)')}}:</label>
                    <input type="text" v-validate="'required'" v-model="category.category_name_en" name="category en" class="form-control rounded-0" placeholder="{{__('Type the name')}}...">
                    <span class="text-danger" style="font-size: 12px;" v-show="errors.has('category en')">* @{{ errors.first('category en') }}</span>
                </aside>
            </section>
            </div>
            <div class="modal-footer">
            <button type="button" @click="closeModal()" class="btn btn-danger rounded-0" data-dismiss="modal">{{__('Close')}}</button>
            <button v-if="view == 'create'" type="button" @click="validate(saveCategory)" class="btn btn-success rounded-0">{{__('Save Category')}}</button>
            <button v-if="view == 'edit'" type="button" @click="validate(updateCategory)" class="btn btn-info rounded-0">{{__('Update Category')}}</button>
            </div>
        </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')

<script src="{{asset('/admin/plugins/table/datatable/datatables.js')}}"></script>
<script src="{{asset('/js/custom/admin/categories.js')}}"></script>
<script>
    var categories = {!! json_encode($categories); !!}
</script>
@endsection