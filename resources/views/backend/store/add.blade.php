@extends('backend.layouts.master')

@section('content')

{{-- <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">   --}}
<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">  


<style>
  /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
/* Horizontal line */
.collapsible-link::before {
  content: '';
  width: 14px;
  height: 2px;
  background: #333;
  position: absolute;
  top: calc(50% - 1px);
  right: 1rem;
  display: block;
  transition: all 0.3s;
}

/* Vertical line */
.collapsible-link::after {
  content: '';
  width: 2px;
  height: 14px;
  background: #333;
  position: absolute;
  top: calc(50% - 7px);
  right: calc(1rem + 6px);
  display: block;
  transition: all 0.3s;
}

.collapsible-link[aria-expanded='true']::after {
  transform: rotate(90deg) translateX(-1px);
}

.collapsible-link[aria-expanded='true']::before {
  transform: rotate(180deg);
}


/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
body {
  background: #dd5e89;
  background: -webkit-linear-gradient(to left, #dd5e89, #f7bb97);
  background: linear-gradient(to left, #dd5e89, #f7bb97);
  min-height: 100vh;
}
</style>
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
                      <h3 style="color: cyan" class="card-title">Add Store</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('create-update-store')}}" method="post">
                            @csrf 
                      <div class="card-body">
                        <div class="text-right">
                          <h4 style="color: tomato" ><b>Store Details</b></h4> 
                     </div>
                          <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Store Name </label>
                                  <input type="text" class="form-control" id="name" placeholder="Enter Store Name" name="name">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Station</label>
                                    {!! Form::select('station',$station, !empty($item->station) ? $item->station : old('station')  ,['class' =>'form-control station' ,'placeholder'=>'Select Station','required'=>'true']); !!}
                                  </div>
                                </div>                              
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Store Type </label>
                                    <input type="text" class="form-control" id="store_type" placeholder="Enter Store Type	" name="store_type">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Store Category</label>
                                    {!! Form::select('store_cat', ['Premium' => 'Premium', 'Active' => 'Active','Poor'=>'Poor','Worst'=>'Worst'], !empty($item->store_cat) ? $item->store_cat: old('store_cat')  ,['placeholder' => 'Select Store Category ','class' =>'form-control' ]); !!}
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Order Before Minute</label>
                                    <input type="number" class="form-control" id="order_before" placeholder="Eg. 60" name="order_before">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Restaurant Address </label>
                                    <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
                                  </div>
                                </div>                              
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>City </label>
                                    <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" id="state" placeholder="Enter State" name="state">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Pin Code</label>
                                    <input type="number" class="form-control" id="pin_code" placeholder="Enter Pin Code" name="pin_code">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Minimum Order</label>
                                    <input type="number" class="form-control" id="min_order" placeholder="Enter Min_Order" name="min_order">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Station Distance</label>
                                    <input class="form-control " required="true"  placeholder="Station Distance"   name="station_distance" type="text" autocomplete="off" required="true" value="{{ !empty($item->station_distance) ? $item->station_distance : old('station_distance') }}">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Commission </label>
                                    <input class="form-control " required="true"  placeholder="Enter Commission"   name="commission" type="text" autocomplete="off" required="true" value="{{ !empty($item->commission) ? $item->commission : old('commission') }}">
                                  </div>
                                </div>                                                             
                            </div>     
                              <hr/>                            
                              <div class="text-right">
                                <h4 style="color: tomato"><b>Bank Details</b></h4> 
                              </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Account Holder </label>
                                        <input type="text" class="form-control" id="a_holder" placeholder="Enter Account Holder Name" name="a_holder">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Account Number</label>
                                          <input type="text" class="form-control" id="a_number" placeholder="Enter Account Number" name="a_number">
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Bank Name</label>
                                          <input type="text" class="form-control" id="bank_name" placeholder="Enter Bank Name" name="bank_name">
                                        </div>
                                      </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>IFSC Code</label>
                                          <input type="text" class="form-control" id="bank_ifac" placeholder="Enter IFSC Code" name="bank_ifac">
                                        </div>
                                      </div>                                     
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Branch Location</label>
                                          <input type="text" class="form-control" id="b_location" placeholder="Enter Branch Location" name="b_location">
                                        </div>
                                      </div>                                     
                                </div>               
                                    <hr/>      
                                    <div class="text-right">
                                      <h4 style="color: tomato"><b>Address Details</b></h4>
                                      </div>
                                      <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Contact Person Name</label>
                                            <input type="text" class="form-control" id="contact_person" placeholder="Enter Contact Person" name="contact_person">
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Store Email </label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Phone No. </label>
                                            <input type="number" class="form-control" id="phone" placeholder="Enter Number" name="phone">
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Mobile No.</label>
                                            <input type="number" class="form-control" id="mobile" placeholder="Enter Mobile Number" name="mobile">
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Owner Name</label>
                                            <input type="text" class="form-control" id="owner_name" placeholder="Enter Owner Name" name="owner_name">
                                          </div>
                                        </div>                                      
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Owner Email</label>
                                            <input type="text" class="form-control" id="owner_email" placeholder="Enter Owner Email" name="owner_email">
                                          </div>
                                        </div>                                  
                                      </div>
                                 <hr/>
                       
                          <div class="text-right">
                          <h4 style="color: tomato" ><b>Store timing</b></h4> 
                          </div>
                          <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Opening Time </label>
                                  <input type="text" class="form-control hour_time" value="{{  !empty($item->opening_time) ?  date('H:i',strtotime($item->opening_time.':00')) : old('opening_time') }}" placeholder="Enter opening_time" name="opening_time">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Closing Time</label>
                                    <input type="text" class="form-control hour_time" value="{{  !empty($item->closing_time) ?  date('H:i',strtotime($item->closing_time.':00')) : old('closing_time') }}" placeholder="Enter closing_time" name="closing_time">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Breakfast Start Time </label>
                                    <input type="text" class="form-control hour_time" value="{{  !empty($item->breakfast_start_time) ?  date('H:i',strtotime($item->breakfast_start_time.':00')) : old('breakfast_start_time') }}" placeholder="Enter breakfast_start_time" name="breakfast_start_time">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Breakfast End Time </label>
                                    <input type="text" class="form-control hour_time" value="{{  !empty($item->breakfast_end_time) ?  date('H:i',strtotime($item->breakfast_end_time.':00')) : old('breakfast_end_time') }}" placeholder="Enter breakfast_end_time" name="breakfast_end_time">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Lunch Start Time</label>
                                    <input type="text" class="form-control hour_time" value="{{  !empty($item->lunch_start_time) ?  date('H:i',strtotime($item->lunch_start_time.':00')) : old('lunch_start_time') }}" placeholder="Enter lunch_start_time" name="lunch_start_time">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Lunch End Time</label>
                                    <input type="text" class="form-control hour_time" value="{{  !empty($item->lunch_end_time) ?  date('H:i',strtotime($item->lunch_end_time.':00')) : old('lunch_end_time') }}" placeholder="Enter lunch_end_time" name="lunch_end_time">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Evening Snacks Start Time</label>
                                    <input type="text" class="form-control hour_time" value="{{  !empty($item->evening_snacks_start_time) ?  date('H:i',strtotime($item->evening_snacks_start_time.':00')) : old('evening_snacks_start_time') }}" placeholder="Enter evening_snacks_start_time" name="evening_snacks_start_time">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Evening Snacks End Time</label>
                                    <input type="text" class="form-control hour_time" value="{{ !empty($item->evening_snacks_end_time) ?  date('H:i',strtotime($item->evening_snacks_end_time.':00')) : old('evening_snacks_end_time') }}" placeholder="Enter evening_snacks_end_time" name="evening_snacks_end_time">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Dinner Start Time</label>
                                    <input type="text" class="form-control hour_time" value="{{ !empty($item->dinner_start_time) ?  date('H:i',strtotime($item->dinner_start_time.':00')) : old('dinner_start_time') }}" placeholder="Enter dinner_start_time" name="dinner_start_time">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Dinner End Time</label>
                                    <input type="text" class="form-control hour_time" value="{{  !empty($item->dinner_end_time) ?  date('H:i',strtotime($item->dinner_end_time.':00')) : old('dinner_end_time') }}" placeholder="Enter dinner_end_time" name="dinner_end_time">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Store Break Time</label>
                                    <input type="text" class="form-control hour_time" value="{{  !empty($item->store_break_time) ?  date('H:i',strtotime($item->store_break_time.':00')) : old('store_break_time') }}" placeholder="Enter store break time" name="store_break_time">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>To</label>
                                    <input type="text" class="form-control hour_time"  value="{{ !empty($item->store_break_time_to) ?  date('H:i',strtotime($item->store_breaktime_to.':00')) : old('store_break_time_to') }}" placeholder="Enter store_break_time_to" name="store_break_time_to">
                                  </div>
                                </div>
                          </div>      
                          <hr/>                            
                          <div class="text-right">
                            <h4 style="color: tomato"><b>Store Documents</b></h4> 
                          </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Vendor Pan No.</label>
                                  <input type="text" class="form-control"name="vendor_pan_no"   value="{{ !empty($item->vendor_pan_no) ? $item->vendor_pan_no : old('vendor_pan_no') }}" placeholder="Enter Vendor Pan_No.">
                                </div>
                              </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Vendor GST No. </label>
                                    <input type="text" class="form-control"name="vendor_pan_no"   value="{{ !empty($item->vendor_pan_no) ? $item->vendor_pan_no : old('vendor_pan_no') }}" placeholder="Enter Vendor Pan_No.">
                                  </div>
                                </div>                               
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Outlet Fssai Number.</label>
                                      <input type="text" class="form-control"name="outlet_fssai_no"   value="{{ !empty($item->outlet_fssai_no) ? $item->outlet_fssai_no : old('outlet_fssai_no') }}" placeholder="Enter Outlet_Fssai_No">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Gst Tax %</label>
                                      <input type="text" class="form-control"name="s_tax_value"   value="{{ !empty($item->s_tax_value) ? $item->s_tax_value : old('s_tax_value') }}" placeholder="Enter S_Tax_Value">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Outlet Fssai Valid Upto </label>
                                      <input type="text" class="form-control"name="outlet_fssai_valid_upto"   value="{{ !empty($item->outlet_fssai_valid_upto) ? $item->outlet_fssai_valid_upto : old('outlet_fssai_valid_upto') }}" placeholder="Enter Outlet Fssai Valid Upto">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Railmeal GST No.</label>
                                      <input type="text" class="form-control"name=""   value="" placeholder="Enter Railmeal GST No.">
                                    </div>
                                  </div>
                              </div>      
                               <hr/>
                                <div class="text-right">
                                <h4 style="color: tomato"><b>Other Details</b></h4>
                                </div>
                                <div class="row">
                                   <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Group Order Discount</label>
                                    <input type="number" class="form-control" id="group_order_discount" placeholder="Enter group order discount" name="group_order_discount">
                                  </div>
                                </div>
                                  <div class="col-sm-6">
                                  <div class="form-group">
                                    <label>Security deposit</label>
                                    <input type="text" class="form-control" id="security_deposit" placeholder="Enter security_deposit	" name="security_deposit">
                                  </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Marking</label>
                                      {!! Form::select('marking',$store_marking, !empty($item->marking) ? $item->marking: old('marking')  ,['placeholder' => 'Select Marking ','class' =>'form-control']); !!}
                                    </div>
                                  </div>                                                                                                   
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <h4>Irctc Status</h4>
                                      {!! Form::select('irctc_status', ['Approved' => 'Approved', 'Non Approved' => 'Non Approved'], !empty($item->irctc_status) ? $item->irctc_status: old('irctc_status')  ,['placeholder' => 'Select Irctc Status ','class' =>'form-control' ]); !!}
                                      </div>
                                      </div>                                  
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Notes</label>
                                      <input type="text" class="form-control" id="notes" placeholder="Enter Notes" name="notes">
                                    </div>
                                  </div>                                  
                                </div>
                                 <hr/>                               
                                  <div class="text-right">
                                  <h4 style="color: tomato"><b>Supervisor Details</b></h4>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Name</label>
                                          <input type="text" class="form-control" name="supervisor_name"   value="{{ !empty($item->supervisor_name) ? $item->supervisor_name : old('supervisor_name') }}" placeholder="Enter supervisor name">
                                        </div>
                                      </div>
                               
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Email</label>
                                          <input type="email" class="form-control"name="supervisor_email"   value="{{ !empty($item->supervisor_email) ? $item->supervisor_email : old('supervisor_email') }}" placeholder="Enter supervisor email no.">
                                        </div>
                                      </div>       
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Supervisor MObile no.</label>
                                          <input type="number" class="form-control"name="supervisor_mobile"   value="{{ !empty($item->supervisor_mobile) ? $item->supervisor_mobile : old('supervisor_mobile') }}" placeholder="Enter Supervisor Mobile No.">
                                        </div>
                                      </div>   
                                                                                                   
                                    </div>                    
                        <input type="hidden" name="is_active" value="1">                                                                                                                                         
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button style="color: cyan" type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.card -->
            
    </div>       
</div>  

@stop

@section('javascript')

<script src="{{ asset('/backend/js/wysihtml5.js') }}"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
<script src = "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>  
{{-- <script src = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>   --}}
<script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>  
  
<script type = "text/javascript">  
  $(function () {  
      $('.hour_time').datetimepicker({  
          format: 'LT'  
      });  
  });  
</script>  
@stop