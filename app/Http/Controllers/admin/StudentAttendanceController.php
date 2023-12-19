<?php

namespace App\Http\Controllers\admin;

use App\Student;
use App\Attendance;
use App\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentAttendanceController extends Controller
{
    // public function index(Request $request)
    // {
    //     $search = $request->input('search');
    //     $perPage = $request->input('per_page', 5);
    //     $student_classes = StudentClass::where('nama_kelas', 'like', "%$search%")
    //                           ->orderBy('nama_kelas', 'ASC')
    //                           ->paginate($perPage);


    //     return view('admin/student-attendance', compact('student_classes'));
    // }
    public function index(Request $request)
    {
        $search   = $request->input('search');
        $perPage  = $request->input('per_page', 5);
        $attendances = Attendance::where(function ($query) use ($search) {
            $query
                ->where('date', 'like', "%$search%")
                ->orWhere('id_course', 'like', "%$search%");
        })  ->orderBy('date', 'ASC')
            ->paginate($perPage);

        return view('admin/student-attendance', compact('attendances'));
    }

    public function indexData(Request $request)
    {
        $search   = $request->input('search');
        $perPage  = $request->input('per_page', 5);
        $attendances = Attendance::where(function ($query) use ($search) {
            $query
                ->where('date', 'like', "%$search%")
                ->orWhere('id_course', 'like', "%$search%");
        })  ->orderBy('date', 'ASC')
            ->paginate($perPage);

        return view('admin/student-attendance-data', compact('attendances'));
    }
}
