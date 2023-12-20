<?php

namespace App\Http\Controllers\admin;

use App\Course;
use App\Student;
use Carbon\Carbon;
use App\Attendance;
use App\StudentClass;
use App\SubAttendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentAttendanceController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5);
        $attendances = Attendance::where(function ($query) use ($search) {
            $query->where('date', 'like', "%$search%")->orWhere('id_course', 'like', "%$search%");
        })
            ->orderBy('date', 'ASC')
            ->paginate($perPage);

        return view('admin/student-attendance', compact('attendances'));
    }

    public function indexClass(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5);
        $student_classes = StudentClass::where('nama_kelas', 'like', "%$search%")
            ->orderBy('nama_kelas', 'ASC')
            ->paginate($perPage);

        return view('admin/student-attendance-class', compact('student_classes'));
    }

    public function indexClassData($idKelas, Request $request)
    {
        $search = $request->get('search');
        $perPage = $request->get('per_page', 10);

        $students = Student::where('id_kelas', $idKelas);
        $courses = Course::all();

        if ($search) {
            $students = $students->where('nama', 'like', '%' . $search . '%');
        }

        $students = $students->paginate($perPage);

        return view('admin/student-attendance-class-data', compact('students', 'idKelas', 'search', 'perPage', 'courses'));
    }

    // public function store(Request $request, $idKelas, $idStudent)
    // {

    //     dd($request->all());
    //     $attendance            = new Attendance;
    //     $attendance->date      = date('Y-m-d');
    //     $attendance->id_kelas  = $idKelas;
    //     $attendance->id_course = $request->input('id_course');
    //     $attendance->save();

    //     $subAttendance                = new subAttendance;
    //     $subAttendance->id_attendance = $attendance->id;
    //     $subAttendance->id_student    = $request->input('id_student');
    //     $subAttendance->status        = $request->input('status');
    //     $subAttendance->desc          = $request->input('desc');
    //     $subAttendance->save();
  
    //     return redirect()->back();
    // }

    public function store(Request $request, $idKelas)
    {
        $id_attendance = 0;

        // dd($request->all());
        $attendance = Attendance::where('id_kelas', $idKelas)
            ->where('id_course', $request->input('id_course'))
            ->whereDate('date', Carbon::now())
            ->first();
        if(is_null($attendance)){
            $attendance            = new Attendance;
            $attendance->date      = date('Y-m-d');
            $attendance->id_kelas  = $idKelas;
            $attendance->id_course = $request->input('id_course');
            $attendance->save();
        }

        $id_attendance = $attendance->id;

        foreach($request->status as $key=>$value){
            $subAttendance                = new subAttendance;
            $subAttendance->id_attendance = $id_attendance;
            $subAttendance->id_student    = $key;
            $subAttendance->status        = $value;
            $subAttendance->desc          = '';
            $subAttendance->save();
        }
  
        return redirect()->back();
    }

    // public function show($idKelas)
    // {
    //     $attendances = Attendance::where('id_kelas', $idKelas)->get();
  
    //     return view('admin/student-attendance-class-data', compact('attendances'));
    // }

    public function detailAttendance($idAttendance){
        $detailAttendances = SubAttendance::where('id_attendance', $idAttendance)
            ->with("attendance", "student")->get();

        return view('admin/student-attendance-detail', compact('detailAttendances'));
    }
  
      

}
