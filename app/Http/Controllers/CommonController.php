<?php

namespace App\Http\Controllers;

use App\Models\batches;
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

    public function batchbysubject(Request $request){
        $data['batches'] = batches::where('subject_id', $request->subject_id)->where('is_active',1)->get();
        return response()->json($data);
    }

    public function studentsbybatch(Request $request){
        $targetValue = 1;
    //     $data['students'] = studentregistration::select('*')
    //     ->join('batchstudentmappings', 'studentregistrations.student_id', '=', 'batchstudentmappings.student_id')
    // ->whereIn('batchstudentmappings.student_id', $studentIdsArray)
        // ->join('batchstudentmappings','batchstudentmappings.id',$request->batch_id)
        // ->join('batchstudentmappings','batchstudentmappings.id',$request->batch_id)
        // ->join('batchstudentmappings',"JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
        // ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
        // ->where('batchstudentmappings.batch_id', $request->batch_id)
        // ->get();
        $studentId = 1;
$targetStudentData = ["1", "3"];

$results['students'] = StudentRegistration::select('studentregistrations.*')
    ->join('batchstudentmappings', function ($join) use ($targetStudentData) {
        $join->whereJsonContains('batchstudentmappings.student_data', $targetStudentData);
    })
    
    ->get();
// dd($results);
        return response()->json($results);
    }


//     $studentId = 1;
// $studentIdsArray = ["1", "2"];

// $results = Table1::where('student_id', $studentId)
//     ->join('table2', 'table1.student_id', '=', 'table2.student_id')
//     ->whereIn('table2.student_id', $studentIdsArray)
//     ->get();
}
