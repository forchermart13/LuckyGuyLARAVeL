<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{

    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'phone' => 'required|digits:10|unique:users,phone',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => 'User',
            'phone' => $request->phone,
            'status' => 1,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success','User Registered Successfully');
    }
}