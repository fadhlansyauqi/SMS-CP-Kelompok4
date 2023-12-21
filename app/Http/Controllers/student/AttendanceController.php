<?php

namespace App\Http\Controllers\student;

use App\Attendance;
use App\Student;
use Carbon\Carbon;
use App\StudentClass;
use App\SubAttendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AttendanceController extends Controller
{
    public function index()
    {
        // return $user = User::with('student_class')->where('id', auth()->user()->id)->get();
    
        $attendance = Attendance::all(); 
        return view('student/attendance', [ 
            'attendances' => $attendance
        ]);
        
    }

    public function detailAttendance($idAttendance)
    {
        $detailAttendance = SubAttendance::where('id', $idAttendance)
            ->with("attendance", "student")->get();

        return view('student/create-attendance', compact('detailAttendance'));
    }

    public function store(request $request)
    {
        
    }

    public function edit(Attendance $attendance)
    {
       
    }

    public function update(Request $request, Attendance $attendance)
    {
        
    }

    public function destroy(Attendance $attendance)
    {
        
    }

}
