@extends('admin.layouts.master')
@section('content')
   <!-- begin app-main -->
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-6 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h1>{{$page_name}}</h1>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->

            <!--mail-Compose-contant-start-->
            <div class="row account-contant">
                <div class="col-12">
                    <div class="card card-statistics">
                        <div class="card-body p-0">
                            <div class="row no-gutters">
                                <div class="col-xl-3 pb-xl-0 pb-5 border-right">
                                    <div class="page-account-profil pt-5">
                                        <div class="profile-img text-center rounded-circle">
                                            <div class="pt-5">
                                                <div class="bg-img m-auto">
                                                    @if(file_exists('user_img/'.$user->image))
                                                    <img src="{{ asset('user_img/'. $user->image) }}" class="img img-fluid">
                                                    @endif
                                                </div>
                                                <div class="profile pt-4">
                                                    <h4 class="mb-1">{{ $user->name }}</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="profile-btn text-center">
                                            <div><button class="btn btn-light text-primary mb-2">Upload New Avatar</button></div>
                                            
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-xl-9 col-md-6 col-12 border-t border-right">
                                    <div class="page-account-form">
                                        @if(count($errors) > 0)
                                            <div class="alert alert-danger">
                                              <ul>
                                                @foreach($errors->all() as $error)
                                                <ul>
                                                    <li>{{ $error }}</li>
                                                </ul>
                                                @endforeach
                                              </ul>
                                            </div>
                                        @endif

                                        @if($message = Session::get('success'))
                                            <div class="alert alert-success">
                                              {{ $message }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="breadcrumb justify-content-between p-3">
                                        <h4>Voter Info</h4>
                                        <a href="/decrypt/edit/{{$user->id}}" class="btn btn-primary"> Edit </a>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row p-4">
                                                    <div class="col-lg-6">
                                                        <h5>Name:<p class="font-weight-bold mt-0">{{$user->name}}</p></h5>
                                                        
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <h5>Email: <p class="font-weight-bold mt-0">{{$user->email}}</p></h5>
                                                        
                                                    </div>

                                                    <div class="col-lg-6 my-3">
                                                        <h5>Phone Number: <p class="font-weight-bold mt-0">{{$user->phone_number}}</p></h5>
                                                        
                                                    </div>

                                                    <div class="col-lg-6 my-3">
                                                        <h5>Resident Address: <p class="font-weight-bold mt-0">{{$user->resident_address}}</p></h5>
                                                        
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <h5>Occupation: <p class="font-weight-bold mt-0">{{$user->occupation}}</p></h5>
                                                        
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <h5>L.G.A: <p class="font-weight-bold mt-0">{{$user->lga}}</p></h5>
                                                
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <h5>State: <p class="font-weight-bold mt-0">{{$user->state}}</p></h5>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--mail-Compose-contant-end-->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end app-main -->
@endsection