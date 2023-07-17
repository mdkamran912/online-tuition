<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // $studentpro = studentprofile::select('*')
        //     ->where('student_id', '=', session('userid')->id)
        //     ->first();
        return view('admin.dashboard');
        // return view('student.dashboard',compact('studentpro'));
    }
}
