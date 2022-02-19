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
<style>
  .body{
        margin-top: -2.90em;   
  } 
       /* }
  body {   
    background-color: #fff;
} */

/* .table-bordered td, .table-bordered th {
    border: 1px solid #444444b8;
}
.form-control {    
    border: 1px solid #444444d6;   
}
.list-group-item {    
    border: 1px solid #444;
} */
.btn {   
    background: coral
    color: #f8f9fa;

}
  </style>   
 
<div class="body">
     <div class="row">
       
            <div class="pull-left">
            <h3 style="color: mediumturquoise" class="box-title">Stores ##<b>{{ $store->id }}</b></h3>
            </div>         
          </div>
      
         </div>      
<hr/>

  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <ul class="list-group">
          <div class="bg-danger text-center" style="padding:2px;">
            <h4 class="widget-user-username">{{ $store->name }}</h4>
            <h5 class="widget-user-desc"><i class="fa fa-map-marker"></i> {{ $store->station }},station</h5>
           </div>
           {{-- <li class="list-group-item"><a>Wallet Balance <span class="pull-right "> <b> {{$store->wallet_balance}}</b></span> </a></li>
           <li class="list-group-item"><a>Security Deposite <span class="pull-right "><b> {{$store->security_deposit}}</b></span> </a></li> --}}
           <li class="list-group-item"><a>Commission<span class="pull-right "> <b> {{$store->discount}} %</b></span> </a></li>
           <li  class="list-group-item">Status
            @if($store->is_active==1)
             <span class="pull-right">Active</span>
            @else
           <span class="pull-right">inactive</span>

            @endif

        
      </li>
      <li class="list-group-item">Irctc Status 
        @if(!empty($store->irctc_status))
        @if($store->irctc_status=='Approved')
        <span class="pull-right"> {{ $store->irctc_status}}</span>
        @else
         <span class="pull-right"> {{ $store->irctc_status}}</span>
         @endif
         @else
          <span class="pull-right">N/A</span>
         @endif
      </li>
           <li class="list-group-item">Store Type 
            @if($store->store_type=='Veg')
            <span class="pull-right  "> {{$store->store_type}}</span>
            @else
              <span class="pull-right "> {{$store->store_type}}</span>
            @endif
          
        </li>
          
           <li class="list-group-item"><a>Created<span class="pull-right "> <b> {{ $store->created->format('d-m-Y H:i')}}</b></span> </a></li>
           <li class="list-group-item"><a>Last Updated <span class="pull-right "> <b> {{ $store->modified->format('d-m-Y H:i')}}</b></span> </a></li>
        </ul>
          </div>   
          
          <div class="col-md-7">
 
            <div class=" table-responsive">
         <table class="table table-bordered table-hover table-condensed" style="width:100%; color:brown">
                 <tbody>
                
                   <tr>
                     <td style="width:25%">Store Marking</td>
                     <td style="width:25%" >{{$store->Marking['name']}} </td>
                     <td style="width:25%">Zone</td>
                     <td style="width:25%">N/A</td>
                   </tr>
                   <tr>
                     <td>Order Before Minute</td>
                     <td ><strong>{{$store->order_before}} Min.</strong></td>
                     <td>Station Category</td>
                     <td >N/A</strong></td>
                    </tr>
                   <tr>
                    <td>Minimum Order</td>
                    <td >{{$store->min_order}}</td>
                    <td>Station Name</td>
                    <td>{{$store->station}}</td>
                </tr>
                   <tr>
                     <td>Station Distance</td>
                     <td >5 km</td>
                     <td>Notes</td>
                     <td >{{$store->notes}}</td>
                    </tr>
                  <tr>
                     <td>Timing</td>
                     <td ><strong>{{$store->opening_time}}:00  to {{$store->closing_time}}:00 </strong></td>
                     <td>Timing OLD</td>
                     <td >{{$store->time}}</td>
                    </tr>
                    <tr>
                     <td>Delivery Charge</td>
                     <td >{{$store->delivery_charge}}</td>
                     <td>Store Category</td>
                     <td ><strong>N/A</strong></td>
                   </tr>
                   <tr>
                     <td>Group Order Discount</td>
                     <td >{{$store->group_order_discount}}</td>
                     <td>Closing Reason</td>
                      <td ><strong>N/A</strong></td>
                    </tr>
                 
                 
                 </tbody>
               </table>
             </div>

             <div class="row">
              <div class="col-md-12 col-sm-6">
                <div class="card card-primary card-outline card-tabs">
                  <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#tab_invoices" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Contact Info</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-home-tab" data-toggle="pill" href="#tab_vwallet" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Delivery boys</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-home-tab" data-toggle="pill" href="#ratings" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Ratings</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-home-tab" data-toggle="pill" href="#tab_payments" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Irctc Data</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                      <div class="tab-pane active" id="tab_invoices">
                        <div class="table-responsive">
                          <table class="table table-bordered table-hover table-condensed" style="width:100%; color:brown">
                                             <tbody>
                                                <tr>
                                                <td style="width:40%;">Contact No.</td>
                                                <td >{{$store->phone}} / {{$store->mobile}}</td>
                    
                                              </tr>
                                               <tr>
                                                <td>Store Email</td>
                                                <td>{{$store->email}}</td>
                    
                                              </tr>
                                               <tr>
                                                <td>Address</td>
                                                <td>{{$store->address}}</td>
                    
                                              </tr>
                                               <tr>
                                                <td>Owner Details</td>
                                                <td><b>{{$store->owner_name}}</b> / {{$store->owner_contact}} / {{$store->owner_email}}</td>
                    
                                              </tr>
                                               <tr>
                                                <td>Bank Details</td>
                                                <td >{{$store->bank_details}}</td>
                    
                                              </tr>
                    
                                             </tbody>
                                           </table>
                        </div>
                        </div>

    <div class="tab-pane" id="tab_payments">
      <div class="table-responsive">

        <table class="table table-bordered table-hover table-condensed" style="width:100%; color:brown">
    <tbody>

         <tr>
                <td style="width: 40%">Fssai Number</td>
                <td>{{$store->outlet_fssai_no}}</td>
            </tr>

            <tr>
                <td>Fssai Validity</td>
                <td> {{$store->outlet_fssai_valid_upto}}</td>
            </tr>

         <tr>
                <td>Vendor Pan No.</td>
                <td>{{$store->vendor_pan_no}}</td>
            </tr>


          <tr>
                <td>GST No.</td>
                <td>{{$store->vat_no}}</td>
            </tr>

           <tr>
                <td>Service Tax</td>
                <td>{{$store->s_tax_value}}</td>
            </tr>

            
    </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane" id="ratings">
     <div class="table-responsive">

        <table class="table table-bordered table-hover table-condensed" style="width:100%; color:brown">
    <tbody>

         <tr>
                <td style="width:40%">Over All Rating</td>
                <td>
                    {{$store->review_score}}
                </td>

            </tr>

               <tr>
                <td>Taste</td>
               <td>{{$store->review_taste}}</td>

            </tr>

            <tr>
                <td>Packaging</td>
             <td>{{$store->review_package}}</td>

            </tr>

            <tr>
                <td>Total Review Count</td>
                <td><strong style="color:#e20f44">{{$store->review_count}}</strong></td>

            </tr>
    </tbody>
        </table>
      </div>
    </div>
    <div class="tab-pane" id="tab_vwallet">
    <div class="table-responsive">

    <table class="table table-bordered table-hover table-condensed" style="width:100%; color:brown">

            <thead>
              <tr>
              <th>Name</th>
              <th>Mobile</th>
              </tr>
            </thead>
          <tbody>
              <tr>
              <td>Manager</td>
              <td>8178745911</td>
              </tr>
          </tbody>
    </table>
                   </div>
    </div>
    
    </div>
    </div>

               </div>
             </div>            
             </div>
          </div>
    </div>
</div>
<hr/>

<div class="row">
  <div class="col-md-12 col-sm-6">
    <div class="card card-primary card-outline card-tabs">
      <div class="card-header p-0 pt-1 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#storeitems" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Store Menu Items</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#logs" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Store Activities</a>
          </li>
        </ul>
      </div>
     
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-three-tabContent">
          <div class="tab-pane active" id="storeitems">
            <?php $html = "";$htmlArr = array();$url='/admin/stores/edit-store-items' ?>
          @foreach($itemtypes as $type)
             @foreach($store->Storeitems as $item)
               @if($type->id==$item->itemtype)

               <?php
                   if($item->vn_type==0)
                   {
                    $vn='<i class="fa fa-circle" style="color: green" ></i>';
                   }
                   else
                   {
                    $vn='<i class="fa fa-circle" style="color:red"></i>';
                   }
                   if($item->status==1)
                   {
                    $status='<label class="badge bg-green">Active</label>';
                   }
                   else
                   {
                    $status='<label class="badge bg-default">Inactive</label>';
                   }

                 $html.="<tr><td><a href='javascript:;;' data-toggle='tooltip' data-placement='bottom' data-original-title='$item->details' >".$vn.' '.$item->name."</a></td><td>".$item->cost."</td><td>".$item->price."</td><td>".$item->stax."</td>"."<td>".$item->stime.'-'.$item->etime."</td>"."<td>".$item->code."</td><td>".$item->Itemtyps['name']."</td><td>".$status."</td></tr>";
               ?>
               @endif
             @endforeach
             <?php
               if($html != ""){
            $a=array("type"=>$type->name,"html"=>$html);
            array_push($htmlArr, $a);
            $html = "";
            $a = array();
          }
             ?>
          @endforeach
          
          <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-home-tab" data-toggle="pill" href="#All" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">All Items</a>
              </li>
              @for($i=0; $i<count($htmlArr);$i++)
              <?php
               if($i==0)
               {$activetab="active";}
               else
               {$activetab="";}
               ?>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#{{$i}}" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">{{$htmlArr[$i]['type']}}</a>
              </li>
              @endfor
            </ul>
          </div>

          

          <div class="tab-content">
            <div id="All" class="tab-pane fade in active ">
                 <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed" id="table">
              <thead>
              <tr>
                <th>Item Name</th>
               
                <th>Cost Price</th>
                <th>Sell Price</th>
                <th>GST</th>
                <th>Time Slot</th>
                <th>CODE</th>
                <th>Type</th>
                <th>Status</th>
           
             </tr>
          </thead>
          <tbody>
              @foreach($store->Storeitems as $items)
          <tr>
               <td>
                 @if($items->vn_type==0)
               <i class="fa fa-circle" style="color: green" ></i> 
                @else
               <i class="fa fa-circle" style="color:red"></i>
                @endif
                &nbsp;&nbsp;<a href="javascript:;;" data-toggle="tooltip" data-placement="bottom" data-original-title="{{$items->details}} ">{{$items->name}}</a>
              </td>
               <td>{{$items->cost}}</td>
               <td>{{$items->price}}</td>
               <td>{{$items->stax}}</td>
               <td>{{$items->stime}}-{{$items->etime}}</td>
               <td>{{$items->code}}</td>
               {{-- <td>{{$items->Itemtyps['name']}}</td> --}}
                <td>
                  @if($items->status=='1')
                  <label class="badge bg-green">Active</label>
                  @else
                   <label class="badge bg-default">Inactive</label>
                  @endif
                 
                </td>
                
              </tr>
              @endforeach
              </tbody>
          </table>
          </div> 
          </div>
          @for($i=0; $i<count($htmlArr);$i++)
          <?php
                       if($i==0)
                       {$active="active";$in='in';}
                       else
                       {$active="";$in='';}
                       ?>
              <div id="{{$i}}" class="tab-pane fade  ">
                 <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed" id="table">
              <thead>
              <tr>
                <th>Item Name</th>
               
                <th>Cost Price</th>
                <th>Sell Price</th>
                <th>GST</th>
                <th>Time Slot</th>
                <th>CODE</th>
                <th>Type</th>
                <th>Status</th>
            
             </tr>
          </thead>
          <tbody>
              <?php echo $htmlArr[$i]['html'] ?>
              </tbody>
          </table>
          </div> 
          </div>
          @endfor
          </div>
                  
            </div>
        </div>
      </div>

  </div>
</div>
</div>



</div>
</div>

 
@stop


{{-- @section('footer_scripts')
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

 <script type="text/javascript">
function show_modal(target)
{
  
    $('#targetModal').load(target, function() {
      // alert(target,"The paragraph was clicked.");
       $('#targetModal').modal('show');
    });
}

$("#search").keyup(function () {
    var value = this.value.toLowerCase().trim();
    $("#table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});


</script>


@stop --}}