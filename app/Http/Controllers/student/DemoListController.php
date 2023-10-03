<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\democlasses;
use App\Models\subjects;
use App\Models\tutorregistration;
use App\Models\status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoListController extends Controller
{
    public function index(){

        $demos = democlasses::select('*','democlasses.id as demo_id','classes.name as class_name','tutorregistrations.name as tutor','subjects.name as subject','subjects.id as subjectid','statuses.name as currentstatus')
        ->join('tutorregistrations', 'tutorregistrations.id', '=', 'democlasses.tutor_id')
        ->join('subjects', 'subjects.id','=','democlasses.subject_id')
        ->join('statuses', 'statuses.id','=','democlasses.status')
        ->join('classes', 'classes.id','=','subjects.class_id')
        ->where('democlasses.student_id','=', session('userid')->id)
        ->paginate(10);
        $subjects = subjects::where('is_active',1)->where('class_id',session('userid')->class_id)->get();
        $statuses = status::select('*')->get();
        $tutors = tutorregistration::select('*')->get();
        return view('student.demolist',get_defined_vars());
    }
    public function parentindex(){

        $demos = democlasses::select('*','democlasses.id as demo_id','classes.name as class_name','tutorregistrations.name as tutor','subjects.name as subject','subjects.id as subjectid','statuses.name as currentstatus')
        ->join('tutorregistrations', 'tutorregistrations.id', '=', 'democlasses.tutor_id')
        ->join('subjects', 'subjects.id','=','democlasses.subject_id')
        ->join('statuses', 'statuses.id','=','democlasses.status')
        ->join('classes', 'classes.id','=','subjects.class_id')
        ->where('democlasses.student_id','=', session('userid')->id)
        ->orderBy('democlasses.created_at', 'desc')
        ->paginate(10);
        $subjects = subjects::where('is_active',1)->where('class_id',session('userid')->class_id)->get();
        $statuses = status::select('*')->get();
        $tutors = tutorregistration::select('*')->get();
        return view('parent.demolist',get_defined_vars());
    }
    public function demolistSearch(Request $request){
        // return $request->all();
        $query = democlasses::select('*','democlasses.id as demo_id','tutorregistrations.name as tutor','classes.name as class_name','subjects.name as subject','subjects.id as subjectid','statuses.name as currentstatus')
        ->join('tutorregistrations', 'tutorregistrations.id', '=', 'democlasses.tutor_id')
        ->join('subjects', 'subjects.id','=','democlasses.subject_id')
        ->join('statuses', 'statuses.id','=','democlasses.status')
        ->join('classes', 'classes.id','=','subjects.class_id')
        ->where('democlasses.student_id','=', session('userid')->id);


        if ($request->tutor) {
            $query->where('democlasses.tutor_id', $request->tutor);
        }
        if ($request->subject_name) {
            $query->where('democlasses.subject_id', $request->subject_name);
        }

        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(democlasses.slot_confirmed)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(democlasses.slot_confirmed)'), '<=', $request->end_date);
        }
        if ($request->status) {
            $query->where('democlasses.status',$request->status );
        }
        $demos = $query->paginate(10);
        $type = "student";
        $viewTable = view('admin.partials.democlass-search', compact('demos','type'))->render();
        $viewPagination = $demos->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);


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
        // dd($request->message);
        $demo = new democlasses();
        $demo->student_id = session('userid')->id;
        $demo->tutor_id = $request->demotutorid;
        $demo->subject_id = $request->demosubjectid;
        // $demo->subject_id = $request->demosubjectid;
        $demo->slot_1 = $request->demoslotfirst;
        $demo->slot_2 = $request->demoslotsecond;
        $demo->slot_3 = $request->demoslotthird;
        $demo->remarks = $request->message;
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
