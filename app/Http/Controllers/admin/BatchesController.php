<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\batches;
use App\Models\classes;
use App\Models\tutorregistration;
use Illuminate\Http\Request;

class BatchesController extends Controller
{
    
    public function index(){
        $classes = classes::select('*')->where('is_active',1)->get();
        $tutors = tutorregistration::select('*')->where('is_active',1)->get();
        $batches = batches::select('batches.id as batch_id','batches.name as batch_name','batches.description as batch_description','batches.is_active as batch_status','subjects.name as subject_name','subjects.id as subject_id','classes.id as class_id','classes.name as class_name','tutorregistrations.id as tutor_id','tutorregistrations.name as tutor_name')
        ->join('subjects','subjects.id','=','batches.subject_id')
        ->join('tutorregistrations','tutorregistrations.id','=','batches.tutor_id')
        ->join('classes','classes.id','=','subjects.class_id')->paginate(10);
        return view('admin.batch',compact('batches','classes','tutors'));
    }
    
    public function store(Request $request){
        $request->validate([
            'classname'=> 'required',
            'subject'=> 'required',
            'tutor'=>'required',
            'batchname'=> 'required',
            // 'description'=> 'required'
        ]);
        if($request->id){
            $data = batches::find($request->id);
            $msg = 'Batch updated successfully';
        }
        else{
            $data = new batches();
            $msg = 'Batch added successfully';
        }
        
        $data->name = $request->batchname;
        $data->description = $request->description;
        $data->subject_id = $request->subject;
        $data->tutor_id = $request->tutor;
        $res = $data->save();

        if($res){
            return back()->with('success',$msg);
        }
        else{
            return back()->with('fail','Something went wrong. Please try again later');
        }
    }
    public function status(Request $request){
        // echo 'Test';
        // echo $request->id;
        // echo $request->status;
        // dd();
        $data = batches::find($request->id);
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
    
}
