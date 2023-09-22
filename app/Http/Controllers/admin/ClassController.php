<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\batchstudentmapping;
use App\Models\students\studentattendance;
use App\Models\batches;
use App\Models\classes;
use App\Models\subjects;
use App\Models\zoom_classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function index(){
        $classes = classes::select('*')->paginate(10);

        return view('admin.class',compact('classes'));
    }

    public function store(Request $request){
        $request->validate([
            'classname'=> 'required'
        ]);
        if($request->id){
            $data = classes::find($request->id);
            $msg = 'Class updated successfully';
        }
        else{
            $data = new classes();
            $msg = 'Class added successfully';
        }
        $data->name = $request->classname;
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
        $data = classes::find($request->id);
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

    public function tutorclasses(){
        $liveclasses = zoom_classes::select('zoom_classes.*','batches.id as batch_id','classes.id as class_id','subjects.id as subject_id','batches.name as batch','topics.id as topic_id','subjects.name as subjects','topics.name as topics')
        ->join('batches','batches.id','zoom_classes.batch_id')
        ->join('topics','topics.id','zoom_classes.topic_id')
        ->join('subjects','subjects.id','topics.subject_id')
        ->join('classes','subjects.class_id','classes.id')
        ->where('zoom_classes.is_completed',1)
        ->where('zoom_classes.is_active',1)
        ->get();
        $classes = (new CommonController)->classes();

        return view('tutor.classes', compact('liveclasses','classes'));
    }

    public function studentclass(){

        $targetValue = session('userid')->id; // The value we want to check in the JSON array

        $classes = zoom_classes::select('*','zoom_classes.id as class_id','zoom_classes.tutor_id as tutor_id','subjects.id as subject_id','subjects.name as subjects','batches.name as batch','topics.name as topics')
        ->join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
        ->join('batches','batches.id','zoom_classes.batch_id')
        ->join('subjects','subjects.id','batches.subject_id')
        ->join('topics','topics.id','zoom_classes.topic_id')
        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
        ->where('zoom_classes.is_active',1)
        ->where('zoom_classes.status','like', '%waiting%')
        ->where('zoom_classes.is_completed',0)
        ->paginate(10);
        $subjects = subjects::where('is_active',1)->where('class_id',session('userid')->class_id)->get();
        $batches = batches::where('is_active',1)->get();

        return view('student.classes',get_defined_vars());

    }
    public function studentCompletedclass(){

        $targetValue = session('userid')->id; // The value we want to check in the JSON array

        $classes = zoom_classes::select('*','zoom_classes.id as class_id','zoom_classes.tutor_id as tutor_id','subjects.id as subject_id','subjects.name as subjects','batches.name as batch','topics.name as topics')
        ->join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
        ->join('batches','batches.id','zoom_classes.batch_id')
        ->join('subjects','subjects.id','batches.subject_id')
        ->join('topics','topics.id','zoom_classes.topic_id')
        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
        ->where('zoom_classes.is_active',1)
        ->where('zoom_classes.status','like', '%completed%')
        ->where('zoom_classes.is_completed',1)
        ->paginate(10);
        $subjects = subjects::where('is_active',1)->where('class_id',session('userid')->class_id)->get();
        $batches = batches::where('is_active',1)->get();

        return view('student.completed-classes',get_defined_vars());

    }


    // search functionality
    public function studentclassSearch(Request $request){

        // return $request->all();

        $targetValue = session('userid')->id; // The value we want to check in the JSON array

        $query = zoom_classes::select('*','zoom_classes.id as class_id','zoom_classes.tutor_id as tutor_id','subjects.id as subject_id','subjects.name as subjects','batches.name as batch','topics.name as topics')
        ->join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
        ->join('batches','batches.id','zoom_classes.batch_id')
        ->join('subjects','subjects.id','batches.subject_id')
        ->join('topics','topics.id','zoom_classes.topic_id')
        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
        ->where('zoom_classes.is_active',1);
        // ->get();
        if ($request->subject_name) {
            $query->where('batches.subject_id', $request->subject_name);
        }
        if ($request->batch) {
            $query->where('zoom_classes.batch_id', $request->batch);
        }

        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(zoom_classes.start_time)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(zoom_classes.start_time)'), '<=', $request->end_date);
        }
        if ($request->status) {
            $query->where('zoom_classes.status','like', '%' . $request->status . '%');
        }
        $classes = $query->paginate(10);
        $type = "student-classes";
        $viewTable = view('admin.partials.common-search', compact('classes','type'))->render();
        $viewPagination = $classes->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);




    }
<<<<<<< Updated upstream
=======

    public function student_attendance_report(){
        return view('student.attendance-report');
    }
    public function student_class_report(){
        return view('student.class-report');
    }

    public function tutorattendance(){
        $studentAttendances =  studentattendance::select("studentattendances.class_starts_at","studentattendances.status",'studentregistrations.name as student_name','subjects.name as subject_name','classes.name as class_name','batches.name as batch_name')
            ->leftjoin('studentregistrations','studentregistrations.id','studentattendances.student_id')
            ->leftjoin('subjects', 'subjects.id', '=', 'studentattendances.subject_id')
            ->leftjoin('batches', 'batches.id', '=', 'studentattendances.batch_id')
            ->leftjoin('classes', 'classes.id', '=', 'studentattendances.class_id')->where('studentattendances.tutor_id',session('userid')->id)->paginate(10);
        return view('tutor.attendance',get_defined_vars());
    }

    public  function tutorattendanceSearch(Request $request){
        // dd($request->all());
        $query =  studentattendance::select("studentattendances.class_starts_at","studentattendances.status",'studentregistrations.name as student_name','subjects.name as subject_name','classes.name as class_name','batches.name as batch_name')
        ->leftjoin('studentregistrations','studentregistrations.id','studentattendances.student_id')
        ->leftjoin('subjects', 'subjects.id', '=', 'studentattendances.subject_id')
        ->leftjoin('batches', 'batches.id', '=', 'studentattendances.batch_id')
        ->leftjoin('classes', 'classes.id', '=', 'studentattendances.class_id')
        ->where('studentattendances.tutor_id',session('userid')->id);
        // ->paginate(10);
        if ($request->student_name) {
            $query->where('studentregistrations.name','like', '%' . $request->student_name . '%');
        }

        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(studentattendances.class_starts_at)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(studentattendances.class_starts_at)'), '<=', $request->end_date);
        }
        if ($request->status) {
            if($request->status==2){
                $status = 0;
            }elseif($request->status==1){
                $status = 1;
            }
            $query->where('studentattendances.status',$status );
        }
        $studentAttendances = $query->paginate(10);
        $type = "tutor-attendances";
        $viewTable = view('admin.partials.common-search', compact('studentAttendances','type'))->render();
        $viewPagination = $studentAttendances->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);

    }
>>>>>>> Stashed changes
}

