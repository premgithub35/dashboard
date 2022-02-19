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
                      <h3 class="card-title">Add Vendor</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('create-update-vendor')}}" method="post">
                            @csrf 
                      <div class="card-body">
                    
                         <div class="form-group">
                          <label for="vendor_name">Vendor name</label>
                          <input type="text" class="form-control" id="vendor_name" placeholder="Enter store name" name="vendor_name">
                        </div>
                        <div class="form-group">
                          <label for="vendor_email">Vendor Email</label>
                          <input type="email" class="form-control" id="vendor_email" placeholder="Enter number" name="vendor_email">
                        </div>
                          <div class="form-group">
                          <label for="vendor_contact">Vendor Contact</label>
                          <input type="number" class="form-control" id="vendor_contact" placeholder="Enter number" name="vendor_contact">
                        </div>   
                        <div class="form-group">
                            <label for="location">Vendor Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Enter vendor location" name="location">
                          </div>                   
                        <input type="hidden" name="is_active" value="1">
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

@stop

@section('javascript')

<script src="{{ asset('/backend/js/wysihtml5.js') }}"></script>
    
@stop