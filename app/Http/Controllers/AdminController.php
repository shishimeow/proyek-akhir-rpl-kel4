<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\mbkm;
use App\Models\ReviewMbkm;
use App\Models\ReviewSc;
use App\Models\SupportCourse;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index', [
            'title' => 'Dashboard Admin',
            'user' => User::all()->count(),
            'sc' => SupportCourse::all()->count(),
            'mbkm' => mbkm::all()->count(),
            'reviewsc' => ReviewSc::all()->count(),
            'reviewmbkm' => ReviewMbkm::all()->count(),
            'reviewscs' => ReviewSc::all(),
            'reviewmbkms' => ReviewMbkm::all()
        ]);
    }
}
