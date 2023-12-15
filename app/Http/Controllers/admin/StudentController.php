<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use App\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search   = $request->input('search');
        $perPage  = $request->input('per_page', 5);
        $students = Student::where(function ($query) use ($search) {
            $query
                ->where('nis', 'like', "%$search%")
                ->orWhere('nama', 'like', "%$search%")
                ->orWhere('jk', 'like', "%$search%");
        })  ->orderBy('id_kelas', 'ASC')
            ->paginate($perPage);
        return view('admin.student', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student_classes = DB::table('tbl_classes')->get();
        return view('admin/create-student', compact('student_classes'));
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
            'id_kelas'      => 'required',
            'nis'           => 'required|integer',
            'nama'          => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jk'            => 'required|string|max:20',
            'nama_ortu'     => 'required|string|max:255',
            'alamat'        => 'required|string',
            'status'        => 'required|string|max:50',
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

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $student_classes = StudentClass::all();
        return view('admin/edit-student', compact('student', 'student_classes'));
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
            'id_kelas'      => 'required',
            'nis'           => 'required|integer',
            'nama'          => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jk'            => 'required|string|max:20',
            'nama_ortu'     => 'required|string|max:255',
            'alamat'        => 'required|string',
            'status'        => 'required|string|max:50',
        ])->validate();

        $student->id_kelas      = $validateData['id_kelas'];
        $student->nis           = $validateData['nis'];
        $student->nama          = $validateData['nama'];
        $student->tempat_lahir  = $validateData['tempat_lahir'];
        $student->tanggal_lahir = $validateData['tanggal_lahir'];
        $student->jk            = $validateData['jk'];
        $student->nama_ortu     = $validateData['nama_ortu'];
        $student->alamat        = $validateData['alamat'];
        $student->status        = $validateData['status'];
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
