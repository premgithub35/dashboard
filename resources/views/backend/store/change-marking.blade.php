

<div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Marking Of <strong># {{$item->id}} </strong> </h4>
      </div>
       {!! Form::open(['route' => ['change-store-marking',$item->id],'class'=>'form-horizontal js-validation-bootstrap','name'=>'user_form','id'=>'user_form','role'=>'form']) !!}
      <div class="modal-body">
      
       <input type="hidden" name="logs" value="{{$item->logs}}" >
               
            <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label"><small>Closing Reason   <i class="fa  fa-asterisk"></i></small></label>
                  <div class="col-sm-6">
                  
                    {!! Form::select('marking',$store_marking,!empty($item->marking) ? $item->marking : old('marking')  ,['class' =>'form-control','required'=>'true','placeholder'=>'Select marking' ]); !!}
                  </div>
                </div>
            
           <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label"><small>Backup Restro</small></label>
                  <div class="col-sm-6">
                   <input type="text" name="backup_restro" class="form-control" value="{{$item->backup_restro}}">
                    
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




