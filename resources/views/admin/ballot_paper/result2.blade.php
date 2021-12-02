@extends('admin.layouts.master')
@section('content')

	<div class="app-main" id="main">
	    <!-- begin container-fluid -->
	    <div class="container-fluid">
	        <!-- begin row -->
	        <div class="row">
	            <div class="col-md-12 m-b-30">
	                <!-- begin page title -->
	                <div class="d-block d-lg-flex justify-content-between flex-nowrap align-items-center">
	                    <div class="page-title mr-4 pr-4 border-right">
	                        <h1>{{$page_name}}</h1>
	                    </div>

	                    
	                    <a href="#" class="btn btn-success disabled">Winner: {{$winner}}</a>
	                    
	                    
	               
	                </div>
	                <!-- end page title -->
	            </div>
	        </div>
	        <!-- Notification -->
	        <!-- <div class="row">
	            <div class="col-md-12">
	                <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert">
	                    <strong>Holy guacamole!</strong> You should check in on some of those
	                    fields below.
	                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                        <i class="ti ti-close"></i>
	                    </button>
	                </div>
	            </div>
	        </div> -->
	        <!-- end row -->
	  

	        <!-- begin row -->
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="card card-statistics">
	                    <div class="row no-gutters">
	                        <div class="col-xxl-3 col-lg-6">
	                            <div class="p-20 border-lg-right border-bottom border-xxl-bottom-0" style="height: 250px;">
	                                <div class="d-flex m-b-10">
	                                    <p class="mb-0 font-regular text-muted font-weight-bold">PDP</p>
	                                    <!-- <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a> -->
	                                </div>
	                                <div class="d-block d-sm-flex h-100 align-items-center">
	                                    <div class="apexchart-wrapper">
	                                        <div id="analytics5"></div>
	                                    </div>
	                                    <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
	                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i>{{ $pdp_vote }}</h3>
	                                        <p>Total Votes</p>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-xxl-3 col-lg-6">
	                            <div class="p-20 border-xxl-right border-bottom border-xxl-bottom-0" style="height: 250px;">
	                                <div class="d-flex m-b-10">
	                                    <p class="mb-0 font-regular text-muted font-weight-bold">APC</p>
	                                    <!-- <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a> -->
	                                </div>
	                                <div class="d-block d-sm-flex h-100 align-items-center">
	                                    <div class="apexchart-wrapper">
	                                        <div id="analytics6"></div>
	                                    </div>
	                                    <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
	                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i>{{ $apc_vote }}</h3>
	                                        <p>Total Votes</p>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>                 
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- end row -->

	        <!-- begin row -->
	        <div class="row">
	            <div class="col-sm-12">
	                <div class="card card-statistics">
	                    <div class="row no-gutters">
	                        <div class="col-xxl-3 col-lg-6">
	                            <div class="p-20 border-lg-right border-bottom border-xxl-bottom-0" style="height: 250px;">
	                                <div class="d-flex m-b-10">
	                                    <p class="mb-0 font-regular text-muted font-weight-bold">ACN</p>
	                                    <!-- <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a> -->
	                                </div>
	                                <div class="d-block d-sm-flex h-100 align-items-center">
	                                    <div class="apexchart-wrapper">
	                                        <div id="analytics9"></div>
	                                    </div>
	                                    <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
	                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i>{{ $acn_vote }}</h3>
	                                        <p>Total Votes</p>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-xxl-3 col-lg-6">
	                            <div class="p-20 border-xxl-right border-bottom border-xxl-bottom-0" style="height: 250px;">
	                                <div class="d-flex m-b-10">
	                                    <p class="mb-0 font-regular text-muted font-weight-bold">ANPP</p>
	                                    <!-- <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a> -->
	                                </div>
	                                <div class="d-block d-sm-flex h-100 align-items-center">
	                                    <div class="apexchart-wrapper">
	                                        <div id="analytics4"></div>
	                                    </div>
	                                    <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
	                                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i>{{ $anpp_vote }}</h3>
	                                        <p>Total Votes</p>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>                 
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- end row -->
	     
	    </div>
	    <!-- end container-fluid -->
	</div>

@endsection;