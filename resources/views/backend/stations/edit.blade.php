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
                      <h3 class="card-title">Edit Station</h3>
                    </div>                  
                    <form role="form" action="{{route('create-update-station',$station->id)}}" method="post">
                     @csrf 
                      <div class="card-body">
                      <div class="form-group">
                       <label for="name">Name</label>
                        <input type="text" class="form-control" value="{{$station->name}}" id="name" placeholder="Enter station name" name="name">
                        </div>
                           <div class="form-group">
                            <label>Description</label>
                            <textarea class="textarea" name="content"  placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                            {!! $station->content !!}
                        </textarea>                                     
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

      @section('javascript')

      <script src="{{ asset('/backend/js/wysihtml5.js') }}"></script>
          
      @stop