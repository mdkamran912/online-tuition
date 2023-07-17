<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\studentprofile;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $studentpro = studentprofile::select('*')
            ->where('student_id', '=', session('userid')->id)
            ->first();
        return view('student.dashboard',compact('studentpro'));
    }
}
