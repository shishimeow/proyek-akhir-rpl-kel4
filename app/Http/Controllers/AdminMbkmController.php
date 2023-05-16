<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mbkm;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;


class AdminMbkmController extends Controller
{
    public function index(){
        if(!Auth::guard('admin')->check()){
            return abort(403);
        }

        return view('admin.mbkm.index', [
            'title' => 'Daftar MBKM',
            'lists' => mbkm::all(),
            'num' => 1
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::guard('admin')->check()){
            return abort(403);
        }

        return view('admin.mbkm.create', [
            'title' => 'Tambah MBKM',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::guard('admin')->check()){
            return abort(403);
        }

        $rules = [
            'courses_name' => 'required|max:40|unique:mbkms',
            'positions' => 'required|max:200',
            'benefit' => 'required',
            'requirements' => 'required',
            'picture' => 'image|file|max:1024',
            'slug' => 'required|unique:mbkms'
        ];

        if($request->file('image')){
            $rules['picture'] = $request->file('image')->store('post-images');
        }

        $validatedData = $request->validate($rules);

        mbkm::create($validatedData);
        
        return redirect('/admin/mbkm');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        if(!Auth::guard('admin')->check()){
            return abort(403);
        }

        $course = mbkm::where('slug', $slug)->first();
        return view('admin.mbkm.edit', [
            'title' => 'Update MBKM',
            'course' =>  $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        mbkm::destroy($id);
        session()->flash('delete', 'Review berhasil dihapus!');
        return back();
    }
}
