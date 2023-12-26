<?php

namespace App\Http\Controllers\student;
use Illuminate\Support\Facades\Auth;
use App\Attendance;
use App\Student;
use App\Course;
use Carbon\Carbon;
use App\StudentClass;
use App\SubAttendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        // return $user = User::with('student_class')->where('id', auth()->user()->id)->get();
        // $search   = $request->input('search');
        // $perPage  = $request->input('per_page', 5);
        // $students = Attendance::where(function ($query) use ($search) {
        //     $query
                
        //         ->where('nis', 'like', "%$search%")
        //         ->orWhere('name', 'like', "%$search%")
        //         ->orWhere('jk', 'like', "%$search%");
        // })
        //         ->orderBy('id_kelas', 'ASC')
        //         ->paginate($perPage);
        $student = Student::where('user_id', Auth::user()->id)->first('id_kelas');
        $attendance = Attendance::with('student_class')->where('id_kelas', $student->id_kelas)->get();
        
        // $attendance = Attendance::where('id_kelas','1')->get();
        // $attendance = Attendance::all(); 
        return view('student.attendance', [ 
            'attendances' => $attendance
        ]);
        
    }

    public function detailAttendance($idAttendance)
    {
        
        $detailAttendance = SubAttendance::where('id_attendance', $idAttendance)
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
