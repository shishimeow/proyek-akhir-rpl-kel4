<?php

namespace App\Http\Controllers;

use App\Models\SupportCourse;
use App\Models\Faculty;
use App\Models\ReviewSc;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScController extends Controller
{
    public function index(){
        if(!Auth::guard('web')->check() || !Auth::guard('admin')->check()){
            return redirect('/login');
        }

        return view('sc.index',  [
            'title' => 'Supporting Course',
            'support_courses' => SupportCourse::all(),
            'faculties' => Faculty::all(),
        ]);
    }

    public function show(SupportCourse $course){
        $review = ReviewSc::where('courses_id', $course->id)->get();

        return view('sc.support_course', [
            'title' => $course->courses_name,
            'support_course' => $course,
            'reviews' => $review,
        ]);
    }

    public function store(Request $request, SupportCourse $course){
        switch ($request->input('action')) {
            case 'add':
                $request->validate([
                    'rev_sc' => 'required',
                    'courses_id' => 'required',
                    'rating' => 'required'
                ]);

                $validate = $request->all();
                $validate['user_id'] = auth()->user()->id;
        
                ReviewSc::create($validate);

                session()->flash('success', 'Review berhasil ditambahkan!');
                return redirect('/sc/'.$course->slug);
                break;
        }
    }

    public function update(Request $request){
        $id = $request->input('rev_id');
        $review = ReviewSc::findOrFail($id);
    
        $review->rev_sc = $request->input('rev_sc');
        $review->rating = $request->input('rating');
        $review->save();
    
        return back();
    }

    public function destroy(Request $request){
        $id = $request->input('rev_id');
    
        ReviewSc::destroy($id);
        session()->flash('delete', 'Review berhasil dihapus!');
        return back();
    }

    public function filter(Request $request){
        if($request->has('filter') && $request->input('filter') != 'all'){
            $filters = (array) $request->input('filter');
            $support_courses = SupportCourse::whereIn('faculty_id', $filters)->select('courses_name', 'courses_id', 'slug', 'rating')->get();

            return view('sc.index', [
                'title' => 'Supporting Course',
                'support_courses' => $support_courses,
                'faculties' => Faculty::all()
            ]);
        }
        else if($request->has('rate')){
            $support_courses = [];
            $filter = (int) $request->input('rate');

            switch($filter){
                case 1: $support_courses = SupportCourse::where('rating', 5)->select('courses_name', 'courses_id', 'slug', 'rating')->get();
                        break;
                case 2: $support_courses = SupportCourse::whereBetween('rating', [4, 4.99])->select('courses_name', 'courses_id', 'slug', 'rating')->get();
                        break;
                case 3: $support_courses = SupportCourse::where('rating', '<', 4)->select('courses_name', 'courses_id', 'slug', 'rating')->get();
                        break;
                default: $support_courses = SupportCourse::all();
            };

            return view('sc.index', [
                'title' => 'Supporting Course',
                'support_courses' => $support_courses,
                'faculties' => Faculty::all()
            ]);
        }

        return redirect('sc');
    }

    public function search(){
        return view('sc.index',  [
            'title' => 'Supporting Course',
            'support_courses' => SupportCourse::query()->filter()->get(),
            'faculties' => Faculty::all(),
        ]);
    }
}
