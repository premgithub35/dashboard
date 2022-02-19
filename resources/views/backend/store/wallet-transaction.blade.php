

<div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h5 class="modal-title">New Wallet Transaction for Store  <strong># {{$item->id}} / {{$item->name}}</strong> </h5>
      </div>
       {!! Form::open(['route' => ['wallet-transaction',$item->id],'class'=>'form-horizontal js-validation-bootstrap','name'=>'user_form','id'=>'user_form','role'=>'form']) !!}
      <div class="modal-body">
      
     
               
            <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label"><small>Transection Type  <i class="fa  fa-asterisk"></i></small></label>
                  <div class="col-sm-6">
                  @php 
                  $type=array('1'=>'Credit Note','2'=>'Debit Note','3'=>'Invoice Payment');  
                  @endphp
                    {{ Form::select('type',$type,!empty($item->type) ? $item->type : old('type')  ,['class' =>'form-control','id'=>'VwalletType','required'=>'true','placeholder'=>'Select Type','onchange'=>'show()' ]) }}
                  </div>
                </div>
            
           <div class="form-group clearfix" id="credit" style="display: none;">
                  <label for="group_name" class="col-sm-4 control-label text-green"><small>Credit <i class="fa  fa-asterisk"></i> </small></label>
                  <div class="col-sm-6">
                 <input type="number" name="credit" value="0" required="true" class="form-control">
                    
                  </div>
                </div>
            <div class="form-group" id="debit"  style="display: none;">
                  <label for="group_name" class="col-sm-4 control-label text-red"><small>Debit <i class="fa  fa-asterisk"></i></small></label>
                  <div class="col-sm-6">
                 <input type="number" name="debit" value="0" required="true" class="form-control">
                    
                  </div>
                </div>
                 <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label "><small>Transection Date <i class="fa  fa-asterisk"></i></small></label>
                  <div class="col-sm-6">
                 <input type="text"  id="dot"  name="dot" required="true" placeholder="Transection Date" class="form-control">
                    
                  </div>
                </div>
                 <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label "><small>Transection Note <i class="fa  fa-asterisk"></i> </small></label>
                  <div class="col-sm-6">
                 <input type="text" name="note"  required="true" placeholder="Transection Note (eg. NEFT in ICICI)" class="form-control">
                    
                  </div>
                </div>

        
            
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-flat" type="submit"> <span class="glyphicon glyphicon-plus-sign"></span> Save
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
      </div>
        {!! Form::close() !!}
    </div>

  </div>
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('backend/plugins/datepicker/bootstrap-datetimepicker.min.css') }}">

  <script src="{{ URL::asset('backend/js/jquery.validate.min.js') }}"></script>
  <script src="{{ URL::asset('backend/plugins/datepicker/moment.js') }}"></script>
<script src="{{ URL::asset('backend/plugins/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
 <script>
  $(document).on('change',"#VwalletType", function() {
if (  ($(this).val()== 2)   )    {

 document.getElementById('debit').style.display = 'block';
        document.getElementById('credit').style.display = 'none';


    } else {
         document.getElementById('credit').style.display = 'block';
        document.getElementById('debit').style.display = 'none';
    }

});

  $(document).ready(function() {


    jQuery(".js-validation-bootstrap").validate({
      ignore: [],
      errorClass: "help-block animated fadeInDown",
      errorElement: "div",
      errorPlacement: function(e, r) {
        jQuery(r).parents(".form-group > div").append(e)
      },
      highlight: function(e) {
        var r = jQuery(e);
        r.parents( ".col-sm-6" ).removeClass("has-error").addClass("has-error"), r.closest(".help-block").remove()
      },
      success: function(e) {
        var r = jQuery(e);
        r.parents( ".col-sm-6" ).removeClass("has-error"), r.closest(".help-block").remove()
      },
      
      
    });

  

$('#dot').datetimepicker({
                    locale: 'en', useCurrent: false,format: 'YYYY-MM-DD'
                });

  });


</script>




