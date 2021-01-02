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

Route::get('/logout','Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:admin']], function () {

//admin dashboard
    Route::get('/admin','DashboardController@index')->name('admin.index');

//admin manege student
    Route::get('/admin/course/{course}/students','DashboardController@view_student')->name('course.manege');
    Route::post('/admin/course/{course}/student/{student}','DashboardController@put_mark')->name('admin.put_mark');


//department
    Route::get('/admin/departments', 'DepartmentController@index')->name('department.index');
    Route::get('/admin/department/create', 'DepartmentController@create')->name('department.create');
    Route::post('/admin/department/store', 'DepartmentController@store')->name('department.store');
    Route::get('/admin/department/{department}/destroy', 'DepartmentController@destroy')->name('department.destroy');

//course
    Route::get('/admin/courses', 'CourseController@index')->name('course.index');
    Route::get('/admin/course/create', 'CourseController@create')->name('course.create');
    Route::post('/admin/course/store', 'CourseController@store')->name('course.store');
    Route::get('/admin/course/{course}/destroy', 'CourseController@destroy')->name('course.destroy');

//student
    Route::get('/admin/students','StudentController@index')->name('student.index');
    Route::get('/admin/student/{student}/destroy','StudentController@destroy')->name('student.destroy');
    Route::get('/admin/student/{student}/approve','StudentController@approve')->name('student.approve');

});
//Student create
    Route::get('/student/create','StudentController@create')->name('student.create');
    Route::post('/student/store','StudentController@store')->name('student.store');

Route::group(['middleware' => ['role:student']], function () {

//registration
    Route::get('/student/{user}/available-courses','HomeController@view_course_available')->name('view_course_available');
    Route::get('student/add-course/{course}','HomeController@register_course')->name('register_course');
    Route::get('student/view-my-courses/{user}','HomeController@view_my_course')->name('view_my_course');
    Route::get('student/course/{id}/delete','HomeController@delete_course')->name('delete_course');

//payments
    Route::get('/student/payments/{student}','PayController@my_payment')->name('student.payment');
    Route::get('/student/pay/{student}','PayController@pay')->name('student.pay');
//    Route::post('/student/payment/{student}','PayController@payment')->name('student.payment');
});


//Route::get('/courses', 'CourseController@index')->name('course.index');
//Route::get('/course/create', 'CourseController@create')->name('course.create');
//Route::post('/course/store', 'CourseController@store')->name('course.store');
//Route::get('/course/{course}/destroy', 'CourseController@destroy')->name('course.destroy');

