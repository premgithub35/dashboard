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
                  <h3 style="color: maroon" class="card-title"><b>Reviews # <b>{{$item->id}}</b></b></h3>
                  <div class="pull-right box-tools">
                    <a  href="{{ url()->previous() }}" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-chevron-left"></i> Go Back</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table style="color: maroon" class="table table-striped">
                        <tbody class="">
                          
                          <tr>
                            <td >Reviewed by </td>
                            <td>{{$item->name}}</td>
                          </tr>
                          <tr>
                            <td >Taste </td>
                            <td>{{$item->taste}}</td>
                          </tr>
                          <tr>
                            <td >Package</td>
                            <td>{{$item->package}}</td>
                          </tr>                         
                          <tr>
                            <td>Rating</td>
                            <td>
                              
                  @php 
                                  $var = $item->rating
                                @endphp
                                 
                                    @for($i=1; $i<=$var; $i++)
                                       <i class="fa fa-star stars" aria-hidden="true"></i>
                                    @endfor
                  
                            </td>
                          </tr>
                          <tr>
                            <td>Review Notes</td>
                            <td>{{$item->notes}}</td>
                          </tr>
                          <tr>
                            <td>Status</td>
                              <td>
                                @if($item->status== 1)
                                <span class="badge bg-green"> Active</span>
                                @elseif($item->status== 0)
                                <span class="badge bg-yellow"> Pending</span>
                                @else
                                <span class="badge bg-red"> Flagged</span>
                                @endif
                             </td>
                          </tr>
                  
                          <tr>
                            <td>Created</td>
                            <td>{{ $item->created }}</td>
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