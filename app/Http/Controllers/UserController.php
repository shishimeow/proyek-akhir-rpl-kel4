<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('profile.index', [
            'title' => 'Akun Profile'
        ]);
    }

    public function update(Request $request){
        $request->user()->update(
            $request->all()
        );

        session()->flash('success', 'Profile berhasil diperbarui!');

        return redirect('profile');
    }
}
