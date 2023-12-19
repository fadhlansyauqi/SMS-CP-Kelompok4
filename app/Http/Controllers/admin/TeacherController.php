<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('per_page', 5);
        $teachers = Teacher::where(function ($query) use ($search) {
            $query->where('nip', 'like', "%$search%")
                  ->orWhere('nama', 'like', "%$search%")
                  ->orWhere('jk', 'like', "%$search%")
                  ->orWhere('alamat', 'like', "%$search%");
        })
        ->paginate($perPage);
        // $teachers = Teacher::all();
        return view('admin.teacher', compact('teachers'));
        // return view('admin.teacher')->with('teachers', $teachers);
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
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ])->validate();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->move(public_path().'/uploads/teachers', $fileName);
    
            $teacher = new Teacher($validateData);
            $teacher->foto = $fileName; 
            $teacher->save();
        }
        return redirect(route('admin.teacher'))->with('success', 'Data Berhasil Ditambahkan');
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

        $teacher->nip = $validateData['nip'];
        $teacher->nama = $validateData['nama'];
        $teacher->tempat_lahir = $validateData['tempat_lahir'];
        $teacher->tanggal_lahir = $validateData['tanggal_lahir'];
        $teacher->jk = $validateData['jk'];
        $teacher->alamat = $validateData['alamat'];
        

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/uploads/teachers', $fileName);
    
            if ($teacher->foto) {
                Storage::delete('public/uploads/teachers/' . $teacher->foto);
            }
    
            $teacher->foto = $fileName;
        }

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
