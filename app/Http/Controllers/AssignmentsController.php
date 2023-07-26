<?php

namespace App\Http\Controllers;

use App\Models\StudentAssignmentList;
use App\Models\StudentAssignments;
use Illuminate\Http\Request;

class AssignmentsController extends Controller
{
    public function adminindex(){
        $data = StudentAssignmentList::select('*','student_assignment_lists.id as assignment_id','student_assignment_lists.name as assignment_name','student_assignment_lists.student_id as assigned_to','student_assignment_lists.is_active as assignment_status','classes.name as class_name','subjects.name as subject_name','topics.name as topic_name','tutorregistrations.name as tutor_name','tutorregistrations.id as tutor_id')
        ->join('classes','classes.id','student_assignment_lists.class_id')
        ->join('subjects','subjects.id','student_assignment_lists.subject_id')
        ->join('topics','topics.id','student_assignment_lists.topic_id')
        ->join('tutorregistrations','tutorregistrations.id','student_assignment_lists.assigned_by')
        ->paginate(10);
        return view('admin.assignmentslist',compact('data'));
    }

    public function status(Request $request){
        // echo 'Test';
        // echo $request->id;
        // echo $request->status;
        // dd();
        $data = StudentAssignmentList::find($request->id);
        if($request->status == 1){
            $status = 0;
        }
        if($request->status == 0){
            $status = 1;
        }
        $data->is_active = $status;

       $res = $data->save();
     return json_encode(array('statusCode'=>200));
    }

    public function view($id){

        // $datas = StudentAssignments::find($id);
        $datas = StudentAssignments::select('*','student_assignment_lists.name as assignment_name','studentregistrations.id as student_id','studentregistrations.name as student_name')
        ->join('student_assignment_lists','student_assignment_lists.id','student_assignments.assignment_id')
        ->join('studentregistrations','studentregistrations.id','student_assignments.submitted_by')
        ->get();
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo $datas;
        // dd ();
        return view('admin.assignments',compact('datas'));
    }

    public function tutorassignments(){
        return view('tutor.assignments');
    }

}
