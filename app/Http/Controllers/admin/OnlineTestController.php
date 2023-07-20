<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\OnlineTests;
use App\Models\questionbank;
use App\Models\subjects;
use App\Models\topics;
use Illuminate\Http\Request;

class OnlineTestController extends Controller
{
    public function index()
    {
        $testlists = OnlineTests::select('*','online_tests.id as test_id','online_tests.name as test_name','online_tests.description as test_description','online_tests.is_active as test_status','classes.name as class_name','subjects.name as subject_name','topics.name as topic_name')
        ->join('classes','classes.id','online_tests.class_id')
        ->join('subjects','subjects.id','online_tests.subject_id')
        ->join('topics','topics.id','online_tests.topic_id')
        ->get();

        return view('admin.onlinetestlist',compact('testlists'));
    }

    public function create()
    {
        $classes = (new CommonController)->classes();
        return view('admin.onlinetestnew', compact('classes'));
    }

    public function fetchquestions(Request $request)
    {
        // echo $request->topic_id;

        $questions = questionbank::select('*')
            ->where('topic_id', $request->topic_id)
            ->where('is_active', 1)
            ->get();

        return $questions;
    }

    public function store(Request $request)
    {
        $request->validate([
            'testname' => 'required',
            'testdescription' => 'required',
            'classname' => 'required',
            'subject' => 'required',
            'topic' => 'required',
            'maxattempt' => 'required',
            'duration' => 'required',
            'tstartdate' => 'required',
            'testenddate' => 'required',
            'questiondata' => 'required',
        ]);

        if ($request->id) {
            $data = OnlineTests::find($request->id);
            $msg = 'Test updated successfully';
        } else {
            $data = new OnlineTests();
            $msg = 'Test added successfully';
        }
        $data->name = $request->testname;
        $data->description = $request->testdescription;
        $data->class_id = $request->classname;
        $data->subject_id = $request->subject;
        $data->topic_id = $request->topic;
        $data->max_attempt = $request->maxattempt;
        $data->test_duration = $request->duration;
        $data->test_start_date = $request->tstartdate;
        $data->test_end_date = $request->testenddate;
        $data->question_id = json_encode($request->questiondata);
        $res = $data->save();

        if ($res) {
            return back()->with('success', $msg);
        } else {
            return back()->with('fail', 'Something went wrong. Please try again later');
        }
    }

    public function edit($id){
        $tdata = OnlineTests::select('*')->where('id',$id)->first();
        $classes = (new CommonController)->classes();
        $subjects = subjects::select('*')->where('class_id',$tdata->class_id)->where('is_active',1)->get();
        $topics = topics::select('*')->where('subject_id',$tdata->subject_id)->where('is_active',1)->get();
        $questions = questionbank::select('*')->where('topic_id',$tdata->topic_id)->where('is_active',1)->get();
        $questiondatas = OnlineTests::select('question_id')->where('id',$tdata->id)->first();

        // echo $questiondatas;
        // echo "<br>";
    
        // dd();
        return view('admin.onlinetestnew', compact('tdata','classes','subjects','topics','questions','questiondatas'));
    }

    public function viewquestions($id){
         // Fetch question details based on testid -> Using jQuerry
         $data['questions'] = OnlineTests::where("id", $id)->first();
     return response()->json($data);
    }
}
