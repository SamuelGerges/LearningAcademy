<?php

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

Route::group(['namespace' => 'Front'],function (){
   Route::get('/','HomepageController@index')->name('front.homepage');
   Route::get('/category/{id}','CourseController@ShowCategory')->name('front.course.category');
   Route::get('/category/{id}/course/{c_id}','CourseController@ShowCourse')->name('front.show.course');
   Route::get('/contact','ContactController@index')->name('front.contact');
   Route::post('/message/newsletter','MessageController@NewsLetter')->name('front.message.newsletter');
   Route::post('/message/contact','MessageController@Contact')->name('front.message.contact');
   Route::post('/message/enroll','MessageController@Enroll')->name('front.message.enroll');

});


Route::group(['namespace' => 'Admin' , 'prefix' => 'dashboard'],function (){
    Route::get('/login','AuthController@ShowFormLogin')->name('admin.auth.login');
    Route::post('/do-login','AuthController@Login')->name('admin.auth.do.login');


    Route::group(['middleware' => 'adminAuth:admin'],function (){
        Route::get('/','HomeController@index')->name('admin.home');
        Route::get('/logout','AuthController@Logout')->name('admin.auth.logout');


        // TODO:: URL Category
        Route::get('/category','CategoryController@ShowCategory')->name('admin.ShowCategory');
        Route::get('/category/create','CategoryController@CreateCategory')->name('admin.createCategory');
        Route::post('/category/store','CategoryController@StoreCategory')->name('admin.storeCategory');
        Route::get('/category/edit/{id}','CategoryController@EditCategory')->name('admin.editCategory');
        Route::post('/category/update','CategoryController@UpdateCategory')->name('admin.updateCategory');
        Route::get('/category/delete/{id}','CategoryController@DeleteCategory')->name('admin.deleteCategory');

        // TODO:: URL Trainers
        Route::get('/trainers','TrainerController@ShowTrainer')->name('admin.ShowTrainer');
        Route::get('/trainers/create','TrainerController@CreateTrainer')->name('admin.createTrainer');
        Route::post('/trainers/store','TrainerController@StoreTrainer')->name('admin.storeTrainer');
        Route::get('/trainers/edit/{id}','TrainerController@EditTrainer')->name('admin.editTrainer');
        Route::post('/trainers/update','TrainerController@UpdateTrainer')->name('admin.updateTrainer');
        Route::get('/trainers/delete/{id}','TrainerController@DeleteTrainer')->name('admin.deleteTrainer');


        // TODO:: URL Courses
        Route::get('/courses','CourseController@ShowCourse')->name('admin.ShowCourses');
        Route::get('/courses/create','CourseController@CreateCourse')->name('admin.createCourses');
        Route::post('/courses/store','CourseController@StoreCourse')->name('admin.storeCourses');
        Route::get('/courses/edit/{id}','CourseController@EditCourse')->name('admin.editCourses');
        Route::post('/courses/update','CourseController@UpdateCourse')->name('admin.updateCourses');
        Route::get('/courses/delete/{id}','CourseController@DeleteCourse')->name('admin.deleteCourses');
        Route::get('/students/show-student/{id}','CourseController@ShowStudents')->name('admin.ShowStudentsOfCourses');

        // TODO:: URL Students
        Route::get('/students','StudentController@ShowStudent')->name('admin.ShowStudents');
        Route::get('/students/create','StudentController@CreateStudent')->name('admin.createStudents');
        Route::post('/students/store','StudentController@StoreStudent')->name('admin.storeStudents');
        Route::get('/students/edit/{id}','StudentController@EditStudent')->name('admin.editStudents');
        Route::post('/students/update','StudentController@UpdateStudent')->name('admin.updateStudents');
        Route::get('/students/delete/{id}','StudentController@DeleteStudent')->name('admin.deleteStudents');
        Route::get('/students/show-courses/{id}','StudentController@ShowCourses')->name('admin.ShowCoursesOFStudent');
        Route::get('/students/{s_id}/courses/{c_id}/approve','StudentController@ApproveCourse')->name('admin.approveCourse');
        Route::get('/students/{s_id}/courses/{c_id}/reject','StudentController@RejectCourse')->name('admin.rejectCourse');

        Route::get('/students/{id}/addToCourses','StudentController@AddCourses')->name('admin.AddNewCourseForStudent');
        Route::post('/students/{id}/storeCourses','StudentController@StoreCourses')->name('admin.StoreNewCourseForStudent');

    });




});
