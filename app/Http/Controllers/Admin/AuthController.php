<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function ShowFormLogin()
    {
        return view('admin.auth.login');
    }
    public function Login(Request $request)
    {
        // TODO::THis Steps To Validate Inputs From Admin
        $data = $request->validate([
            'email'    => 'required|email|exists:admins,email|max:100|',
            'password' => 'required|string',
        ]);
        // TODO::THis Steps To Check admin existed OR Not
        if(!auth()->guard('admin')->attempt(['email' => $data['email'],'password' => $data['password']]))
        {
            return back();
        }
        else{
            return redirect(route('admin.home'));
        }
    }
    public function Logout()
    {
        auth()->guard('admin')->logout();
        return redirect(route('admin.auth.login'));
    }




}
