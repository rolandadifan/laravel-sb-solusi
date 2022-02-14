<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NewsClientController;
use App\Http\Controllers\ProjectClientController;
use App\Http\Controllers\SearchController;

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

Route::get('/', [HomePageController::class, 'index']);

Auth::routes(['register' => false]);


//project
Route::get('/project', [ProjectClientController::class, 'index'])->name('project.client');
Route::get('/project/{slug}', [ProjectClientController::class, 'show'])->name('project.client.detail');
Route::get('/project/search/category', [ProjectClientController::class, 'category'])->name('project.seacrh.category');
Route::get('/search', [SearchController::class, 'project']);

//news
Route::get('/news', [NewsClientController::class, 'index'])->name('news.client');
Route::get('/news/{slug}', [NewsClientController::class, 'show'])->name('news.client.detail');

//sendmail
Route::post('/send-mail', [MailController::class, 'send_mail']);

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

    //projects
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.edit');
    Route::get('/project-create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
    Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::post('/project/gallery/create', [ProjectController::class, 'add_image'])->name('project.gallery.create');
    Route::delete('/project/gallery/{id}', [ProjectController::class, 'destroy_gallery'])->name('project.gallery.destroy');



});


