<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\studentregistration;
use App\Models\tutorregistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
class HomeController extends Controller
{
    public function index()
    {
        $classes = classes::all('id', 'name');
        // dd($classes);
        return view('front-cms.index', compact('classes'));
        // return view('front-cms.index', compact('classes'));
    }
    public function registration(Request $request)
    {

        if ($request->id == "1") {
            $request->validate([
                'studentmobile' => 'required|min:4|max:11',
                'class' => 'required',
            ]);

            $user = new studentregistration();
            $user->mobile = $request->studentmobile;
            $user->role_id = "3";
            $user->class_id = $request->class;
        } else {
            $request->validate([
                'tutormobile' => 'required|min:4|max:11'
            ]);

            $user = new tutorregistration();
            $user->mobile = $request->tutormobile;
            $user->role_id = "2";
        }
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'min:4|required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'min:4',


        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_active = "0";
        $user->password = Hash::make($request->password);

        $res = $user->save();
        if ($res) {
            return back()->with('success', 'Registration successfull');
            // return redirect('student/dashboard');
        } else {
            return back()->with('fail', 'Registration failed');
        }
    }
 
    // Login Controller Code

    public function login(Request $request)
    {
        
        $request->validate([
            'username' => 'required',
            'loginpassword' => 'required',
        ]);
        // dd($request->mobile);
        if ($request->loginid == "1") {
            $user = studentregistration::where('mobile', '=', $request->username)->first();;
        }
        if ($request->loginid == "2") {
            $user = tutorregistration::where('mobile', '=', $request->username)->first();;
        }


        if ($user) {
            if (Hash::check($request->loginpassword, $user->password)) {
                //  event(new Registered($user));

                $user_role = Auth::user();
                // dd($user->role_id);
                $request->session()->put('userid',$user);

                switch ($user->role_id) {
                    case 1:
                        echo "Admin - Under development";
                        dd($user->role_id);
                        break;
                    case 2:
                        return redirect('tutor/dashboard');
                    case 3:
                        return redirect('student/dashboard');
                    case 4:
                        echo "Parent";
                        dd($user->role_id);

                        break;
                }
                // return redirect(RouteServiceProvider::HOME);
            }
            return back()->with('fail', 'Password does not match');
        } else {
            return back()->with('fail', 'Mobile No. Not Registered');
        }
    }
    // Logout Controller
public function logout(){

    if(session()->has('userid')){
        session()->pull('userid');
        return redirect('/');
    }
    else{
        return redirect('/');
    }
}
}
