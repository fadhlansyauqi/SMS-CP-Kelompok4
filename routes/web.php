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

Route::get('/dashboard', function() {
    return redirect(route('login'));
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Auth::routes(['verify' => false, 'reset' => false]);


// auth admin
Route::group(['middleware' => 'ADMIN'], function () {
    Route::get('/admin/dashboard-admin', 'admin\DashboardAdminController@index')->name('admin.dashboard');
    Route::get('/admin/student', 'admin\StudentController@index')->name('admin.student');
    Route::get('/admin/student-class', 'admin\StudentClassController@index')->name('admin.student-class');
    Route::get('/admin/student-attendance', 'admin\StudentAttendanceController@index')->name('admin.student-attendance');
    Route::get('/admin/student-grade', 'admin\StudentGradeController@index')->name('admin.student-grade');
    Route::get('/admin/student-tuition-payment', 'admin\StudentTuitionPaymentController@index')->name('admin.student-tuition-payment');
    Route::get('/admin/teacher', 'admin\TeacherController@index')->name('admin.teacher');
    Route::get('/admin/class-schedule', 'admin\ClassScheduleController@index')->name('admin.class-schedule');
    Route::get('/admin/account', 'admin\AccountController@index')->name('admin.account');
});

// auth teacher
Route::group(['middleware' => 'TEACHER'], function () {
    Route::get('/teacher/dashboard-teacher', 'teacher\DashboardTeacherController@index')->name('teacher.dashboard');
    Route::get('/teacher/student-grade', 'teacher\StudentGradeController@index')->name('teacher.student-grade');
    Route::get('/teacher/student-attendance', 'teacher\StudentAttendanceController@index')->name('teacher.student-attendance');
    Route::get('/teacher/class-schedule', 'teacher\ClassScheduleController@index')->name('teacher.class-schedule');
    Route::get('/teacher/student-class', 'teacher\StudentClassController@index')->name('teacher.student-class');
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

