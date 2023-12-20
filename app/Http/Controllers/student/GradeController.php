<?php

namespace App\Http\Controllers\student;

use App\Grade;
use App\Student; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    public function index()
    {
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        $tbl_grades = Grade::all();
        return view('student.grade', [
            'tbl_grades' => $tbl_grades
        ]);
    }
}
