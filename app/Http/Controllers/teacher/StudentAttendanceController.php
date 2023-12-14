<?php

namespace App\Http\Controllers\teacher;

use App\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentAttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();
        return view('teacher/student-attendance', compact('attendances'));
    }

    public function create()
    {
        $students = \App\Student::all();
        return view('teacher/create-attendance', [
            'students' => $students
        ]);
    }

    public function store(Request $request)
    {
        $validateData = validator($request->all(), [
            'nis' => 'required|integer',
            'nama' => 'required|string|max:255',
            'pertemuan' => 'required|string|max:20',
            'tgl' => 'required|date',
            'ket' => 'required|string|max:255',
        ])->validate();

        $attendance = new Attendance($validateData);
        $attendance->save();

        return redirect(route('teacher.student-attendance'));
    }

    public function edit(Attendance $attendance)
    {
        $students = \App\Student::all();
        return view('teacher.edit.attendance', [
            'attendance' => $attendance,
            'students' => $students
        ]);
    }

    public function update(Request $request, Attendance $attendance)
    {
        //     $validateData = validator($request->all(), [
        //         'nis' => 'required|integer',
        //         'nama' => 'required|string|max:255',
        //         'pertemuan' => 'required|string|max:20',
        //         'tgl' => 'required|date',
        //         'ket' => 'required|string|max:255',
        //     ])->validate();

        //     $attendance->nis = $validateData['nis'];
        //     $attendance->nama = $validateData['nama'];
        //     $attendance->pertemuan = $validateData['pertemuan'];
        //     $attendance->tgl = $validateData['tgl'];
        //     $attendance->ket = $validateData['ket'];
        //     $attendance->save();

        //     return redirect(route('teacher.student-attendance'));
    }
}
