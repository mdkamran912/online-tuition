<?php

namespace App\Http\Controllers;

use App\Models\StudentAssignmentList;
use App\Models\StudentAssignments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentsController extends Controller
{
    public function adminindex()
    {
        $data = StudentAssignmentList::select('*', 'student_assignment_lists.id as assignment_id', 'student_assignment_lists.name as assignment_name', 'student_assignment_lists.student_id as assigned_to', 'student_assignment_lists.is_active as assignment_status', 'classes.name as class_name', 'subjects.name as subject_name', 'topics.name as topic_name', 'tutorregistrations.name as tutor_name', 'tutorregistrations.id as tutor_id')
            ->join('classes', 'classes.id', 'student_assignment_lists.class_id')
            ->join('subjects', 'subjects.id', 'student_assignment_lists.subject_id')
            ->join('topics', 'topics.id', 'student_assignment_lists.topic_id')
            ->join('tutorregistrations', 'tutorregistrations.id', 'student_assignment_lists.assigned_by')
            ->paginate(10);
        return view('admin.assignmentslist', compact('data'));
    }

    public function status(Request $request)
    {
        // echo 'Test';
        // echo $request->id;
        // echo $request->status;
        // dd();
        $data = StudentAssignmentList::find($request->id);
        if ($request->status == 1) {
            $status = 0;
        }
        if ($request->status == 0) {
            $status = 1;
        }
        $data->is_active = $status;

        $res = $data->save();
        return json_encode(array('statusCode' => 200));
    }

    public function view($id)
    {

        // $datas = StudentAssignments::find($id);
        $datas = StudentAssignments::select('*', 'student_assignment_lists.name as assignment_name', 'studentregistrations.id as student_id', 'studentregistrations.name as student_name')
            ->join('student_assignment_lists', 'student_assignment_lists.id', 'student_assignments.assignment_id')
            ->join('studentregistrations', 'studentregistrations.id', 'student_assignments.submitted_by')
            ->get();
        return view('admin.assignments', compact('datas'));
    }

    public function tutorassignments()
    {
        $classes = (new CommonController)->classes();
        $assignments = StudentAssignmentList::select('*', 'student_assignment_lists.id as assignment_id', 'student_assignment_lists.name as assignment_name', 'subjects.name as subject', 'classes.name as class', 'topics.name as topic', 'batches.name as batch')
            ->join('subjects', 'subjects.id', 'student_assignment_lists.subject_id')
            ->join('classes', 'classes.id', 'student_assignment_lists.class_id')
            ->join('topics', 'topics.id', 'student_assignment_lists.topic_id')
            ->join('batches', 'batches.id', 'student_assignment_lists.batch_id')
            ->where('student_assignment_lists.is_active', 1)
            ->where('student_assignment_lists.assigned_by', session('userid')->id)->get();
        return view('tutor.assignments', compact('assignments', 'classes'));
    }

    public function tutorview($id)
    {

        // $datas = StudentAssignments::find($id);
        $datas = StudentAssignments::select('*', 'student_assignment_lists.name as assignment_name', 'studentregistrations.id as student_id', 'studentregistrations.name as student_name')
            ->join('student_assignment_lists', 'student_assignment_lists.id', 'student_assignments.assignment_id')
            ->join('studentregistrations', 'studentregistrations.id', 'student_assignments.submitted_by')
            ->where('assignment_id', $id)
            ->get();
        return view('tutor.assignmentsubmissions', compact('datas'));
    }

    public function tutorassignmentscreate(Request $request)
    {

        $request->validate([
            'class' => 'required',
            'subject' => 'required',
            'batchid' => 'required',
            'topic' => 'required',
            // 'assigupload'=>'required',
            'assignname' => 'required',
            'assigndesc' => 'required',
            'assigstartdate' => 'required',
            'assigenddate' => 'required',
        ]);

        if ($request->id) {
            $data = StudentAssignmentList::find($request->id);
            $msg = 'Assignment updated successfully!';
        } else {
            $data = new StudentAssignmentList();
            $msg = 'Assignment added successfully';
        }
        $data->class_id = $request->class;
        $data->subject_id = $request->subject;
        $data->batch_id = $request->batchid;
        $data->topic_id = $request->topic;
        $data->student_id = '0';
        $data->assigned_by = session('userid')->id;
        $data->name = $request->assignname;
        $data->assignment_description = $request->assigndesc;
        if ($request->assigupload) {
            $contentlink = time() . '.' . $request->assigupload->extension();
            $request->assigupload->move(public_path('uploads/documents/assignments'), $contentlink);
            $data->assignment_link = $contentlink;
        }
        $data->assignment_start_date = $request->assigstartdate;
        $data->assignment_end_date = $request->assigenddate;

        $res = $data->save();
        if ($res) {
            return back()->with('success', $msg);
        } else {
            return back()->with('fail', 'Something went wrong. Please try again later');
        }
    }
    public function studentassignmentslist()
    {
        $classes = (new CommonController)->classes();
        $assignments = StudentAssignmentList::select('*', 'student_assignment_lists.id as assignment_id', 'student_assignment_lists.id as assignment_id', 'student_assignment_lists.name as assignment_name', 'subjects.name as subject', 'classes.name as class', 'topics.name as topic', 'batches.name as batch')
            ->join('subjects', 'subjects.id', 'student_assignment_lists.subject_id')
            ->join('classes', 'classes.id', 'student_assignment_lists.class_id')
            ->join('topics', 'topics.id', 'student_assignment_lists.topic_id')
            ->join('batches', 'batches.id', 'student_assignment_lists.batch_id')
            ->where('student_assignment_lists.is_active', 1)
            ->where('student_assignment_lists.class_id', session('userid')->class_id)
            // ->where('student_assignment_lists.student_id', session('userid')->id)
            ->get();

            $submissions = StudentAssignments::select('*')->where('submitted_by',session('userid')->id)->where('is_active',1)->get();
        return view('student.assignments', compact('assignments','submissions', 'classes'));
    }

    public function studentassignmentsupload(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'assigupload' => 'required',
        ]);

        $data = new StudentAssignments();
        $data->assignment_id = $request->id;
        if ($request->assigupload) {
            $contentlink = time() . '.' . $request->assigupload->extension();
            $request->assigupload->move(public_path('uploads/documents/assignments'), $contentlink);
            $data->submission_link = $contentlink;
        }

        $data->submitted_on = now();
        $data->submitted_by = session('userid')->id;
        $data->reamrks = $request->remarks;
        $data->is_active = '1';
        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Assignment submitted successfully');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }
}
