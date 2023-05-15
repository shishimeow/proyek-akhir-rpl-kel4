<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SupportCourse;
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
            'courses_id' => 'required|max:10',
            'courses_name' => 'required|max:40',
            'course_credits' => 'required|max:10',
            'faculty_id' => 'required',
            'date' => 'required|max:30',
            'desc' => 'required',
            'picture' => 'image|file|max:1024',
            'slug' => 'required'
        ]);

        if($request->file('image')){
            $validate['picture'] = $request->file('image')->store('post-images');
        }

        SupportCourse::create($validate);
        
        return redirect('/admin/sc');
    }

    public function edit($slug){
        if(!Auth::guard('admin')->check()){
            return abort(403);
        }

        $course = SupportCourse::where('slug', $slug)->first();
        return view('admin.sc.edit', [
            'title' => 'Edit Supporting Course',
            'course' => $course,
            'faculties' => Faculty::all()
        ]);
    }

    public function update(Request $request, SupportCourse $course){
        if(!Auth::guard('admin')->check()){
            return abort(403);
        }

        $course->update([
            'courses_name' => $request->input('courses_name'),
            'courses_id' => $request->input('courses_id'),
            'faculty_id' => $request->input('faculty_id'),
            'course_credits' => $request->input('course_credits'),
            'date' => $request->input('date'),
            'desc'=> $request->input('desc'),
            'slug' => $request->input('slug')
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $course->update([
                'picture' => $request->file('image')->store('post-images')
            ]);
        }
        
        return redirect('/admin/sc');
    }

    public function destroy(Request $request){
        $id = $request->input('rev_id');

        SupportCourse::destroy($id);
        session()->flash('delete', 'Review berhasil dihapus!');
        return back();
    }

}
