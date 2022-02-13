<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\MenuController;

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

Auth::routes(['register' => false]);


Route::prefix('web/admin')->middleware(['auth'])->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

     //category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    //news
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.edit');
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    //menu
    Route::get('/contact', [MenuController::class, 'contact_index'])->name('contact.index');
    Route::put('/contact', [MenuController::class, 'contact_update'])->name('contact.update');
    Route::get('/header', [MenuController::class, 'header_index'])->name('header.index');
    Route::put('/header', [MenuController::class, 'header_update'])->name('header.update');
    Route::get('/social-media', [MenuController::class, 'social_index'])->name('social.index');
    Route::put('/header', [MenuController::class, 'social_update'])->name('social.update');
    Route::get('/about', [MenuController::class, 'about_index'])->name('about.index');
    Route::put('/about', [MenuController::class, 'about_update'])->name('about.update');
    Route::put('/about/image-update', [MenuController::class, 'img_update'])->name('img.update');



});

