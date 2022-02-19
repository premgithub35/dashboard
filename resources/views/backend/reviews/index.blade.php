@extends('backend.layouts.master')

@section('content')

<style type="text/css">
  .stars{
    color: #ffa31a;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<?php $rating=['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5']; ?>
<?php $grades=['1'=>'Bad','2'=>'Average','3'=>'Good','4'=>'Very Good','5'=>'Excellent ']; ?>
<?php $ctype=['1'=>'Food Quality Issue','2'=>'Food Quantity Issue','3'=>'Delivery Releated Issue','4'=>'Partial Delivery','5'=>'Others ']; ?>
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
                <span class="info-box-text">Total Reviews</span>
                <span class="info-box-number">{{$total}}</span>                               
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
                <span class="info-box-text">Active Reviews</span>
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
                <span class="info-box-text">Pending Reviews</span>
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
       <h3 class="card-title">All Reviews</h3>
       </div>
       <!-- /.card-header -->
        <div class="card-body p-0"> 
                <div class="box-body">
                   <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                        <th><a href="javascript:void(0)" class="desc">ID</a></th>
                        <th><a href="javascript:void(0)">Review Name</a></th>
                        <th><a href="javascript:void(0)">Rating</a></th>
                        <th><a href="javascript:void(0)">Status</a></th>
                        <th><a href="javascript:void(0)">Created</a>
                        <th><a href="javascript:void(0)">Action</a></th>

                    </tr>
                    </thead>

                    <tbody class="text-capitalize">
                    
                        @foreach($reviews as $review)
                        <tr>
                          <td >{{ $review->id }}</td>
              
                          <td class="text-capitalize">{{ $review->name }}</td>
                                                        
                          <td >@php 
                              $var = $review->rating
                            @endphp
                             
                                @for($i=1; $i<=$var; $i++)
                                   <i class="fa fa-star stars" aria-hidden="true"></i>
                                @endfor
                             </td>
                             <td>
                              @if ($review->status == 1)
                              <span class="badge bg-success">{{'ACTIVE'}}</span>   
                          @else
                          <span class="badge bg-danger">{{'INACTIVE'}}</span>     
                          @endif
                          </td>
                          <td >{{ $review->created }}</td>
                          <td>
                            <a href="{{route('review-view',$review->id)}}"  class="btn btn-xs btn-primary" ><i class="fa fa-eye"></i></button>
                            </td>
              
              
              
                          </tr>
                          @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
      </div>
   </div>      
</section>
</div>

@endsection