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
        $perPage = $request->get('per_page', 5);

        $students = Student::where('id_kelas', $idKelas);
        $courses = Course::all();

        if ($search) {
            $students = $students->where('nama', 'like', '%' . $search . '%');
        }

        $students = $students->paginate($perPage);

        return view('admin/student-attendance-class-data', compact('students', 'idKelas', 'search', 'perPage', 'courses'));
    }

    public function store(Request $request, $idKelas)
    {
        $id_attendance = 0;

        // dd($request->all());
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

        return redirect()->back();
    }

    public function edit($idAttendance, Request $request)
    {
        $search = $request->get('search');
        $perPage = $request->get('per_page', 5);
        // $detailAttendances = SubAttendance::where('id', $id)->first();
        // return view('admin/student-attendance-class-data-edit', compact('detailAttendances', 'search', 'perPage'));
        $attendances = Attendance::with('course')->find($idAttendance);
        $courses = Course::all();
        $detailAttendances = SubAttendance::where('id_attendance', $idAttendance)
        ->with('attendance', 'student')
        ->get();


    return view('admin/student-attendance-edit', compact('detailAttendances', 'attendances', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $detailAttendance = SubAttendance::find($id);
        $detailAttendance->status = $request->status;
        // Ubah field lainnya sesuai dengan data yang ingin Anda ubah
        $detailAttendance->save();

        return redirect()
            ->back()
            ->with('success', 'Data Updated Successfully');
    }

    public function destroy($id)
    {
        $detailAttendance = SubAttendance::find($id);
        $detailAttendance->delete();
        return redirect()->back();
    }

    public function detailAttendance($idAttendance)
    {
        $detailAttendances = SubAttendance::where('id_attendance', $idAttendance)
            ->with('attendance', 'student')
            ->get();

        return view('admin/student-attendance-detail', compact('detailAttendances'));
    }
}
