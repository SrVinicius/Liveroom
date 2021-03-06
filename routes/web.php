<?php

use App\Models\video;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/liveroom', [App\Http\Controllers\IndexController::class,'fetch']);

Route::get('/index', [App\Http\Controllers\IndexController::class,'index']);

Route::post('/insert_video', [App\Http\Controllers\IndexController::class,'insert'])->name('insert.file');

