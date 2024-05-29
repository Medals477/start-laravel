<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// only route
// Route::get('start', function(){
//     return view('admin.post.index');
// });

Route::get('start', [PostController::class, 'index'])->name("start");
Route::get('/facebook' ,function(){
    return view('admin.user.index');
})->name('google');

    
Route::get('blog/index' ,[BlogController::class, 'index'])->name('blog.index');
Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::delete('blog/delete/{id}' ,[BlogController::class, 'destroy'])->name('blog.delete');
