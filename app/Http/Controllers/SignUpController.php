<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignUpController extends Controller
{
    public function index(){
        return view('signup.index', [
            'title' => 'Sign Up'
        ]);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:4|max:15',
            'email' => 'required|email:dns',
            'password' => 'required|confirmed|min:8'
        ]);

        $validate['password'] = bcrypt($validate['password']);

        if (User::where('username', $validate['username'])->exists()) {
            session()->flash('signError', 'Username sudah terdaftar.');
            return back()->withInput();
        }

        if (User::where('email', $validate['email'])->exists()) {
            session()->flash('signError', 'Email sudah terdaftar.');
            return back()->withInput();
        }

        User::create($validate);

        session()->flash('signSuccess', 'Registrasi berhasil! Silakan login');
        
        return redirect('/login');
    }
}
