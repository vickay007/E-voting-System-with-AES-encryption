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
                   <!--  <div class="ml-auto d-flex align-items-center">
                        <a href="/candidate" class="btn btn-primary">Create</a>
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
            
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped table-hover mt-2">
                                <thead class="">
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Party</th>
                                        <th>Electoral Id</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($results as $i=>$result)
                                    <tr>
                                        
                                      <td>{{  ++$i }}</td>  
                                      <td>{{  $result->name }}</td> 
                                      <td>{{ $result->party }}</td>
                                      <td>{{  $result->electoral_id }}</td>     
                                        
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