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
                    <div class="ml-auto d-flex align-items-center">
                        <a href="/party/create" class="btn btn-primary">Create</a>
                    </div>
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
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped table-hover mt-2">
                                <thead class="">
                                    <tr>
                                        <th>Id</th>
                                        <th>Logo</th>
                                        <th>Party</th>
                                        <th>Party Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $i=>$row)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            @if(file_exists(public_path('/party_logo/').$row->logo))
                                            <img src="{{ asset('party_logo') }}/{{ $row->logo }}" class="img img-fluid">
                                            @endif
                                        </td>
                                        <td>{{ $row->party }}</td>      
                                        <td>{{ $row->party_name }}</td>                         
                                        <td>
                                          <a href="/party/edit/{{$row->id}}" class="btn btn-primary"> Edit </a>


                                          {!! Form::open(['method' => 'DELETE', 'route' => ['party-delete', $row->id], 'style' => 'display:inline' ]) !!}

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