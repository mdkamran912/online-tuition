<?php

namespace App\Http\Controllers\tutor;

use App\Http\Controllers\Controller;
use App\Models\classschedule;
use Illuminate\Http\Request;

class ClassScheduleController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'batchid' => 'required',
            'topic' => 'required',
            'classlink' => 'required',
            'classstarttime' => 'required',
            'classendtime' => 'required'
        ]);
        $data = new classschedule();
        $data->batch_id = $request->batchid;
        $data->topic_id = $request->topic;
        $data->tutor_id = session('userid')->id;
        $data->class_link = $request->classlink;
        $data->start_time = $request->classstarttime;
        $data->end_time = $request->classendtime;

        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Class scheduled successfully');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }
}
