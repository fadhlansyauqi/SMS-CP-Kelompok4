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

Auth::routes(['verify' => false, 'reset' => false]);

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/register', function () {
    return redirect(route('login'));
});

Route::get('/home', function () {
    return redirect(route('login'));
});


// auth admin
Route::group(['middleware' => 'ADMIN'], function () {
    Route::get('/admin/dashboard-admin', 'admin\DashboardAdminController@index')->name('admin.dashboard');

    Route::get('/admin/student', 'admin\StudentController@index')->name('admin.student');
    Route::get('/admin/create-student', 'admin\StudentController@create')->name('create.student');
    Route::post('/admin/create-student', 'admin\StudentController@store')->name('store.student');
    Route::get('/admin/{student}/edit-student', 'admin\StudentController@edit')->name('edit.student');
    Route::post('/admin/{student}/edit-student', 'admin\StudentController@update')->name('update.student');
    Route::get('/admin/{student}/delete-student', 'admin\StudentController@destroy')->name('delete.student');

    Route::get('/admin/student-class', 'admin\StudentClassController@index')->name('admin.student-class');
    Route::get('/admin/student-attendance', 'admin\StudentAttendanceController@index')->name('admin.student-attendance');
    Route::get('/admin/student-grade', 'admin\StudentGradeController@index')->name('admin.student-grade');
    Route::get('/admin/student-tuition-payment', 'admin\StudentTuitionPaymentController@index')->name('admin.student-tuition-payment');

    Route::get('/admin/teacher', 'admin\TeacherController@index')->name('admin.teacher');
    Route::get('/admin/create-teacher', 'admin\TeacherController@create')->name('create.teacher');
    Route::get('/admin/{teacher}/edit-teacher', 'admin\teacherController@edit')->name('edit.teacher');
    Route::post('/admin/{teacher}/edit-teacher', 'admin\teacherController@update')->name('update.teacher');
    Route::get('/admin/{teacher}/delete-teacher', 'admin\teacherController@destroy')->name('delete.teacher');
    Route::post('/admin/create-teacher', 'admin\TeacherController@store')->name('store.teacher');

    Route::get('/admin/class-schedule', 'admin\ClassScheduleController@index')->name('admin.class-schedule');

    Route::get('/admin/account', 'admin\AccountController@index')->name('admin.account');
    Route::get('/admin/account-create', 'admin\AccountController@create')->name('admin.account.create');
});

// auth teacher
Route::group(['middleware' => 'TEACHER'], function () {
    Route::get('/teacher/dashboard-teacher', 'teacher\DashboardTeacherController@index')->name('teacher.dashboard');
    Route::get('/teacher/student-grade', 'teacher\StudentGradeController@index')->name('teacher.student-grade');
    Route::get('/teacher/student-attendance', 'teacher\StudentAttendanceController@index')->name('teacher.student-attendance');
    Route::get('/teacher/class-schedule', 'teacher\ClassScheduleController@index')->name('teacher.class-schedule');
    Route::get('/teacher/student-class', 'teacher\StudentClassController@index')->name('teacher.student-class');
    Route::get('/teacher/student-grade-create', 'teacher\StudentGradeController@create')->name('teacher.student-grade-create');
    Route::post('/teacher/student-grade-create', 'teacher\StudentGradeController@store')->name('teacher.store-student-grade');
});

// auth student`
Route::group(['middleware' => 'STUDENT'], function () {
    Route::get('/student/dashboard-student', 'student\DashboardStudentController@index')->name('student.dashboard');
    Route::get('/student/class-schedule', 'student\ClassScheduleController@index')->name('student.class-schedule');
    Route::get('/student/grade', 'student\GradeController@index')->name('student.grade');
    Route::get('/student/attendance', 'student\AttendanceController@index')->name('student.attendance');
    Route::get('/student/class', 'student\ClassController@index')->name('student.class');
    Route::get('/student/tuition-payment', 'student\TuitionPaymentController@index')->name('student.tuition-payment');
});
