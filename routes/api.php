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

Route::group(['namespace' => 'API\Front','middleware'=>['checkPassword']],function () {

    Route::post('/getCategory', 'CourseController@ShowCategories')->name('front.course.categories');
    Route::post('/category/{id}', 'CourseController@ShowCategory')->name('api.front.course.categories');
    Route::post('/category/{id}/course/{c_id}','CourseController@ShowCourse')->name('api.front.show.course');
});

Route::group(['namespace' => 'API\Admin' , 'prefix' => 'dashboard',
        'middleware'=>['checkPassword']],function () {
    Route::post('login', 'AuthController@Login')->middleware('auth.guard:admin_api');

});
