<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Auth::routes();

Route::namespace('App\Http\Controllers\Web')->group(function () {
    Route::get('/', 'WebController@index')->name('homepage');
    Route::get('/about-us', 'WebController@aboutUs')->name('aboutUs');
    Route::get('/contact-us', 'WebController@contactUs')->name('contactUs');
    Route::get('/our-portfolio', 'WebController@portfolio')->name('portfolio');
    Route::match(['post', 'get'], '/send', 'WebController@portfolio');
    Route::get('/services', 'WebController@services')->name('services');
    Route::get('/our-blog', 'WebController@our_blog')->name('our_blog');
    Route::post('/our-blog/comment', 'WebController@blogsComment')->name('our_blog.comment');
    Route::match(['post', 'get'], '/subscribe', 'WebController@subscribe')->name('subscribe');
    Route::get('unsubscribe/{email}', 'WebController@unsubscribe')->name('unsubscribe');
    Route::get('post/{id}/{slug}', 'WebController@blog_info')->name('blog_info');
    Route::post('make-comment', 'WebController@make_comment')->name('make_comment');
    Route::get('/share/{id}', 'WebController@share_post')->name('share_post');
    Route::get('/file/{file}', 'WebController@read_file')->name('read_file');
    // Route::match(['post','get'],'/admin/login', 'AdminController@login')->name('Adminlogin');
    // Route::post('/contact-process','ContactController@store')->name('contact.store');

    Route::prefix("travel-guide")->as("trave_guide.")->group(function () {
        Route::get('/vehicles', 'TravelController@vehicles')->name('vehicles');

        Route::middleware("auth")->group(function () {
            Route::get('/booking/{code}', 'TravelController@booking')->name('booking');
        });
    });
});

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::namespace('App\Http\Controllers\User\Web')->prefix('consumer')->as('user.')->group(function () {
        Route::prefix('profile')->as('profile.')->group(function () {
            Route::match(['get', 'post'], '/complete', 'ProfileController@complete')->name('complete');
            Route::post('/next-of-kin', 'ProfileController@next_of_kin')->name('next_of_kin');
        });

        Route::middleware(["complete_profile"])->group(function () {
            Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        });
    });


    Route::namespace('App\Http\Controllers\Company\Web')->prefix('company')->as('company.')->group(function () {
        Route::prefix('profile')->as('profile.')->group(function () {
            Route::post('/company-profile', 'ProfileController@company_profile')->name('company_profile');
        });

        Route::middleware(["complete_profile"])->group(function () {
            Route::get('/dashboard', 'HomeController@index')->name('dashboard');
            Route::resource('/terminals', 'TerminalController');
            Route::resource('/vehicles', 'VehicleController')->except("create");
            Route::prefix('vehicles')->as('vehicles.')->group(function () {
                Route::get('/factory/steps-1', 'VehicleController@factoryStepsOne')->name('factory.steps.one');
                Route::post('/factory/steps-1', 'VehicleController@postFactoryStepsOne')->name('factory.steps.one');
                Route::get('/factory/steps-2', 'VehicleController@factoryStepsTwo')->name('factory.steps.two');
                Route::post('/factory/steps-2', 'VehicleController@postFactoryStepsTwo')->name('factory.steps.two');
                Route::resource('/images', 'VehicleImagesController')->except("index");
                Route::get('/{id}/images', 'VehicleImagesController@index')->name('images.index');
            });
        });
    });
});




Route::middleware(['auth:sanctum', 'verified'])->namespace('App\Http\Controllers\Admin')->prefix('admin')->as('admin.')->group(function () {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::prefix('blog')->as('blog.')->group(function () {
        Route::resource('categories', 'BlogCategoryController');
        Route::resource('posts', 'BlogPostController');
        Route::resource('comments', 'BlogCommentController');
    });


    Route::prefix('services')->as('service.')->group(function () {
        Route::resource('plans', 'PlanController');
        Route::resource('plan/items', 'PlanItemController');
        Route::resource('subscriptions', 'PlanSubscriptionController')->only('index');
    });



    Route::resource('orders', 'OrderController');
    Route::get('/orders/receipt/{id}/download', 'OrderController@download_receipt')->name('orders.receipts.download');
    Route::get('/orders/status/{id}', 'OrderController@status')->name('orders.status');

    Route::resource('bloggers', 'BloggersController');
    Route::resource('testimonials', 'TestimonialController');

    Route::resource('users', 'UsersController');
    Route::get('enrolled/users', 'UsersController@enrolled')->name('users.enrolled');
    Route::post('users/password/reset/{id}', 'UsersController@password_reset')->name('users.password_reset');



    Route::resource('logs', 'LogsController');

    Route::get('/referrals/index', 'HomeController@referrals')->name('referrals.index');
    Route::resource('newsletters', 'NewsletterSubscriberController');
    Route::post('newsletters/send', 'NewsletterSubscriberController@send')->name('newsletters.send');
});
