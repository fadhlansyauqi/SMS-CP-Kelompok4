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
        $grades = Grade::paginate(10); // Sesuaikan jumlah item per halaman sesuai kebutuhan
        return view('student.grade', ['grades' => $grades]);
    }
}


