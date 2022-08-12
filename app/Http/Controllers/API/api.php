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

Route::group(['namespace' => 'APi\Front','middleware'=>['checkPassword']],function () {
    Route::get('/', 'HomepageController@index')->name('front.homepage');
    Route::post('/categories', 'CourseController@ShowCategories')->name('front.course.categories');
    Route::post('/category/{id}', 'CourseController@ShowCategory')->name('front.course.categories');
    Route::post('/category/{id}/course/{c_id}','CourseController@ShowCourse')->name('front.show.course');
//    Route::get('/contact','ContactController@index')->name('front.contact');
//    Route::post('/message/newsletter','MessageController@NewsLetter')->name('front.message.newsletter');
//    Route::post('/message/contact','MessageController@Contact')->name('front.message.contact');
//    Route::post('/message/enroll','MessageController@Enroll')->name('front.message.enroll');
});
