<?php

namespace App\Http\Controllers\student;

use App\ClassSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassScheduleController extends Controller
{
    public function index()
    {
        $class_schedule= ClassSchedule::all(); 
        return view('student/class-schedule', [ 
            'class_schedule' => $class_schedule
        ]);
    }

    public function show()
    {
        
    }

    public function update(Request $request, ClassSchedule $class_schedule)
    {
        // $validateData = validator($request->all(), [
        //     'kode_mapel' => 'required|string|max:10',
        //     'nama_mapel' => 'required|string|max:100',
        //     'id_teacher' => 'required|integer',
        // ])->validate();

        // $schedule->kode_mapel = $validateData['kode_mapel'];
        // $schedule->nama_mapel = $validateData['nama_mapel'];
        // $schedule->id_teacher = $validateData['id_teacher'];
        // $schedule->save();

        // return redirect(route('student.class-schedule'))->with('success', 'Data Berhasil Diupdate');
    }
}
