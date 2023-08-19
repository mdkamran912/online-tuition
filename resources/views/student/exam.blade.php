@extends('student.layouts.main')
@section('main-section')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div id="listHeader">
                <h3 class="mb-3">My Examination</h3>

            </div>

            <table class="table table-bordered table-responsive">
                <thead class="bg-dark text-white">
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
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $exam->class }}</td>
                            <td>{{ $exam->subject }}</td>
                            <td>{{ $exam->topic }}</td>
                            <td>{{ $exam->name }}</td>
                            <td>{{ $exam->description }}</td>
                            <td>{{ $exam->max_attempt }}</td>
                            <td>{{ $exam->test_duration }} min</td>
                            <td>{{ $exam->test_start_date }}</td>
                            <td>{{ $exam->test_end_date }}</td>
                            <td><a href="{{url('student/taketest')}}/{{$exam->id}}" class="badge badge-success">Start Test</a></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

            <br><br>
            <div id="listHeader">
                <h3 class="mb-3">Previous Exams</h3>

            </div>

            <table class="table table-bordered table-responsive">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">S.No.</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Topic</th>
                        <th scope="col">Exam Name</th>
                        <th scope="col">Exam Description</th>
                        <th scope="col">Exam Duration</th>
                        <th scope="col">Exam Start Date & Time</th>
                        <th scope="col">Exam End Date & Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>

        </div>
        <!-- content-wrapper ends -->
    @endsection
