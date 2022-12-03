@extends('backend.layouts.master-dashboard')

@section('content')


<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        
        <div class="middle-content container-xxl p-0">
            
            <div class="row layout-top-spacing">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget-four">
                        <div class="widget-heading">
                            <h5 class="">Visitors by Browser</h5>
                        </div>
                        <div class="widget-content">
                            <div class="vistorsBrowser">
                                <div class="browser-list">
                                    {{-- <div class="w-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" y1="8" x2="12" y2="8"></line><line x1="3.95" y1="6.06" x2="8.54" y2="14"></line><line x1="10.88" y1="21.94" x2="15.46" y2="14"></line></svg>
                                    </div>
                                    <div class="w-browser-details">
                                        <div class="w-browser-info">
                                            <h6>Browser</h6>
                                            <p class="browser-count">
                                            </p>
                                        </div>
                                        <div class="w-browser-stats">
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 100%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row widget-statistic">

                        @can('Semua User')
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                            <a href="{{ route('user.index') }}">
                                <div class="widget widget-one_hybrid widget-followers">
                                    <div class="widget-heading">
                                        <div class="w-title">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                            </div>
                                            <div class="">
                                                <p class="w-value">{{ Auth::user()->count() }}</p>
                                                <h5 class="">Users</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content">    
                                        <div class="w-chart">
                                            <div id="hybrid_followers"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan

                        @can('Manajemen Pesanan')
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                            <a href="{{ route('pesanan.index') }}">
                                <div class="widget widget-one_hybrid widget-referral">
                                    <div class="widget-heading">
                                        <div class="w-title">
                                            <div class="w-icon">
                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                            </div>
                                            <div class="">
                                                <p class="w-value">{{ $order_unpaid->count() }}</p>
                                                <h5 class="">Order Unpaid</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content">    
                                        <div class="w-chart">
                                            <div id="hybrid_followers1"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan

                        @can('Pesanan Success')
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 layout-spacing">
                            <a href="{{ route('pesanan.success') }}">
                                <div class="widget widget-one_hybrid widget-engagement">
                                    <div class="widget-heading">
                                        <div class="w-title">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                                            </div>
                                            <div class="">
                                                <p class="w-value">{{ $order_paid->count() }}</p>
                                                <h5 class="">Order Paid</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content">    
                                        <div class="w-chart">
                                            <div id="hybrid_followers3"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endcan
                        
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
    <!--  BEGIN FOOTER  -->
    @include('backend.layouts.footer')
    <!--  END FOOTER  -->
</div>
<!--  END CONTENT AREA  -->

@endsection