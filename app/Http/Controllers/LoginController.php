<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.login');
    }

    public function authenticate(Request $request)
    {
        
     
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => 1])) {
            // Authentication passed...
          
            return redirect()->intended('admin/dashboard');
        }else if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => 4])) {
            return redirect()->intended('captain/dashboard/bookings');
        }else{
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
