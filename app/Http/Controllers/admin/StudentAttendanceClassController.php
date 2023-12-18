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

}
