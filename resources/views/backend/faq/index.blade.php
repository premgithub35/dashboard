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
                <span class="info-box-text">Total Faq</span>
                <span class="info-box-number">
                  12
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
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inactive</span>
                <span class="info-box-number">5</span>
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
   
     
        <div class="container">

        <button type="button" class="btn btn-sm btn-primary" onclick="location.href='{{ url('admin/add-faq') }}'" style="margin-bottom:5px"><i class="fa fa-plus"></i>&nbsp;Add Faq</button> 

            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Faq Management</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th style="width: 10px">Title</th>
                     {{--  <th style="width: 10px">Slug</th> --}}
                      <th style="width: 40px">Description</th>
                      <th style="width: 15px">Status</th>
                      <th style="width: 15px">Action</th>
                    </tr>
                    
                    @foreach ($faqs as $faq)                  
                    <tr>
                    <td>{{$faq->id}}</td>
                    <td>{{$faq->title}}</td>
                    <td>{!! $faq->content !!}</td>
                    <td>
                        @if ($faq->is_active == 1)
                        <span class="badge bg-success">{{'ACTIVE'}}</span>   
                    @else
                    <span class="badge bg-danger">{{'INACTIVE'}}</span>     
                    @endif
                    </td>
                    <td>
                    <a href="{{route('edit-faq',$faq->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{route('inactive-faq',$faq->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
                    <a href="{{route('active-faq',$faq->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check-square"></i></a>
                    </td>
                      </tr>
                    @endforeach
                   
                  </table>
                </div>
                {{ $faqs->links() }}

                <!-- /.card-body -->
              </div>
        </div>
     
    
</section>
</div>


@endsection