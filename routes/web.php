<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ScController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MbkmController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminScController;
use App\Http\Controllers\AdminMbkmController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminFacultyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']); //ganti post nanti

Route::get('/signup', [SignUpController::class, 'index'])->middleware('guest');
Route::post('/signup', [SignUpController::class, 'store']);

Route::prefix('sc')->middleware(['auth'])->group(function(){
    Route::match(['get', 'post'], '/', [ScController::class, 'index']);
    Route::get('/{course:slug}', [ScController::class, 'show']);
    Route::get('/', [ScController::class, 'search'])->name('searchsc.add');
    Route::post('/{course:slug}', [ScController::class, 'store']);
    Route::post('/', [ScController::class, 'filter'])->name('filtersc.add');
    Route::put('/update', [ScController::class, 'update'])->name('scupdate.add');
    Route::delete('/delete', [ScController::class, 'destroy'])->name('scdelete.add');
});

Route::prefix('comments')->middleware(['auth'])->group(function(){
    Route::delete('/delete', [CommentController::class, 'destroy'])->name('delete.add');
    Route::put('/update', [CommentController::class, 'update'])->name('update.add');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.add');
    Route::post('/reply', [CommentController::class, 'replyStore'])->name('reply.add');
});

Route::prefix('mbkm')->middleware(['auth'])->group(function(){
    Route::match(['get', 'post'], '/', [MbkmController::class, 'index']);
    Route::get('/{course:slug}', [MbkmController::class, 'show']);
    Route::get('/', [MbkmController::class, 'search'])->name('searchm.add');
    Route::post('/filterMonth', [MbkmController::class, 'filterMonth'])->name('filterm.add');
    Route::post('/{course:slug}', [MbkmController::class, 'store']);
    Route::put('/update', [MbkmController::class, 'update'])->name('mupdate.add');
    Route::delete('/delete', [MbkmController::class, 'destroy'])->name('mdelete.add');
});

Route::prefix('profile')->middleware(['auth'])->group(function(){
    Route::match(['get', 'post'], '/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'update']);
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/sc/checkSlug', [AdminController::class, 'checkSlug']);
    Route::resource('/sc', AdminScController::class, ['expect' => ['show', 'update']]);
    Route::resource('/mbkm', AdminMbkmController::class);
    Route::resource('/faculty', AdminFacultyController::class);
    Route::resource('/user', AdminUserController::class);
});

// Route::get('/admin', [AdminController::class, 'index']);
// Route::resource('/admin/sc', AdminScController::class);
// Route::resource('')

