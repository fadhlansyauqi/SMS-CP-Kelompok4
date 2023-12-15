<?php

namespace App\Http\Controllers\teacher;

use App\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentClassController extends Controller
{
    public function index()
    {
        $student_classes = StudentClass::all();
        return view('teacher/student-class', compact('student_classes'));
    }
}
