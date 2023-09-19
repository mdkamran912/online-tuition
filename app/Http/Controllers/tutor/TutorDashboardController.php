<?php

namespace App\Http\Controllers\tutor;

use App\Http\Controllers\Controller;
use App\Models\tutorprofile;
use App\Models\democlasses;
use App\Models\subjects;
use Illuminate\Http\Request;
use App\Models\zoom_classes;
use App\Models\OnlineTests;
use Illuminate\Support\Carbon;
use App\Models\payments\paymentdetails;

class TutorDashboardController extends Controller
{
    public function index(){
        $studentpro = tutorprofile::select('*')
            ->where('tutor_id', '=', session('userid')->id)
            ->first();
        $pending_demos = democlasses::where('status',6)->where('tutor_id', '=', session('userid')->id)->count();
        $classes_taken = zoom_classes::where('zoom_classes.is_completed',1)->where('tutor_id', '=', session('userid')->id)->count();
        $moneyEarned = paymentdetails::join('paymentstudents', 'paymentstudents.transaction_id', 'paymentdetails.transaction_id')
                    ->where('tutor_id', session('userid')->id)
                    ->selectRaw('COUNT(DISTINCT student_id) as student_count, SUM(amount) as total_earned')
                    ->first();
        // democlasses taken and queries for percentage bar
        $demosTaken = democlasses::join('subjects', 'subjects.id', 'democlasses.subject_id')
                    ->where('democlasses.status', 4)
                    ->where('democlasses.tutor_id', '=', session('userid')->id)
                    ->groupBy('subjects.id')
                    ->selectRaw('subjects.id, COUNT(*) as subject_count')
                    ->get();
        $totalDemosTaken = democlasses::where('status', 4)->where('tutor_id', '=', session('userid')->id)->count();
        $subjectData = [];
        foreach ($demosTaken as $demo) {
            $subjectName = subjects::find($demo->id)->name;
            $subjectCount = $demo->subject_count;
            $percentage = ($subjectCount / $totalDemosTaken) * 100;
            $subjectData[] = [
                'subject_id' => $demo->id,
                'subject_name' => $subjectName,
                'percentage' => $percentage,
            ];
        }
        $upcomingClasses = zoom_classes::where('tutor_id', '=', session('userid')->id)
                            ->where('start_time', '>', Carbon::now())
                            ->orderBy('start_time', 'asc') // Order by start_time in ascending order
                            ->take(5) // Limit to the latest 5
                            ->get();
        $upcomingClasses->transform(function ($class) {
            $class->start_time = Carbon::parse($class->start_time); // Convert start_time to Carbon
            return $class;
        });
        $upcomingQuizes = OnlineTests::where('test_start_date', '>', Carbon::now())->orderBy('test_start_date', 'asc')
                                       ->take(5)->get();
        $upcomingQuizes->transform(function ($quiz) {
            $quiz->test_start_date = Carbon::parse($quiz->test_start_date);
            $quiz->test_end_date = Carbon::parse($quiz->test_end_date);
            return $quiz;
        });

        $latest_payments = paymentdetails::leftjoin('paymentstudents','paymentstudents.transaction_id','paymentdetails.transaction_id')
                    ->leftjoin('subjects','subjects.id','paymentstudents.subject_id')->where('paymentstudents.tutor_id', '=', session('userid')->id)->orderBy('payment_date', 'desc')->take(5)->get();
        $latest_payments->transform(function ($payment) {
            $payment->payment_date = Carbon::parse($payment->payment_date);
            return $payment;
        });

        $upcoming_demos = democlasses::where('slot_confirmed', '>', Carbon::now())->where('tutor_id', '=', session('userid')->id)->orderBy('slot_confirmed', 'asc')->take(5)->get();
        $upcoming_demos->transform(function ($demos) {
            $demos->slot_confirmed = Carbon::parse($demos->slot_confirmed);
            $demos->slot_1 = Carbon::parse($demos->slot_1);
            return $demos;
        });

        return view('tutor.dashboard',get_defined_vars());
    }
}
