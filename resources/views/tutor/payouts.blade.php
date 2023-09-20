@extends('tutor.layouts.main')
@section('main-section')
<meta name="csrf-token" content="{{ csrf_token() }}">



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
            @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <!-- <h3 class="text-center"></h3> -->
            <div id="" class="mb-3 listHeader  page-title-box">
                <h3>Purchase History</h3><br>
                <!-- <a class="btn btn-sm btn-primary" href="createtestseries.html"> <span class="fa fa-plus"></span>
                                Add New
                                Test Series</a> -->

            </div>
            <form id="payment-search" class="">

                <div class="form-group mt-">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control">

                        </div>
                        <div class="col-md-3">
                            <label>End Date</label>
                            <input type="date" name="end_date" class="form-control">

                        </div>

                        <div class="col-md-3">
                            <label>Transaction Id</label>
                            <input type="text" class="form-control" name="transaction_id">

                        </div>
                        <div class="col-md-3">

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button class="btn  btn-primary float-right">Search</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <hr>
            <div class="mt-4 table-responsive">
                <table class="table table-hover table-bordered  users-table">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">S.No</th>
                            <th>Student Name </th>
                            <th scope="col">Class</th>
                            <th scope="col">Subject</th>
                            <th>Tutor</th>
                            <th>Transaction Date</th>
                            <th>Trasaction Id</th>
                            <th>Amount Paid</th>
                            <th>Mode Of Payment</th>
                            <th>Status</th>
                            <th>Remarks</th>
                            <!-- <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td colspan="7"><strong>Grand Total:</strong></td>
                            {{-- <td>{{ $totalTransactionAmount }}</td> --}}
                            <td colspan="5"></td>
                        </tr>
                    </tbody>
                </table>

            </div>


            <!-- content-wrapper ends -->

           
            @endsection