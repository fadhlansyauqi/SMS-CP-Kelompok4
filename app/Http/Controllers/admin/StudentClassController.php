<?php

namespace App\Http\Controllers\admin;

use App\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentClassController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5);
        $student_classes = StudentClass::where('nama_kelas', 'like', "%$search%")
                              ->orderBy('nama_kelas', 'ASC')
                              ->paginate($perPage);


        return view('admin/student-class', compact('student_classes'));
    }

    public function create()
    {
        return view('admin/student-class-create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama_kelas' => 'required',
            ],
            [
                'nama_kelas.required'     => 'Nama harus diisi',
            ],
        );

        $student_class = new StudentClass($validatedData);
        $student_class->save();


        return redirect(route('admin.student-class'))->with('success', 'Kelas Berhasil Ditambahkan');
    }

    public function edit(StudentClass $student_class)
    {

        return view('admin/student-class-edit', [
            'student_class' => $student_class,
        ]);
    }

    public function update(Request $request, StudentClass $student_class)
    {
        $validateData = validator($request->all(), [
            'nama_kelas' => 'required',
        ])->validate();

        $student_class->nama_kelas = $validateData['nama_kelas'];
        $student_class->save();

        return redirect(route('admin.student-class'))->with('success', 'Kelas Berhasil Diupdate');
    }

    public function destroy(StudentClass $student_class)
    {
        $student_class->delete();
        return redirect(route('admin.student-class'))->with('success', 'Kelas Berhasil Dihapus');
    }
}
