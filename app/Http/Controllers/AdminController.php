<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class AdminController extends Controller
{
    public function index(){
        return view('admin.index', [
            'title' => 'Dashboard Admin'
        ]);
    }

    // public function show($category){
    //     if($category == 'sc'){
    //         return view('admin.sc', [
    //             'title' => 'Daftar Supporting Course'
    //         ]);
    //     } else if($category == 'mbkm'){
    //         return view('admin.mbkm', [
    //             'title' => 'Daftar MBKM'
    //         ]);
    //     } else if($category == 'profile'){
    //         return view('admin.user', [
    //             'title' => 'Daftar Pengguna'
    //         ]);
    //     }

    // }

    // public function store(){
    
    // }

    // public function update(){

    // }

    // public function destroy(){

    // }
}
