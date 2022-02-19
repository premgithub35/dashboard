<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Repositories\Repository;

class FaqController extends Controller
{
    protected $model;

    public function __construct(Faq $faq)
    {
        // set the model
        $this->model = new Repository($faq);
    }
    public function index()
    {

        $faqs = $this->model->all();
        return view('backend.faq.index',compact('faqs'));
    }

    public function create()
    {
        return view('backend.faq.add');
    }

    public function edit($id)
    {
        $faqs = $this->model->show($id);

        return view('backend.faq.edit',compact('faqs'));
    }

    public function createOrUpdate(Request $request,$id = null)
    {
        $request->validate([
            'title'=>'required',
            'content' => 'required'
          ]);
      
        if($id === null){
           
           $this->model->create($request->only($this->model->getModel()->fillable));
           return redirect()->route('faq')->with('status', 'New Faq Created!');
           
        }else{
            $this->model->update($request->only($this->model->getModel()->fillable), $id);
            return redirect()->route('faq')->with('status', 'faq Updated!');
        }
    }

    public function inactive($id)
    {
      $this->model->inactive($id);
       return redirect()->route('faq');


    }
     public function active($id)
    {
       $this->model->active($id);
       return redirect()->route('faq');

    }
}