@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">

    <div class="container">
        <br>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
        @endif

        <br>

            <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Edit Vendor</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('create-update-vendor',$vendors->id)}}" method="post">
                            @csrf 
                      <div class="card-body">
                        <div class="form-group">
                          <label for="vendor_name">Vendor name</label>
                        <input type="text" class="form-control" value="{{$vendors->vendor_name}}" id="vendor_name" placeholder="Enter vendor name" name="vendor_name">
                        </div>

                        <div class="form-group">
                          <label for="vendor_email">Vendor email</label>
                        <input type="email" class="form-control" value="{{$vendors->vendor_email}}" id="vendor_email" placeholder="Enter vendor email" name="vendor_email">
                        </div>
                        <div class="form-group">
                          <label for="vendor_contact">Vendor Contact</label>
                        <input type="text" class="form-control" value="{{$vendors->vendor_contact}}" id="vendor_contact" placeholder="Enter vendor contact" name="vendor_contact">
                        </div>
                        <div class="form-group">
                          <label for="vendor_contact">Vendor Location</label>
                        <input type="text" class="form-control" value="{{$vendors->location}}" id="title" placeholder="Enter Location" name="location">
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
            </div>
    </div>
       
</div>  

@stop

@section('javascript')

<script src="{{ asset('/backend/js/wysihtml5.js') }}"></script>
    
@stop