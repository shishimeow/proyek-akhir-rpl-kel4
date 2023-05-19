<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminFacultyController extends Controller
{
    public function index(){
        if(!Auth::guard('admin')->check()){
            return abort(403);
        }

        return view('admin.faculty.index', [
            'title' => 'Daftar Fakultas',
            'lists' => Faculty::all(),
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

        return view('admin.faculty.create', [
            'title' => 'Tambah Fakultas',
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
            'faculty_name' => 'required|max:40',
            'slug' => 'required|unique:faculties',
        ];

        $validatedData = $request->validate($rules);

        Faculty::create($validatedData);
        
        return redirect('/admin/faculty');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        if(!Auth::guard('admin')->check()){
            return abort(403);
        }

        $faculty = Faculty::where('slug', $slug)->first();
        return view('admin.faculty.edit', [
            'title' => 'Update Fakultas',
            'faculty' =>  $faculty
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        if(!Auth::guard('admin')->check()){
            return abort(403);
        }

        $faculty = Faculty::where('slug', $slug)->first();
        $rules = [
            'faculty_name' => 'required|max:40',
        ];

        if($request->slug != $faculty->slug){
            $rules['slug'] = 'required|unique:App\Models\Faculty,slug,'.$faculty->id;
        };

        $validatedData = $request->validate($rules);

        Faculty::where('id', $faculty->id)->update($validatedData);
        
        return redirect('/admin/faculty');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $id = Faculty::where('slug', $slug)->select('id')->get();

        Faculty::destroy($id);
        session()->flash('delete', 'Review berhasil dihapus!');
        return back();
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(mbkm::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
