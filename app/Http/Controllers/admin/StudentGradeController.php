<?php

namespace App\Http\Controllers\admin;

use App\Grade;
use App\Course;
use App\Student;
use App\SubGrade;
use Carbon\Carbon;
use App\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentGradeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5);
        $grades = Grade::where(function ($query) use ($search) {
            $query->where('date', 'like', "%$search%")->orWhere('id_course', 'like', "%$search%");
        })
            ->orderBy('date', 'ASC')
            ->paginate($perPage);

        return view('admin.student-grade', compact('grades'));
    }

    public function indexClass(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5);
        $student_classes = StudentClass::where('nama_kelas', 'like', "%$search%")
            ->orderBy('nama_kelas', 'ASC')
            ->paginate($perPage);

        return view('admin/student-grade-class', compact('student_classes'));
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

        return view('admin.student-grade-class-data', compact('students', 'idKelas', 'search', 'perPage', 'courses'));
    }

    public function store(Request $request, $idKelas)
    {
        $id_grade = 0;

        $grade = Grade::where('id_kelas', $idKelas)
            ->where('id_course', $request->input('id_course'))
            ->whereDate('date', Carbon::now())
            ->first();
        if (is_null($grade)) {
            $grade = new Grade();
            $grade->date = date('Y-m-d');
            $grade->id_kelas = $idKelas;
            $grade->id_course = $request->input('id_course');
            $grade->save();
        }

        $id_grade = $grade->id;

        foreach ($request->jenis_nilai as $key => $jenis_nilai) {
            // Assuming $request->nilai is an array corresponding to each student's grade
            $nilai = $request->nilai[$key];

            $subGrade = new SubGrade();
            $subGrade->id_grade = $id_grade;
            $subGrade->id_student = $key;
            $subGrade->jenis_nilai = $jenis_nilai;
            $subGrade->nilai = $nilai;
            $subGrade->desc = '';
            $subGrade->save();
        }

        return redirect(route('admin.student-grade'))->with('success', 'Data Berhasil Ditambah');
    }

    public function detailGrade($idGrade)
    {
        $detailGrades = SubGrade::where('id_grade', $idGrade)
            ->with('grade', 'student')
            ->get();

        return view('teacher.student-grade-detail', compact('detailGrades'));
    }
}
