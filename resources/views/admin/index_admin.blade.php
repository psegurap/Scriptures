@extends('layouts.admin')
@section('title'){{__('Home')}}@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('admin/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/table/datatable/dt-global_style.css')}}">
    
    <style>
        .rate-dec p span{
            font-weight: bold;
            font-size: 20px;
        }
    </style>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page"><span>{{__('Home')}}</span></li>
@endsection
@section('content')
<main>
    <div class="layout-px-spacing">
    
        <div class="row layout-top-spacing">
    
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one rounded-0">
                    <div class="widget-heading mb-0">
                        <h5 class="text-uppercase font-weight-bold">{{__('Home - Metrics')}}</h5>
                        {{-- <ul class="tabs tab-pills">
                            <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                        </ul> --}}
                    </div>
    
                    {{-- <div class="widget-content">
                        <div class="tabs tab-content">
                            <div id="content_1" class="tabcontent"> 
                                <div id="revenueMonthly"></div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
    
            {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget-two">
                    <div class="widget-content">
                        <div class="w-numeric-value">
                            <div class="w-content">
                                <span class="w-value">Daily sales</span>
                                <span class="w-numeric-title">Go to columns for details.</span>
                            </div>
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                            </div>
                        </div>
                        <div class="w-chart">
                            <div id="daily-sales"></div>
                        </div>
                    </div>
                </div>
            </div> --}}
    
            {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget-three">
                    <div class="widget-heading">
                        <h5 class="">Summary</h5>
                    </div>
                    <div class="widget-content">
    
                        <div class="order-summary">
    
                            <div class="summary-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                </div>
                                <div class="w-summary-details">
                                    
                                    <div class="w-summary-info">
                                        <h6>Income</h6>
                                        <p class="summary-count">$92,600</p>
                                    </div>
    
                                    <div class="w-summary-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
    
                                </div>
    
                            </div>
    
                            <div class="summary-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                                </div>
                                <div class="w-summary-details">
                                    
                                    <div class="w-summary-info">
                                        <h6>Profit</h6>
                                        <p class="summary-count">$37,515</p>
                                    </div>
    
                                    <div class="w-summary-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
    
                                </div>
    
                            </div>
    
                            <div class="summary-list">
                                <div class="w-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
                                </div>
                                <div class="w-summary-details">
                                    
                                    <div class="w-summary-info">
                                        <h6>Expenses</h6>
                                        <p class="summary-count">$55,085</p>
                                    </div>
    
                                    <div class="w-summary-stats">
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
    
                                </div>
    
                            </div>
                            
                        </div>
    
                    </div>
                </div>
            </div>
    
            <div class="col-xl-4 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget-one">
                    <div class="widget-content">
                        <div class="w-numeric-value">
                            <div class="w-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            </div>
                            <div class="w-content">
                                <span class="w-value">3,192</span>
                                <span class="w-numeric-title">Total Orders</span>
                            </div>
                        </div>
                        <div class="w-chart">
                            <div id="total-orders"></div>
                        </div>
                    </div>
                </div>
            </div> --}}
    
            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-one rounded-0">
                    <div class="widget-heading">
                        <h5 class="border-bottom mb-0 pb-2">{{__('Current Month')}}</h5>
                    </div>
                    <div class="widget-content">
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon bg-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>{{__('Approved')}}</h4>
                                        <p class="meta-date">@{{date}}</p>
                                    </div>
    
                                </div>
                                <div class="t-rate rate-dec">
                                    <p class="text-info"><span>0</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon bg-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>{{__('Revision')}}</h4>
                                        <p class="meta-date">@{{date}}</p>
                                    </div>
    
                                </div>
                                <div class="t-rate rate-dec">
                                    <p class="text-info"><span>0</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon bg-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>{{__('Declined')}}</h4>
                                        <p class="meta-date">@{{date}}</p>
                                    </div>
    
                                </div>
                                <div class="t-rate rate-dec">
                                    <p class="text-info"><span>0</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon bg-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>{{__('Pending')}}</h4>
                                        <p class="meta-date">@{{date}}</p>
                                    </div>
    
                                </div>
                                <div class="t-rate rate-dec">
                                    <p class="text-info"><span>0</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-one rounded-0">
                    <div class="widget-heading">
                        <h5 class="border-bottom mb-0 pb-2">{{__('Overall')}}</h5>
                    </div>
                    <div class="widget-content">
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon bg-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>{{__('Approved')}}</h4>
                                        <p class="meta-date">@{{date}}</p>
                                    </div>
    
                                </div>
                                <div class="t-rate rate-dec">
                                    <p class="text-info"><span>0</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon bg-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>{{__('Revision')}}</h4>
                                        <p class="meta-date">@{{date}}</p>
                                    </div>
    
                                </div>
                                <div class="t-rate rate-dec">
                                    <p class="text-info"><span>0</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon bg-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>{{__('Declined')}}</h4>
                                        <p class="meta-date">@{{date}}</p>
                                    </div>
    
                                </div>
                                <div class="t-rate rate-dec">
                                    <p class="text-info"><span>0</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="transactions-list">
                            <div class="t-item">
                                <div class="t-company-name">
                                    <div class="t-icon">
                                        <div class="icon bg-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                        </div>
                                    </div>
                                    <div class="t-name">
                                        <h4>{{__('Pending')}}</h4>
                                        <p class="meta-date">@{{date}}</p>
                                    </div>
    
                                </div>
                                <div class="t-rate rate-dec">
                                    <p class="text-info"><span>0</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget widget-table-two rounded-0">
    
                    <div class="widget-heading">
                        <h5 class="border-bottom mb-0 pb-2 d-inline-block">{{__('Articles from this month')}}:</h5>
                    </div>
    
                    <div class="widget-content">
                        <table id="table" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase font-weight-bold">{{__('Title')}}</th>
                                    <th class="text-uppercase font-weight-bold">{{__('Author(s)')}}</th>
                                    <th class="text-uppercase font-weight-bold">{{__('Date')}}</th>
                                    <th class="text-uppercase font-weight-bold">{{__('Status')}}</th>
                                    {{-- <th class="no-content"></th> --}}
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
    
            {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                
                <div class="widget widget-activity-four">
    
                    <div class="widget-heading">
                        <h5 class="">Recent Activities</h5>
                    </div>
    
                    <div class="widget-content">
    
                        <div class="mt-container mx-auto">
                            <div class="timeline-line">
                                
                                <div class="item-timeline timeline-primary">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p><span>Updated</span> Server Logs</p>
                                        <span class="badge badge-danger">Pending</span>
                                        <p class="t-time">Just Now</p>
                                    </div>
                                </div>
    
                                <div class="item-timeline timeline-success">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Send Mail to <a href="javascript:void(0);">HR</a> and <a href="javascript:void(0);">Admin</a></p>
                                        <span class="badge badge-success">Completed</span>
                                        <p class="t-time">2 min ago</p>
                                    </div>
                                </div>
    
                                <div class="item-timeline  timeline-danger">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Backup <span>Files EOD</span></p>
                                        <span class="badge badge-danger">Pending</span>
                                        <p class="t-time">14:00</p>
                                    </div>
                                </div>
    
                                <div class="item-timeline  timeline-dark">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Collect documents from <a href="javascript:void(0);">Sara</a></p>
                                        <span class="badge badge-success">Completed</span>
                                        <p class="t-time">16:00</p>
                                    </div>
                                </div>
    
                                <div class="item-timeline  timeline-warning">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Conference call with <a href="javascript:void(0);">Marketing Manager</a>.</p>
                                        <span class="badge badge-primary">In progress</span>
                                        <p class="t-time">17:00</p>
                                    </div>
                                </div>
    
                                <div class="item-timeline  timeline-secondary">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Rebooted Server</p>
                                        <span class="badge badge-success">Completed</span>
                                        <p class="t-time">17:00</p>
                                    </div>
                                </div>
    
                                <div class="item-timeline  timeline-warning">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Send contract details to Freelancer</p>
                                        <span class="badge badge-danger">Pending</span>
                                        <p class="t-time">18:00</p>
                                    </div>
                                </div>
    
                                <div class="item-timeline  timeline-dark">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Kelly want to increase the time of the project.</p>
                                        <span class="badge badge-primary">In Progress</span>
                                        <p class="t-time">19:00</p>
                                    </div>
                                </div>
    
                                <div class="item-timeline  timeline-success">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Server down for maintanence</p>
                                        <span class="badge badge-success">Completed</span>
                                        <p class="t-time">19:00</p>
                                    </div>
                                </div>
    
                                <div class="item-timeline  timeline-secondary">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Malicious link detected</p>
                                        <span class="badge badge-warning">Block</span>
                                        <p class="t-time">20:00</p>
                                    </div>
                                </div>
    
                                <div class="item-timeline  timeline-warning">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>Rebooted Server</p>
                                        <span class="badge badge-success">Completed</span>
                                        <p class="t-time">23:00</p>
                                    </div>
                                </div>
    
                            </div>                                    
                        </div>
    
                        <div class="tm-action-btn">
                            <button class="btn">View All <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                
                <div class="widget widget-account-invoice-one">
    
                    <div class="widget-heading">
                        <h5 class="">Account Info</h5>
                    </div>
    
                    <div class="widget-content">
                        <div class="invoice-box">
                            
                            <div class="acc-total-info">
                                <h5>Balance</h5>
                                <p class="acc-amount">$470</p>
                            </div>
    
                            <div class="inv-detail">                                        
                                <div class="info-detail-1">
                                    <p>Monthly Plan</p>
                                    <p>$ 199.0</p>
                                </div>
                                <div class="info-detail-2">
                                    <p>Taxes</p>
                                    <p>$ 17.82</p>
                                </div>
                                <div class="info-detail-3 info-sub">
                                    <div class="info-detail">
                                        <p>Extras this month</p>
                                        <p>$ -0.68</p>
                                    </div>
                                    <div class="info-detail-sub">
                                        <p>Netflix Yearly Subscription</p>
                                        <p>$ 0</p>
                                    </div>
                                    <div class="info-detail-sub">
                                        <p>Others</p>
                                        <p>$ -0.68</p>
                                    </div>
                                </div>
                            </div>
    
                            <div class="inv-action">
                                <a href="" class="btn btn-dark">Summary</a>
                                <a href="" class="btn btn-danger">Transfer</a>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
    
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">
    
                    <div class="widget-heading">
                        <h5 class="">Recent Orders</h5>
                    </div>
    
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="th-content">Customer</div></th>
                                        <th><div class="th-content">Product</div></th>
                                        <th><div class="th-content">Invoice</div></th>
                                        <th><div class="th-content th-heading">Price</div></th>
                                        <th><div class="th-content">Status</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">Andy King</div></td>
                                        <td><div class="td-content product-brand">Nike Sport</div></td>
                                        <td><div class="td-content">#76894</div></td>
                                        <td><div class="td-content pricing"><span class="">$88.00</span></div></td>
                                        <td><div class="td-content"><span class="badge outline-badge-primary">Shipped</span></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">Irene Collins</div></td>
                                        <td><div class="td-content product-brand">Speakers</div></td>
                                        <td><div class="td-content">#75844</div></td>
                                        <td><div class="td-content pricing"><span class="">$84.00</span></div></td>
                                        <td><div class="td-content"><span class="badge outline-badge-success">Paid</span></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">Laurie Fox</div></td>
                                        <td><div class="td-content product-brand">Camera</div></td>
                                        <td><div class="td-content">#66894</div></td>
                                        <td><div class="td-content pricing"><span class="">$126.04</span></div></td>
                                        <td><div class="td-content"><span class="badge outline-badge-danger">Pending</span></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">Luke Ivory</div></td>
                                        <td><div class="td-content product-brand">Headphone</div></td>
                                        <td><div class="td-content">#46894</div></td>
                                        <td><div class="td-content pricing"><span class="">$56.07</span></div></td>
                                        <td><div class="td-content"><span class="badge outline-badge-success">Paid</span></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">Ryan Collins</div></td>
                                        <td><div class="td-content product-brand">Sport</div></td>
                                        <td><div class="td-content">#89891</div></td>
                                        <td><div class="td-content pricing"><span class="">$108.09</span></div></td>
                                        <td><div class="td-content"><span class="badge outline-badge-primary">Shipped</span></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">Nia Hillyer</div></td>
                                        <td><div class="td-content product-brand">Sunglasses</div></td>
                                        <td><div class="td-content">#26974</div></td>
                                        <td><div class="td-content pricing"><span class="">$168.09</span></div></td>
                                        <td><div class="td-content"><span class="badge outline-badge-primary">Shipped</span></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="td-content customer-name"><img src="assets/img/90x90.jpg" alt="avatar">Sonia Shaw</div></td>
                                        <td><div class="td-content product-brand">Watch</div></td>
                                        <td><div class="td-content">#76844</div></td>
                                        <td><div class="td-content pricing"><span class="">$110.00</span></div></td>
                                        <td><div class="td-content"><span class="badge outline-badge-success">Paid</span></div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-three">
    
                    <div class="widget-heading">
                        <h5 class="">Top Selling Product</h5>
                    </div>
    
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="th-content">Product</div></th>
                                        <th><div class="th-content th-heading">Price</div></th>
                                        <th><div class="th-content th-heading">Discount</div></th>
                                        <th><div class="th-content">Sold</div></th>
                                        <th><div class="th-content">Source</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">Speakers</div></td>
                                        <td><div class="td-content"><span class="pricing">$84.00</span></div></td>
                                        <td><div class="td-content"><span class="discount-pricing">$10.00</span></div></td>
                                        <td><div class="td-content">240</div></td>
                                        <td><div class="td-content"><a href="javascript:void(0);" class="">Direct</a></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">Sunglasses</div></td>
                                        <td><div class="td-content"><span class="pricing">$56.07</span></div></td>
                                        <td><div class="td-content"><span class="discount-pricing">$5.07</span></div></td>
                                        <td><div class="td-content">190</div></td>
                                        <td><div class="td-content"><a href="javascript:void(0);" class="">Google</a></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">Watch</div></td>
                                        <td><div class="td-content"><span class="pricing">$88.00</span></div></td>
                                        <td><div class="td-content"><span class="discount-pricing">$20.00</span></div></td>
                                        <td><div class="td-content">66</div></td>
                                        <td><div class="td-content"><a href="javascript:void(0);" class="">Ads</a></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">Laptop</div></td>
                                        <td><div class="td-content"><span class="pricing">$110.00</span></div></td>
                                        <td><div class="td-content"><span class="discount-pricing">$33.00</span></div></td>
                                        <td><div class="td-content">35</div></td>
                                        <td><div class="td-content"><a href="javascript:void(0);" class="">Email</a></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">Camera</div></td>
                                        <td><div class="td-content"><span class="pricing">$126.04</span></div></td>
                                        <td><div class="td-content"><span class="discount-pricing">$26.04</span></div></td>
                                        <td><div class="td-content">30</div></td>
                                        <td><div class="td-content"><a href="javascript:void(0);" class="">Referral</a></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">Shoes</div></td>
                                        <td><div class="td-content"><span class="pricing">$108.09</span></div></td>
                                        <td><div class="td-content"><span class="discount-pricing">$47.09</span></div></td>
                                        <td><div class="td-content">130</div></td>
                                        <td><div class="td-content"><a href="javascript:void(0);" class="">Google</a></div></td>
                                    </tr>
                                    <tr>
                                        <td><div class="td-content product-name"><img src="assets/img/90x90.jpg" alt="product">Headphone</div></td>
                                        <td><div class="td-content"><span class="pricing">$168.09</span></div></td>
                                        <td><div class="td-content"><span class="discount-pricing">$60.09</span></div></td>
                                        <td><div class="td-content">170</div></td>
                                        <td><div class="td-content"><a href="javascript:void(0);" class="">Ads</a></div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
    
        </div>
    
    </div>
</main>
@endsection
@section('scripts')
    <script>
        var current_month_articles = {!! json_encode($current_month_articles) !!}
    </script>
    <script src="{{asset('/admin/plugins/table/datatable/datatables.js')}}"></script>
    <script src="{{asset('/js/custom/admin/index_admin.js')}}"></script>
@endsection