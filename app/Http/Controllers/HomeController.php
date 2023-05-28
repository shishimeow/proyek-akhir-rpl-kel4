<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mbkm;
use App\Models\SupportCourse;
use App\Models\Faculty;

class HomeController extends Controller
{
    public function index(){
        if(!auth()->check()){
            return view('home.index', [
                'title' => 'Home'
            ]);
        }

        return view('sc.index', [
            'title' => 'Supporting Course',
            'support_courses' => SupportCourse::all(),
            'faculties' => Faculty::all(),
        ]);
    }

}
