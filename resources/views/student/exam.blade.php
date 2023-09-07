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

                @if (request()->has('message'))
                    <div class="alert alert-success">
                        {{ urldecode(request()->get('message')) }}
                    </div>
                @endif


             
                <div class="row ">
                    <div class="col-md-3 mt-4">
                        <select  class="form-control" name="std" id="std">
                            <option>--Select Class--</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-4">
                        <select  class="form-control" name="sub" id="sub">
                            <option>--Select Subject--</option>
                        </select>
                    </div>
                    <div class="col-md-3 mt-4">
                        <input type="text" class="form-control" placeholder="Enter Topic">
                    </div>
                    

                    
                    <div class="col-md-3 mt-4">
                        <button class="btn  btn-primary" style="float:right"> <span
                            class="fa fa-search"></span> Search</button>
                    </div>
                </div>
                

            
                <div id="" class="mt-3 listHeader page-title-box">
                    <h3>My Examination</h3>
                </div>



            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle table-nowrap mb-0 users-table">
                    <thead class="">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Class</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Exam Name</th>
                            <th scope="col">Exam Description</th>
                            <th scope="col">Attempts Pending</th>
                            <th scope="col">Exam Duration</th>
                            <th scope="col">Exam Start Date & Time</th>
                            <th scope="col">Exam End Date & Time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exams as $exam)
                            @if ($exam->attemptsRemaining > 0)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $exam->class }}</td>
                                    <td>{{ $exam->subject }}</td>
                                    <td>{{ $exam->topic }}</td>
                                    <td>{{ $exam->name }}</td>
                                    <td>{{ $exam->description }}</td>
                                    <td>{{ $exam->attemptsRemaining }}</td>
                                    <td>{{ $exam->test_duration }} min</td>
                                    <td>{{ $exam->test_start_date }}</td>
                                    <td>{{ $exam->test_end_date }}</td>
                                    <td><a href="{{ url('student/taketest') }}/{{ $exam->id }}"
                                            class="badge bg-success">Start Test</a></td>
                                </tr>
                            @endif
                        @endforeach


                    </tbody>
                </table>
            </div>

            <br>
            <br>

           
            <div id="" class="mb-3 listHeader page-title-box">
                <h3 class="mt-3">Previous Exams</h3>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle table-nowrap mb-0 users-table">
                    <thead class="">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Exam Name</th>
                            <th scope="col">Exam Description</th>
                            <th scope="col">Exam Duration</th>
                            <th scope="col">Exam Start Date & Time</th>
                            <th scope="col">Exam End Date & Time</th>
                            <th scope="col">Attempted On</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($extakens as $extaken)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $extaken->exam_name }}</td>
                                <td>{{ $extaken->exam_description }}</td>
                                <td>{{ $extaken->duration }} min</td>
                                <td>{{ $extaken->test_start_date }}</td>
                                <td>{{ $extaken->test_end_date }}</td>
                                <td>{{ $extaken->test_attempted_on }}</td>
                                <td><a href="{{url('student/exam/report')}}/{{$extaken->id}}" class="badge bg-primary"> Report</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        <!-- content-wrapper ends -->
    @endsection
