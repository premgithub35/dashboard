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
       <div class="card-deck">

      <div class="card bg-info">
      <div class="card-body text-left">
            <p class="card-text">ACTIVE VENDOR</p>
            <p class="card-text">INACTIVE VENDOR</p>
        </div>
     </div>

     <div class="card bg-warning">
      <div class="card-body text-left">
        <p class="card-text">TEMP. CLOSED</p>
        <p class="card-text">PREM. CLOSED</p>
    </div>
    </div>
    <div class="card bg-success">
    <div class="card-body text-left">
        <p class="card-text">A/C. ISSUE</p>
        <p class="card-text">N/D. ISSUE</p>
      </div>
    </div>
    <div class="card bg-yello">
      <div class="card-body text-left">
      <p class="card-text">THIS. MONTH</p>
      <p class="card-text">LAST. MONTH</p>
    </div>
  </div>

</section>

   
<section class="content">
 <div class="col-md-12 col-sm-6 col-xs-6">
 <div class="card">

                <div class="card-header">
                         <button type="button" class="float-right"   class="btn btn-sm btn-primary" onclick="location.href='{{ url('admin/add-vendor') }}'" style="margin-bottom:5px"><i class="fa fa-plus"></i>&nbsp;Add New Vendor</button> 
                  <h3 class="card-title">Vendor List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0"> 


     <div class="box-body">
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
        <th><a href="javascript:void(0)" class="desc">ID </a></th>
        <th><a href="javascript:void(0)">V_Name </a></th>
        <th><a href="javascript:void(0)">V_Email</a></th>
        <th><a href="javascript:void(0)">V_Location</a></th>
        <th><a href="javascript:void(0)">V_Contact</a></th>
        <th><a href="javascript:void(0)">Status</a></th>
        <th><a href="javascript:void(0)">Created</a></th>
        <th class="actions">Actions</th>
                    </tr>
           
                   </thead>
    <tbody class="text-capitalize">
      @foreach($vendors as $i => $vendor)
      <tr>
        <td>{{ $vendor->id }}</td>
         <td>{{ $vendor->vendor_name }}</td>
          <td>{{ $vendor->vendor_email}}</td>
          <td>{{ $vendor->location}}</td>
         <td>{{ $vendor->vendor_contact }}</td>
           <td>
                        @if ($vendor->is_active === 1)
                        <span class="badge bg-success">{{'ACTIVE'}}</span>   
                    @else
                    <span class="badge bg-danger">{{'INACTIVE'}}</span>     
                    @endif
                    </td>
       
        <td >{{ $vendor->created_at }}</td>
                    <td>
                    <a href="{{route('edit-vendor',$vendor->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{route('inactive-vendor',$vendor->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
                    <a href="{{route('active-vendor',$vendor->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check-square"></i></a>
                    </td>

      </tr>
      @endforeach
    </tbody>
  </table>
                    
                </div>
                {{ $vendors->links() }}

                <!-- /.card-body -->
              </div>
        </div>   
</section>
</div>

@endsection