<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imenus;
use App\Models\ItemType;

use App\Repositories\Repository;

class ImenusController extends Controller
{
    protected $model;

    public function __construct(Imenus $imenus)
    {
        // set the model
        $this->model = new Repository($imenus);
    }
    public function index()
    {

        $imenus=new Imenus;
        if(request()->filled('id')){
          $imenus = $imenus->where('id',request('id'));
             }
        if(request()->filled('code')){
          $imenus = $imenus->where('code',request('code'));
           }
          $imenus= $imenus->orderBy('id','desc')->paginate(20)->appends(request()->query());
          $total=Imenus::count();

        return view('backend.imenus.index',compact('imenus','total'));
    }
    public function add(){
        $itemtype =  Itemtype::pluck('name','id');
        return view('backend.imenus.form', compact('itemtype'));
    }

    public function store(Request $request){
        if(!empty($request->id))
        {
           $item = Imenus::find($request->id);  
        }
        else
        {
            $item=new Imenus;
        }
        $item->name = $request->name;
        $item->code = $request->code;
        $item->vn_type = $request->vn_type;
        $item->price = $request->price;
        $item->cost = $request->cost;
        $item->stax = $request->stax;
        $item->stime = $request->stime;
        $item->etime = $request->etime;
        $item->bstime = $request->bstime;
        $item->betime = $request->betime;
        $item->status = $request->status;
        $item->is_active = $request->is_active;
        $item->details = $request->details;
        $item->itemtype = $request->itemtype;

        $item->save();
        // $this->helper->one_time_message('success', 'Updated Successfully');
        return redirect()->route('imenu');

    }
  
    public function edit($id)
    {
        $faqs = $this->model->show($id);

        return view('backend.imenus.edit',compact('imenus'));
    }

    public function inactive($id)
    {
      $this->model->inactive($id);
       return redirect()->route('imenu');


    }
     public function active($id)
    {
       $this->model->active($id);
       return redirect()->route('imenu');

    }
}