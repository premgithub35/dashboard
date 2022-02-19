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
                <span style="color: maroon" class="info-box-text"><b>Total Messages</b></span>
                <span class="info-box-number">
                  4
                  {{-- <small>%</small> --}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>   
        
        </div>
        <!-- /.row -->




</div>
</section>

    <section class="content">
     <div class="col-md-12 col-sm-6 col-xs-6">
     <div class="card">
      <div class="card-header">
       <h3 style="color: maroon" class="card-title"><b>Messages</b></h3>
       </div>
       <!-- /.card-header -->
        <div style="color: maroon" class="card-body p-0"> 
                <div class="box-body">
                   <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                        <th>Id</th>
                        <th>From</th>
           <th>Email</th>

                        <th>Contact No.</th>
          <th>Subject</th>
          <th>Status</th>

                           <th>Created </th>
         <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($items as $i => $item)
                       <tr>
            <td >{{ $item->id }}</td>
            
                       <td >{{ $item->name }}</td>
                       <td >{{ $item->email }}</td>
                       <td >{{ $item->mobile }} </td>
                      <td >{{ $item->subject }}</td>
            
            
            
                       <td >
                        @if($item->read=='1')
                        <i class="label label-success"> Read</i>
                        @else
                        <i class="label label-danger"> Unread</i>
                        @endif
                         </td>
            
            
                         <td >{{ $item->created_at->diffForHumans() }}</td>
            
                           <td >
                           <div class="btn-group">
            
              <a href="{{ url('admin/messages/'.$item->id) }}" class="btn btn-md btn-success"  data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
            
                               </div>
            
                       </td>
            
            
            
            
                       </tr>
                      @endforeach
            
                   </tbody>
                  
                  </table>
                </div>
                {{-- {{ $careers->links() }} --}}

                <!-- /.card-body -->
              </div>
        </div>
      </div>
   </div>      
</section>
</div>

@endsection