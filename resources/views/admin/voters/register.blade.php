@extends('admin.layouts.master')
@section('content')
   <!-- begin app-main -->
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h1>{{ $page_name }}</h1>
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
                                
                                <div class="col-xl-12 col-md-6 col-12 border-t border-right">
                                    <div class="page-account-form">
                                        <div class="form-titel border-bottom p-3">
                                            <h5 class="mb-0 py-2">{{ $page_name }}</h5>
                                        </div>
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

                                        <div class="p-4">
                                            <form action="{{ url('users/register/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-row">
                                                
                                                    <div class="form-group col-md-6">
                                                        <label>Electoral Id</label>
                                                        <input type="text" name="electoral_id" class="form-control" value="{{ $user->electoral_id }}" disabled>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" disabled>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Name</label>
                                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Phone Number</label>
                                                        <input type="text" name="phone_number" class="form-control" value="{{ $user->phone_number }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Resident Address</label>
                                                        <input type="text" name="resident_address" class="form-control" value="{{ $user->resident_address }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>Occupation</label>
                                                        <input type="text" name="occupation" class="form-control" value="{{ $user->occupation }}">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>State</label>
                                                        <select type="text" name="state" id="state" class="form-control state">
                                                            <option>Select State</option>
                                                            @foreach($states as $state)
                                                            <option value="{{ $state->state_id }}">{{ $state->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label>L.G.A</label>
                                                        <select type="text" name="lga" id="lga" class="form-control local">
                                                            
                                                            <option value="0" disabled="true" selected="true">LGA</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label>Upload Image</label>
                                                        <input type="file" name="image" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                                <button type="submit" class="btn btn-success btn-block">Submit</button>
                                            </form>
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