@extends('tutor.layouts.main')
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
            @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif

            <div id="" class="mb-3 listHeader page-title-box">
                <h3>Assignments </h3>
                <button class="btn btn-sm btn-primary" onclick="openmodal();"> <span class="fa fa-plus"></span> Add New
                    Assignment</button>
            </div>
            <div class="mt-4 table-responsive" id="">
                <table class="table table-hover table-striped align-middlemb-0 ">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Class.</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Assignment Name</th>
                            <th scope="col">Assignment Description</th>
                            <th scope="col">Assignment Link</th>
                            <th scope="col">Assignment Start Date</th>
                            <th scope="col">Assignment End Date</th>
                            <th scope="col">View Submission</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>

                </table>
            </div>
        </div>
        <!-- content-wrapper ends -->

        
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
        @endsection