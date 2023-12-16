<?php

namespace App\Http\Controllers\teacher;

use App\ClassSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $class_schedules = ClassSchedule::all();
        return view('teacher/class-schedule', compact('class_schedules'));
    }
}
