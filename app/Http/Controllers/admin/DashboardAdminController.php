<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalStudents  = DB::table('tbl_students')->count();
        $maleStudents   = Student::where('jk', 'laki-laki')->count();
        $femaleStudents = Student::where('jk', 'perempuan')->count();
        $totalClasses   = DB::table('tbl_classes')->count();
        $totalTeachers  = DB::table('tbl_teachers')->count();
        $totalCourses   = DB::table('tbl_courses')->count();
        $totalUsers     = DB::table('tbl_users')->count();
        $adminUsers     = User::where('role', 'ADMIN')->count();
        $teacherUsers   = User::where('role', 'TEACHER')->count();
        $studentUsers   = User::where('role', 'STUDENT')->count();
        return view('admin/dashboard-admin', compact('totalStudents', 'maleStudents', 'femaleStudents', 'totalClasses', 'totalTeachers', 'totalCourses', 'totalUsers', 'adminUsers', 'teacherUsers', 'studentUsers'));
    }
}
