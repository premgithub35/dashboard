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


        <style type="text/css">
          .btn1
           {
           padding-left: 20px;
           padding-right: 20px;
           margin-right: 10px;
           font-size: 22px;
          
           }
          </style>
          
        
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-6">
                  <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-bars"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">TOTAL</span>
                <span class="info-box-number">{{$total}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
         
          <div class="col-md-3 col-sm-6 col-xs-6">
                  <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">ACTIVE</span>
                <span class="info-box-number">N/A</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                  <div class="info-box">         
              <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-exclamation"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">PAUSHED</span>  
                <span class="info-box-number">N/A</span>            
              </div>           
            </div>  
          </div>
        
           <div class="col-md-3 col-sm-6 col-xs-6">
                  <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-remove"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">INACTIVE</span>
                <span class="info-box-number">N/A</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
         
          <!-- /.col -->
        </div>
        </div>
    </section>
        <!-- /.row -->
      {{-- </div> --}}
   
    <div class="col-md-12 col-sm-6 col-xs-6">
    <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Imenu List</h3>
                  <div class="pull-right box-tools">
                    <a href="{{route('imenus-add')}}" class="btn btn-success btn-sm btn-flat" > <i class="fa fa-plus"></i> Add New Imenu </a>
                  </div>
                </div>
              
<br/>
<form>
  <div class="row">
         <div class="col-md-3">
            <input type="text" class="form-control " name="id"  placeholder=" Enter id" value="{{app('request')->input('id') }}">
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control " name="code"  placeholder=" Enter code" value="{{app('request')->input('code') }}">
          </div>
                   <div class="col">
                   <span class="input-group-btn "><button class="btn btn-success btn-md" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
                   <a href="{{'imenu'}}" class="btn btn-danger btn-md"><span class="fa fa-remove"></span></a>
                    </span>
                 </div>   
                
         
                  
          </div>
</form>
                                      
<hr/>
</div>
    </div>
            <div class="table-responsive">
            <table class="table table-striped table-bordered">
            <thead>
                <th><a href="javascript:void(0)" class="desc">ID </a></th>
                <th><a href="javascript:void(0)">Name </a></th>
                <th><a href="javascript:void(0)">Code </a></th>
                <th><a href="javascript:void(0)">Cost</a></th>
                <th><a href="javascript:void(0)">Sale</a></th>
                <th><a href="javascript:void(0)">S-Tax</a></th>
                <th><a href="javascript:void(0)">Timing</a></th>
                <th><a href="javascript:void(0)">Status</a></th>
                <th><a href="javascript:void(0)">Created</a></th>
                <th><a href="javascript:void(0)">Modified</a></th>   
                <th><a href="javascript:void(0)">Action</a></th>   

      </tr>
         </thead>
         <tbody class="text-capitalize">
          @foreach($imenus as $i => $imenu)
              <tr>
                  <td style="color:dimgrey"><b>{{ $imenu->id }}</b></td>
                  <td>@if($imenu->vn_type==0)
                        <i class="fa fa-circle" style="color: green" ></i>
                          @else
                    <i class="fa fa-circle" style="color:red"></i>
                          @endif  &nbsp;<b> {{ $imenu->name }}</b></td>
                  <td style="color: dimgrey" > <b>{{ $imenu->code }}</b></td>
                 
                  <td style="color: dimgrey"><b>{{ $imenu->cost }}</b></td>
                  <td style="color: dimgrey"><b>{{ $imenu->price }}</b></td>
                  <td style="color: dimgrey"><b>{{ $imenu->stax }}</b></td>
                   <td style="color: dimgrey"><b>{{ $imenu->stime }}-{{$imenu->etime}}</b></td>
                   <td>
                    @if ($imenu->is_active == 1)
                    <span class="badge bg-success">{{'ACTIVE'}}</span>   
                @else
                <span class="badge bg-danger">{{'INACTIVE'}}</span>     
                @endif
                </td>
                  <td >{{ $imenu->created->diffForHumans() }}</td>
                  <td >{{ $imenu->modified->diffForHumans() }}</td>
                  <td>
                    <a href="{{route('inactive-imenu',$imenu->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
                    <a href="{{route('active-imenu',$imenu->id)}}" class="btn btn-sm btn-success"><i class="fa fa-check-square"></i></a>
                    </td>
                  </tr>
              @endforeach
      </tbody>
                    
                  </table>
                </div>
                {{ $imenus->links() }}
              </div>
@endsection