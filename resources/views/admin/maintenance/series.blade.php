@extends('layouts.admin')
@section('title', 'Series')
@section('content')
    <main class="oswald">
        <div class="outer-wrapper my-5 container" id="outer-wrapper">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="header-pages rounded d-flex justify-content-between text-right border-bottom pb-3">
                        <h2 class="h1">{{__('Series')}}</h2>
                        <button @click="addSerie()" class="btn btn-info rounded-0">
                            <span class="font-weight-bold">
                                {{__('Create Serie')}}
                            </span> 
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="table" class="table table-hover text-center border table-responsive-sm table-sm" style="width:100%; font-size: 1.3em;">
                        <thead class="table-header text-white" style="background: #061318;">
                            <tr>
                                {{-- <th>{{__('ID')}}</th> --}}
                                <th>{{__('Serie (es)')}}</th>
                                <th>{{__('Serie (en)')}}</th>
                                <th>{{__('Articles')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Options')}}</th>
                            </tr>
                        </thead>
                        <tbody class="bg-light"></tbody>
                    </table>
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
    <script src="{{asset('/js/custom/admin/series.js')}}"></script>
    <script>
        var series = {!! json_encode($series); !!}
    </script>
    
@endsection