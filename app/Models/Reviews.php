<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
	protected $table = 'reviews';

	// public function Agent()
	//   {
	// 	return $this->belongsTo('App\Models\Admin','agentid')->select(['id','username']);
	//   }
   public function Stores(){
        return $this->belongsTo('App\Models\Store','store')->select(['name','mobile','owner_contact']);
    }
  
	    public function Order()
	     {
	     	return $this->belongsTo('App\Models\Orders','order_id')->select(['id','mobile']);
	     }
}
