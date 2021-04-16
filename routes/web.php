<?php

use App\Http\Controllers\blog\PostsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CategoriesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.home');
Route::get('/blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('/blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');
Route::get('/blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// grouping routes for authentication & middleware

Route::middleware(['auth'])->group(function(){

Route::resource('categories','App\Http\Controllers\CategoriesController');
Route::resource('posts','App\Http\Controllers\PostController');
Route::resource('tags','App\Http\Controllers\TagController');
Route::post('image_upload', [PostController::class,'upload'])->name('upload');
Route::get('trashed-posts', [PostController::class,'trashed'])->name('trashed-posts.index');
Route::get('trashed-posts-store/{id}', [PostController::class,'trashedStore'])->name('trashed-posts-store.index');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users','App\Http\Controllers\UserController');
    Route::post('users/{id}/admin',[UserController::class,'makeAdmin'])->name('users.make-admin');
    Route::post('users/{id}/writer',[UserController::class,'makeWriter'])->name('users.make-writer');
});




