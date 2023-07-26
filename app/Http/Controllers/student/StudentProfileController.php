<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\studentachievement;
use App\Models\studentprofile;
use App\Models\studentregistration;
use App\Models\studentreviews;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StudentProfileController extends Controller
{
    public function index()
    {

        $student = studentregistration::select('*', 'studentregistrations.name as name', 'studentregistrations.mobile as mobile', 'studentregistrations.email as email', 'classes.name as gradename')
            ->join('studentprofiles', 'studentprofiles.student_id', '=', 'studentregistrations.id')
            ->join('classes', 'classes.id', '=', 'studentregistrations.class_id')
            ->where('studentregistrations.id', '=', session('userid')->id)
            ->first();
        $achievement = studentachievement::select('*')
            ->where('student_id', '=', session('userid')->id)->get();

        $reviews = studentreviews::select('studentreviews.id', 'studentreviews.name', 'studentreviews.ratings', 'studentreviews.subject_id', 'studentreviews.student_id', 'subjects.name as subject')
            ->join('subjects', 'subjects.id', '=', 'studentreviews.subject_id')
            ->where('studentreviews.student_id', '=', session('userid')->id)->get();
        //     foreach($reviews as $achievement){

        //     echo $achievement;
        //     dd($achievement);
        // }

        if (!$student) {

            $dob = "";
        } else {
            $dob = Carbon::parse($student->dob)->format('j-F-Y');
        }

        return view('student.profile', compact('student', 'dob', 'achievement', 'reviews'));
    }
    public function edit($id)
    {

        $student = studentregistration::select('*', 'studentregistrations.name as name', 'studentregistrations.mobile as mobile', 'studentregistrations.email as email', 'classes.name as gradename')
            ->join('studentprofiles', 'studentprofiles.student_id', '=', 'studentregistrations.id')
            ->join('classes', 'classes.id', '=', 'studentregistrations.class_id')
            ->where('studentregistrations.id', '=', session('userid')->id)
            ->first();
        $achievement = studentachievement::select('*')
            ->where('student_id', '=', session('userid')->id)->get();

        $reviews = studentreviews::select('studentreviews.id', 'studentreviews.name', 'studentreviews.ratings', 'studentreviews.subject_id', 'studentreviews.student_id', 'subjects.name as subject')
            ->join('subjects', 'subjects.id', '=', 'studentreviews.subject_id')
            ->where('studentreviews.student_id', '=', session('userid')->id)->get();
        //     foreach($reviews as $achievement){

        //     echo $achievement;
        //     dd($achievement);
        // }
            // echo $student;
            // dd($student);
        if (!$student) {

            $dob = "";
        } else {
            $dob = Carbon::parse($student->dob)->format('j-F-Y');
        }

        return view('student.profileupdate', compact('student', 'dob', 'achievement', 'reviews'));
    }

    // return view('student.profileupdate');

    public function updateprofiledata(Request $request)
    {
        // echo $request->profileid;
        // dd($request);
        $student = studentprofile::select('*')->where('student_id', '=', session('userid')->id)->first();
        if ($student) {
            $ppic = studentprofile::find($student->id)->first();
        } else {
            $ppic = new studentprofile();
        }
        $ppic->student_id = session('userid')->id;
        $ppic->name = session('userid')->name;
        $ppic->dob = $request->dob;
        $ppic->gender = $request->gender;
        $ppic->grade = session('userid')->class_id;
        $ppic->mobile = session('userid')->mobile;
        $ppic->email = session('userid')->email;
        $ppic->secondary_mobile = $request->secmobile;
        $ppic->school_name = $request->school;
        $ppic->fathers_name = $request->fname;
        $ppic->mothers_name = $request->mname;
        if($request->file){
        $imageName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('images/students/profilepics'), $imageName);
        $ppic->profile_pic = $imageName;
    }
    $res = $ppic->save();
        if ($res) {
            return back()->with('success', 'Profile updated successfully');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }

    public function studentacadd(Request $request){
        
        $request->validate([
            'achievementName'=>'required',
            'achievementDesc'=>'required',
        ]);
        $achv = new studentachievement();
        $achv->name = $request->achievementName;
        $achv->description = $request->achievementDesc;
        $achv->date = $request->achDate;
        $achv->student_id = session('userid')->id;
        $res = $achv->save();
        if ($res) {
            return back()->with('success', 'Achievement added successfully');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }
    public function studentacdel($id){
        $achv =  DB::delete('delete from studentachievements where id = ?',[$id]);
        // $achv = studentachievement::find($id)->first();
        // echo $achv;
        // dd();
        // $res = $achv->save();
        if ($achv) {
            return back()->with('success', 'Achievement deleted successfully');
        } else {
            return back()->with('fail', 'Something went wrong, please try again later');
        }
    }

    public function studentprofile($id)
    {

        $student = studentregistration::select('*', 'studentregistrations.name as name', 'studentregistrations.mobile as mobile', 'studentregistrations.email as email', 'classes.name as gradename')
            ->join('studentprofiles', 'studentprofiles.student_id', '=', 'studentregistrations.id')
            ->join('classes', 'classes.id', '=', 'studentregistrations.class_id')
            ->where('studentregistrations.id', '=', $id)
            ->first();
        $achievement = studentachievement::select('*')
            ->where('student_id', '=', $id)->get();

        $reviews = studentreviews::select('studentreviews.id', 'studentreviews.name', 'studentreviews.ratings', 'studentreviews.subject_id', 'studentreviews.student_id', 'subjects.name as subject')
            ->join('subjects', 'subjects.id', '=', 'studentreviews.subject_id')
            ->where('studentreviews.student_id', '=', $id)->get();
        //     foreach($reviews as $achievement){

        //     echo $achievement;
        //     dd($achievement);
        // }

        if (!$student) {

            $dob = "";
        } else {
            $dob = Carbon::parse($student->dob)->format('j-F-Y');
        }

        return view('student.profile', compact('student', 'dob', 'achievement', 'reviews'));
    }

    public function studentslist(){
        $stdlists = studentregistration::select('*','studentregistrations.id as student_id','studentregistrations.name as student_name','studentregistrations.mobile as student_mobile','studentregistrations.email as student_email','studentregistrations.is_active as student_status','classes.name as class_name')
        ->join('classes','classes.id','=','studentregistrations.class_id')->get();
        return view('admin.students', compact('stdlists'));

    }
    public function status(Request $request){
        $data = studentregistration::find($request->id);
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
