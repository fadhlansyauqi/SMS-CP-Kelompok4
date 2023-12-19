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
    Route::get('/admin/student-class-create', 'admin\StudentClassController@create')->name('admin.student-class.create');
    Route::post('/admin/student-class-create', 'admin\StudentClassController@store')->name('admin.student-class.store');
    Route::get('/admin/{student_class}/student-class-edit', 'admin\StudentClassController@edit')->name('admin.student-class.edit');
    Route::post('/admin/{student_class}/student-class-edit', 'admin\StudentClassController@update')->name('admin.student-class.update');
    Route::get('/admin/{student_class}/student-class-delete', 'admin\StudentClassController@destroy')->name('admin.student-class.delete');

    Route::get('/admin/student-attendance', 'admin\StudentAttendanceController@index')->name('admin.student-attendance');
    Route::get('admin/student-attendance-class/{idKelas}', 'admin\StudentAttendanceClassController@index')->name('admin.student-attendance-class');
    Route::get('admin/student-attendance-data', 'admin\StudentAttendanceController@indexData')->name('admin.student-attendance-data');

    Route::get('/admin/student-grade', 'admin\StudentGradeController@index')->name('admin.student-grade');
    Route::get('/admin/student-tuition-payment', 'admin\StudentTuitionPaymentController@index')->name('admin.student-tuition-payment');

    Route::get('/admin/teacher', 'admin\TeacherController@index')->name('admin.teacher');
    Route::get('/admin/create-teacher', 'admin\TeacherController@create')->name('create.teacher');
    Route::post('/admin/create-teacher', 'admin\TeacherController@store')->name('store.teacher');
    Route::get('/admin/{teacher}/edit-teacher', 'admin\TeacherController@edit')->name('edit.teacher');
    Route::post('/admin/{teacher}/edit-teacher', 'admin\TeacherController@update')->name('update.teacher');
    Route::get('/admin/{teacher}/delete-teacher', 'admin\TeacherController@destroy')->name('delete.teacher');

    Route::get('/admin/course', 'admin\CourseController@index')->name('admin.course');
    Route::get('/admin/create-course', 'admin\CourseController@create')->name('create.course');
    Route::post('/admin/create-course', 'admin\CourseController@store')->name('store.course');
    Route::get('/admin/{course}/edit-course', 'admin\CourseController@edit')->name('edit.course');
    Route::post('/admin/{course}/edit-course', 'admin\CourseController@update')->name('update.course');
    Route::get('/admin/{course}/delete-course', 'admin\CourseController@destroy')->name('delete.course');

    Route::get('/admin/class-schedule', 'admin\ClassScheduleController@index')->name('admin.class-schedule');
    Route::get('/admin/create-class-schedule', 'admin\ClassScheduleController@create')->name('create.class-schedule');
    Route::post('/admin/create-class-schedule', 'admin\ClassScheduleController@store')->name('store.class-schedule');
    Route::get('/admin/{id}/edit-class-schedule', 'admin\ClassScheduleController@edit')->name('edit.class-schedule');
    Route::post('/admin/{id}/edit-class-schedule', 'admin\ClassScheduleController@update')->name('update.class-schedule');

    Route::get('/admin/account', 'admin\AccountController@index')->name('admin.account');
    Route::get('/admin/account-create', 'admin\AccountController@create')->name('admin.account.create');
    Route::post('/admin/account-create', 'admin\AccountController@store')->name('admin.account.store');
    Route::get('/admin/{user}/account-edit', 'admin\AccountController@edit')->name('admin.account.edit');
    Route::post('/admin/{user}/account-edit', 'admin\AccountController@update')->name('admin.account.update');
    Route::get('/admin/{user}/account-delete', 'admin\AccountController@destroy')->name('admin.account.delete');
});

// auth teacher
Route::group(['middleware' => 'TEACHER'], function () {
    Route::get('/teacher/dashboard-teacher', 'teacher\DashboardTeacherController@index')->name('teacher.dashboard');

    Route::get('/teacher/student-grade', 'teacher\StudentGradeController@index')->name('teacher.student-grade');
    Route::get('/teacher/create-grade', 'teacher\StudentGradeController@create')->name('create.grade');
    Route::post('/teacher/create-grade', 'teacher\StudentGradeController@store')->name('store.grade');
    Route::get('/teacher/{grade}/edit-grade', 'teacher\StudentGradeController@edit')->name('edit.grade');
    Route::post('/teacher/{grade}/edit-grade', 'teacher\StudentGradeController@update')->name('update.grade');
    Route::get('/teacher/{grade}/delete-grade', 'teacher\StudentGradeController@destroy')->name('delete.grade');

    Route::get('/teacher/student-attendance', 'teacher\StudentAttendanceController@index')->name('teacher.student-attendance');
    Route::get('/teacher/create-attendance', 'teacher\StudentAttendanceController@create')->name('create.attendance');
    Route::post('/teacher/create-attendance', 'teacher\StudentAttendanceController@store')->name('store.attendance');
    Route::get('/teacher/{attendance}/edit-attendance', 'teacher\StudentAttendanceController@edit')->name('edit.attendance');
    Route::post('/teacher/{attendance}/edit-attendance', 'teacher\StudentAttendanceController@update')->name('update.attendance');
    Route::get('/teacher/{attendance}/delete-attendance', 'teacher\StudentAttendanceController@destroy')->name('delete.attendance');

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
    Route::get('/student/create-attendace', 'student\AttendanceController@create')->name('student.create-attendance.create');
    Route::post('/student/create-attendace', 'student\AttendanceController@store')->name('student.create-attendance.store');
    Route::get('/student/{attendance}/edit-attendance', 'student\AttendanceController@edit')->name('student.edit-attendance.edit');
    Route::get('/student/{attendance}/attendance', 'student\AttendanceController@destroy')->name('student.edit-attendance.delete');

    Route::get('/student/class', 'student\ClassController@index')->name('student.class');
    Route::get('/student/tuition-payment', 'student\TuitionPaymentController@index')->name('student.tuition-payment');
    
});
