<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        return view('profile.index', [
            'title' => 'Akun Profile',
            'faculties' => Faculty::all()
        ]);
    }

    public function update(Request $request){
        $request->user()->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'dept' => $request->dept
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $request->user()->update([
                'image' => $request->file('image')->store('post-images')
            ]);
        }

        session()->flash('updateAcc', 'Profile berhasil diperbarui!');

        return redirect('profile');
    }
}
