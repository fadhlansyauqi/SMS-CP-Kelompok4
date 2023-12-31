<?php

namespace App\Http\Controllers\teacher;

use App\Course;
use App\Student;
use Carbon\Carbon;
use App\StudentClass;
use App\Attendance;
use App\SubAttendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentAttendanceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5);
        $attendances = Attendance::whereHas('course', function ($query) use ($search) {
            $query->where('date', 'like', "%$search%")->orWhere('nama_mapel', 'like', "%$search%");
        })
            ->orderBy('date', 'ASC')
            ->paginate($perPage);

        return view('teacher/student-attendance', compact('attendances'));
    }

    public function indexClass(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5);
        $student_classes = StudentClass::where('nama_kelas', 'like', "%$search%")
            ->orderBy('nama_kelas', 'ASC')
            ->paginate($perPage);

        return view('teacher/student-attendance-class', compact('student_classes'));
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

        return view('teacher/student-attendance-class-data', compact('students', 'idKelas', 'search', 'perPage', 'courses'));
    }

    public function create()
    {
        $students = \App\Student::all();
        return view('teacher/create-attendance', [
            'students' => $students
        ]);
    }

    // public function store(Request $request)
    // {
    //     $validateData = validator($request->all(), [
    //         'id_absen' => 'required|integer',
    //         'id_student' => 'required|integer',
    //         // 'id_jadwal' => 'required|integer',
    //         'materi' => 'required|string|max:255',
    //         'pertemuan' => 'required|string|max:20',
    //         'tgl' => 'required|date',
    //         'ket' => 'required|string|max:255',
    //     ])->validate();

    //     $attendances = new Attendance($validateData);
    //     $attendances->save();

    //     return redirect(route('teacher.student-attendance'));
    // }

    public function store(Request $request, $idKelas)
    {
        $id_attendance = 0;

        // dd($request->all());
        $attendance = Attendance::where('id_kelas', $idKelas)
            ->where('id_course', $request->input('id_course'))
            ->whereDate('date', Carbon::now())
            ->first();
        if (is_null($attendance)) {
            $attendance            = new Attendance;
            $attendance->date      = date('Y-m-d');
            $attendance->id_kelas  = $idKelas;
            $attendance->id_course = $request->input('id_course');
            $attendance->save();
        }

        $id_attendance = $attendance->id;

        foreach ($request->status as $key => $value) {
            $subAttendance                = new subAttendance;
            $subAttendance->id_attendance = $id_attendance;
            $subAttendance->id_student    = $key;
            $subAttendance->status        = $value;
            $subAttendance->desc          = '';
            $subAttendance->save();
        }

        return redirect(route('teacher.student-attendance'))->with('success', 'Data Absen Berhasil Ditambahkan');
    }

    public function detailAttendance($idAttendance)
    {
        $detailAttendances = SubAttendance::where('id_attendance', $idAttendance)
            ->with("attendance", "student.user")->get();

        return view('teacher/student-attendance-detail', compact('detailAttendances'));
    }

    public function edit($idAttendance, Request $request)
    {
        $search = $request->get('search');
        $perPage = $request->get('per_page', 5);
        $attendance = Attendance::find($idAttendance)->load('course');
        $courses = Course::all();
        $detailAttendances = SubAttendance::where('id_attendance', $idAttendance)
            ->with('attendance', 'student')
            ->get();

        return view('teacher/student-attendance-edit', compact('detailAttendances', 'attendance', 'courses'));
    }
    public function update(Request $request, $idAttendance)
    {
        $attendance = Attendance::find($idAttendance);

        $attendance->date = $request->date ?? $attendance->date; // Use existing date if none is provided
        $attendance->id_course = $request->id_course ?? $attendance->id_course;
        $attendance->save();

        foreach ($request->status as $key => $value) {
            $subAttendance = subAttendance::where('id_attendance', $idAttendance)
                ->where('id_student', $key)
                ->first();
            $subAttendance->status = $value;
            $subAttendance->id_attendance = $idAttendance;
            $subAttendance->id_student = $key;
            $subAttendance->status = $value;
            $subAttendance->desc = '';
            $subAttendance->save();
        }

        return redirect(route('teacher.student-attendance'))->with('success', 'Data Absen Berhasil Diubah');
    }


    // public function edit(Attendance $attendance)
    // {
    //     $students = \App\Student::all();
    //     return view('teacher/edit-attendance', [
    //         'attendance' => $attendance,
    //         'students' => $students
    //     ]);
    // }

    // public function update(Request $request, Attendance $attendance)
    // {
    //     $validateData = validator($request->all(), [
    //         'id_absen' => 'required|integer',
    //         'id_student' => 'required|integer',
    //         // 'id_jadwal' => 'required|integer',
    //         'materi' => 'required|string|max:255',
    //         'pertemuan' => 'required|string|max:20',
    //         'tgl' => 'required|date',
    //         'ket' => 'required|string|max:255',
    //     ])->validate();

    //     $attendance->id_absen = $validateData['id_absen'];
    //     $attendance->id_student = $validateData['id_student'];
    //     $attendance->materi = $validateData['materi'];
    //     $attendance->pertemuan = $validateData['pertemuan'];
    //     $attendance->tgl = $validateData['tgl'];
    //     $attendance->ket = $validateData['ket'];
    //     $attendance->save();

    //     return redirect(route('teacher.student-attendance'))->with('success', 'Data Berhasil Diupdate');
    // }

    // public function destroy(Attendance $attendance)
    // {
    //     $attendance->delete();
    //     return redirect(route('teacher.student-attendance'))->with('success', 'Data Berhasil Dihapus');
    // }
}
