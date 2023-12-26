<?php

namespace App\Http\Controllers\teacher;

use App\ClassSchedule;
use App\LessonHours;
use App\Course;
use App\StudentClass;
use App\Days;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $lessonHours = LessonHours::all();
        $courses = Course::all();
        $studentClasses = StudentClass::all();
        $classSchedules = ClassSchedule::all();
        $days = Days::all();

        return view('teacher/class-schedule', compact('lessonHours', 'courses', 'studentClasses', 'classSchedules', 'days'));
    }
}
