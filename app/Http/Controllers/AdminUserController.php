<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index(){
        return view('admin.user', [
            'title' => 'Daftar Pengguna',
            'lists' => User::where('isAdmin', FALSE)->get(),
            'num' => 1
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            if ($user->image) {
                Storage::delete($user->image);
            }

            User::destroy($id);
            session()->flash('delete', 'Review berhasil dihapus!');
        }

        return back();
    }
}
