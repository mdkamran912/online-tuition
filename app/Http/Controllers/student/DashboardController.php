<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\studentprofile;
use Illuminate\Http\Request;
use App\Models\tutorprofile;
use App\Models\democlasses;
use App\Models\subjects;
use App\Models\zoom_classes;
use App\Models\OnlineTests;
use Illuminate\Support\Carbon;
use App\Models\payments\paymentdetails;

class DashboardController extends Controller
{
    public function index(){

        $targetValue = session('userid')->id;
        $studentpro = studentprofile::select('*')->where('student_id', '=', session('userid')->id)->first();
        $subjects_enrolled = paymentdetails::join('paymentstudents', 'paymentstudents.transaction_id', 'paymentdetails.transaction_id')
                    ->where('paymentstudents.student_id', session('userid')->id)
                    ->groupBy('paymentstudents.subject_id')
                    ->selectRaw('paymentstudents.subject_id, COUNT(*) as subject_count')
                    ->get();
        $atendedclasses = zoom_classes::join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
                                        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
                                        ->where('zoom_classes.is_active',1)
                                        ->where('zoom_classes.status','like', '%completed%')
                                        ->where('zoom_classes.is_completed',1)
                                        ->count();
        $non_atendedclasses = zoom_classes::join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
                                        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
                                        ->where('zoom_classes.is_active',1)
                                        ->where('zoom_classes.status','like', '%waiting%')
                                        ->where('zoom_classes.is_completed',0)
                                        ->count();
        $classes_purchased = paymentdetails::join('paymentstudents', 'paymentstudents.transaction_id', 'paymentdetails.transaction_id')
                                            ->where('paymentstudents.student_id', session('userid')->id)->sum('classes_purchased');
        $upcomingClasses = zoom_classes::join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
                                        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
                                        ->where('start_time', '>', Carbon::now())
                                        ->orderBy('start_time', 'asc') // Order by start_time in ascending order
                                        ->take(5) // Limit to the latest 5
                                        ->get();
        $upcomingClasses->transform(function ($class) {
            $class->start_time = Carbon::parse($class->start_time); // Convert start_time to Carbon
            return $class;
        });

        $upcomingQuizes = OnlineTests::
        // where('class_id',session('userid')->class_id)
        where('test_start_date', '>', Carbon::now())->orderBy('test_start_date', 'asc')
                                       ->take(5)->get();
        $upcomingQuizes->transform(function ($quiz) {
            $quiz->test_start_date = Carbon::parse($quiz->test_start_date);
            $quiz->test_end_date = Carbon::parse($quiz->test_end_date);
            return $quiz;
        });
        $latest_payments = paymentdetails::leftjoin('paymentstudents','paymentstudents.transaction_id','paymentdetails.transaction_id')
                    ->leftjoin('subjects','subjects.id','paymentstudents.subject_id')->where('paymentstudents.student_id', '=', session('userid')->id)->orderBy('payment_date', 'desc')->take(5)->get();
        $latest_payments->transform(function ($payment) {
            $payment->payment_date = Carbon::parse($payment->payment_date);
            return $payment;
        });

        $classes = zoom_classes::join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
                    ->join('topics', 'topics.id', 'zoom_classes.topic_id')
                    ->join('subjects', 'subjects.id', 'topics.subject_id')
                    // ->where('zoom_classes.is_completed',0)
                    ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
                    ->groupBy('subjects.id')
                    ->selectRaw('subjects.id, COUNT(*) as subject_count')
                    ->get();



        $totalclassesTaken =  zoom_classes::join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")->count();

        $subjectData = [];
        foreach ($classes as $demo) {
            $subjectName = subjects::find($demo->id)->name;
            $subjectCount = $demo->subject_count;
            $percentage = ($subjectCount / $totalclassesTaken) * 100;
            $subjectData[] = [
                'subject_id' => $demo->id,
                'subject_name' => $subjectName,
                'percentage' => $percentage,
            ];
        }

        return view('student.dashboard',get_defined_vars());
    }

    public function parent_dashboard(){

        $targetValue = session('userid')->id;
        $studentpro = studentprofile::select('*')->where('student_id', '=', session('userid')->id)->first();
        $subjects_enrolled = paymentdetails::join('paymentstudents', 'paymentstudents.transaction_id', 'paymentdetails.transaction_id')
                    ->where('paymentstudents.student_id', session('userid')->id)
                    ->groupBy('paymentstudents.subject_id')
                    ->selectRaw('paymentstudents.subject_id, COUNT(*) as subject_count')
                    ->get();
        $atendedclasses = zoom_classes::join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
                                        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
                                        ->where('zoom_classes.is_active',1)
                                        ->where('zoom_classes.status','like', '%completed%')
                                        ->where('zoom_classes.is_completed',1)
                                        ->count();
        $non_atendedclasses = zoom_classes::join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
                                        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
                                        ->where('zoom_classes.is_active',1)
                                        ->where('zoom_classes.status','like', '%waiting%')
                                        ->where('zoom_classes.is_completed',0)
                                        ->count();
        $classes_purchased = paymentdetails::join('paymentstudents', 'paymentstudents.transaction_id', 'paymentdetails.transaction_id')
                                            ->where('paymentstudents.student_id', session('userid')->id)->sum('classes_purchased');
        $upcomingClasses = zoom_classes::join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
                                        ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
                                        ->where('start_time', '>', Carbon::now())
                                        ->orderBy('start_time', 'asc') // Order by start_time in ascending order
                                        ->take(5) // Limit to the latest 5
                                        ->get();
        $upcomingClasses->transform(function ($class) {
            $class->start_time = Carbon::parse($class->start_time); // Convert start_time to Carbon
            return $class;
        });

        $upcomingQuizes = OnlineTests::
        // where('class_id',session('userid')->class_id)
        where('test_start_date', '>', Carbon::now())->orderBy('test_start_date', 'asc')
                                       ->take(5)->get();
        $upcomingQuizes->transform(function ($quiz) {
            $quiz->test_start_date = Carbon::parse($quiz->test_start_date);
            $quiz->test_end_date = Carbon::parse($quiz->test_end_date);
            return $quiz;
        });
        $latest_payments = paymentdetails::leftjoin('paymentstudents','paymentstudents.transaction_id','paymentdetails.transaction_id')
                    ->leftjoin('subjects','subjects.id','paymentstudents.subject_id')->where('paymentstudents.student_id', '=', session('userid')->id)->orderBy('payment_date', 'desc')->take(5)->get();
        $latest_payments->transform(function ($payment) {
            $payment->payment_date = Carbon::parse($payment->payment_date);
            return $payment;
        });

        $classes = zoom_classes::join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')
                    ->join('topics', 'topics.id', 'zoom_classes.topic_id')
                    ->join('subjects', 'subjects.id', 'topics.subject_id')
                    // ->where('zoom_classes.is_completed',0)
                    ->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")
                    ->groupBy('subjects.id')
                    ->selectRaw('subjects.id, COUNT(*) as subject_count')
                    ->get();



        $totalclassesTaken =  zoom_classes::join('batchstudentmappings','batchstudentmappings.batch_id','zoom_classes.batch_id')->whereRaw("JSON_CONTAINS(batchstudentmappings.student_data, '\"$targetValue\"')")->count();

        $subjectData = [];
        foreach ($classes as $demo) {
            $subjectName = subjects::find($demo->id)->name;
            $subjectCount = $demo->subject_count;
            $percentage = ($subjectCount / $totalclassesTaken) * 100;
            $subjectData[] = [
                'subject_id' => $demo->id,
                'subject_name' => $subjectName,
                'percentage' => $percentage,
            ];
        }

        return view('parent.dashboard',get_defined_vars());
    }
}
