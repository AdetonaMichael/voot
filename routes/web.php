<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use Illuminate\Auth\Notifications\VerifyEmail;

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


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('blog/category/{categoryid}', [PostsController::class, 'category'])->name('blog.category');
Route::get('blog/tag/{tagid}', [PostsController::class, 'tag'])->name('blog.tag');
Route::get('blog/show/{showid}',[HomeController::class, 'show'])->name('blog.show');



Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoriesController::class);
    Route::resource('posts', PostsController::class);
    Route::resource('tags', TagsController::class);
    Route::get('trashed-posts', [PostsController::class, 'trashed'])->name('trashed-posts.index');
    Route::put('restore-post/{id}', [PostsController::class, 'restore'])->name('restore-post');
});



Route::middleware(['auth','superadmin'])->group(function (){
    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::post('users/{user}/make-admin', [UsersController::class, 'makeadmin'])->name('users.make-admin');
    Route::post('users/{user}/remove-admin', [UsersController::class, 'removeadmin'])->name('users.remove-admin');
});
Route::get('users/profile', [UsersController::class, 'edit'])->name('users.edit-profile');
Route::put('users/profile', [UsersController::class, 'update'])->name('users.update-profile');

