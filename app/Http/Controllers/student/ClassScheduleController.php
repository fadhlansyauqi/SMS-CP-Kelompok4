<?php

namespace App\Http\Controllers\student;

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
        // $class_schedule= ClassSchedule::all(); 
        // return view('student/class-schedule', [ 
        //     'class_schedule' => $class_schedule
        // ]);
        $lessonHours = LessonHours::all();
        $courses = Course::all();
        $studentClasses = StudentClass::all();
        $classSchedules = ClassSchedule::all();
        $days = Days::all();
        
        return view('student.class-schedule', compact('lessonHours', 'courses', 'studentClasses', 'classSchedules', 'days'));
    }

    

    public function show()
    {
        
    }

    public function update(Request $request, ClassSchedule $class_schedule)
    {
        
    }
}
