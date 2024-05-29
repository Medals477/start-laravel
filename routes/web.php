<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
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

    
// Route::get('blog' ,[BlogController::class, 'index'])->name('blog.index');
// Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
// Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
// Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
// Route::patch('blog.update/{id}', [BlogController::class, 'update'])->name('blog.update');
// Route::delete('blog/destroy/{id}' ,[BlogController::class, 'destroy'])->name('blog.destroy');
Route::resource('blog', BlogController::class);
Route::resource('category', CategoryController::class);
