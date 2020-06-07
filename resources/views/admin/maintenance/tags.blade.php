@extends('layouts.admin')
@section('title', 'Tags')
@section('content')
    <main class="oswald">
        <div class="outer-wrapper my-5 container" id="outer-wrapper">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="header-pages rounded d-flex justify-content-between text-right border-bottom pb-3">
                        <h2 class="h1">{{__('Tags')}}</h2>
                        <button @click="addTag()" class="btn btn-info rounded-0">
                            <span class="font-weight-bold">
                                {{__('Create Tag')}}
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
                                <th>{{__('Tag (es)')}}</th>
                                <th>{{__('Tag (en)')}}</th>
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
        <div class="modal fade" id="TagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                <h5 v-if="view == 'create'" class="modal-title">{{__('Create Tag')}}</h5>
                <h5 v-if="view == 'edit'" class="modal-title">{{__('Update Tag')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <section class="form-contact comment_form row">
                    <aside class="col-md-6">
                        <label for="">{{__('Tag Name (ES)')}}:</label>
                        <input type="text" v-validate="'required'" v-model="tag.tag_name_es" name="tag es" class="form-control rounded-0" placeholder="{{__('Type the name')}}...">
                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('tag es')">* @{{ errors.first('tag es') }}</span>
                    </aside>
                    <aside class="col-md-6">
                        <label for="">{{__('Tag Name (EN)')}}:</label>
                        <input type="text" v-validate="'required'" v-model="tag.tag_name_en" name="tag en" class="form-control rounded-0" placeholder="{{__('Type the name')}}...">
                        <span class="text-danger" style="font-size: 12px;" v-show="errors.has('tag en')">* @{{ errors.first('tag en') }}</span>
                    </aside>
                </section>
                </div>
                <div class="modal-footer">
                <button type="button" @click="closeModal()" class="btn btn-danger rounded-0" data-dismiss="modal">{{__('Close')}}</button>
                <button v-if="view == 'create'" type="button" @click="validate(saveTag)" class="btn btn-success rounded-0">{{__('Save Tag')}}</button>
                <button v-if="view == 'edit'" type="button" @click="validate(updateTag)" class="btn btn-info rounded-0">{{__('Update Tag')}}</button>
                </div>
            </div>
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script src="{{asset('/js/custom/admin/tags.js')}}"></script>
    <script>
        var tags = {!! json_encode($tags); !!}
    </script>
    
@endsection