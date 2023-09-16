<?php

namespace App\Http\Controllers;

use App\Models\admin\admin;
use App\Models\ch_messages;
use App\Models\studentprofile;
use App\Models\studentregistration;
use App\Models\tutorprofile;
use App\Models\tutorregistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{

    // Messages by tutor
    public function messagesbytutor()
    {
        $userlists = studentregistration::select('studentregistrations.*')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('is_active', 1)->get();

        return view('tutor.message', compact('userlists'));
    }
    public function messagesbytutoradmins()
    {
        $userlists = admin::select('*')
            ->where('is_active', 1)->get();

        return view('tutor.message', compact('userlists'));
    }
    public function messagesbytutorstudents()
    {
        $userlists = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('is_active', 1)->get();

        return view('tutor.message', compact('userlists'));
    }

    public function messagesbytutoradminmessages($id)
    {
        $userlists = admin::select('*')
            ->where('is_active', 1)->get();
        $header = admin::select('*')->where('id', $id)->first();
        $profile_pics = tutorprofile::select('profile_pic')->where('tutor_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = DB::table('ch_messages')
            ->where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->get();

        // dd($messages);
        return view('tutor.message', compact('userlists', 'header', 'messages', 'profile_pics'));
    }

    public function messagesbytutorstudentmessages($id)
    {
        $userlists = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('is_active', 1)->get();
        $header = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('studentregistrations.is_active', 1)->where('studentregistrations.id', $id)
            ->first();
        $profile_pics = tutorprofile::select('profile_pic')->where('tutor_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = DB::table('ch_messages')
            ->where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->get();



        return view('tutor.message', compact('userlists', 'header', 'messages', 'profile_pics'));
    }

    public function messagesentbytutor(Request $request)
    {

        $request->validate([
            'receiver_role_id' => 'required',
            'receiver_id' => 'required',
            'message' => 'required'
        ]);

        $data = new ch_messages();

        $data->from_id = session('userid')->id;
        $data->from_role_id = session('userid')->role_id;
        $data->to_id = $request->receiver_id;
        $data->to_role_id = $request->receiver_role_id;
        $data->body = $request->message;
        $data->seen = "0";

        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Message sent successfully!');
            // return redirect('student/dashboard');
        } else {
            return back()->with('fail', 'Message sending failed');
        }
    }

    // Messages by student
    public function messagesbystudent()
    {
        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('is_active', 1)->get();

        return view('student.message', compact('userlists'));
    }
    public function messagesbystudentadmins()
    {
        $userlists = admin::select('*')
            ->where('is_active', 1)->get();

        return view('student.message', compact('userlists'));
    }
    public function messagesbystudenttutor()
    {
        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('is_active', 1)->get();

        return view('student.message', compact('userlists'));
    }

    public function messagesbystudentadminmessages($id)
    {
        $userlists = admin::select('*')
            ->where('is_active', 1)->get();
        $header = admin::select('*')->where('id', $id)->first();
        $profile_pics = studentprofile::select('profile_pic')->where('student_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = DB::table('ch_messages')
            ->where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->get();

        // dd($messages);
        return view('student.message', compact('userlists', 'header', 'messages', 'profile_pics'));
    }

    public function messagesbystudenttutormessages($id)
    {

        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('is_active', 1)->get();
        $header = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('tutorregistrations.is_active', 1)->where('tutorregistrations.id', $id)
            ->first();


        $profile_pics = studentprofile::select('profile_pic')->where('student_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = DB::table('ch_messages')
            ->where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->get();



        return view('student.message', compact('userlists', 'header', 'messages', 'profile_pics'));
    }
    public function messagesentbystudent(Request $request)
    {

        $request->validate([
            'receiver_role_id' => 'required',
            'receiver_id' => 'required',
            'message' => 'required'
        ]);

        $data = new ch_messages();

        $data->from_id = session('userid')->id;
        $data->from_role_id = session('userid')->role_id;
        $data->to_id = $request->receiver_id;
        $data->to_role_id = $request->receiver_role_id;
        $data->body = $request->message;
        $data->seen = "0";

        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Message sent successfully!');
            // return redirect('student/dashboard');
        } else {
            return back()->with('fail', 'Message sending failed');
        }
    }


    // Messages by admin
    public function messagesbyadmin()
    {
        $userlists = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('is_active', 1)->get();

        return view('admin.message', compact('userlists'));
    }
    public function messagesbyadminstudents()
    {
        $userlists = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('is_active', 1)->get();

        return view('admin.message', compact('userlists'));
    }
    public function messagesbyadmintutor()
    {
        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('is_active', 1)->get();

        return view('admin.message', compact('userlists'));
    }

    public function messagesbyadminstudentmessages($id)
    {
        $userlists = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('is_active', 1)->get();
        $header = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('studentregistrations.is_active', 1)->where('studentregistrations.id', $id)
            ->first();
        $profile_pics = studentprofile::select('profile_pic')->where('student_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages =  ch_messages::
            where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
                    // ->whereNull('deleted_at');
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
                    // ->whereNull('deleted_at');
            })
            ->get();

        // dd($messages);
        return view('admin.message', compact('userlists', 'header', 'messages', 'profile_pics'));
    }

    public function chatClearAdminstudent($id)
    {

        // dd('test');
        $header = studentregistration::select('studentregistrations.*', 'studentprofiles.profile_pic as profile_pic')
            ->join('studentprofiles', 'studentprofiles.student_id', 'studentregistrations.id')
            ->where('studentregistrations.is_active', 1)->where('studentregistrations.id', $id)
            ->first();

        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = ch_messages::
            where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->delete();

            return back()->with('success', 'Chat cleared successfully!');

    }



    public function messagesbyadmintutormessages($id)
    {

        $userlists = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('is_active', 1)->get();
        $header = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('tutorregistrations.is_active', 1)->where('tutorregistrations.id', $id)
            ->first();


        $profile_pics = studentprofile::select('profile_pic')->where('student_id', session('userid')->id)->first();


        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = ch_messages::
            where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->get();



        return view('admin.message', compact('userlists', 'header', 'messages', 'profile_pics'));
    }
    public function chatClearAdmintutor($id)
    {


        $header = tutorregistration::select('tutorregistrations.*', 'tutorprofiles.profile_pic as profile_pic')
            ->join('tutorprofiles', 'tutorprofiles.tutor_id', 'tutorregistrations.id')
            ->where('tutorregistrations.is_active', 1)->where('tutorregistrations.id', $id)
            ->first();

        $senderId = session('userid')->id;
        $receiverId = $id;
        $senderRoleId = session('userid')->role_id;
        $receiverRoleId = $header->role_id;

        $messages = ch_messages::
            where(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $senderId)
                    ->where('to_id', $receiverId)
                    ->where('from_role_id', $senderRoleId)
                    ->where('to_role_id', $receiverRoleId);
            })
            ->orWhere(function ($query) use ($senderId, $receiverId, $senderRoleId, $receiverRoleId) {
                $query->where('from_id', $receiverId)
                    ->where('to_id', $senderId)
                    ->where('from_role_id', $receiverRoleId)
                    ->where('to_role_id', $senderRoleId);
            })
            ->delete();

        return back()->with('success', 'Chat cleared successfully!');

    }
    public function messagesentbyadmin(Request $request)
    {

        $request->validate([
            'receiver_role_id' => 'required',
            'receiver_id' => 'required',
            'message' => 'required'
        ]);

        $data = new ch_messages();

        $data->from_id = session('userid')->id;
        $data->from_role_id = session('userid')->role_id;
        $data->to_id = $request->receiver_id;
        $data->to_role_id = $request->receiver_role_id;
        $data->body = $request->message;
        $data->seen = "0";

        $res = $data->save();
        if ($res) {
            return back()->with('success', 'Message sent successfully!');
            // return redirect('student/dashboard');
        } else {
            return back()->with('fail', 'Message sending failed');
        }
    }
}
