<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\status;
use App\Models\studentregistration;
use App\Models\subjects;
use App\Models\topics;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    // Status List
    public function status()
    {
        return  status::select('*')->get();
    }
    // Class List
    public function classes()
    {
        return classes::select('*')->where('is_active', '1')->get();
    }
    // Fetch Subjects By Class
    public function fetchsubjects(Request $request)
    {
        // Fetch Subjects Based On Class -> Using jQuerry
        $data['subjects'] = subjects::where("class_id", $request->class_id)
            ->where('is_active', 1)->get();
        return response()->json($data);
    }
    // Fetch Topic By Class
    public function fetchtopics(Request $request)
    {
        // Fetch Subjects Based On Class -> Using jQuerry
        $data['topics'] = topics::where("subject_id", $request->subject_id)
            ->where('is_active', 1)->get();
        return response()->json($data);
    }

    public function studentsbyclass(Request $request){
        $data['students'] = studentregistration::where('class_id', $request->class_id)
        ->where('is_active',1)->get();
        return response()->json($data);
    }
}
