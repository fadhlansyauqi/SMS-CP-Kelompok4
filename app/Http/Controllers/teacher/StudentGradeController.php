<?php

namespace App\Http\Controllers\teacher;

use App\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentGradeController extends Controller
{
    public function index(Request $request)
    {
        $search   = $request->input('search');
        $perPage  = $request->input('per_page', 5);
        $grades = Grade::where(function ($query) use ($search) {
            $query
                ->where('id_mapel', 'like', "%$search%")
                ->orWhere('jenis_nilai', 'like', "%$search%")
                ->orWhere('nilai', 'like', "%$search%");
        })->orderBy('id_nilai', 'ASC')
            ->paginate($perPage);
        return view('teacher/student-grade', compact('grades'));
    }


    public function create()
    {
        $courses = \App\Course::all();
        $students = \App\Student::all();

        return view('teacher/create-grade', [
            'courses' => $courses,
            'students' => $students
        ]);
    }
    public function store(Request $request)
    {
        $validateData = validator($request->all(), [
            'id_nilai' => 'required|int',
            'id_mapel' => 'required|int',
            'id_siswa'  => 'required|int',
            'jenis_nilai' => 'required|string|max:255',
            'nilai' => 'required|int',
        ])->validate();

        $grades = new Grade($validateData);
        $grades->save();

        return redirect(route('teacher.student-grade'));
    }

    public function edit(Grade $grade)
    {
        $courses = \App\Course::all();
        $students = \App\Student::all();

        return view('teacher/edit-grade', [
            'grade' => $grade,
            'courses' => $courses,
            'students' => $students
        ]);
    }


    public function update(Request $request, Grade $grade)
    {
        $validateData = validator($request->all(), [
            'id_nilai' => 'required|int',
            'id_mapel' => 'required|int',
            'id_siswa'  => 'required|int',
            'jenis_nilai' => 'required|string|max:255',
            'nilai' => 'required|int',
        ])->validate();

        $grade->id_nilai = $validateData['id_nilai'];
        $grade->id_mapel = $validateData['id_mapel'];
        $grade->id_siswa = $validateData['id_siswa'];
        $grade->jenis_nilai = $validateData['jenis_nilai'];
        $grade->nilai = $validateData['nilai'];
        $grade->save();

        return redirect(route('teacher.student-grade'));
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect(route('teacher.student-grade'))->with('success', 'Data Berhasil Dihapus');
    }
}
