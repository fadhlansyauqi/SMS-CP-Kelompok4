<?php

namespace App\Http\Controllers\student;

//controller view class
use App\StudentClass; 
use App\Student; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $tbl_students = Student::where('id_kelas');
        return view('student.class', ['tbl_students' => $tbl_students]);
    }
    
}