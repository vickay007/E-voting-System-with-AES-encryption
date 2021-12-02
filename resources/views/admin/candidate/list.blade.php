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

                        {!! Form::open(['url' => '/candidate/call_result', 'method' => 'PUT']) !!}

                            @if($result == 1)
                              {{ Form::submit('Resume Voting', ['class' => 'btn btn-danger']) }}
                            @else
                              {{ Form::submit('Announce Result', ['class' => 'btn btn-success']) }}
                            @endif

                        {!! Form::close() !!}

                        <a href="/candidate" class="btn btn-primary ml-2">Create</a>
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
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Party</th>
                                        <th>Vote Count</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $i=>$row)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            @if(file_exists(public_path('/candidate_img/').$row->image))
                                            <img src="{{ asset('candidate_img') }}/{{ $row->image }}" class="img img-fluid">
                                            @endif
                                        </td> 
                                        <td>{{ $row->name }}</td>      
                                        <td>{{ $row->party }}</td>                         
                                        <td><a href="/candidate/view_voters/{{$row->id}}">{{$row->push_result}}</a></td>
                                        <td>
                                          <a href="/candidate/edit/{{$row->id}}" class="btn btn-primary"> Edit </a>


                                          <!-- {!! Form::open(['method' => 'DELETE', 'route' => ['candidate-delete', $row->id], 'style' => 'display:inline' ]) !!}
                                          {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                          {!! Form::close() !!} -->
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