@extends('backend.layouts.master')

@section('content')

<div class="content-wrapper">
  <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">  

<style>
    .form-group{
        color: SaddleBrown;
    },
    .input
    {
        color: blue;
    }
    </style>

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
        <div class="col-md-12">
            <div class="card card-warning">          
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" action="{{route('create-update-store',$item->id)}}" method="post">
                  @csrf                 
                  <div class="text-right">
                     <h4 style="color: tomato" ><b>Store Details</b></h4> 
                   </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Store Name </label>
                            <input type="text" class="form-control" value="{{$item->name}}" id="name" placeholder="Enter title" name="name">
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
                              <input type="text" class="form-control" value="{{$item->store_type}}" id="store_type" placeholder="Enter store_type" name="store_type">
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
                              <input type="text" class="form-control" value="{{$item->order_before}}" id="order_before" placeholder="Eg. 60" name="order_before">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Restaurant Address</label>
                              <input type="text" class="form-control" value="{{$item->address}}" id="address" placeholder="Enter Restaurant Address" name="address">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>City </label>
                              <input type="text" class="form-control" value="{{$item->city}}" id="city" placeholder="Enter city" name="city">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>State</label>
                              <input type="text" class="form-control" value="{{$item->state}}" id="state" placeholder="Enter state" name="state">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Pin Code</label>
                              <input type="number" class="form-control" value="{{$item->pin_code}}" id="pin_code" placeholder="Enter Pin Code" name="pin_code">
                            </div>
                          </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                              <label>Minimum Order</label>
                              <input type="number" class="form-control" value="{{$item->min_order}}" id="min_order" placeholder="Enter min_order" name="min_order">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Station Distance</label>
                              <input type="number" class="form-control" value="{{$item->station_distance}}" id="station_distance" placeholder="Enter station_distance" name="station_distance">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Commission </label>
                              <input type="number" class="form-control" value="{{$item->commission}}" id="commission" placeholder="Enter Commission" name="commission">
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
                                <label>Account Holder</label>
                                <input class="form-control " required="true"  placeholder="Enter Account Holder" name="a_holder" type="text" autocomplete="off"  value="{{ !empty($item->a_holder) ? $item->a_holder : old('a_holder') }}">
                              </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Account Number</label>
                                  <input class="form-control " required="true"  placeholder="Enter account number" name="a_number" type="text" autocomplete="off"  value="{{ !empty($item->a_number) ? $item->bank_name : old('a_number') }}">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Bank Name</label>
                                  <input class="form-control " required="true"  placeholder="Enter bank name" name="bank_name" type="text" autocomplete="off"  value="{{ !empty($item->bank_name) ? $item->bank_name : old('bank_name') }}">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>IFAC Code</label>
                                  <input class="form-control " required="true"  placeholder="Enter Bank Ifac Code" name="bank_ifac" type="text" autocomplete="off"  value="{{ !empty($item->bank_ifac) ? $item->bank_ifac : old('bank_ifac') }}">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Branch Location</label>
                                  <input class="form-control " required="true"  placeholder="Enter bank location" name="b_location" type="text" autocomplete="off"  value="{{ !empty($item->b_location) ? $item->b_location : old('b_location') }}">
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
                                  <input class="form-control " required="true"  placeholder="Contact Person Name "    name="contact_person" type="text" autocomplete="off"  value="{{ !empty($item->contact_person) ? $item->contact_person : old('contact_person') }}">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Store Email </label>
                                  <input class="form-control " required="true"  placeholder="Enter Store Email"    name="email" type="email" autocomplete="off"  value="{{ !empty($item->email) ? $item->email : old('email') }}">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Phone No. </label>
                                  <input class="form-control " required="true"  id="owner_name"   class="phone"  placeholder="Enter Phone No."    name="phone" type="number" autocomplete="off"  value="{{ !empty($item->phone) ? $item->phone : old('phone') }}">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Mobile No.</label>
                                  <input class="form-control " required="true"  placeholder="Mobile No."    name="mobile" type="number" autocomplete="off"  value="{{ !empty($item->mobile) ? $item->mobile : old('mobile') }}">
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Owner Name</label>
                                  <input class="form-control " required="true"  placeholder="Mobile Owner Name"    name="owner_name" type="text" autocomplete="off"  value="{{ !empty($item->owner_name) ? $item->owner_name : old('owner_name') }}">
                                </div>
                              </div>
                              
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label>Owner Email</label>
                                  <input class="form-control " required="true"  placeholder="Enter Owner Email"   name="owner_email" type="email" autocomplete="off"  value="{{ !empty($item->owner_email) ? $item->owner_email : old('owner_email') }}">
                                </div>
                              </div>                                                                                    
                            </div>
                            <div class="text-right">
                              <h4 style="color: tomato" ><b>Store timing</b></h4> 
                           </div>
                              <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <label>Opening Time </label>
                                      <input type="text" name="opening_time" value="{{$item->opening_time}}" class="form-control hour_time" placeholder="Enter Time">
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Closing Time</label>
                                        <input type="text" name=" closing_time" value="{{ $item->closing_time }}" class="form-control hour_time" placeholder="Enter Time">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Breakfast Start Time </label>
                                        <input type="text" name=" breakfast_start_time" value="{{  !empty($item->breakfast_start_time) ?  date('H:i',strtotime($item->breakfast_start_time.':00')) : old('breakfast_start_time') }}" class="form-control hour_time" placeholder="Enter Time">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Breakfast End Time </label>
                                        <input type="text" name=" breakfast_end_time" value="{{  !empty($item->breakfast_end_time) ?  date('H:i',strtotime($item->breakfast_end_time.':00')) : old('breakfast_end_time') }}" class="form-control hour_time" placeholder="Enter Time">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Lunch Start Time</label>
                                        <input type="text" name=" lunch_start_time"  value="{{  !empty($item->lunch_start_time) ?  date('H:i',strtotime($item->lunch_start_time.':00')) : old('lunch_start_time') }}" class="form-control hour_time" placeholder="Enter Time">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Lunch End Time</label>
                                        <input type="text" name="lunch_end_time" value="{{  !empty($item->lunch_end_time) ?  date('H:i',strtotime($item->lunch_end_time.':00')) : old('lunch_end_time') }}" class="form-control hour_time" placeholder="Enter Time">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Evening Snacks Start Time</label>
                                        <input type="text" name="evening_snacks_start_time" value="{{  !empty($item->evening_snacks_start_time) ?  date('H:i',strtotime($item->evening_snacks_start_time.':00')) : old('evening_snacks_start_time') }}" class="form-control hour_time" placeholder="Enter Time">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Evening Snacks End Time</label>
                                        <input type="text"  name="evening_snacks_end_time"  value="{{ !empty($item->evening_snacks_end_time) ?  date('H:i',strtotime($item->evening_snacks_end_time.':00')) : old('evening_snacks_end_time') }}" class="form-control hour_time" placeholder="Enter Time">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Dinner Start Time</label>
                                        <input type="text"  name="dinner_start_time" value="{{ !empty($item->dinner_start_time) ?  date('H:i',strtotime($item->dinner_start_time.':00')) : old('dinner_start_time') }}" class="form-control hour_time" placeholder="Enter Time">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Dinner End Time</label>
                                        <input type="text" name="dinner_end_time" value="{{  !empty($item->dinner_end_time) ?  date('H:i',strtotime($item->dinner_end_time.':00')) : old('dinner_end_time') }}" class="form-control hour_time" placeholder="Enter Time">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Store Break Time</label>
                                        <input type="text" name="store_break_time" value="{{  !empty($item->store_break_time) ?  date('H:i',strtotime($item->store_break_time.':00')) : old('store_break_time') }}" class="form-control hour_time" placeholder="Enter Time">
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>To</label>
                                        <input type="text"  name="store_break_time_to"  value="{{ !empty($item->store_break_time_to) ?  date('H:i',strtotime($item->store_breaktime_to.':00')) : old('store_break_time_to') }}" class="form-control hour_time" placeholder="Enter Time">
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
                                        <input class="form-control"  placeholder="Enter Vendor Pan No."  name="vendor_pan_no" type="text"   value="{{ !empty($item->vendor_pan_no) ? $item->vendor_pan_no : old('vendor_pan_no') }}">
                                      </div>
                                    </div>
                                      <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Vendor GST No. </label>
                                          <input class="form-control"  placeholder="Enter Vendor GST No."  name="s_tax_value" type="text"   value="{{ !empty($item->s_tax_value) ? $item->s_tax_value : old('s_tax_value') }}">
                                        </div>
                                      </div>                                
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Outlet Fssai Number.</label>
                                            <input class="form-control"  placeholder="Enter Outlet Fssai Number."  name="outlet_fssai_no" type="text"   value="{{ !empty($item->outlet_fssai_no) ? $item->outlet_fssai_no : old('outlet_fssai_no') }}">
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>GST Tax %</label>
                                            <input class="form-control"  placeholder="Enter GST Tax %"  name="" type="text"   value="">
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Outlet Fssai Valid Upto </label>
                                            <input class="form-control"  placeholder="Enter Outlet Fssai Valid Upto"  name="outlet_fssai_valid_upto" type="text"   value="{{ !empty($item->outlet_fssai_valid_upto) ? $item->outlet_fssai_valid_upto : old('outlet_fssai_valid_upto') }}">
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Railmeal GST No.</label>
                                            <input class="form-control"  placeholder="Enter Railmeal GST No."  name="" type="text"   value="">
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
                                            <input type="number" class="form-control" value="{{$item->group_order_discount}}" id="group_order_discount" placeholder="Enter group_order_discount" name="group_order_discount">
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Security deposit</label>
                                            <input type="text" class="form-control" value="{{$item->security_deposit	}}" id="security_deposit" placeholder="Enter Security Deposit" name="security_deposit">
                                          </div>
                                        </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Marking</label>
                                            <input class="form-control"  placeholder="Enter Marking"  name="marking" type="text"   value="{{ !empty($item->marking) ? $item->marking : old('marking') }}">
                                          </div>
                                        </div>                                       
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Irctc Status</label>
                                            {!! Form::select('irctc_status', ['Approved' => 'Approved', 'Non Approved' => 'Non Approved'], !empty($item->irctc_status) ? $item->irctc_status: old('irctc_status')  ,['placeholder' => 'Select Irctc Status ','class' =>'form-control' ]); !!}
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label>Notes</label>
                                            <input class="form-control"  placeholder="Enter Notes "  name="notes" type="text"   value="{{ !empty($item->notes) ? $item->notes : old('notes') }}">
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
                                                  <input class="form-control"  placeholder="Enter Supervisor Name "  name="supervisor_name" type="text"   value="{{ !empty($item->supervisor_name) ? $item->supervisor_name : old('supervisor_name') }}">
                                                </div>
                                              </div>
                                           <div class="col-sm-6">
                                                <div class="form-group">
                                                  <label>Email</label>
                                                  <input class="form-control"  placeholder="Enter Supervisor Email"  name="supervisor_email" type="email"   value="{{ !empty($item->supervisor_email) ? $item->supervisor_email : old('supervisor_email') }}">
                                                </div>
                                              </div>
                                              <div class="col-sm-6">
                                                <div class="form-group">
                                                  <label>Mobile</label>
                                                  <input class="form-control"  placeholder="Enter Supervisor Mobile"  name="supervisor_mobile" type="number"  value="{{ !empty($item->supervisor_mobile) ? $item->supervisor_mobile : old('supervisor_mobile') }}">
                                                </div>
                                              </div>                                     
                                          </div>
                          </div>
                        
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Basic Information Submit</button>
                          </div>   
                </form>
              </div>
            </div>
 
          </div>
                    
    </div>       
</div>  

@endsection

 @section('javascript')

<script src="{{ asset('/backend/js/wysihtml5.js') }}"></script>



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
    

