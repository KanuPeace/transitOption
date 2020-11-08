<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Chefs
Route::prefix("v1")->as("api.")->group(function(){


    Route::namespace('App\Http\Controllers\Api')->as('general.')->group(function(){
        Route::get('/get-country-states/{id?}', 'GeneralController@getCountryStates')->name('country.states');
        Route::get('/get-state-cities/{id?}', 'GeneralController@getStateCities')->name('state.cities');
    });


    Route::namespace('Chef\Api')->as('chef.')->group(function(){
        Route::get('/filter-images', 'ChefFoodImageController@filter')->name('filterImages');
    });

    Route::namespace('User\Api')->as('user.')->group(function(){
        Route::as('dish.')->group(function(){
            Route::resource('comment', 'DishController');
        });
    });
});
