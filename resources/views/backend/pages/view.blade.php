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

        <button type="button" class="btn btn-sm btn-primary" onclick="location.href='{{ url('admin/dashboard/addPage') }}'" style="margin-bottom:5px"><i class="fa fa-plus"></i>&nbsp;Add Page</button> 

            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Page Management</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th style="width: 10px">Title</th>
                      <th style="width: 10px">Slug</th>
                      <th style="width: 40px">Content</th>
                      <th style="width: 15px">Status</th>
                      <th style="width: 15px">Action</th>
                    </tr>
                    
                    @foreach ($pages as $page)
                  
                    <tr>
                    <td>{{$page->id}}</td>
                    <td>{{$page->title}}</td>
                    <td>{{$page->slug}}</td>
                    <td>{!! substr($page->content,0,200) !!}</td>
                    <td>
                        @if ($page->is_active === 1)
                        <span class="badge bg-success">{{'ACTIVE'}}</span>   
                    @else
                    <span class="badge bg-danger">{{'INACTIVE'}}</span>     
                    @endif
                    </td>
                    <td>
                    <a href="{{route('editPage',$page->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    <a href="{{route('deletePage',$page->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
                    </td>
                      </tr>
                    @endforeach
                   
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
     
    
</section>
</div>


@endsection