<?php

namespace App\Http\Controllers\admin;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentAttendanceClassController extends Controller
{
    public function index($idKelas, Request $request)
{
   $search = $request->get('search');
   $perPage = $request->get('per_page', 10);

   $students = Student::where('id_kelas', $idKelas);

   if ($search) {
       $students = $students->where('nama', 'like', '%' . $search . '%');
   }

   $students = $students->paginate($perPage);

   return view('admin/student-attendance-class', compact('students', 'idKelas', 'search', 'perPage'));
}

// public function indexData(Request $request)
    // {
    //     $search = $request->input('search');
    //     $perPage = $request->input('per_page', 5);
    //     $attendances = Attendance::where(function ($query) use ($search) {
    //         $query->where('date', 'like', "%$search%")->orWhere('id_course', 'like', "%$search%");
    //     })
    //         ->orderBy('date', 'ASC')
    //         ->paginate($perPage);

    //     return view('admin/student-attendance-data', compact('attendances'));
    // }

    // public function index(Request $request)
    // {
    //     $search = $request->input('search');
    //     $perPage = $request->input('per_page', 5);
    //     $student_classes = StudentClass::where('nama_kelas', 'like', "%$search%")
    //                           ->orderBy('nama_kelas', 'ASC')
    //                           ->paginate($perPage);

    //     return view('admin/student-attendance', compact('student_classes'));
    // }

}
