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
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif

            <div id="" class="mb-3 listHeader page-title-box">
                <h3>Attendance</h3>
            </div>

            <form id="payment-search">

                <div class="form-group mt-">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Student Name</label>
                            <input type="text" class="form-control" name="student_name">

                        </div>
                        <div class="col-md-3">
                            <label>Start Date</label>
                            <input type="date" name="start_date" class="form-control">

                        </div>
                        <div class="col-md-3">
                            <label>End Date</label>
                            <input type="date" name="end_date" class="form-control">

                        </div>

                        <div class="col-md-3">
                            <label>Status</label>
                            <select type="text" class="form-control" name="status">
                                <option value="">--select status --</option>
                                <option value="1">Present</option>
                                <option value="2">Absent</option>
                            </select>

                        </div>


                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <button class="btn  btn-primary" style="float:right">Search</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr>


            <div class=" table-responsive">
                <table class="table table-hover table-striped align-middle table-nowrap mb-0 users-table">
                    <thead class=" ">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Class</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Student</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Date & Time</th>
                            <th scope="col">Status</th>
                            {{-- <th scope="col">Remarks</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentAttendances as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->class_name ?? '' }}</td>
                                <td>{{ $attendance->subject_name ?? '' }}</td>
                                <td>{{ $attendance->student_name ?? '' }}</td>
                                <td>{{ $attendance->batch_name ?? '' }}</td>
                                <td>{{ $attendance->class_starts_at ?  date('Y-m-d H:i:s', strtotime($attendance->class_starts_at)) : '-' }}</td>
                                @php
                                    if($attendance->status == 1){
                                        $status = 'Present';
                                    }elseif($attendance->status == 0){
                                        $status = 'Absent';
                                    }
                                @endphp
                                <td>{{ $status ?? '' }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>



            </div>

        </div>
    </div>
    <div class="d-flex justify-content-center" id="paginationContainer">
        {!! $studentAttendances->links() !!}
    </div>
</div>

<script>
function openmodal() {
    $('#header').html('Add Assignment');
    $('#id').val('');
    $('#class').val('');
    $('#subject').val('');
    $('#batchid').val('');
    $('#topic').val('');
    $('#assignname').val('');
    $('#assigndesc').val('');
    $('#assigstartdate').val('');
    $('#assigenddate').val('');
    $("#openmodal").modal('show');
}

function fetchSubjects() {

    var classId = $('#class option:selected').val();
    $("#subject").html('');
    $("#topic").html('');
    $.ajax({
        url: "{{ url('fetchsubjects') }}",
        type: "POST",
        data: {
            class_id: classId,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(result) {
            $('#subject').html('<option value="">-- Select Type --</option>');
            $.each(result.subjects, function(key, value) {
                $("#subject").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });

        }

    });

};

function fetchTopics() {

    var subjectId = $('#subject option:selected').val();
    $("#topic").html('');
    $.ajax({
        url: "{{ url('fetchtopics') }}",
        type: "POST",
        data: {
            subject_id: subjectId,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(result) {
            $('#topic').html('<option value="">-- Select Type --</option>');
            $.each(result.topics, function(key, value) {
                $("#topic").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });

        }

    });

};

function batchbysubject() {

    var subjectId = $('#subject option:selected').val();
    $("#batchid").html('');
    $.ajax({
        url: "{{ url('batchbysubject') }}",
        type: "POST",
        data: {
            subject_id: subjectId,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(result) {
            $('#batchid').html('<option value="">-- Select Type --</option>');
            $.each(result.batches, function(key, value) {
                $("#batchid").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });

        }

    });

};

function editdata(id, classid, subjectid, batchid, topicid, name, description, startdate, enddate) {
    $.ajax({
        url: "{{ url('fetchsubjects') }}",
        type: "POST",
        data: {
            class_id: classid,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(result) {
            $('#subject').html('<option value="">-- Select Type --</option>');
            $.each(result.subjects, function(key, value) {
                $("#subject").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });

        }

    });
    $.ajax({
        url: "{{ url('fetchtopics') }}",
        type: "POST",
        data: {
            subject_id: subjectid,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(result) {
            $('#topic').html('<option value="">-- Select Type --</option>');
            $.each(result.topics, function(key, value) {
                $("#topic").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });

        }

    });
    $.ajax({
        url: "{{ url('batchbysubject') }}",
        type: "POST",
        data: {
            subject_id: subjectid,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(result) {
            $('#batchid').html('<option value="">-- Select Type --</option>');
            $.each(result.batches, function(key, value) {
                $("#batchid").append('<option value="' + value
                    .id + '">' + value.name + '</option>');
            });

        }

    });

    $('#header').html('Update Assignment');
    $('#id').val(id);
    $('#class').val(classid);
    // Code to be executed after 1 second
    function delayedFunction() {
        $('#subject').val(subjectid);
        $('#batchid').val(batchid);
        $('#topic').val(topicid);

    }
    $('#assignname').val(name);
    $('#assigndesc').val(description);
    $('#assigstartdate').val(startdate);
    $('#assigenddate').val(enddate);

    // Set the delay to 1000 milliseconds (1 second)
    const delay = 300;

    // Execute the delayedFunction after the specified delay
    setTimeout(delayedFunction, delay);
    $("#openmodal").modal('show');
};
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateTableAndPagination(data) {
            // $('#tableContainer').html(data.table);
            $('.users-table tbody').html(data.table);
            $('#paginationContainer').html(data.pagination);
        }

        $(document).ready(function() {
            $('#payment-search').submit(function(e) {
                alert('test');
                e.preventDefault();
                const page = 1;
                const ajaxUrl = "{{ route('tutor.attendance-search') }}"
                var formData = $(this).serialize();

                formData += `&page=${page}`;

                $.ajax({
                    type: 'post',
                    url: ajaxUrl, // Define your route here
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(data) {
                        // console.log(data)
                        updateTableAndPagination(data);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });

            });


            $(document).on('click', '#paginationContainer .pagination a', function(e) {
                e.preventDefault();
                var formData = $('#payment-search').serialize();
                const page = $(this).attr('href').split('page=')[1];
                formData += `&page=${page}`;
                $.ajax({
                    type: 'post',
                    url: '{{ route("tutor.attendance-search") }}', // Define your route here
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        updateTableAndPagination(data);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });



        });

    </script>
@endsection
