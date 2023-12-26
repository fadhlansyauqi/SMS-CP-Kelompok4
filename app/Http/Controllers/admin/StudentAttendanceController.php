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
        $attendances = Attendance::whereHas('course', function ($query) use ($search) {
            $query->where('date', 'like', "%$search%")->orWhere('nama_mapel', 'like', "%$search%");
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
        $perPage = $request->get('per_page', 5);

        $students = Student::where('id_kelas', $idKelas);
        $courses = Course::all();

        if ($search) {
            $students = $students->where('nama', 'like', '%' . $search . '%')->orWhere('nis', 'like', "%$search%");
        }

        $students = $students->paginate($perPage);

        return view('admin/student-attendance-class-data', compact('students', 'idKelas', 'search', 'perPage', 'courses'));
    }

    public function detailAttendance($idAttendance, Request $request)
    {
        $search = $request->get('search');
        $perPage = $request->get('per_page', 5);

        $detailAttendances = SubAttendance::where('id_attendance', $idAttendance)
            ->whereHas('student', function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%")->orWhere('nis', 'like', "%$search%");
            })
            ->with('attendance', 'student')
            ->paginate($perPage);

        return view('admin/student-attendance-detail', compact('detailAttendances', 'idAttendance'));
    }

    public function store(Request $request, $idKelas)
    {
        $id_attendance = 0;

        $attendance = Attendance::where('id_kelas', $idKelas)
            ->where('id_course', $request->input('id_course'))
            ->whereDate('date', Carbon::now())
            ->first();
        if (is_null($attendance)) {
            $attendance = new Attendance();
            $attendance->date = date('Y-m-d');
            $attendance->id_kelas = $idKelas;
            $attendance->id_course = $request->input('id_course');
            $attendance->save();
        }

        $id_attendance = $attendance->id;

        foreach ($request->status as $key => $value) {
            $subAttendance = new subAttendance();
            $subAttendance->id_attendance = $id_attendance;
            $subAttendance->id_student = $key;
            $subAttendance->status = $value;
            $subAttendance->desc = '';
            $subAttendance->save();
        }

        return redirect(route('admin.student-attendance'))->with('success', 'Data Berhasil Ditambah');
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

        return view('admin/student-attendance-edit', compact('detailAttendances', 'attendance', 'courses'));
    }
    public function update(Request $request, $idAttendance)
    {
        $attendance = Attendance::find($idAttendance);

        $attendance->date = $request->date ?? $attendance->date;
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

        return redirect(route('admin.student-attendance'))->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($idAttendance)
    {
        $attendance = Attendance::find($idAttendance);

        if ($attendance) {
            $attendance->attendance()->delete();
            $attendance->delete();
            return redirect(route('admin.student-attendance'))->with('success', 'Data Berhasil Dihapus');
        }
    }
}
