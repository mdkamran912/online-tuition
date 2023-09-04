<?php

namespace App\Http\Controllers;

use App\Models\classes;
use App\Models\studentregistration;
use App\Models\tutorregistration;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
            // $user->is_active = "1";
        } else {
            $request->validate([
                'tutormobile' => 'required|min:4|max:11'
            ]);

            $user = new tutorregistration();
            $user->mobile = $request->tutormobile;
            $user->role_id = "2";
            $user->is_active = "0";
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

    public function std_login()
    {
        return view('common.student-login');
    }
    // Logout Controller
    public function logout()
    {

        if (session()->has('userid')) {
            session()->pull('userid');
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    // Student Calls
    public function student_login(Request $request)
    {


        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // dd($request->mobile);
        // if ($request->loginid == "1") {
        $user = studentregistration::where('mobile', '=', $request->username)->first();
        // }
        // if ($request->loginid == "2") {
        //     $user = tutorregistration::where('mobile', '=', $request->username)->first();
        // }


        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                //  event(new Registered($user));

                $user_role = Auth::user();
                // dd($user->role_id);
                $request->session()->put('userid', $user);

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
    public function std_registration()
    {

        return view('common.student-register');
    }
    public function student_registration_form(Request $request)
    {


        // if ($request->id == "1") {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|min:4|max:11',
            'password' => 'required|min:8|max:50',
        ]);


        // $user->is_active = "1";
        // } else {
        //     $request->validate([
        //         'tutormobile' => 'required|min:4|max:11'
        //     ]);

        // $user = new tutorregistration();
        // $user->mobile = $request->tutormobile;
        // $user->role_id = "2";
        // $user->is_active = "0";

        // }
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'email|required',
        //     'password' => 'min:4|required_with:confirmpassword|same:confirmpassword',
        //     'confirmpassword' => 'min:4',


        // ]);
        $user = new studentregistration();
        $user->mobile = $request->mobile;
        $user->role_id = "3";
        $user->class_id = '0';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_active = "1";
        $user->password = Hash::make($request->password);

        $res = $user->save();

        $mobile = $request->mobile;
        $formattedDate = Carbon::now()->format('Y-m-d');
        // Generate a random 4-digit OTP
        $otp = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        $username = 'BhashWAPAI';
        $pass = '123456';
        $sender = 'BUZWAP';
        $phone = '+917004920897';
        $text = 'delivery';
        $priority = 'wa';
        $stype = 'normal';
        $params = $otp . ',' . $formattedDate;

        $url = "https://bhashsms.com/api/sendmsg.php?user=$username&pass=$pass&sender=$sender&phone=$phone&text=$text&priority=$priority&stype=$stype&params=$params";

        // Initialize Guzzle client
        $client = new Client();

        try {
            // Send GET request to the URL
            $response = $client->get($url);

            // Get the response body
            $responseBody = $response->getBody();

            // You can process the response here
            // For example, you can log the response or return it to the view
            response()->json(['message' => 'OTP sent successfully', 'response' => $responseBody]);
            // return view('common.tutor-mobile-verify');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the request
            return response()->json(['message' => 'OTP sending failed', 'error' => $e->getMessage()], 500);
        }

        if ($res) {

            $studentRegistration = studentregistration::where('mobile', $mobile)->first();
            $studentRegistration->mobile_otp = $otp;
            $studentRegistration->save();

            return view('common.student-mobile-verify', compact('mobile'))->with('success', 'Registration successful. Please Login Now To Access More Features.');

            // return redirect('student/dashboard');
        } else {
            return back()->with('fail', 'Registration failed');
        }
    }

    public function student_mobile_verify()
    {
        return view('common.student-mobile-verify');
    }

    public function verify_student_mobile(Request $request)
    {
        echo "test";
        // dd();
        $request->validate([
            'digit1_input' => 'required',
            'digit2_input' => 'required',
            'digit3_input' => 'required',
            'digit4_input' => 'required',
            'mobile' => 'required',

        ]);
        $userotp = $request->digit1_input . $request->digit2_input . $request->digit3_input . $request->digit4_input;
        // echo $otp;
        // dd();
        $otp = studentregistration::select('*')->where('mobile',$request->mobile)->first();
        if ($userotp == $otp->mobile_otp) {
            return view('common.student-mobile-verified')->with('success', 'OTP Verified');
        } else {

            return back()->with('fail', 'Invalid OTP. Please try again');
        }
    }

    // Tutor Calls

    public function ttr_login()
    {
        return view('common.tutor-login');
    }

    public function tutor_login(Request $request)
    {


        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // dd($request->mobile);
        // if ($request->loginid == "1") {
        $user = tutorregistration::where('mobile', '=', $request->username)->first();
        // }
        // if ($request->loginid == "2") {
        //     $user = tutorregistration::where('mobile', '=', $request->username)->first();
        // }


        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                //  event(new Registered($user));

                $user_role = Auth::user();
                // dd($user->role_id);
                $request->session()->put('userid', $user);

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
    public function ttr_registration()
    {

        return view('common.tutor-register');
    }
    public function tutor_registration_form(Request $request)
    {


        // if ($request->id == "1") {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|min:4|max:11',
            'password' => 'required|min:8|max:50',
        ]);


        // $user->is_active = "1";
        // } else {
        //     $request->validate([
        //         'tutormobile' => 'required|min:4|max:11'
        //     ]);

        // $user = new tutorregistration();
        // $user->mobile = $request->tutormobile;
        // $user->role_id = "2";
        // $user->is_active = "0";

        // }
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'email|required',
        //     'password' => 'min:4|required_with:confirmpassword|same:confirmpassword',
        //     'confirmpassword' => 'min:4',


        // ]);
        $user = new tutorregistration();
        $user->mobile = $request->mobile;
        $user->role_id = "2";
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_active = "0";
        $user->password = Hash::make($request->password);

        $res = $user->save();

        $mobile = $request->mobile;
        if ($res) {
            return view('common.tutor-mobile-verify', compact('mobile'))->with('success', 'Registration successful. Please Login Now To Access More Features.');

            // return redirect('student/dashboard');
        } else {
            return back()->with('fail', 'Registration failed');
        }
    }

    public function tutor_mobile_verify()
    {
        $user = 'BhashWAPAI';
        $pass = '123456';
        $sender = 'BUZWAP';
        $phone = '7004920897';
        $text = 'delivery';
        $priority = 'wa';
        $stype = 'normal';
        $params = '1195,23aug2023';

        $url = "https://bhashsms.com/api/sendmsg.php?user=$user&pass=$pass&sender=$sender&phone=$phone&text=$text&priority=$priority&stype=$stype&params=$params";

        // Initialize Guzzle client
        $client = new Client();

        try {
            // Send GET request to the URL
            $response = $client->get($url);

            // Get the response body
            $responseBody = $response->getBody();

            // You can process the response here
            // For example, you can log the response or return it to the view
            return view('common.tutor-mobile-verify')->with('success','OTP sent successfully');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the request
            return response()->json(['message' => 'OTP sending failed', 'error' => $e->getMessage()], 500);
        }
        // return view('common.tutor-mobile-verify');
    }

    public function verify_tutor_mobile(Request $request)
    {
        // echo "test";
        // dd();
        $request->validate([
            'digit1_input' => 'required',
            'digit2_input' => 'required',
            'digit3_input' => 'required',
            'digit4_input' => 'required',
            // 'mobile' => 'required',

        ]);
        $otp = $request->digit1_input . $request->digit2_input . $request->digit3_input . $request->digit4_input;
        echo $otp;
        // dd();

        if ($otp == '1234') {
            return view('common.tutor-mobile-verified')->with('success', 'OTP Verified');
        } else {

            return back()->with('fail', 'Invalid OTP. Please try again');
        }
    }
}
