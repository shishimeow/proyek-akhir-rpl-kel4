<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request){

        $this->validate($request, [
            'login' => 'required',
            'password' => 'required|min:8'
        ]);
        
        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        // if (filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)) {
        //     $login_type = 'email';
        // } else {
        //     $login_type = 'username';
        // }
        
        $request->merge([
            $login_type => $request->input('login')
        ]);

        $credentials = $request->only($login_type, 'password');

        $remember_me = $request->has('remember_me');
        
        if(Auth::guard('web')->attempt($credentials, $remember_me)){
            if (session_status() == PHP_SESSION_ACTIVE) {
                session()->regenerate();
            }
            return redirect()->intended('/sc');
        }
        if(Auth::guard('admin')->attempt($credentials, $remember_me)){
            if (session_status() == PHP_SESSION_ACTIVE) {
                session()->regenerate();
            }
            return redirect()->intended('/admin');
        }

        session()->flash('loginError', 'Login gagal!');

        return back();

    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
