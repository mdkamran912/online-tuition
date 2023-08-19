<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\learningcontents;
use App\Models\payments\paymentstudents;
use Illuminate\Http\Request;

class MyLearningController extends Controller
{
    public function index(){
        $pdetails = paymentstudents::select('*')->where('class_id',session('userid')->id)->where('student_id',session('userid')->id)->first();
        $learnings = learningcontents::select('learningcontents.*','topics.name as topic_name')
        // ->join('paymentstudents','paymentstudents.subject_id','learningcontents.subject_id')
        // ->join('paymentdetails','paymentdetails.transaction_id','paymentstudents.transaction_id')
        ->join('topics','topics.id','learningcontents.topic_id')
        ->join('classes','classes.id','learningcontents.class_id')
        ->join('subjects','subjects.id','learningcontents.subject_id')
        // ->where('paymentstudents.student_id',session('userid')->id)
        ->where('classes.id',session('userid')->class_id)
        ->where('subjects.id',$pdetails->subject_id)
        // ->where('paymentstudents.class_id',session('userid')->class_id)
        ->get();
        return view('student.mylearnings',compact('learnings'));
    }
}
