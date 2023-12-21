<?php

namespace App\Http\Controllers\student;

//controller view class
use App\StudentClass; 
use App\Student; 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;//ambil user

class ClassController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $student_classes = StudentClass::paginate(10);//model studentclass
        return view('student.class', compact('student_classes'));
    }
    
}