@extends('backend.layouts.master')

@section('content')
<div class="content-wrapper">
    <br>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <br>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cogs"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Careers</span>
                <span class="info-box-number">
                  14
                  {{-- <small>%</small> --}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
                   
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Active</span>
                <span class="info-box-number">7</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
            <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-remove"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inactive</span>
                <span class="info-box-number">4</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
         
          <!-- /.col -->
        </div>
        <!-- /.row -->




</div>
</section>

    <section class="content">
     <div class="col-md-12 col-sm-6 col-xs-6">
     <div class="card">
      <div class="card-header">
       <button type="button" class="float-right"   class="btn btn-sm btn-primary" onclick="location.href='{{ url('admin/add-career') }}'" style="margin-bottom:5px"><i class="fa fa-plus"></i>&nbsp;Add New Career</button> 
       <h3 class="card-title">Careers</h3>
       </div>
       <!-- /.card-header -->
        <div class="card-body p-0"> 
                <div class="box-body">
                   <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <th style="width: 10px">Id</th>
                      <th style="width: 10px">Title</th>                 
                      <th style="width: 15px">Created</th>
                      <th style="width: 15px">Updated</th>
                      <th style="width: 15px">Status</th>
                      <th style="width: 15px">Action</th>
                    </tr>
                    </thead>

                    <tbody class="text-capitalize">
                    
                    @foreach ($careers as $career)
                  
                    <tr>
                    <td>{{$career->id}}</td>
                    <td>{{$career->title}}</td>
                    <td >{{date('d-m-Y H:i',strtotime($career->created_at))}}<br/>                  
                    </td>
                    <td >{{date('d-m-Y H:i',strtotime($career->updated_at))}}</td>                    
                    <td>
                        @if ($career->is_active == 1)
                        <span class="badge bg-success">{{'ACTIVE'}}</span>   
                    @else
                    <span class="badge bg-danger">{{'INACTIVE'}}</span>     
                    @endif
                    </td>
                    <td>
                    <a href="{{route('edit-career',$career->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{route('inactive-career',$career->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
                    <a href="{{route('active-career',$career->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check-square"></i></a>
                    </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                {{ $careers->links() }}

                <!-- /.card-body -->
              </div>
        </div>
      </div>
   </div>      
</section>
</div>

@endsection