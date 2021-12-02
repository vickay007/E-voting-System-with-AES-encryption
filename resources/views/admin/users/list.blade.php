@extends('admin.layouts.master')

@section('content')
 
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
                    <!-- <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Tables
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Data Table</li>
                            </ol>
                        </nav>
                    </div> -->
                </div>
                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->
        <!-- begin row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-statistics">
                    <div class="card-body">
                        @if($message = Session::get('success'))
                            <div class="alert alert-success">
                              {{ $message }}
                            </div>
                        @endif
                        <div class="datatable-wrapper table-responsive">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                    	<th>#</th>
                                        <th>Image</th>
                                        <th>Email</th>
                                        <th>Electoral Id</th>
                                        <th>Role</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($data as $i=>$row)
                                    <tr>
                                    	<td>{{ ++$i }}</td>
                                        <td>
                                            @if(file_exists('user_img/'. Auth::user()->image))
                                            <img src="{{ asset('user_img/'.$row->image) }}" class="img img-fluid">
                                            @endif
                                        </td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->electoral_id }}</td>
                                        <td>
                                            @if($row->roles()->get())
                                                <ul style="list-style: none;">
                                                  @foreach($row->roles()->get() as $roles)
                                                    <li>{{ $roles->name }}</li>
                                                  @endforeach
                                                </ul>
                                            @endif
                                        </td>

                                        <td>
                                
                                           <!--  <a href="/back/users/edit/{{$row->id}}" class="btn btn-primary">Edit</a> -->
                                          

                                        	{!! Form::open(['method' => 'DELETE', 'route' => ['user-delete', $row->id], 'style' => 'display:inline' ]) !!}

                                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}

                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>

@endsection