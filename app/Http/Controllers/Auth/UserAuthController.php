<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $user = User::where('phone', $request->phone)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            if ($user->status != 'active') {
                return back()->with('error','Account disabled');
            }

            Session::put('user_id', $user->id);

            return redirect('/dashboard');
        }

        return back()->with('error','Invalid credentials');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function logout()
    {
        Session::forget('user_id');

        return redirect('/login');
    }

}