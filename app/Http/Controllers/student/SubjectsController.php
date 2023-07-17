<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index(){
        $subjectlist = subjects::select('*','subjects.name as subjectname','subjects.id as subjectid','tutorprofiles.name as tutorname')
        ->join('tutorsubjectmappings','tutorsubjectmappings.subject_id','=','subjects.id')
        ->join('tutorprofiles','tutorprofiles.tutor_id','=','tutorsubjectmappings.tutor_id')
        ->join('paymentstudents','paymentstudents.subject_id','=','subjects.id')
        ->join('paymentdetails','paymentdetails.transaction_id','paymentstudents.transaction_id')
        ->where('paymentstudents.student_id',session('userid')->id)
        ->where('paymentdetails.status',1)
        ->get();
        return view('student.selectedsubjects', compact('subjectlist'));
    }
}
