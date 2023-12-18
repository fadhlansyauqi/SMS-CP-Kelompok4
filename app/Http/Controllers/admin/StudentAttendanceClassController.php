<?php

namespace App\Http\Controllers\admin;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentAttendanceClassController extends Controller
{
    public function index($idKelas)
    {
        $students = Student::where('id_kelas', $idKelas)->get();
        return view('admin/student-attendance-class', compact('students', 'idKelas'));
    }
}
