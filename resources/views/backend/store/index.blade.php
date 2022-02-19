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
            <p class="card-text">ACTIVE STORE</p>
            <p class="card-text">INACTIVE STORE</p>
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
                         <button type="button" class="float-right"   class="btn btn-sm btn-primary" onclick="location.href='{{ url('admin/add-store') }}'" style="margin-bottom:5px"><i class="fa fa-plus"></i>&nbsp;Add New Store</button> 
                  <h3 class="card-title">Store List</h3>
                </div>

                <br/>
<form>
  <div class="row">
         <div class="col-md-3">
            <input type="text" class="form-control " name="id"  placeholder=" Enter id" value="{{app('request')->input('id') }}">
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control " name="station"  placeholder=" Enter station code" value="{{app('request')->input('station') }}">
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control " name="name"  placeholder=" Enter store name" value="{{app('request')->input('name') }}">
          </div>
                
                   <div class="col">
                   <span class="input-group-btn "><button class="btn btn-success btn-md" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
                   <a href="{{'store'}}" class="btn btn-danger btn-md"><span class="fa fa-remove"></span></a>
                    </span>
                 </div>   
                
         
                  
          </div>
</form>
          


              
                
<hr/>
                <!-- /.card-header -->
                <div class="card-body p-0"> 


     <div class="box-body">
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
    <tr>
        <th><a href="javascript:void(0)" class="desc">ID </a></th>
        <th><a href="javascript:void(0)">Store Name </a></th>
        <th><a href="javascript:void(0)">Opening/Closing </a></th>
        <th><a href="javascript:void(0)">Station</a></th>
        <th><a href="javascript:void(0)">Min Order</a></th>
        <th><a href="javascript:void(0)">Status</a></th>
        <th><a href="javascript:void(0)">Created</a></th>
        <th class="actions">Actions</th>
      </tr>                           
                   </thead>
                   <tbody class="text-capitalize">
                    @foreach($stores as $i => $store)
                    <tr>
                      <td style="color: dimgrey"><b>{{ $store->id }}</b></td>
                       <td style="width:250px; color:dimgrey "> <b>
                         {{-- @if($store->store_type=='Veg')</b>
                        <i class="fa fa-circle" style="color: green" ></i>
                        @else
                        <i class="fa fa-circle" style="color:red"></i>
                        @endif --}}
                         {{ $store->name }} 
              
                      </td>
                      <td style="color: dimgrey"><i class="fa fa-clock-o"></i><b>{{$store->opening_time}} - {{$store->closing_time}}</b></td>


                      <td style="color:dimgrey"><b>{{ $store->station}}</b></td>

                      <td style="color:dimgrey"><b>{{ $store->min_order }}</b></td>
                
                      <td>
                        @if ($store->is_active === 1)
                        <span class="badge bg-success">{{'ACTIVE'}}</span>   
                    @else
                    <span class="badge bg-danger">{{'INACTIVE'}}</span>     
                    @endif
                    </td>
                      
                      <td >{{ $store->created->diffForHumans() }}</td>
                      <td>
                        <a href="{{ route('stores-view',$store->id) }}" class="btn btn-sm btn-primary"  data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                        <a href="{{route('active-store',$store->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check-square"></i></a>
                        <a href="{{route('inactive-store',$store->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
                        <a href="{{route('stores-edit',$store->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
               </table>
                    
                </div>
                {{ $stores->links() }}

                <!-- /.card-body -->
              </div>
        </div>   
</section>
</div>

@endsection