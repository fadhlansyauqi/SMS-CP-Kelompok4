<?php

namespace App\Http\Controllers\admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
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
        $courses = Course::where(function ($query) use ($search) {
            $query->where('kode_mapel', 'like', "%$search%")
                  ->orWhere('nama_mapel', 'like', "%$search%");
        })
        ->paginate($perPage);

        return view('admin.course', compact('courses'));

        // $courses = Course::all(); 
        // return view('admin/course', [ 
        //     'courses' => $courses 
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = \App\Teacher::all();
        return view('admin/create-course', [ 
            'teachers' => $teachers 
        ]);
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
            'kode_mapel' => 'required|string|max:10',
            'nama_mapel' => 'required|string|max:100',
            'id_teacher' => 'required|integer',
        ])->validate();

        $course = new Course($validateData);
        $course->save();

        return redirect(route('admin.course'))->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course  $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $teachers = \App\Teacher::all(); 
        return view('admin/edit-course', [ 
            'course' => $course, 
            'teachers' => $teachers 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validateData = validator($request->all(), [
            'kode_mapel' => 'required|string|max:10',
            'nama_mapel' => 'required|string|max:100',
            'id_teacher' => 'required|integer',
        ])->validate();

        $course->kode_mapel = $validateData['kode_mapel'];
        $course->nama_mapel = $validateData['nama_mapel'];
        $course->id_teacher = $validateData['id_teacher'];
        $course->save();

        return redirect(route('admin.course'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete(); 
        return redirect(route('admin.course'))->with('success', 'Data Berhasil Dihapus');
    }
}
