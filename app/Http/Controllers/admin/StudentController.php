<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all(); 
        return view('admin/student', [ 
            'students' => $students 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/create-student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = validator($request->all(), [
            'nis' => 'required|integer',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required|string|max:20',
            'nama_ortu' => 'required|string|max:255',
            'alamat' => 'required|string',
            'status' => 'required|string|max:50',
        ])->validate();

        $student = new Student($validateData);
        $student->save();

        return redirect(route('admin.student'))->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('admin/edit-student', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validateData = validator($request->all(), [
            'nis' => 'required|integer',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required|string|max:20',
            'nama_ortu' => 'required|string|max:255',
            'alamat' => 'required|string',
            'status' => 'required|string|max:50',
        ])->validate();

        $student->nis =$validateData['nis'];
        $student->nama =$validateData['nama'];
        $student->tempat_lahir =$validateData['tempat_lahir'];
        $student->tanggal_lahir =$validateData['tanggal_lahir'];
        $student->jk =$validateData['jk'];
        $student->nama_ortu =$validateData['nama_ortu'];
        $student->alamat =$validateData['alamat'];
        $student->status =$validateData['status'];
        $student->save();

        return redirect(route('admin.student'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete(); 
        return redirect(route('admin.student'))->with('success', 'Data Berhasil Dihapus');
    }
}
