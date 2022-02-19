<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Menu Item</h4>
      </div>
      {!! Form::open(['route' => 'update-store-items','class'=>'form-horizontal  js-validation-bootstrap','name'=>'user_form','id'=>'user_form','role'=>'form', 'autocomplete'=>'' ,'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">
        
                
            <input type="hidden" name="id" value="{{!empty($item->id) ? $item->id:''}}">
            <input type="hidden" name="storeid" value="{{!empty($item->storeid) ? $item->storeid:$id}}">
            <div class="row">
              <div class="col-md-12">
               
                <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label"><small>Name <i class="fa  fa-asterisk"></i> </small></label>
                  <div class="col-sm-6">
                    <input required="true" class="form-control " placeholder="Name"   name="name" type="text" value="{{!empty($item->name) ? $item->name:'' }}" autocomplete="off" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label"><small> Code <i class="fa  fa-asterisk"></i> </small></label>
                  <div class="col-sm-6">
                    <input required="true" class="form-control " placeholder="Code"   name="code" type="text" value="{{!empty($item->code) ? $item->code:old('name') }}" autocomplete="off" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label"><small>Item type <i class="fa  fa-asterisk"></i> </small></label>

                  <div class="col-sm-6">
                    {!! Form::select('itemtype',$itemtype, !empty($item->itemtype) ? $item->itemtype : old('itemtype')  ,['class' =>'form-control itemtype' ,'placeholder'=>'Selecet item type','required'=>'true','style'=>'width:270px;']); !!}
                  </div>
                </div>

                <div class="form-group">

                  <label for="group_name" class="col-sm-4 control-label"><small>Veg/Non-Veg <i class="fa  fa-asterisk"></i> </small></label>
                  <div class="col-sm-6">        
                        
                    {!! Form::select('vn_type', ['0' => 'Veg', '1' => 'Non-Veg'],isset($item->vn_type) ? $item->vn_type : old('vn_type') ,['placeholder' => 'Select Veg/Non-Veg','class' =>'form-control','required'=>'true' ]); !!}
      
                  </div>
                </div>

                <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label"><small>Base Price <i class="fa  fa-asterisk"></i> </small></label>
                  <div class="col-sm-6">
                    <input required="true" class="form-control " placeholder="Price"   name="cost" type="number" value="{{!empty($item->cost) ? $item->cost:old('cost') }}" autocomplete="off" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label"><small> Sale Price <i class="fa  fa-asterisk"></i> </small></label>
                  <div class="col-sm-6">
                    <input required="true" class="form-control " placeholder="Cost" name="price" type="number" value="{{!empty($item->price) ? $item->price:old('price') }}" autocomplete="off" >
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label"><small> Stax <i class="fa  fa-asterisk"></i> </small></label>
                  <div class="col-sm-6">
                    <input required="true" class="form-control " placeholder="Stax"   name="stax" type="number" value="{{ isset($item->stax) ? $item->stax:old('stax') }}" autocomplete="off" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="group_name" class="col-sm-4  control-label"><small>Start and End Time <i class="fa  fa-asterisk"></i> </small></label>
                  <div class="col-sm-3">
                    <input required="true" class="form-control " placeholder="Start Time"   name="stime" type="number" value="{{!empty($item->stime) ? $item->stime:old('stime') }}" autocomplete="off" >
                  </div>
                  <div class="col-sm-3">
                    <input required="true" class="form-control " placeholder="End Time"   name="etime" type="number" value="{{!empty($item->etime) ? $item->etime:old('etime') }}" autocomplete="off" >
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label"><small>Status <i class="fa  fa-asterisk"></i></small></label>
                  <div class="col-sm-6">
                    {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive',], isset($item->status) ? $item->status: old('status')  ,['class' =>'form-control','required'=>'true' ]); !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="group_name" class="col-sm-4 control-label"><small>Details <i class="fa  fa-asterisk"></i> </small></label>
                  <div class="col-sm-6">
                    <textarea  class="form-control" placeholder="Details..." name="details" rows="2" autocomplete="off" >{{!empty($item->details) ? $item->details:old('details') }} </textarea>
                  </div>
                </div>

               

              </div>
            </div>
            
              
        
      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-success btn-flat"> <span class="glyphicon glyphicon-plus-sign"></span> {{ !empty($item->id) ? 'Update & next ' : 'Save & Next ' }}</button>
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
      </div>
      {!! Form::close() !!}
    </div>

  </div>


<script src="{{ URL::asset('backend/plugins/select2/select2.min.js') }}"></script>

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
      rules: {
        "owner_name": {
          required: true,
          minlength: 3
        },



      },
      messages: {
        "owner_name": {
          required: "Please enter Full Name",
          minlength: "Your Name must consist of at least 3 characters"
        },


      }
    });

    $('.itemtype').select2()
   


  });


</script>



