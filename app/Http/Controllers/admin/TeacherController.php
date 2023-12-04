<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all(); 
        return view('admin/teacher', [ 
            'teachers' => $teachers 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/create-teacher');
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
            'nip' => 'required|integer',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required|string|max:20',
            'alamat' => 'required|string',
        ])->validate();

        $teacher = new Teacher($validateData);
        $teacher->save();

        return redirect(route('admin.teacher'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('admin/edit-teacher', [
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validateData = validator($request->all(), [
            'nip' => 'required|integer',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jk' => 'required|string|max:20',
            'alamat' => 'required|string',
        ])->validate();

        $teacher->nip =$validateData['nip'];
        $teacher->nama =$validateData['nama'];
        $teacher->tempat_lahir =$validateData['tempat_lahir'];
        $teacher->tanggal_lahir =$validateData['tanggal_lahir'];
        $teacher->jk =$validateData['jk'];
        $teacher->alamat =$validateData['alamat'];
        $teacher->save();

        return redirect(route('admin.teacher'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete(); 
        return redirect(route('admin.teacher'))->with('success', 'Data Berhasil Dihapus');
    }
}
