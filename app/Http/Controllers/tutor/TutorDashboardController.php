<?php

namespace App\Http\Controllers\tutor;

use App\Http\Controllers\Controller;
use App\Models\tutorprofile;
use Illuminate\Http\Request;

class TutorDashboardController extends Controller
{
    public function index(){
        $studentpro = tutorprofile::select('*')
            ->where('tutor_id', '=', session('userid')->id)
            ->first();
        return view('tutor.dashboard',compact('studentpro'));
    }
}
