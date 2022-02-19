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
   
<section class="content">
   
     
        <div class="container">
            <div class="card">
                <div class="card-header">
                  <h3 style="color: maroon" class="card-title"><b>View Message</b></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table style="color: maroon" class="table table-striped">
                    <tbody>
                        <tr>
                          <td width="20%">From</td>
                          <td>{{$item->name}}</td>
                        </tr>
                        <tr>
                          <td>Mobile</td>
                          <td>{{$item->mobile}} </td>
                        </tr>
               
                        <tr>
                          <td>Email</td>
                          <td>{{$item->email}} </td>
                        </tr>
                        <tr>
                          <td>Subject</td>
                          <td>{{$item->subject}} </td>
                        </tr>
                        <tr>
                          <td>Message</td>
                          <td>{{$item->description}} </td>
                        </tr>
               
                        <tr>
                          <td>Created</td>
                          <td>{{ $item->created_at->diffForHumans() }}</td>
                        </tr>
               
                  </tbody>
                   
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
     
    
</section>
</div>
@endsection