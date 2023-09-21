<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function index(){
        $classes = (new CommonController)->classes();
        return view('tutor.feedback',compact('classes'));
    }


    public function tutorsubmitstudentreview(Request $request)
    {

        $validator =$request->validate([

        ]);
        $validator = Validator::make($request->all(),
        [
            'batchid' => 'required',
            'subject' => 'required',
            'class' => 'required',
            'student' => 'required',
            'rating' => 'required',
            'comments' => 'required',
        ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422); // 422 Unprocessable Entity status code for validation errors
    }

        $data = new tutorreviews();
        $data->name = $request->comments;
        $data->ratings = $request->rating;
        $data->subject_id = $request->subject_id;
        $data->tutor_id = $request->tutor_id;
        $data->student_id = session('userid')->id;

        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Feedback submitted successfully!');
        } else {
            return back()->with('fail', 'Feedback submission failed!');
        }
    }




}
