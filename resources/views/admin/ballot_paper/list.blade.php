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
                        <a href="/ballot/create" class="btn btn-primary">Create</a>
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

                         @if($message = Session::get('error'))
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            {!! Form::open(['method' => 'POST', 'url' => '/ballot', 'style' => 'display:inline' ]) !!}

                            <table id="myTable" class="table table-striped table-hover mt-2">
                                <thead class="">
                                    <tr class="bg-danger text-white">
                                        <th>Id</th>
                                        <th>Logo</th>
                                        <th>Party</th>
                                        <th>Party Name</th>
                                        <th>Tick To Vote</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $i=>$row)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            @if(file_exists('party_logo/'.$row->logo))
                                            <img src="{{ asset('party_logo/'.$row->logo) }}" class="img img-fluid">
                                            @endif
                                        </td>
                                        <td>{{ $row->party }}</td>      
                                        <td>{{ $row->party_name }}</td>
                                        <td>   
                                        {{ Form::radio('vote_btn', $row->id) }}
                                        </td>                          
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                             <button type="submit" class="btn btn-primary">Submit</button>

                            {!! Form::close() !!}
                        </div>
                    </div>

                    <!-- <div class="form-row">
                        <div class="form-group col-md-12">
                            {!! Form::open(['method' => 'POST', 'url' => '/ballot', 'style' => 'display:inline' ]) !!}

                            {{ Form::label('name', 'Name') }}

                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '']) }}

                            <button type="submit" class="btn btn-primary">Submit</button>

                            {!! Form::close() !!}
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>

@endsection