<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\Reviews;
use DB;

class ReviewsController extends Controller
{
    public function index()
    {
    	 $reviews=new Reviews;

        $reviews= $reviews->orderBy('id','desc')->paginate(20)->appends(request()->query());
        $total=Reviews::count();

        return view ('backend.reviews.index',compact('reviews','total'));
    }
    public function view($id)
    {
      Cache::flush();
        $item = Cache::get('review_'.$id, function () use($id) {

        $item= Reviews::findorfail($id);

        Cache::forever('review_'.$id,$item);

        return $item;
        });
     
        return view ('backend.reviews.view',compact('item'));
    }
}
