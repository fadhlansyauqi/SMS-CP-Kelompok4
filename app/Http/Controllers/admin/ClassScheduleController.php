<?php

namespace App\Http\Controllers\admin;

use App\ClassSchedule;
use App\LessonHours;
use App\Course;
use App\StudentClass;
use App\Days;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClassScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessonHours = LessonHours::all();
        $courses = Course::all();
        $studentClasses = StudentClass::all();
        $classSchedules = ClassSchedule::all();
        $days = Days::all();
        
    
        return view('admin.class-schedule', compact('lessonHours', 'courses', 'studentClasses', 'classSchedules', 'days'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $id_class = (int)$id;

        $days = Days::all();
        $lessonHours = LessonHours::all();
        $courses = Course::all();
        $studentClasses = StudentClass::all();
        $classSchedules = ClassSchedule::all();

        return view('admin.edit-class-schedule', compact('id_class', 'classSchedules','lessonHours', 'courses', 'studentClasses', 'days'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id_class = (int)$id;

        // dd($id_class);

        $validateData = validator($request->all(), [
            'id_lesson_hours.*' => 'integer',
            'id_course.*' => 'integer',
            'id_class.*' => 'integer',
            'hari.*' => 'string',
        ])->validate();

        $count = count($validateData['id_lesson_hours']);
        
        if (
            count($validateData['id_course']) !== $count ||
            count($validateData['id_class']) !== $count ||
            count($validateData['hari']) !== $count
        ) {            
            return redirect()->back()->withErrors(['message' => 'Panjang array tidak sesuai, Mohon isi semua jadwal']);
        }

        for ($i = 0; $i < $count; $i++) {
            $criteria = [
                'id_lesson_hours' => $validateData['id_lesson_hours'][$i],
                'id_class' => $id_class,
                'hari' => $validateData['hari'][$i],
            ];
        
            $updateData = [
                'id_course' => $validateData['id_course'][$i],
            ];
        
            ClassSchedule::updateOrCreate($criteria, $updateData);
        }
        

        return redirect(route('admin.class-schedule'))->with('success', 'Data Berhasil Ditambahkan');
    }
    
}
