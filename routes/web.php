<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamController;
/*
|--------------------------------------------------------------------------
| Web Routess
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "title" =>"Home",
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" =>"About",
    ]);
});

Route::get('/blog', function () {
    return view('blog',[
        "title" =>"Blog",
    ]);
});

Route::get('/categories', function () {
    return view('category',[
        "title" =>"Categories",
    ]);
});

//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

//logout
Route::post('/logout', [LoginController::class, 'logout']);

//register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

//template
Route::get('/admin', [AdminController::class, 'index']);

//post
Route::resource('books', BookController::class );

Route::get('/pdf-book', [BookController::class, 'pdf']);


//penulis
Route::resource('writers', WriterController::class );
 Route::get('/pdf-writer', [WriterController::class, 'pdf']);

//penerbit
Route::resource('penerbits', PenerbitController::class );
 Route::get('/pdf-penerbit', [PenerbitController::class, 'pdf']);

//kategori
Route::resource('kategori', KategoriController::class );
 Route::get('/pdf-kategori', [KategoriController::class, 'pdf']);

//Peminjam 
Route::resource('peminjams', PeminjamController::class );