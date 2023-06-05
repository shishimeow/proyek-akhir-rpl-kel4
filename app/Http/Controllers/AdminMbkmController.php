<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mbkm;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;


class AdminMbkmController extends Controller
{
    public function index(){
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
        return view('admin.mbkm.create', [
            'title' => 'Tambah MBKM',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'mbkm_name' => 'required|max:40|unique:mbkms',
            'positions' => 'required|max:200',
            'benefit' => 'required',
            'periode_begin' => 'required',
            'periode_end' => 'required',
            'requirements' => 'required',
            'picture' => 'image|file|max:1024',
            'slug' => 'required|unique:mbkms',
            'excerpt' => 'required'
        ];

        if($request->file('image')){
            $rules['picture'] = $request->file('image')->store('post-images');
        }

        $validatedData = $request->validate($rules);
        $validatedData['excerpt'] = Str::words($request->positions, 6);

        $validatedData['rating'] = 0.0;

        mbkm::create($validatedData);
        
        session()->flash('createData', 'Data berhasil ditambahkan!');
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
        $course = mbkm::where('slug', $slug)->first();
        return view('admin.mbkm.edit', [
            'title' => 'Update MBKM',
            'course' =>  $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $course = mbkm::where('slug', $slug)->first();
        $rules = [
            'mbkm_name' => 'required|max:40',
            'positions' => 'required|max:200',
            'benefit' => 'required',
            'periode_begin' => 'required',
            'periode_end' => 'required',
            'requirements' => 'required',
            'picture' => 'image|file|max:1024',
            'excerpt' => 'required'
        ];

        if($request->slug != $course->slug){
            $rules['slug'] = 'required|unique:App\Models\mbkm,slug,'.$course->id;
        };

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $course->update([
                'picture' => $request->file('image')->store('post-images')
            ]);
        }

        $validatedData = $request->validate($rules);
        $validatedData['excerpt'] = Str::words($request->positions, 6);

        mbkm::where('id', $course->id)->update($validatedData);
        
        session()->flash('createData', 'Data berhasil diperbarui!');
        return redirect('/admin/mbkm');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $course = mbkm::where('slug', $slug)->first();
        $id = mbkm::where('slug', $slug)->select('id')->get();

        if($course->picture){
            Storage::delete($course->picture);
        }

        mbkm::destroy($id);
        session()->flash('delData', 'Data berhasil dihapus!');
        return back();
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(mbkm::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
