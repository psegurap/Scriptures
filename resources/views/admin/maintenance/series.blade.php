@extends('layouts.admin')
@section('title', 'Series')
@section('styles')
    <link rel="stylesheet" href="{{asset('admin/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/components/custom-modal.css')}}">
    
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin')}}">{{__('Home')}}</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0)">{{__('Maintenance')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{__('Series')}}</span></li>
@endsection
@section('content')
<main>
    <div class="layout-px-spacing">
    
        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pb-4 layout-spacing">
                <div class="px-4 py-3 widget widget-chart-one">
                    <div class="widget-heading mb-0">
                        <h5 class="align-self-center font-weight-bold text-uppercase mb-0">{{__('Series')}}</h5>
                        <button @click="addSerie()" class="btn btn-primary font-weight-bold">{{__('Create Serie')}}</button>
                    </div>
                </div>
            </div>
    
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-2">
                        <table id="table" class="table table-hover Serie-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{__('Serie')}} (es)</th>
                                    <th>{{__('Serie')}} (en)</th>
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
    <div class="modal fade" id="SerieModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
            <h5 v-if="view == 'create'" class="modal-title">{{__('Create Serie')}}</h5>
            <h5 v-if="view == 'edit'" class="modal-title">{{__('Update Serie')}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <section class="form-contact comment_form row">
                <aside class="col-md-6">
                    <label for="">{{__('Serie Name (ES)')}}:</label>
                    <input type="text" v-validate="'required'" v-model="serie.serie_name_es" name="serie es" class="form-control rounded-0" placeholder="{{__('Type the name')}}...">
                    <span class="text-danger" style="font-size: 12px;" v-show="errors.has('serie es')">* @{{ errors.first('serie es') }}</span>
                </aside>
                <aside class="col-md-6">
                    <label for="">{{__('Serie Name (EN)')}}:</label>
                    <input type="text" v-validate="'required'" v-model="serie.serie_name_en" name="serie en" class="form-control rounded-0" placeholder="{{__('Type the name')}}...">
                    <span class="text-danger" style="font-size: 12px;" v-show="errors.has('serie en')">* @{{ errors.first('serie en') }}</span>
                </aside>
            </section>
            </div>
            <div class="modal-footer">
                <button type="button" @click="closeModal()" class="btn btn-danger rounded-0" data-dismiss="modal">{{__('Close')}}</button>
                <button v-if="view == 'create'" type="button" @click="validate(saveSerie)" class="btn btn-success rounded-0">{{__('Save Serie')}}</button>
                <button v-if="view == 'edit'" type="button" @click="validate(updateSerie)" class="btn btn-info rounded-0">{{__('Update Serie')}}</button>
            </div>
        </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')

<script src="{{asset('/admin/plugins/table/datatable/datatables.js')}}"></script>
<script src="{{asset('/js/custom/admin/series.js')}}"></script>
<script>
    var series = {!! json_encode($series); !!}
</script>
@endsection