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
                              <h3 class="card-title">Add Employee</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('createUser')}}" method="post">
                                    @csrf 
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Enter Your  Email" name="email">
                                </div>

                              <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password" class="form-control" id="password" placeholder="Enter Your Password" name="password">
                              </div>

                              <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
                            </div>
                              
                                <div class="form-group">
                                    <label for="serviceId">Select Role</label>
                                    <select name="role_id" class="form-control" id="serviceId">
                                        @foreach ($roles as $k => $v)
                                    <option value="{{$k}}">{{$v}}</option>
                                        @endforeach
                                      
                                    </select>
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

