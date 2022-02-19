<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\Models\Contact;


class MessageController extends Controller
{
    protected $model;

    // public function __construct(Career $career)
    // {
    //     // set the model
    //     // $this->model = new Repository($careers);
    // }
    // public function index()
    // {

    //     // $careers = $this->model->all();
    //     return view('backend.messages.index');
    // }

    public function index()
    {

       $items=new Contact;

       if(!empty($_GET['msgtype']))
       {
        
          if(request('msgtype') == 1)
            {
              $items=$items->where([['read',0],['subject','=','FEEDBACK']]);
            }
           if(request('msgtype')==2)
            {
              $items=$items->where([['read',0],['subject','=','GENERAL ENQUIRY']]);
            }
          
       }

      $items= $items->orderBy('id','desc')->paginate(20);

        return view('backend.messages.index',compact('items'));
    }
    public function view($id)
      {


              $item = Contact::findOrFail($id);
        $data['active_class']       = 'messages';
        $data['title']              = 'View Message';

          $item->read = 1;
         $item->save();

          return view('backend.messages.view',$data,compact('item'));




      }
}
