<?php

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

Route::get('/', function() {
    return redirect(route('login'));
});

Route::get('/register', function() {
    return view('login');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Auth::routes(['verify' => false, 'reset' => false]);

// // auth general
// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// });

// auth admin
Route::group(['middleware' => 'ADMIN'], function () {
    Route::get('/admin/dashboard-admin', 'admin\DashboardAdminController@index')->name('admin.dashboard');
});

// auth teacher
Route::group(['middleware' => 'TEACHER'], function () {
    Route::get('/teacher/dashboard-teacher', 'teacher\DashboardTeacherController@index')->name('teacher.dashboard');
});

// auth student`
Route::group(['middleware' => 'STUDENT'], function () {
    Route::get('/student/dashboard-teacher', 'student\DashboardStudentController@index')->name('student.dashboard');
});

