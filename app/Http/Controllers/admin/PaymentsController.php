<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\payments\paymentdetails;
use App\Models\classes;
use App\Models\subjects;
use App\Models\studentregistration;
use App\Models\tutorregistration;
use App\Models\payments\paymentstudents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    public function index(){
        $statuses = (new CommonController)->status();
        $payments = paymentdetails::select('paymentdetails.id as transaction_id','paymentdetails.transaction_id as transaction_no','paymentdetails.payment_date as transaction_date','paymentdetails.payment_mode as payment_mode','paymentdetails.amount as transaction_amount','statuses.id as transaction_status_id','statuses.name as transaction_status','paymentdetails.remarks as remarks','studentregistrations.id as student_id','studentregistrations.name as student_name','classes.name as class_name','subjects.name as subject_name','tutorregistrations.id as tutor_id','tutorregistrations.name as tutor_name')
        ->join('paymentstudents','paymentstudents.transaction_id','paymentdetails.transaction_id')
        ->join('studentregistrations','studentregistrations.id','paymentstudents.student_id')
        ->join('classes','classes.id','studentregistrations.class_id')
        ->join('subjects','subjects.id','paymentstudents.subject_id')
        ->join('tutorregistrations','tutorregistrations.id','paymentstudents.tutor_id')
        ->join('statuses','statuses.id','paymentdetails.status')
        ->paginate(10);
        $subjects = subjects::where('is_active',1)->get();
        $classes = classes::where('is_active',1)->get();
        $students = studentregistration::where('is_active',1)->get();
        $tutors = tutorregistration::where('is_active',1)->get();
        $totalTransactionAmount = $payments->sum('transaction_amount');
        return view('admin.payments',get_defined_vars());
    }

    public function studentpaymentsreport(){
        $statuses = (new CommonController)->status();
        $payments = paymentdetails::select('paymentdetails.id as transaction_id','paymentdetails.transaction_id as transaction_no','paymentdetails.payment_date as transaction_date','paymentdetails.payment_mode as payment_mode','paymentdetails.amount as transaction_amount','statuses.id as transaction_status_id','statuses.name as transaction_status','paymentdetails.remarks as remarks','studentregistrations.id as student_id','studentregistrations.name as student_name','classes.name as class_name','subjects.name as subject_name','tutorregistrations.id as tutor_id','tutorregistrations.name as tutor_name')
        ->join('paymentstudents','paymentstudents.transaction_id','paymentdetails.transaction_id')
        ->join('studentregistrations','studentregistrations.id','paymentstudents.student_id')
        ->join('classes','classes.id','studentregistrations.class_id')
        ->join('subjects','subjects.id','paymentstudents.subject_id')
        ->join('tutorregistrations','tutorregistrations.id','paymentstudents.tutor_id')
        ->join('statuses','statuses.id','paymentdetails.status')
        ->paginate(10);
        $totalTransactionAmount = $payments->sum('transaction_amount');
        $subjects = subjects::where('is_active',1)->get();
        $classes = classes::where('is_active',1)->get();
        $students = studentregistration::where('is_active',1)->get();
        $tutors = tutorregistration::where('is_active',1)->get();
        return view('admin.studentpayments',get_defined_vars());
    }

    public function tutorpaymentsreport(){
        $statuses = (new CommonController)->status();
        $payments = paymentdetails::select('paymentdetails.id as transaction_id','paymentdetails.transaction_id as transaction_no','paymentdetails.payment_date as transaction_date','paymentdetails.payment_mode as payment_mode','paymentdetails.amount as transaction_amount','statuses.id as transaction_status_id','statuses.name as transaction_status','paymentdetails.remarks as remarks','classes.name as class_name','subjects.name as subject_name','tutorregistrations.id as tutor_id','tutorregistrations.name as tutor_name')
        ->join('tutorpayments','tutorpayments.transaction_id','paymentdetails.transaction_id')
        ->join('tutorregistrations','tutorregistrations.id','tutorpayments.tutor_id')
        ->join('classes','classes.id','tutorpayments.class_id')
        ->join('subjects','subjects.id','tutorpayments.subject_id')
        // ->join('tutorregistrations','tutorregistrations.id','paymentstudents.tutor_id')
        ->join('statuses','statuses.id','paymentdetails.status')
        ->paginate(10);
        $subjects = subjects::where('is_active',1)->get();
        $classes = classes::where('is_active',1)->get();
        $tutors = tutorregistration::where('is_active',1)->get();
        $totalTransactionAmount = $payments->sum('transaction_amount');
        return view('admin.tutorpayments',get_defined_vars());
    }

    // search functionality for payment details

    public function paymentSearch(Request $request)
    {
        $statuses = (new CommonController)->status();
        $query = paymentdetails::select('paymentdetails.id as transaction_id', 'paymentdetails.transaction_id as transaction_no', 'paymentdetails.payment_date as transaction_date', 'paymentdetails.payment_mode as payment_mode', 'paymentdetails.amount as transaction_amount', 'statuses.id as transaction_status_id', 'statuses.name as transaction_status', 'paymentdetails.remarks as remarks', 'studentregistrations.id as student_id', 'studentregistrations.name as student_name', 'classes.name as class_name', 'subjects.name as subject_name', 'tutorregistrations.id as tutor_id', 'tutorregistrations.name as tutor_name')
            ->join('paymentstudents', 'paymentstudents.transaction_id', 'paymentdetails.transaction_id')
            ->join('studentregistrations', 'studentregistrations.id', 'paymentstudents.student_id')
            ->join('classes', 'classes.id', 'studentregistrations.class_id')
            ->join('subjects', 'subjects.id', 'paymentstudents.subject_id')
            ->join('tutorregistrations', 'tutorregistrations.id', 'paymentstudents.tutor_id')
            ->join('statuses', 'statuses.id', 'paymentdetails.status');

        // Filter based on search parameters
        if ($request->student_name) {
            $query->where('paymentstudents.student_id', $request->student_name);
        }
        if ($request->class_name) {
            $query->where('paymentstudents.class_id', $request->class_name);
        }
        if ($request->subject_name) {
            $query->where('paymentstudents.subject_id', $request->subject_name);
        }
        if ($request->tutor_name) {
            $query->where('paymentstudents.tutor_id', $request->tutor_name);
        }
        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(paymentdetails.payment_date)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(paymentdetails.payment_date)'), '<=', $request->end_date);
        }
        if ($request->email) {
            $query->where('studentregistrations.email',  'like', '%' . $request->email . '%');
        }
        if ($request->mobile) {
            $query->where('studentregistrations.mobile',  'like', '%' . $request->mobile . '%');
        }
        if ($request->transaction_id) {
            $query->where('paymentdetails.transaction_id',  'like', '%' .$request->transaction_id . '%');
        }
        $payments = $query->paginate(10);
        $totalTransactionAmount = $payments->sum('transaction_amount');
        $viewTable = view('admin.partials.payments-search', compact('payments','totalTransactionAmount'))->render();
        $viewPagination = $payments->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);

        // $subjects = subjects::where('is_active', 1)->get();
        // $classes = classes::where('is_active', 1)->get();
        // $students = studentregistration::where('is_active', 1)->get();
        // $tutors = tutorregistration::where('is_active', 1)->get();

        // return view('admin.payments', get_defined_vars());
    }

    public function tutorPaymentSearch(Request $request)
    {
        $statuses = (new CommonController)->status();
        $query = paymentdetails::select('paymentdetails.id as transaction_id', 'paymentdetails.transaction_id as transaction_no', 'paymentdetails.payment_date as transaction_date', 'paymentdetails.payment_mode as payment_mode', 'paymentdetails.amount as transaction_amount', 'statuses.id as transaction_status_id', 'statuses.name as transaction_status', 'paymentdetails.remarks as remarks', 'classes.name as class_name', 'subjects.name as subject_name', 'tutorregistrations.id as tutor_id', 'tutorregistrations.name as tutor_name')
        ->join('tutorpayments','tutorpayments.transaction_id','paymentdetails.transaction_id')
        ->join('tutorregistrations','tutorregistrations.id','tutorpayments.tutor_id')
        ->join('classes','classes.id','tutorpayments.class_id')
        ->join('subjects','subjects.id','tutorpayments.subject_id')
        ->join('statuses','statuses.id','paymentdetails.status');


        // Filter based on search parameters
        if ($request->tutor_name) {
            $query->where('tutorpayments.tutor_id', $request->tutor_name);
        }

        if ($request->class_name) {
            $query->where('tutorpayments.class_id', $request->class_name);
        }
        if ($request->subject_name) {
            $query->where('tutorpayments.subject_id', $request->subject_name);
        }
        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(paymentdetails.payment_date)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(paymentdetails.payment_date)'), '<=', $request->end_date);
        }
        if ($request->email) {
            $query->where('tutorregistrations.email',  'like', '%' . $request->email . '%');
        }
        if ($request->mobile) {
            $query->where('tutorregistrations.mobile',  'like', '%' . $request->mobile . '%');
        }
        if ($request->transaction_id) {
            $query->where('paymentdetails.transaction_id',  'like', '%' .$request->transaction_id . '%');
        }
        $payments = $query->paginate(10);
        $totalTransactionAmount = $payments->sum('transaction_amount');
        $viewTable = view('admin.partials.tutor-payments-search', compact('payments','totalTransactionAmount'))->render();
        $viewPagination = $payments->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);

        // $subjects = subjects::where('is_active', 1)->get();
        // $classes = classes::where('is_active', 1)->get();
        // $students = studentregistration::where('is_active', 1)->get();
        // $tutors = tutorregistration::where('is_active', 1)->get();

        // return view('admin.payments', get_defined_vars());
    }


    public function update(Request $request){
        $request->validate([
            'transactionid'=>'required',
            'paymentstatus'=>'required',
            'transactionremarks'=>'required'
        ]);
        $data = paymentdetails::find($request->transactionid);
        $data->status = $request->paymentstatus;
        $data->remarks = $request->transactionremarks;
        $res = $data->save();
        if($res){
            return back()->with('success','Payment details updated successfully');
        }
        else{
            return back()->with('fail','Something went wrong. Please try again later');
        }
    }

    public function tutorpaymentslist(){

        return view('admin.tutorpaymentlist');
    }

    public function tutorpayments(){

        return view('admin.tutorpayment');
    }

    public function studentpayments(){

        $payments = paymentstudents::select('paymentstudents.*','classes.name as class','subjects.name as subject','tutorregistrations.name as tutor','paymentdetails.id as paymentdetails_id','paymentdetails.amount as amount')
        ->join('classes','classes.id','paymentstudents.class_id')
        ->join('subjects', 'subjects.id','paymentstudents.subject_id')
        ->join('tutorregistrations','tutorregistrations.id','paymentstudents.tutor_id')
        ->join('paymentdetails','paymentdetails.transaction_id','paymentstudents.transaction_id')
        ->where('paymentstudents.student_id',session('userid')->id)
        ->where('paymentstudents.student_id',session('userid')->id)
        ->paginate(10);
        // dd($payments);
        return view('student.fees',compact('payments'));
    }
    // students payments search functionality
    public function studentpaymentsSearch(Request $request){

        // return $request->all();

        $query = paymentstudents::select('paymentstudents.*','classes.name as class','subjects.name as subject','tutorregistrations.name as tutor','paymentdetails.id as paymentdetails_id','paymentdetails.amount as amount')
        ->join('classes','classes.id','paymentstudents.class_id')
        ->join('subjects', 'subjects.id','paymentstudents.subject_id')
        ->join('tutorregistrations','tutorregistrations.id','paymentstudents.tutor_id')
        ->join('paymentdetails','paymentdetails.transaction_id','paymentstudents.transaction_id')
        ->where('paymentstudents.student_id',session('userid')->id);

        if ($request->start_date) {
            $query->whereDate(DB::raw('DATE(paymentdetails.payment_date)'), '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate(DB::raw('DATE(paymentdetails.payment_date)'), '<=', $request->end_date);
        }

        if ($request->transaction_id) {
            $query->where('paymentdetails.transaction_id',  'like', '%' .$request->transaction_id . '%');
        }
        $payments = $query->paginate(10);
        $type="students-payments";
        $viewTable = view('admin.partials.common-search', compact('payments','type'))->render();
        $viewPagination = $payments->links()->render();
        return response()->json([
            'table' => $viewTable,
            'pagination' => $viewPagination
        ]);
    }
}
