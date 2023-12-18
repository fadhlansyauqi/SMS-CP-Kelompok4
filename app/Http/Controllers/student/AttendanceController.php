<?php

namespace App\Http\Controllers\student;

use App\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::all(); 
        return view('student/attendance', [ 
            'attendance' => $attendance
        ]);
    }

    public function create()
    {
        return view('student.create-attendance');
    }

    public function store(request $request)
    {
        $validateData = validator($request->all(),[
            'nis' => 'required|integer',
            'nama' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i',
            'keterangan' => 'required|string|max:255',
        ])->validate();

        $attendance = new Attendance($validateData);
        $attendance->save();

        return redirect(route('student.attendance'));
    }

    public function edit(Attendance $attendance)
    {
        return view('student.edit-attendance', [
            'attendance' => $attendance
        ]);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $validateData = validator($request->all(),[
            'nis' => 'required|integer',
            'nama' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i',
            'keterangan' => 'required|string|max:255',
        ])->validate();

        $attendance->nis = $validateData['nis'];
        $attendance->nama = $validateData['nama'];
        $attendance->tanggal_masuk = $validateData['tanggal_masuk'];
        $attendance->jam_masuk = $validateData['jam_masuk'];
        $attendance->keterangan = $validateData['keterangan'];
        $attendance->save();
        
        return redirect(route('student.attendance'));
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect(route('student.attendance'));
    }

}
