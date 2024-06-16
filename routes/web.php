<?php

use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return redirect('home');
});

Route::get('/home', function(){
    return view('home', [
        "title" => "HOME",
        'active'=> 'home',
    ]);
});

Route::get('/input', [MainController::class, 'index'])->middleware('auth');
Route::post('/input', [MainController::class, 'add'])->middleware('auth');
Route::delete('/input/{member}/{id}', [MainController::class, 'remove'])->middleware('auth');

Route::get('/recap/perorangan', function(){
    return view('recap', [
        "title" => "RECAP DATA",
        'active'=> 'recap',
        'type' => 'orang',
    ]);
})->middleware('auth');

Route::get('/recap/bulanan', function(){
    return view('recap', [
        "title" => "RECAP DATA",
        'active'=> 'recap',
        'type' => 'bulan',
    ]);
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){ return view('Dashboard.index'); })->middleware('admin'); 

Route::resource('/dashboard/members', MemberController::class)->middleware('admin');

Route::resource('/dashboard/sampahs', SampahController::class)->middleware('admin');