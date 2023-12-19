<?php

namespace App\Http\Controllers\student;

//controller view class
use App\StudentClass; 
use App\Models\Student; 

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
        $tbl_classes = StudentClass::all(); 
        return view('student.class', ['tbl_classes' => $tbl_classes]);
    }

    
}