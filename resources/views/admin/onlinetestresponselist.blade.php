@extends('admin.layouts.main')
@section('main-section')
<meta name="csrf-token" content="{{ csrf_token() }}">



<!--==============================================================-->
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
            <!-- <h3 class="text-center"></h3> -->
            <div id="" class="mb-3 listHeader page-title-box">
                <h3>Test Response </h3>

            </div>
            <form id="">
                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3">
                        <label>Class</label>
                        <select class="form-control"></select>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <label>Subject</label>
                        <select class="form-control"></select>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <label>Topic</label>
                        <select class="form-control"></select>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <label>Test Name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-3 col-md-3">
                        <label>Start Date</label>
                        <input type="date" class="form-control"></select>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3">
                        <label>End Date</label>
                        <input type="date" class="form-control"></select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 mt-4">
                        <button class="btn btn-primary" style="float:right"> <span class="fa fa-search"></span>
                            Search</button>
                    </div>

                </div>



            </form>
            <hr>

            <table class="table table-hover table-striped align-middlemb-0 table-responsive">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Topic</th>
                        <th scope="col">Test Name</th>
                        <th scope="col">Test Date</th>
                        <th scope="col">Response</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="{{url('admin/onlinetests/responses')}}/1"><button class="btn btn-sm btn-primary">View</button></a></td>
                    </tr>


                </tbody>
            </table>

        </div>
        <!-- content-wrapper ends -->
        <script>
        function changestatus(id, status) {

            var url = "{{ URL('admin/question/status') }}";
            // var id=
            $.ajax({
                url: url,
                type: "GET",
                cache: false,
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    status: status
                },
                success: function(dataResult) {
                    dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode) {
                        window.location = "/admin/questionbank";
                    } else {
                        alert("Something went wrong. Please try again later");
                    }

                }
            });
        }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
        <script>
        function changestatus(id, status) {

            var url = "{{ URL('admin/question/status') }}";
            // var id=
            $.ajax({
                url: url,
                type: "GET",
                cache: false,
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    status: status
                },
                success: function(dataResult) {
                    dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode) {
                        window.location = "/admin/questionbank";
                    } else {
                        alert("Something went wrong. Please try again later");
                    }

                }
            });

        }

        function fetchSubjects() {
            var classId = $('#classname option:selected').val();
            $("#subject").html('');
            $.ajax({
                url: "{{ url('fetchsubjects') }}",
                type: "POST",
                data: {
                    class_id: classId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#subject').html('<option value="">-- Select Subject --</option>');
                    $.each(result.subjects, function(key, value) {
                        $("#subject").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });

                }
            });

        };

        function fetchTopics() {
            var subjectId = $('#subject option:selected').val();
            $("#topicid").html('');
            $.ajax({
                url: "{{ url('fetchtopics') }}",
                type: "POST",
                data: {
                    subject_id: subjectId,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result)
                    $('#topicid').html('<option value="">-- Select Topic --</option>');
                    $.each(result.topics, function(key, value) {
                        $("#topicid").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });

                }
            });
        };
        </script>
        <script>
        function updateTableAndPagination(data) {
            // $('#tableContainer').html(data.table);
            $('.users-table tbody').html(data.table);
            $('#paginationContainer').html(data.pagination);
        }

        $(document).ready(function() {
            $('#payment-search').submit(function(e) {
                e.preventDefault();
                const page = 1;
                const ajaxUrl = "{{ route('admin.questionbank-search') }}"
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
                    url: "{{ route('admin.questionbank-search') }}", // Define your route here
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
