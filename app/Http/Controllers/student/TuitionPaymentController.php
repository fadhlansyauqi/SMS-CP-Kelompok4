<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TuitionPaymentController extends Controller
{
    public function index()
    {
        return view('student/tuition-payment');
    }
}
