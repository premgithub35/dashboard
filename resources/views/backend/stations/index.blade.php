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
                <span class="info-box-text">Total Station</span>
                <span class="info-box-number">
                  {{$total}}
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
                <span class="info-box-number">0</span>
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
                <span class="info-box-number">2</span>
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
       <button type="button" class="float-right"   class="btn btn-sm btn-primary" onclick="location.href='{{ url('admin/add-station') }}'" style="margin-bottom:5px"><i class="fa fa-plus"></i>&nbsp;New Station Add</button> 
       <h3 class="card-title">Stations</h3>
       </div>
       <br/>
       <form>
        <div class="row">
               <div class="col-md-3">
                  <input type="text" class="form-control " name="id"  placeholder=" Enter station id" value="{{app('request')->input('id') }}">
                </div>
                <div class="col-md-3">
                  <input type="text" class="form-control " name="name"  placeholder=" Enter station name" value="{{app('request')->input('name') }}">
                </div>
              
                      
                         <div class="col">
                         <span class="input-group-btn "><button class="btn btn-success btn-md" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
                         <a href="{{'stations'}}" class="btn btn-danger btn-md"><span class="fa fa-remove"></span></a>
                          </span>
                       </div>   
                      
               
                        
                </div>
      </form>
      <hr/>
       <!-- /.card-header -->
        <div class="card-body p-0"> 
                <div class="box-body">
                   <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <th style="width: 10px">Station Code </th>
                      <th style="width: 10px">Station Name</th>                 
                      <th style="width: 15px">State</th>
                      <th style="width: 15px">Created</th>
                      <th style="width: 15px">Updated</th>
                      <th style="width: 15px">Status</th>
                      <th style="width: 15px">Action</th>
                    </tr>
                    </thead>

                    <tbody class="text-capitalize">
                    
                    @foreach ($items as $station)
                  
                    <tr>
                    <td>{{$station->id}}</td>
                    <td>{{$station->name}}</td>
                    <td>N/A</td> 

                     <td >{{date('d-m-Y H:i',strtotime($station->created_at))}}<br/>                  
                    </td>
                    <td >{{date('d-m-Y H:i',strtotime($station->updated_at))}}</td>    
                    <td>
                        @if ($station->is_active == 1)
                        <span class="badge bg-success">{{'ACTIVE'}}</span>   
                    @else
                    <span class="badge bg-danger">{{'INACTIVE'}}</span>     
                    @endif
                    </td>
                    <td>
                    <a href="{{route('edit-station',$station->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{route('inactive-station',$station->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
                    <a href="{{route('active-station',$station->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check-square"></i></a>
                    </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                {{ $items->links() }}

                <!-- /.card-body -->
              </div>
        </div>
      </div>
   </div>      
</section>
</div>

@endsection