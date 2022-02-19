<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected $model;

    public function __construct(User $users)
    {
        // set the model
        $this->model = new Repository($users);
    }
    public function getUsers()
    {
      $users = User::paginate(20);
      return view('backend.user.view',compact('users'));

    }

    public function create()
    {
        $roles=Roles::all()->pluck('name','id');
        return view('backend.user.add',compact('roles'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required'
        ]);
            
       

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role_id' => $request->get('role_id')
        ]);

       

       return redirect()->route('users')->with('success', 'Users has been Created Successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles=Roles::all()->pluck('name','id');
        return view('backend.user.edit',compact('user','roles'));

    }

    public function update($id,Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'is_active' =>'required',
            'role_id' => 'required'
        ]);
    
        $user = User::where('id',$id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role_id' => $request->get('role_id'),
            'is_active' => $request->get('is_active')
        ]);
              

       return redirect('users')->with('success', 'Users has been Updated Successfully');
    }

    public function inactive($id)
    {
      $this->model->inactive($id);
       return redirect()->route('users');
    }
     public function active($id)
    {
       $this->model->active($id);
       return redirect()->route('users');

    }

}
