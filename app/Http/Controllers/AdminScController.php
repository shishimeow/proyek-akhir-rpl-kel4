<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SupportCourse;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Faculty;
use Illuminate\Support\Facades\Storage;

class AdminScController extends Controller
{
    public function index(){
        return view('admin.sc.index', [
            'title' => 'Daftar Supporting Course',
            'lists' => SupportCourse::all(),
            'num' => 1
        ]);
    }

    public function show(){

    }

    public function create(){
        return view('admin.sc.create', [
            'title' => 'Tambah Supporting Course',
            'faculties' => Faculty::all()
        ]);
    }

    public function store(Request $request){
        $validate = $request->validate([
            'courses_id' => 'required|unique:support_courses|max:10',
            'courses_name' => 'required|max:40|unique:support_courses',
            'course_credits' => 'required|max:10',
            'faculty_id' => 'required',
            'date' => 'required|max:30',
            'desc' => 'required',
            'picture' => 'image|file|max:1024',
            'slug' => 'required|unique:support_courses'
        ]);

        if($request->file('image')){
            $validate['picture'] = $request->file('image')->store('post-images');
        }

        $validate['rating'] = 0.0;

        SupportCourse::create($validate);
        
        session()->flash('createData', 'Data berhasil ditambahkan!');
        return redirect('/admin/sc');
    }

    public function edit($slug){
        $course = SupportCourse::where('slug', $slug)->first();
        return view('admin.sc.edit', [
            'title' => 'Edit Supporting Course',
            'course' => $course,
            'faculties' => Faculty::all()
        ]);
    }

    public function update(Request $request, $slug){
        $course = SupportCourse::where('slug', $slug)->first();
        $rules = [
            'courses_id' => 'required|max:10|unique:App\Models\SupportCourse,courses_id,'.$course->id,
            'courses_name' => 'required|max:40|unique:App\Models\SupportCourse,courses_name,'.$course->id,
            'course_credits' => 'required|max:10',
            'faculty_id' => 'required',
            'date' => 'required|max:30',
            'desc' => 'required',
            'picture' => 'image|file|max:1024',
        ];

        if($request->slug != $course->slug){
            $rules['slug'] = 'required|unique:App\Models\SupportCourse,slug,'.$course->id;
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

        SupportCourse::where('id', $course->id)->update($validatedData);
        
        session()->flash('createData', 'Data berhasil diperbarui!');
        return redirect('/admin/sc');
    }

    public function destroy($slug){
        $course = SupportCourse::where('slug', $slug)->first();
        $id = SupportCourse::where('slug', $slug)->select('id')->get();

        if($course->picture){
            Storage::delete($course->picture);
        }

        SupportCourse::destroy($id);
        session()->flash('delData', 'Data berhasil dihapus!');
        return back();
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(SupportCourse::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
