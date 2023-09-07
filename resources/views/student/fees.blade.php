@extends('student.layouts.main')
@section('main-section')
 <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <style>
                .listHeader {
                    display: flex;
                    justify-content: space-between;
                }
            </style>

            <div class="page-content">
                <div class="container-fluid">


                    <div id="" class="mb-3 listHeader page-title-box">
                        <h3>Payment Details</h3>
                    </div>

                    
                   

                    <div class="row ">
                        <div class="col-md-3 mt-4">
                            <input type="text" class="form-control" placeholder="Enter Topic">
                        </div>
                        <div class="col-md-3">                
                            <label>Start Date</label>
                            <input type="date" class="form-control" name="smob " id="smob" placeholder="Student Mobile">                           
                        </div>
                        
                        <div class="col-md-3">    
                            <label>End Date</label>
                                <input type="date" class="form-control" name="smob " id="smob" placeholder="Student Mobile">   
                        </div>
                       

                        
                        <div class="col-md-3 mt-4">
                            <button class="btn  btn-primary" style="float:right"> <span
                                class="fa fa-search"></span> Search</button>
                        </div>
                    </div>
                    <hr>



                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle table-nowrap mb-0 users-table">
                        <thead class="">
                            <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Trans.No.</th>
                                <th scope="col">Class</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Tutor</th>
                                <th scope="col">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                $totalAmount = 0; // Initialize the total amount variable
                                @endphp
                                
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><a href="#" class="" onclick="showinvoice('{{$payment->paymentdetails_id}}')"> {{$payment->transaction_id}}</a></td>
                                        <td>{{$payment->class}}</td>
                                        <td>{{$payment->subject}}</td>
                                        <td>{{$payment->tutor}}</td>
                                        <td>£{{$payment->amount}}</td>
                                    </tr>
                                    
                                    @php
                                    $totalAmount += $payment->amount; // Add the current payment amount to the total
                                    @endphp
                                @endforeach
                                
                                <!-- Display the total amount after the loop -->
                                <tr>
                                    <td colspan="4"></td>
                                    <td><strong>Total:</strong></td>
                                    <td><strong>£{{$totalAmount}}</strong></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>




                </div>
            </div>
        </div>
                <!-- content-wrapper ends -->
                
                @endsection