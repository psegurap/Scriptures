@extends('layouts.admin2')
@section('title', 'Home')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page"><span>Home</span></li>
@endsection
@section('content')
<main>
    <div class="layout-px-spacing">
        
        <div class="row layout-top-spacing">
        
            <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one">
                    <div class="widget-heading">
                        <h5 class="">Revenue</h5>
                        
                        {{-- <ul class="tabs tab-pills">
                            <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                        </ul> --}}
                    </div>
    
                    <div class="widget-content">
                        <div class="tabs tab-content">
                            <div id="content_1" class="tabcontent"> 
                                {{-- <div id="revenueMonthly"></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-two">
                    <div class="widget-heading">
                        <h5 class="">Sales by Category</h5>
                    </div>
                    <div class="widget-content">
                        {{-- <div id="chart-2" class=""></div> --}}
                    </div>
                </div>
            </div>
    
        </div>
        
    </div>
</main>

@endsection

@section('scripts')
<script>
    var tags = {!! json_encode($tags) !!};
    var categories = {!! json_encode($categories) !!};
    var series = {!! json_encode($series) !!};
</script>
<script src="{{asset('/js/custom/admin/new_article.js')}}"></script>
@endsection