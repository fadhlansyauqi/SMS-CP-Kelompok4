<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassScheduleController extends Controller
{
    public function index()
    {
        
        return view('student.class-schedule',);
    }

    public function show()
    {
        
    }
}
