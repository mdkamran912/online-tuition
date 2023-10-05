<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\OnlineTests;
use App\Models\questionbank;
use App\Models\subjects;
use App\Models\classes;
use App\Models\topics;
use App\Models\OnlineTest;
use App\Models\testattempted;
use App\Models\testresponssheet;
use App\Models\tutorsubjectmapping;
use App\Models\TemporarySubjective;
use App\Models\SubjectiveResponse;
use App\Models\studentregistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class OnlineTestController extends Controller
{
    public function index()
    {
        $testlists = OnlineTests::select('*', 'online_tests.id as test_id', 'online_tests.name as test_name', 'online_tests.description as test_description', 'online_tests.is_active as test_status', 'classes.name as class_name', 'subjects.name as subject_name', 'topics.name as topic_name')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            ->join('topics', 'topics.id', 'online_tests.topic_id')
            ->paginate(10);
        $classes = classes::where('is_active',1)->get();
        $subjects = subjects::where('is_active',1)->get();
        $topics = topics::where('is_active',1)->get();

        return view('admin.onlinetestlist',get_defined_vars());
    }

    public function onlinetestSearch(Request $request)
    {
        // return $request->all();
        $query = OnlineTests::select('*', 'online_tests.id as test_id', 'online_tests.name as test_name', 'online_tests.description as test_description', 'online_tests.is_active as test_status', 'classes.name as class_name', 'subjects.name as subject_name', 'topics.name as topic_name')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            ->join('topics', 'topics.id', 'online_tests.topic_id');
            // ->get();
        if ($request->test_name) {
            $query->where('online_tests.name','like', '%' . $request->test_name . '%');
        }
        if ($request->class_name) {
            $query->where('online_tests.class_id', $request->class_name);
        }
        if ($request->subject_name) {
            $query->where('online_tests.subject_id', $request->subject_name);
        }
        if ($request->topic_name) {
            $query->where('online_tests.topic_id', $request->topic_name);
        }
        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(online_tests.test_start_date)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(online_tests.test_end_date)'), '<=', $request->end_date);
        }
        if ($request->status_field) {
            if($request->status_field=='2'){
                $request->status_field = '0';
            }
            $query->where('online_tests.is_active',$request->status_field);
        }
        $testlists = $query->paginate(10);
        $type = 'testlists';
        $viewTable = view('admin.partials.students-tutor-search', compact('testlists','type'))->render();
        $viewPagination = $testlists->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);


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
            ->where('type', $request->type)
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
        $data->test_type = $request->test_type;
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

    public function edit($id)
    {
        $tdata = OnlineTests::select('*')->where('id', $id)->first();
        $classes = (new CommonController)->classes();
        $subjects = subjects::select('*')->where('class_id', $tdata->class_id)->where('is_active', 1)->get();
        $topics = topics::select('*')->where('subject_id', $tdata->subject_id)->where('is_active', 1)->get();
        $questions = questionbank::select('*')->where('topic_id', $tdata->topic_id)->where('is_active', 1)->get();
        $questiondatas = OnlineTests::select('question_id')->where('id', $tdata->id)->first();

        // $questiondata = explode(',', $tdata->question_id);
        // $data = ModelName::find($id);
        $qstn = explode('"', $tdata->question_id);
        // return view('package.edit', ['data' => $data,'months' => $SelectedMonths]);
        // foreach($prodmulti as $test)
        // echo $months ;
        // echo "<pre>";
        // dd($months);
        // endforeach
        // $keywords = preg_split('/[\s,-,"]+/', $tdata->question_id);
        // dd($months);
        return view('admin.onlinetestnew', compact(['tdata', 'classes', 'subjects', 'topics', 'questions', 'questiondatas', 'qstn']));
    }

    public function viewquestions($id)
    {
        // Fetch question details based on testid -> Using jQuerry
        $data['questions'] = OnlineTests::where("id", $id)->first();
        return response()->json($data);
    }

    public function studentexams()
    {

        $classes = (new CommonController)->classes();
        $subjects = subjects::where('is_active',1)->get();
        $exams = OnlineTests::select('online_tests.*', 'classes.name as class', 'subjects.name as subject', 'topics.name as topic')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            ->join('topics', 'topics.id', 'online_tests.topic_id')
            ->paginate(10);
        foreach ($exams as $exam) {
            $exam->attemptsRemaining = $exam->max_attempt - testattempted::where('student_id', session('userid')->id)
                ->where('test_id', $exam->id)
                ->count();
        }

        $extakens = testattempted::select('testattempteds.*','online_tests.name as exam_name','online_tests.description as exam_description','online_tests.test_duration as duration','online_tests.test_start_date as test_start_date','online_tests.test_end_date as test_end_date')
        ->join('online_tests','online_tests.id','testattempteds.test_id')
        ->where('testattempteds.student_id',session('userid')->id)->where('testattempteds.is_active',1)->orderBy('testattempteds.created_at', 'desc')->get();

        return view('student.exam',get_defined_vars());
    }

    public function studentexamsParent()
    {

        $classes = (new CommonController)->classes();
        $subjects = subjects::where('is_active',1)->get();
        $exams = OnlineTests::select('online_tests.*', 'classes.name as class', 'subjects.name as subject', 'topics.name as topic')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            ->join('topics', 'topics.id', 'online_tests.topic_id')
            ->paginate(10);
        foreach ($exams as $exam) {
            $exam->attemptsRemaining = $exam->max_attempt - testattempted::where('student_id', session('userid')->id)
                ->where('test_id', $exam->id)
                ->count();
        }

        $extakens = testattempted::select('testattempteds.*','online_tests.name as exam_name','online_tests.description as exam_description','online_tests.test_duration as duration','online_tests.test_start_date as test_start_date','online_tests.test_end_date as test_end_date')
        ->join('online_tests','online_tests.id','testattempteds.test_id')
        ->where('testattempteds.student_id',session('userid')->id)->where('testattempteds.is_active',1)->orderBy('testattempteds.created_at', 'desc')->get();

        return view('parent.exam',get_defined_vars());
    }

    // search functionality
    public function studentexamsSearch(Request $request)
    {
        // return $request->all();
        $classes = (new CommonController)->classes();
        $subjects = subjects::where('is_active',1)->get();
        $query = OnlineTests::select('online_tests.*', 'classes.name as class', 'subjects.name as subject', 'topics.name as topic')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            ->join('topics', 'topics.id', 'online_tests.topic_id');
            // ->get();


        if ($request->class_name) {
            $query->where('online_tests.class_id', $request->class_name);
        }
        if ($request->subject_name) {
            $query->where('online_tests.subject_id', $request->subject_name);
        }
        if ($request->topic) {
            $query->where('topics.name','like', '%' . $request->topic . '%');
        }
        $exams = $query->paginate(10);
        foreach ($exams as $exam) {
            $exam->attemptsRemaining = $exam->max_attempt - testattempted::where('student_id', session('userid')->id)
                ->where('test_id', $exam->id)
                ->count();
        }
        $type = 'student-exams';
        $viewTable = view('admin.partials.common-search', compact('exams','type'))->render();
        $viewPagination = $exams->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);


    }

    public function taketest($id)
    {

        $onlineTest = OnlineTests::where('id', $id)
            ->where('class_id', session('userid')->class_id)
            ->first();

        // echo session('userid')->class_id;
        // dd($onlineTest);
        // Decode the JSON string to an array
        $questionIds = json_decode($onlineTest->question_id);

        // Fetch the related questions using the decoded question_ids array
        $questions = Questionbank::whereIn('id', $questionIds)->get();


        return view('student.taketest', compact('onlineTest', 'questions'));
    }
    public function taketestsubjective($id)
    {

        $onlineTest = OnlineTests::where('id', $id)
            ->where('class_id', session('userid')->class_id)
            ->first();

        // echo session('userid')->class_id;
        // dd($onlineTest);
        // Decode the JSON string to an array
        $questionIds = json_decode($onlineTest->question_id);
        // Fetch the related questions using the decoded question_ids array
        $questions = Questionbank::whereIn('id', $questionIds)->get();


        return view('student.take-subjectivetest',get_defined_vars());
    }



    public function saveResponses(Request $request)
    {


        $responses = $request->input('responses'); // Assuming the responses are sent as an array

        $savedId = [];
        $test_id = "";
        $attemptNumber = "";
        foreach ($responses as $response) {
            if ($response) {
                $values = explode(',', $response);

                // Question ID = $values[0]
                // Selection Option = $values[1]
                // Test ID = $values[2]

                $copt = questionbank::select('*')->where('id', $values[0])->first();
                $correctOption = $copt['correct_option'];
                $correct_option = "";
                // Loop through the options and check if any option matches the correct option
                foreach (range(1, 4) as $optionNumber) {
                    $optionField = "option{$optionNumber}";
                    $optionValue = $copt[$optionField];

                    if ($optionValue === $correctOption) {
                        // Option $optionNumber is the correct answer
                        $correct_option = $optionNumber;
                        break; // No need to check other options
                    }
                }
                // checking attempt no.
                $totalattp = OnlineTests::select('max_attempt')->where('id', $values[2])->first();
                $alreadyattp = testattempted::select('*')->where('student_id', session('userid')->id)->where('test_id', $values[2])->count();

                $remaining = ($totalattp->max_attempt) - ($alreadyattp);
                $attemptNumber = $alreadyattp + 1;

                $data = new testresponssheet();
                $data->test_id = $values[2];
                $data->student_id = session('userid')->id;
                $data->attempt_no = $attemptNumber;
                $data->question_id = $values[0];
                $data->correct_option = $correct_option;
                $data->marked_option = $values[1];

                $data->save();
                // Access the ID of the saved record

                $savedId[] = $data->id;
                $test_id = $values[2];




                // dd();
            }
        }
        // calculating the total marks
        $marks_ttl = 50;
        $marks_obt = 28;
        // Saving final test data
        $data = new testattempted();
        $data->student_id = session('userid')->id;
        $data->test_id = $test_id;
        $data->attempt_no = $attemptNumber;
        $data->test_attempted_on = now();
        $data->test_time_taken = 0;
        $data->total_marks = $marks_ttl;
        $data->obtained_marks = $marks_obt;
        $data->test_type = 1;
        $data->response_id = json_encode($savedId);
        // $data->status = ;
        // $data->is_active = session('userid')->id;
        $data->save();


        return response()->json(['message' => 'Test Submitted Successfully']);
    }
    public function saveSubjectiveResponses(Request $request)
    {
        $testId = $request->testId;
        $questionIds = $request->questionIds;
        $savedId = [];
        if(count($questionIds) > 0){
            foreach ($questionIds as $questionId) {
              $temprec = TemporarySubjective::where('std_id',session('userid')->id)->where('test_id',$testId)->where('question_id', $questionId)->first();
              if($temprec){
                $data = new SubjectiveResponse;
                $data->test_id = $testId;
                $data->student_id = session('userid')->id;
                $data->question_id = $questionId;
                $data->response = $temprec->answer;
                $data->total_marks = null;
                $data->obtained_marks = null;
                $data->remarks = null;
                $data->save();
                $savedId[] = $data->id;
              }
            }
            $totalattp = OnlineTests::select('max_attempt')->where('id', $testId)->first();
            $alreadyattp = testattempted::select('*')->where('student_id', session('userid')->id)->where('test_id', $testId)->count();

            $remaining = ($totalattp->max_attempt) - ($alreadyattp);
            $attemptNumber = $alreadyattp + 1;

            $data = new testattempted();
            $data->student_id = session('userid')->id;
            $data->test_id = $testId;
            $data->attempt_no = $attemptNumber;
            $data->test_attempted_on = now();
            $data->test_time_taken = 0;
            $data->total_marks = 0;
            $data->obtained_marks = 0;
            $data->response_id = 0;
            $data->answer = json_encode($savedId);
            $data->test_type = 2;
            $data->save();
            $temprec = TemporarySubjective::where('std_id',session('userid')->id)->where('test_id',$testId)->delete();
            return response()->json(['message' => 'Test Submitted Successfully']);

        }
    }
    public function testreport($id){

        $testid = testattempted::find($id);
        $onlineTest = OnlineTests::where('id', $testid->test_id)
            ->where('class_id', session('userid')->class_id)
            ->first();
        // Decode the JSON string to an array
        $questionIds = json_decode($onlineTest->question_id);
        $responseIds = json_decode($testid->response_id);

        // Fetch the related questions using the decoded question_ids array
        $questionsCount = Questionbank::whereIn('id', $questionIds)->count();
        $responsesCount = testresponssheet::whereIn('id', $responseIds)->count();
        $correctResponsesCount = testresponssheet::whereIn('id', $responseIds)->whereColumn('correct_option', 'marked_option')->count();
        // dd($correctResponsesCount);
        return view('student.testreport',compact('onlineTest','questionsCount','responsesCount','correctResponsesCount'));
    }

    public function onlinetestresponseslist(){
        return view('admin.onlinetestresponselist');
    }
    public function onlinetestresponse(){
        return view('admin.onlinetestresponses');
    }

    // tutor subjectve responses
    public function onlinetestresponseslistTutor(){
        $subs = tutorsubjectmapping::where('tutor_id', session('userid')->id)->pluck('subject_id')->toArray();
        if($subs){
            $onlineTests = OnlineTests::select('online_tests.*','subjects.name as sub_name','classes.name as class_name','topics.name as topic_name')->join('classes','classes.id','online_tests.class_id')->join('subjects','subjects.id','online_tests.subject_id')->join('topics','topics.id','online_tests.topic_id')->whereIn('online_tests.subject_id',$subs)->where('online_tests.test_type',2)->paginate(10);
            $classes = classes::where('is_active',1)->get();
            $subjects = subjects::where('is_active',1)->get();
            $topics = topics::where('is_active',1)->get();
            return view('tutor.onlinetestresponselist-tutor',get_defined_vars());
        }else{
            return back()->with('fail','No tests Found');
        }
    }

    public function subjTestsSearch(Request $request){
        $subs = tutorsubjectmapping::where('tutor_id', session('userid')->id)->pluck('subject_id')->toArray();
        if($subs){
            $query = OnlineTests::select('online_tests.*','subjects.name as sub_name','classes.name as class_name','topics.name as topic_name')->join('classes','classes.id','online_tests.class_id')->join('subjects','subjects.id','online_tests.subject_id')->join('topics','topics.id','online_tests.topic_id')->whereIn('online_tests.subject_id',$subs)->where('online_tests.test_type',2);

            if ($request->test_name) {
                $query->where('online_tests.name','like', '%' . $request->test_name . '%');
            }
            if ($request->class_name) {
                $query->where('online_tests.class_id', $request->class_name);
            }
            if ($request->subject_name) {
                $query->where('online_tests.subject_id', $request->subject_name);
            }
            if ($request->topic_name) {
                $query->where('online_tests.topic_id', $request->topic_name);
            }
            if ($request->start_date) {
                $query->whereDate(DB::raw('DATE(online_tests.test_start_date)'), '>=', $request->start_date);
            }
            if ($request->end_date) {
                $query->whereDate(DB::raw('DATE(online_tests.test_end_date)'), '<=', $request->end_date);
            }
            $onlineTests = $query->paginate(10);
            $type = 'tutor_subjective_tests';
            $viewTable = view('admin.partials.students-tutor-search', compact('onlineTests','type'))->render();
            $viewPagination = $onlineTests->links()->render();
            return response()->json([
                'table' => $viewTable,
                'pagination' => $viewPagination
            ]);
        }
    }

    public function onlinetestresponseTutor(Request $request,$test_id){
        $responses = testattempted::select('testattempteds.*','studentregistrations.name as std_name')->join('studentregistrations','studentregistrations.id','testattempteds.student_id')->where('testattempteds.test_id',$test_id)->where('testattempteds.test_type',2)->paginate(10);
        $test_name = OnlineTests::find($test_id);
        return view('tutor.onlinetestresponses-tutor',get_defined_vars());
    }
    public function studentwiseSubjSearch(Request $request,$test_id){

        $query = testattempted::select('testattempteds.*','studentregistrations.name as std_name')->join('studentregistrations','studentregistrations.id','testattempteds.student_id')->where('testattempteds.test_id',$test_id)->where('testattempteds.test_type',2);
        if ($request->student_name) {
            $query->where('studentregistrations.name','like', '%' . $request->student_name . '%');
        }
        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(testattempteds.test_attempted_on)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(testattempteds.test_attempted_on)'), '<=', $request->end_date);
        }
        $responses = $query->paginate(10);
        $type = 'tutor_subjective_responses';
        $viewTable = view('admin.partials.students-tutor-search', compact('responses','type'))->render();
        $viewPagination = $responses->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);

    }

    public function onlinetestresponsestudentTutor($response_id){
        $response = testattempted::find($response_id);
        if($response){
            $responseIds = json_decode($response->answer);
            $finalResponses = SubjectiveResponse::select('subjective_responses.*','questionbanks.question')->join('questionbanks','questionbanks.id','subjective_responses.question_id')->whereIn('subjective_responses.id',$responseIds)->get();
            $test = OnlineTests::find($response->test_id);
            $questionIds = json_decode($test->question_id);
            $questions = questionbank::whereIn('id', $questionIds)->get();
            $student = studentregistration::find($response->student_id);
            return view('tutor.onlinetestresponsesstudent-tutor',get_defined_vars());
        }
    }

    public function testCorrection(Request $request,$response_id){
        $response = testattempted::find($response_id);
        if($response){
            $responseIds = json_decode($response->answer);
            $finalResponses = SubjectiveResponse::whereIn('subjective_responses.id',$responseIds)->get();
            $test = OnlineTests::find($response->test_id);
            $questionIds = json_decode($test->question_id);
            $questions = questionbank::whereIn('id', $questionIds)->get();

            $rules = [];
            $messages = [];

            foreach ($questions as $question) {
                $fieldPrefix = "{$question->id}";

                // Define rules for max_marks and marks_obtained
                $rules["max_marks.{$fieldPrefix}"] = 'required|numeric';
                $rules["marks_obtained.{$fieldPrefix}"] = "required|numeric|min:0|max:{$request->input("max_marks.{$fieldPrefix}")}";

                // Define custom error messages
                $messages["max_marks.{$fieldPrefix}.required"] = "Max Marks for Question  is required.";
                $messages["max_marks.{$fieldPrefix}.numeric"] = "Max Marks for Question  must be a numeric value.";
                $messages["marks_obtained.{$fieldPrefix}.required"] = "Marks Obtained for Question  is required.";
                $messages["marks_obtained.{$fieldPrefix}.numeric"] = "Marks Obtained for Question  must be a numeric value.";
                $messages["marks_obtained.{$fieldPrefix}.min"] = "Marks Obtained for Question  must be at least 0.";
                $messages["marks_obtained.{$fieldPrefix}.max"] = "Marks Obtained for Question  cannot be greater than Max Marks.";

                // // Define custom validation attribute names
                // $attributes["max_marks.{$fieldPrefix}"] = "Max Marks for Question {$question->id}";
                // $attributes["marks_obtained.{$fieldPrefix}"] = "Marks Obtained for Question {$question->id}";
                // $attributes["remarks.{$fieldPrefix}"] = "Remarks for Question {$question->id}";
            }

            // Create the validator instance
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }




            $totalTotalMarks = 0;
            $totalObtainedMarks = 0;


            foreach ($questions as  $question) {
               foreach ($finalResponses as  $SubjectiveResponse) {
                    if($SubjectiveResponse->question_id === $question->id){
                        $SubjectiveResponse->total_marks = $request->max_marks[$question->id];
                        $SubjectiveResponse->obtained_marks = $request->marks_obtained[$question->id];
                        $SubjectiveResponse->remarks = $request->remarks[$question->id];
                        $SubjectiveResponse->checked_by = session('userid')->id;
                        $SubjectiveResponse->checked = session('userid')->id;
                        $SubjectiveResponse->save();
                        $totalTotalMarks += $SubjectiveResponse->total_marks;
                        $totalObtainedMarks += $SubjectiveResponse->obtained_marks;
                    }
               }
            }
            $response->total_marks = $totalTotalMarks;
            $response->obtained_marks = $totalObtainedMarks;
            $response->status = 1;
            $response->save();

            return redirect(url('tutor/onlinetestresponseslist'))->with('success','Marks Submitted');

        }

    }



    //  Tutor online tests

    public function tutorindex()
    {
        $testlists = OnlineTests::select('*', 'online_tests.id as test_id', 'online_tests.name as test_name', 'online_tests.description as test_description', 'online_tests.is_active as test_status', 'classes.name as class_name', 'subjects.name as subject_name', 'topics.name as topic_name')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            ->join('topics', 'topics.id', 'online_tests.topic_id')
            ->paginate(10);
        $classes = classes::where('is_active',1)->get();
        $subjects = subjects::where('is_active',1)->get();
        $topics = topics::where('is_active',1)->get();

        return view('tutor.tutor-onlinetestlist',get_defined_vars());
    }

    public function tutorcreate()
    {
        $classes = (new CommonController)->classes();
        return view('tutor.tutor-onlinetestnew', compact('classes'));
    }
    public function tutorstore(Request $request)
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
        $data->test_type = $request->test_type;
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
    public function tutorfetchquestions(Request $request)
    {
        // echo $request->topic_id;

        $questions = questionbank::select('*')
            ->where('topic_id', $request->topic_id)
            ->where('type', $request->type)
            ->where('is_active', 1)
            ->get();

        return $questions;
    }
    public function tutorviewquestions($id)
    {
        // Fetch question details based on testid -> Using jQuerry
        $data['questions'] = OnlineTests::where("id", $id)->first();
        return response()->json($data);
    }
    public function tutoredit($id)
    {
        $tdata = OnlineTests::select('*')->where('id', $id)->first();
        $classes = (new CommonController)->classes();
        $subjects = subjects::select('*')->where('class_id', $tdata->class_id)->where('is_active', 1)->get();
        $topics = topics::select('*')->where('subject_id', $tdata->subject_id)->where('is_active', 1)->get();
        $questions = questionbank::select('*')->where('topic_id', $tdata->topic_id)->where('is_active', 1)->get();
        $questiondatas = OnlineTests::select('question_id')->where('id', $tdata->id)->first();

        // $questiondata = explode(',', $tdata->question_id);
        // $data = ModelName::find($id);
        $qstn = explode('"', $tdata->question_id);
        // return view('package.edit', ['data' => $data,'months' => $SelectedMonths]);
        // foreach($prodmulti as $test)
        // echo $months ;
        // echo "<pre>";
        // dd($months);
        // endforeach
        // $keywords = preg_split('/[\s,-,"]+/', $tdata->question_id);
        // dd($months);
        return view('tutor.tutor-onlinetestnew', compact(['tdata', 'classes', 'subjects', 'topics', 'questions', 'questiondatas', 'qstn']));
    }

    public function tutorstatus(Request $request){
        $data = OnlineTests::find($request->id);
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

    public function tutoronlinetestSearch(Request $request)
    {
        // return $request->all();
        $query = OnlineTests::select('*', 'online_tests.id as test_id', 'online_tests.name as test_name', 'online_tests.description as test_description', 'online_tests.is_active as test_status', 'classes.name as class_name', 'subjects.name as subject_name', 'topics.name as topic_name')
            ->join('classes', 'classes.id', 'online_tests.class_id')
            ->join('subjects', 'subjects.id', 'online_tests.subject_id')
            ->join('topics', 'topics.id', 'online_tests.topic_id');
            // ->get();
        if ($request->test_name) {
            $query->where('online_tests.name','like', '%' . $request->test_name . '%');
        }
        if ($request->class_name) {
            $query->where('online_tests.class_id', $request->class_name);
        }
        if ($request->subject_name) {
            $query->where('online_tests.subject_id', $request->subject_name);
        }
        if ($request->topic_name) {
            $query->where('online_tests.topic_id', $request->topic_name);
        }
        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(online_tests.test_start_date)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(online_tests.test_end_date)'), '<=', $request->end_date);
        }
        if ($request->status_field) {
            if($request->status_field=='2'){
                $request->status_field = '0';
            }
            $query->where('online_tests.is_active',$request->status_field);
        }
        $onlinetestlists = $query->paginate(10);
        $type = 'tutor-testlists';
        $viewTable = view('admin.partials.students-tutor-search', compact('onlinetestlists','type'))->render();
        $viewPagination = $onlinetestlists->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);


    }


    // operations with subjective data
    public function  storeSubjectiveDataInTemporaryTable(Request $request){
// dd($request->all());
        $testId = $request->input('testId');
        $questionId = $request->input('questionId');
        $answer = $request->input('answer'); // Assuming 'answer' is the name of the input field
        $data = TemporarySubjective::where('std_id',session('userid')->id)->where('test_id',$testId)->where('question_id', $questionId)->first();
        if($data){
            $answerSave = $data;
        }else{
            $answerSave = new TemporarySubjective;
        }
        $answerSave->std_id = session('userid')->id;
        $answerSave->test_id = $testId;
        $answerSave->question_id = $questionId;
        $answerSave->answer = $answer;
        $answerSave->save();
        if($request->nextQuestionId != null){
            $nextanswer = TemporarySubjective::where('std_id',session('userid')->id)->where('test_id',$testId)->where('question_id', $request->nextQuestionId) ->value('answer');
        }else{
            $nextanswer = null;
        }
        return response()->json(['message' => 'Data stored successfully','nextAnswer'=>$nextanswer]);
    }

    public function  getAnswerFromSubjectiveTempTable(Request $request){

        $testId = $request->input('testId');
        $questionId = $request->input('questionId');
        $answer = TemporarySubjective::where('std_id',session('userid')->id)->where('test_id',$testId)->where('question_id', $questionId) ->value('answer');
        return response()->json(['answer' => $answer]);

    }
}
