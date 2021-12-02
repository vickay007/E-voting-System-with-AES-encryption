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
                                            {!! Form::model($user, ['route' => ['update-user', $user->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        {{ Form::label('electoral_id', 'Electoral Id') }}

                                                        {{ Form::text('electoral_id', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '', 'disabled' => true]) }}
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        {{ Form::label('email', 'Email') }}

                                                        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => '', 'disabled' => true]) }}
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        {{ Form::label('name', 'Name') }}

                                                        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '']) }}
                                                    </div>
                                                
                                                    <div class="form-group col-md-6">
                                                        {{ Form::label('phone_number', 'Phone Number') }}

                                                        {{ Form::text('phone_number', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => '']) }}
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('resident', 'Resident Address') }}

                                                        {{ Form::text('resident_address', null, ['class' => 'form-control', 'id' => 'resident_address', 'placeholder' => '']) }}
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('occupation', 'Occupation') }}

                                                        {{ Form::text('occupation', null, ['class' => 'form-control', 'id' => 'occupation', 'placeholder' => '']) }}
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        {{ Form::label('lga', 'L.G.A') }}

                                                        {{ Form::text('lga', null, ['class' => 'form-control', 'id' => 'lga', 'placeholder' => '']) }}
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        {{ Form::label('state', 'State') }}

                                                        {{ Form::text('state', null, ['class' => 'form-control', 'id' => 'state', 'placeholder' => '']) }}
                                                    </div>
                                                
                                                    <div class="form-group col-md-12">
                                                        {{ Form::label('image', 'Upload Image') }}

                                                        {{ Form::file('image', ['class' => 'form-control']) }}

                                                    </div>
                                                    
                                                </div>
                                                <button type="submit" class="btn btn-success btn-block">Submit</button>
                                            {!! Form::close() !!}
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