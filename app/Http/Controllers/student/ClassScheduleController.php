<?php

namespace App\Http\Controllers\student;

use Illuminate\Support\Facades\Auth;
use App\ClassSchedule;
use App\Student;    
use App\LessonHours;
use App\Course;
use App\StudentClass;
use App\Days;
use App\Attendance;
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
        
        // $student = Student::where('user_id', Auth::user()->id)->first();
        // $schedule = ClassSchedule::with(['class','course', 'lessonHour'])
        // ->get(); 

        // $jam = array();
        // foreach($lessonHours as $lessonHour){
        //     foreach($schedule as $jadwal){
        //         if($lessonHour->id === $jadwal->lessonHour->id){
        //             $jam[] = $jadwal;
        //         }
        //     }
        // }
        // // return $jam;

        // return view('student.class-schedule', compact('jam'));
    }

    public function show()
    {
        
    }

    public function update(Request $request, ClassSchedule $class_schedule)
    {
        
    }
}
