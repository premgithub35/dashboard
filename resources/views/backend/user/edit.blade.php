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
                      <h3 class="card-title">Edit Employee</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('updateUser',$user->id)}}" method="post">
                            @csrf 
                      <div class="card-body">
                        <div class="form-group">
                          <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{$user->name}}" id="name" placeholder="Enter name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" value="{{$user->email}}" placeholder="Enter email" name="email">
                        </div>
                   
                        <div class="form-group">
                            <label for="serviceId">Select Role</label>
                        <select name="service_id" class="form-control" value="{{$user->role_id}}" id="serviceId">
                                @foreach ($roles as $k => $v)
                            <option value="{{$k}}" {{ ($k == $user->role_id) ? 'selected=selected' : '' }}>{{$v}}</option>
                                @endforeach
                              
                            </select>
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
@stop

