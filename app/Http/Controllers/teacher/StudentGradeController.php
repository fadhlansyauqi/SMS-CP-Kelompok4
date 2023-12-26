<?php

namespace App\Http\Controllers\teacher;

use App\Student;
use App\Course;
use Carbon\Carbon;
use App\StudentClass;
use App\Grade;
use App\SubGrade;
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

        return view('teacher.student-grade', compact('grades'));
    }

    public function indexClass(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5);
        $student_classes = StudentClass::where('nama_kelas', 'like', "%$search%")
            ->orderBy('nama_kelas', 'ASC')
            ->paginate($perPage);

        return view('teacher/student-grade-class', compact('student_classes'));
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

        return view('teacher.student-grade-class-data', compact('students', 'idKelas', 'search', 'perPage', 'courses'));
    }
    public function store(Request $request, $idKelas)
    {
        $id_grade = 0;

        // dd($request->all());
        $grade = Grade::where('id_kelas', $idKelas)
            ->where('id_course', $request->input('id_course'))
            ->whereDate('date', Carbon::now())
            ->first();
        if (is_null($grade)) {
            $grade            = new Grade;
            $grade->date      = date('Y-m-d');
            $grade->id_kelas  = $idKelas;
            $grade->id_course = $request->input('id_course');
            $grade->save();
        }

        $id_grade = $grade->id;

        foreach ($request->jenis_nilai as $key => $jenis_nilai) {
            $nilai = $request->nilai[$key];

            $subGrade                = new SubGrade;
            $subGrade->id_grade      = $id_grade;
            $subGrade->id_student    = $key;
            $subGrade->jenis_nilai   = $jenis_nilai;
            $subGrade->nilai         = $nilai;
            $subGrade->desc          = '';
            $subGrade->save();
        }


        return redirect(route('teacher.student-grade'))->with('success', 'Data Berhasil Ditambahkan');
    }

    public function detailGrade($idGrade)
    {
        $detailGrades = SubGrade::where('id_grade', $idGrade)
            ->with("grade", "student.user")->get();

        return view('teacher.student-grade-detail', compact('detailGrades'));
    }



    public function edit($idGrade, Request $request)
    {
        $search = $request->get('search');
        $perPage = $request->get('per_page', 5);
        $grade = Grade::find($idGrade)->load('course');
        $courses = Course::all();
        $detailGrades = SubGrade::where('id_grade', $idGrade)
            ->with('grade', 'student')
            ->get();

        return view('teacher/student-grade-edit', compact('detailGrades', 'grade', 'courses'));
    }
    public function update(Request $request, $idGrade)
    {
        $grade = Grade::find($idGrade);

        $grade->date = $request->date ?? $grade->date;
        $grade->id_course = $request->id_course ?? $grade->id_course;
        $grade->save();

        $id_grade = $grade->id;
        foreach ($request->jenis_nilai as $key => $jenis_nilai) {
            $nilai = $request->nilai[$key];
            $subGrade = SubGrade::where('id_grade', $idGrade)
                ->where('id_student', $key)
                ->first();

            if ($subGrade) {
                // Update the existing record
                $subGrade->jenis_nilai   = $jenis_nilai;
                $subGrade->nilai         = $nilai;
                $subGrade->save();
            } else {
                // Create a new record
                $subGrade = new SubGrade;
                $subGrade->id_grade      = $id_grade;
                $subGrade->id_student    = $key;
                $subGrade->jenis_nilai   = $jenis_nilai;
                $subGrade->nilai         = $nilai;
                $subGrade->desc          = '';
                $subGrade->save();
            }
        }
        return redirect(route('teacher.student-grade'))->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($grade)
    {
        $grade = Grade::find($grade);

        if ($grade) {
            $grade->sub_grade()->delete();
            $grade->delete();
            return redirect(route('teacher.student-grade'))->with('success', 'Data Berhasil Dihapus');
        }
    }
    // public function create()
    // {
    //     $courses = \App\Course::all();
    //     $students = \App\Student::all();

    //     return view('teacher/create-grade', [
    //         'courses' => $courses,
    //         'students' => $students
    //     ]);
    // }
    // public function store(Request $request)
    // {
    //     $validateData = validator($request->all(), [
    //         'id_mapel' => 'required|int',
    //         'id_siswa'  => 'required|int',
    //         'jenis_nilai' => 'required|string|max:255',
    //         'nilai' => 'required|int',
    //     ])->validate();

    //     $grades = new Grade($validateData);
    //     $grades->save();

    //     return redirect(route('teacher.student-grade'));
    // }

    // public function edit(Grade $grade)
    // {
    //     $courses = \App\Course::all();
    //     $students = \App\Student::all();

    //     return view('teacher/edit-grade', [
    //         'grade' => $grade,
    //         'courses' => $courses,
    //         'students' => $students
    //     ]);
    // }


    // public function update(Request $request, Grade $grade)
    // {
    //     $validateData = validator($request->all(), [
    //         'id_mapel' => 'required|int',
    //         'id_siswa'  => 'required|int',
    //         'jenis_nilai' => 'required|string|max:255',
    //         'nilai' => 'required|int',
    //     ])->validate();

    //     $grade->id_mapel = $validateData['id_mapel'];
    //     $grade->id_siswa = $validateData['id_siswa'];
    //     $grade->jenis_nilai = $validateData['jenis_nilai'];
    //     $grade->nilai = $validateData['nilai'];
    //     $grade->save();

    //     return redirect(route('teacher.student-grade'));
    // }

    // public function destroy(Grade $grade)
    // {
    //     $grade->delete();
    //     return redirect(route('teacher.student-grade'))->with('success', 'Data Berhasil Dihapus');
    // }
}
