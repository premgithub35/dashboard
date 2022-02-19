<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stations;
use App\Repositories\Repository;
use DB;

class StationController extends Controller
{
    protected $model;

    public function __construct(Stations $station)
    {
        // set the model
        $this->model = new Repository($station);
    }
    public function index()
    {

        $items =  DB::table('stations');

        if(request()->filled('id')){
         $items = $items->where('id',request('id'));     
        }

        // if(request()->filled('station_cat')){
        //     $items = $items->where('station_cat',request('station_cat')); 
        //    }

            // if(request()->filled('state')){
            //     $items = $items->where('state', Input::get('state'))
            //     ->orWhere('state', 'like', '%' . Input::get('state') . '%');
            //     }  

            if(request()->filled('name')){
                $items = $items->where('name',request('name'));     
               }

        $items = $items->orderBy('id','asc')->paginate(15)->appends(request()->query());
        $total=Stations::count();
        return view('backend.stations.index',compact('items','total'));
    }

    public function create()
    {
        return view('backend.stations.add');
    }

    public function edit($id)
    {
        $station = $this->model->show($id);

        return view('backend.stations.edit',compact('station'));
    }

    public function createOrUpdate(Request $request,$id = null)
    {
        $request->validate([
            'name'=>'required',
            'content' => 'required'
          ]);
      
        if($id === null){
           
           $this->model->create($request->only($this->model->getModel()->fillable));
           return redirect()->route('stations')->with('status', 'New stations Created!');
           
        }else{
            $this->model->update($request->only($this->model->getModel()->fillable), $id);
            return redirect()->route('stations')->with('status', 'station Updated!');
        }
    }

    public function inactive($id)
    {
      $this->model->inactive($id);
       return redirect()->route('stations');
    }
     public function active($id)
    {
       $this->model->active($id);
       return redirect()->route('stations');

    }
}