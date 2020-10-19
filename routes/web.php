<?php

use App\Http\Controllers\Admin\HomeController;
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
    Route::get('/about-us', [WebController::class , 'aboutUs'])->name('aboutUs');
    Route::get('/contact-us', [WebController::class , 'contactUs'])->name('contactUs');
    Route::get('/our-portfolio', [WebController::class , 'portfolio'])->name('portfolio');
    Route::match(['post', 'get'],'/send', [WebController::class , 'portfolio']);
    Route::get('/services', [WebController::class , 'services'])->name('services');
    Route::get('/our-blog', [WebController::class , 'our_blog'])->name('our_blog');
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


Route::middleware('admin')->namespace('Admin')->prefix('admin')->group(function (){

    Route::get('/dashboard', [HomeController::class , 'index'])->name('admin_dashboard');

    Route::prefix('blog')->as('blog.')->group(function () {
        Route::resource('categories','BlogCategoryController');
        Route::resource('posts','BlogPostController');
        Route::resource('comments','BlogCommentController');
    });


    Route::prefix('services')->as('service.')->group(function () {
        Route::resource('plans','PlanController');
        Route::resource('plan/items','PlanItemController');
        Route::resource('subscriptions','PlanSubscriptionController')->only('index');
    });



    Route::resource('orders','OrderController');
    Route::get('/orders/receipt/{id}/download', 'OrderController@download_receipt')->name('orders.receipts.download');
    Route::get('/orders/status/{id}', 'OrderController@status')->name('orders.status');

    Route::resource('bloggers','BloggersController');
    Route::resource('testimonials','TestimonialController');

    Route::resource('users','UsersController');
    Route::get('enrolled/users','UsersController@enrolled')->name('users.enrolled');
    Route::post('users/password/reset/{id}','UsersController@password_reset')->name('users.password_reset');



    Route::resource('logs','LogsController');

    Route::get('/referrals/index', 'HomeController@referrals')->name('referrals.index');
    Route::resource('newsletters','NewsletterSubscriberController');
    Route::post('newsletters/send','NewsletterSubscriberController@send')->name('newsletters.send');
});