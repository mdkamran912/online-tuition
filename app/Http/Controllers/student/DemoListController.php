<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\democlasses;
use Illuminate\Http\Request;

class DemoListController extends Controller
{
    public function index(){
        $demo = democlasses::select('*','democlasses.id as demo_id','tutorregistrations.name as tutor','subjects.name as subject','subjects.id as subjectid','statuses.name as currentstatus')
        ->join('tutorregistrations', 'tutorregistrations.id', '=', 'democlasses.tutor_id')
        ->join('subjects', 'subjects.id','=','democlasses.subject_id')
        ->join('statuses', 'statuses.id','=','democlasses.status')
        ->where('democlasses.student_id','=', session('userid')->id)
        ->get();
        // echo $demo;
        // dd($demo);
        return view('student.demolist', compact('demo'));
    }
    public function democancel(Request $request){
        $demo = democlasses::find($request->id);
        // echo $demo;
        $demo->status = "5";
        $res = $demo->save();
        if($res){
                
            return back()->with('success','Demo Cancelled Successfully');
        }
        else{
            return back()->with('fail','Something Went Wrong. Try Again Later');

        }
    }

    public function bookdemo(Request $request){
        $demo = new democlasses();
        $demo->student_id = session('userid')->id;
        $demo->tutor_id = $request->demotutorid;
        $demo->subject_id = $request->demosubjectid;
        // $demo->subject_id = $request->demosubjectid;
        $demo->slot_1 = $request->demoslotfirst;
        $demo->slot_2 = $request->demoslotsecond;
        $demo->slot_3 = $request->demoslotthird;
        // $demo->slot_confirmed = "";
        // $demo->slot_confirmed_at = "";
        // $demo->slot_confirmed_by = "";
        $demo->status = "1";

        $res = $demo->save();
        if($res){
                
            return back()->with('success','Demo Scheduled Successfully');
        }
        else{
            return back()->with('fail','Something Went Wrong. Try Again Later');

        }
    }
}

// democlasses