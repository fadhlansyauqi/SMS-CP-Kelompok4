<?php

namespace App\Http\Controllers\teacher;

use App\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentGradeController extends Controller
{
    public function index()
    {
        $tbl_grades = Grade::all();
        return view('teacher.student-grade', compact('tbl_grades'));
    }


    public function create()
    {
        return view('teacher.create-student-grade');
    }


    public function store(Request $request)
    {
        $validateData = validator($request->all(), [
            'id_mapel' => 'required|int',
            'id_siswa'  => 'required|int',
            'jenis_nilai' => 'required|string|max:255',
            'nilai' => 'required|int',
        ])->validate();

        $tbl_grades = new Grade($validateData);
        $tbl_grades->save();

        return redirect(route('teacher.student-grade'));
    }
}
