<?php

namespace App\Http\Controllers\tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TutorDashboardController extends Controller
{
    public function index(){
        return view('tutor.dashboard');
    }
}
