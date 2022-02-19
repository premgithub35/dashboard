

<div class="modal-dialog ">
    <?php $close_reason=array('Today Closed'=>'Today Closed','Closed Upto 3 days'=>'Closed Upto 3 days','Closed upto 15 days'=>'Closed upto 15 days','Closed Accounts issue'=>'Closed Accounts issue','Closed RPF issue'=>'Closed RPF issue','Closed Other Issue'=>'Closed Other Issue','Long term closed'=>'Long term closed','Permanent closed'=>'Permanent closed') ?>
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Change Status Of <strong># {{$item->id}} </strong> 
             @if($item->status=='1')
                <span class="badge bg-green"> Active</span>
                @else
                <span class="badge bg-default"> Inactive</span>
                @endif
                </h4>
          </div>
           {!! Form::open(['route' => ['change-store-status',$item->id],'class'=>'form-horizontal js-validation-bootstrap','name'=>'user_form','id'=>'user_form','role'=>'form']) !!}
          <div class="modal-body">
           <p align="center">Are You Sure You Want To Change Status ?</p>
           <br/>
           <input type="hidden" name="status" value="{{$item->status}}" >
           <input type="hidden" name="logs" value="{{$item->logs}}" >
                    @if($item->status==1)
                <div class="form-group">
                      <label for="group_name" class="col-sm-4 control-label"><small>Closing Reason   <i class="fa  fa-asterisk"></i></small></label>
                      <div class="col-sm-6">
                      
                        {!! Form::select('close_reason',$close_reason,!empty($item->close_reason) ? $item->close_reason : old('close_reason')  ,['class' =>'form-control','required'=>'true','placeholder'=>'Select Close Reason' ]); !!}
                      </div>
                    </div>
                  @endif
               <div class="form-group">
                      <label for="group_name" class="col-sm-4 control-label"><small>Notes  <i class="fa  fa-asterisk"></i></small></label>
                      <div class="col-sm-6">
                        <textarea name="inactive_notes" class="form-control" required="true">{{!empty($item->inactive_notes) ? $item->inactive_notes:old('inactive_notes') }} </textarea>
                        
                      </div>
                    </div>
            
                
          </div>
          <div class="modal-footer">
            <button class="btn btn-success btn-flat" type="submit"> <span class="glyphicon glyphicon-plus-sign"></span> Change</button>
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          </div>
            {!! Form::close() !!}
        </div>
    
      </div>
      <script src="{{ URL::asset('backend/js/jquery.validate.min.js') }}"></script>
     <script>
    
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
    
      
    
    
      });
    
    
    </script>
    
    
    
    
    