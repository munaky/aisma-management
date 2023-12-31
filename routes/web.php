<?php

use Illuminate\Support\Facades\Route;

/* Controllers */
use App\Http\Controllers\Auth;
use App\Http\Controllers\View;
use App\Http\Controllers\PostProduct;
use App\Http\Controllers\PostEmployee;
use App\Http\Controllers\PostList;
use App\Http\Controllers\Attendance;
use App\Http\Controllers\Document;
use App\Http\Controllers\PostHistory;
use App\Http\Controllers\Test;

/* Middlewares */
use App\Http\Middleware\ValidateUser;

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

Route::match(['get', 'post'], '/test', Test::class);

Route::get('/auth/login', function () {
    return view('auth.login');
});
Route::get('/auth/logout', [Auth::class, 'logout']);

Route::get('/', function () {
    if(session()->missing('user')){
        return redirect('/auth/login');
    }

    $access = session()->get('user')->role->access;
    return redirect("/$access/home");
});

Route::post('/auth/{method}', Auth::class);

Route::get('/{role}/{page}', View::class)->middleware(ValidateUser::class);

Route::get('/document/{type}/{id}', Document::class);

Route::post('/admin/post/product/{action}', PostProduct::class);

Route::post('/admin/post/list/{action}', PostList::class);
Route::post('/admin/post/history/{action}', PostHistory::class);

Route::post('/admin/post/employee/{action}', PostEmployee::class);

Route::post('/attendance/{action}', Attendance::class);
