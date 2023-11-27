<?php

namespace App\Http\Controllers\teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentClassController extends Controller
{
    public function index()
    {
        return view('teacher/student-class');
    }
}
