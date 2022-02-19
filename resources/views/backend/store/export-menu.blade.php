@extends('admin.printlayout')
@section('print')
<style>table{font-size:12px}</style>
@if(!empty($items))
<div class="panel-body">
<div class="row no-print" >
	<div class="col-md-6">
		<img src="https://www.railrestro.com/logo-rail-restro.png" >
	</div>
	<div class="col-md-6">
		<div class="pull-right hidden-print">
			<a href="javascript:window.print()" class="btn btn-primary pull-right" ><i class="glyphicon glyphicon-print"></i> Print</a>
		</div>
	</div>
</div>

<hr/>
<div class="row">
	<div class="col-md-6">
		<h4>Store Details</h4>
		
		<p>Name : <strong>{{$items->name}}</strong>  </p>
		<p>Status : @if($items->status==1) <span class="label label-success">Active</span>@else <span class="label label-danger">Inactive</span>@endif</p>
		<p>Station : {{$items->Station['name']}} &nbsp;<b>[{{$items->station}}]</b></p>
		
		<p>Minimum Order : <label class="label label-warning">{{$items->min_order}}</label></p>
		
	   <p>
	   	<?php  $facilities= explode( ',', $items->types) ; ?>
  	             @foreach ($facilities as $facility)
                         <span class="label label-info"> <?php echo $type[$facility] ;?></span>  &nbsp;

             @endforeach
	   </p>
	   <p>GST Tax: <strong><?php if ($items->s_tax_value !=0)echo $items->s_tax_value; else echo 'N/A';?> </strong>  <small> ( % Applicable above Base Price)</small></p>
	</div>
	<div class="col-md-6">
		
	</div>

</div>
<h4><strong>FOOD MENU</strong></h4>
<?php $html = "";$htmlArr = array(); ?>
              @foreach($itemtypes as $type)
                 @foreach($storeitems as $item)
                   @if($type->id==$item->itemtype)

                   <?php
                     $html .= "<tr><td > ".$item->code."</td><td width='70%'><strong>".$item->name." </strong><br><small>".$item->details."</small>
</td><td>".$item->cost."</td><td class='actions'> ".$item->price."</td></tr>";
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
              @for($i=0; $i<count($htmlArr);$i++)
                
                  
            <h4 class="text-primary"><?php echo $htmlArr[$i]['type'] ; ?> </h4>
                
           

        
           <table class='table table-striped table-condensed cart-table'><tr><th>Item Code</th><th>Item Name</th><th>Price</th><th>S Price</th></tr><?php echo $htmlArr[$i]['html'] ; ?></table> 
        
 
                @endfor
</div>
@else
<div class="panel-body">
	 <div style="position:absolute;top:30%;left:40%;" class="text-center">
	 	 <h4 class="text-danger">Opps, No Store Found</h4>
	 	 <br/>
	 	 <a href="{{route('stores')}}" class="btn btn-success">Go To Back</a>
	 </div>
</div>
@endif
@endsection