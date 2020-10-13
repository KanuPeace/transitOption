<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WebController;

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

Route::namespace('Web')->group(function () {
    Route::get('/', [WebController::class , 'index'])->name('homepage');
    Route::get('/about-us', 'WebController@aboutUs')->name('aboutUs');
    Route::get('/contact-us', 'WebController@contactUs')->name('contactUs');
    Route::get('/our-portfolio', 'WebController@portfolio')->name('portfolio');
    Route::match(['post', 'get'],'/send', 'WebController@sendContact');
    Route::get('/services', 'WebController@services')->name('services');
    Route::get('/our-blog', 'WebController@blogsView')->name('our_blog');
    Route::post('/our-blog/comment', 'WebController@blogsComment')->name('our_blog.comment');
    Route::match(['post', 'get'],'/subscribe', 'WebController@subscribe')->name('subscribe');
    Route::get('unsubscribe/{email}','WebController@unsubscribe')->name('unsubscribe');
    Route::get('post/{id}/{slug}', 'WebController@blog_info')->name('blog_info');
    Route::post('make-comment', 'WebController@make_comment')->name('make_comment');
    Route::get('/share/{id}','WebController@share_post')->name('share_post');
    Route::match(['post','get'],'/admin/login', 'AdminController@login')->name('Adminlogin');
    Route::post('/contact-process','ContactController@store')->name('contact.store');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
