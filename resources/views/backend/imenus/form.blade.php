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
                      <h3 style="color: cyan" class="card-title">Add Imenu</h3>
                    </div>
                 
					{!! Form::open(array('route' => 'imenus-store','class'=>'form-horizontal padding-15 js-validation-bootstrap','name'=>'user_form','id'=>'user_form','role'=>'form', 'autocomplete'=>'' ,'enctype' => 'multipart/form-data')) !!}
					@csrf 
                      <div class="card-body">
						  <div style="color: brown" class="row">
						  <div class="col-sm-6">
						 <div class="form-group">
							<label>Name <i class="fa  fa-asterisk"></i></label>
								<input required="true" class="form-control " placeholder="Name"   name="name" type="text" value="{{!empty($item->name) ? $item->name:'' }}" autocomplete="off" >
							</div>
						</div> 
						<div class="col-sm-6">                 
						<div class="form-group">
							<label>Code<i class="fa  fa-asterisk"></i></label>
								<input required="true" class="form-control " placeholder="Code"   name="code" type="text" value="{{!empty($item->code) ? $item->code:old('name') }}" autocomplete="off" >
							</div>
						</div>
						
						<div class="col-sm-6">                 
						<div class="form-group">
							<label>Item Type<i class="fa  fa-asterisk"></i></label>
							  {!! Form::select('itemtype',$itemtype, !empty($item->itemtype) ? $item->itemtype : old('itemtype')  ,['class' =>'form-control itemtype' ,'placeholder'=>'Selecet item type','required'=>'true']); !!}
							</div>
						</div>

						<div class="col-sm-6">                 
						<div class="form-group">
							<label>Veg/Non-Veg<i class="fa  fa-asterisk"></i></label>
						{!! Form::select('vn_type', ['0' => 'Veg', '1' => 'Non-Veg'], isset($item->vn_type) ? $item->vn_type: old('vn_type')  ,['placeholder' => 'Select Veg/Non-Veg','class' =>'form-control','required'=>'true' ]); !!}
	
							</div>
						</div>

						<div class="col-sm-6">  
							<div class="form-group">               
							<label>Base Price<i class="fa  fa-asterisk"></i></label>
								<input required="true" class="form-control " placeholder="Price"   name="cost" type="text" value="{{!empty($item->cost) ? $item->cost:old('cost') }}" autocomplete="off" >
							</div>
						</div>
						<div class="col-sm-6">  
						<div class="form-group">
							<label>Sale Price<i class="fa  fa-asterisk"></i></label>
								<input required="true" class="form-control" placeholder="Cost" name="price" type="number" id="textone" value="{{!empty($item->price) ? $item->price:old('price') }}" autocomplete="off" >
							</div>
						</div>
						<div class="col-sm-6">  
						<div class="form-group">
							<label>Stax<i class="fa  fa-asterisk"></i></label>
								<input required="true" class="form-control" id="result" placeholder="Stax"  name="stax" type="text" value="{{ isset($item->stax) ? $item->stax:old('stax') }}" autocomplete="off" >
							</div>
						</div>


						{{-- <div class="form-group">
								<label for="group_name" class="col-sm-3 control-label"><small>Start and End Time  </small></label>
								<div class="col-sm-5">
								  
										<input type="text" name="stime" value="{{  !empty($item->stime) ?  date('H:i',strtotime($item->stime.':00')) : old('stime') }}" class="form-control hour_time" placeholder="Enter Time">
									  
									</div>  
								<label for="group_name" class="col-sm-1 control-label"><small>To </small></label>
								<div class="col-sm-5">
								   
										<input type="text"  name="etime"  value="{{ !empty($item->etime) ?  date('H:i',strtotime($item->etime.':00')) : old('etime') }}" class="form-control hour_time" placeholder="Enter Time">
									 
									</div>  
							 </div> --}}
						


						{{-- <div class="form-group">
								<label for="group_name" class="col-sm-3 control-label"><small>Menu_Break_Time  </small></label>
								<div class="col-sm-5">
								  
										<input type="text" name="bstime" value="{{  !empty($item->bstime) ?  date('H:i',strtotime($item->bstime.':00')) : old('bstime') }}" class="form-control hour_time" placeholder="Enter Time">
									  
									</div>  
								<label for="group_name" class="col-sm-1 control-label"><small>To </small></label>
								<div class="col-sm-5">
								   
										<input type="text"  name="betime"  value="{{ !empty($item->betime) ?  date('H:i',strtotime($item->betime.':00')) : old('betime') }}" class="form-control hour_time" placeholder="Enter Time">
									 
									</div>  
							 </div>
					 --}}
					 <div class="col-sm-6">  	
						<div class="form-group">
							<label>Status<i class="fa  fa-asterisk"></i></label>
								{!! Form::select('is_active', ['1' => 'Enable', '0' => 'Disable',], isset($item->is_active) ? $item->is_active: old('is_active')  ,['placeholder' => 'Select Status type ','class' =>'form-control','required'=>'true' ]); !!}
							</div>
						</div>
						<div class="col-sm-6">  	
						<div class="form-group">
							<label>Details<i class="fa  fa-asterisk"></i></label>
								<textarea  class="form-control" placeholder="Details..." name="details" rows="2" autocomplete="off" >{{!empty($item->details) ? $item->details:old('details') }} </textarea>
							</div>
						</div>

                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button style="color: cyan"  type="submit" class="btn btn-primary">Submit</button>
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