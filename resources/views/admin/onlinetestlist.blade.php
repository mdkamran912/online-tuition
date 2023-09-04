@extends('admin.layouts.main')
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
            <!-- <h3 class="text-center"></h3> -->
            <div id="listHeader" class="mb-3">
                <h3>Online Tests</h3>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.onlinetests.create') }}"> <span
                        class="fa fa-plus"></span> Add New
                    Test</a>
            </div>

            <table class="table table-hover table-striped align-middlemb-0 table-responsive">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th>Test Name</th>
                        <th>Test Description</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Topic</th>
                        <th>Duration</th>
                        <th>Max Attempt</th>
                        <th>Test Start Date</th>
                        <th>Test End Date</th>
                        <th>Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testlists as $testlist)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $testlist->test_name }}</td>
                            <td>{{ $testlist->test_description }}</td>
                            <td>{{ $testlist->class_name }}</td>
                            <td>{{ $testlist->subject_name }}</td>
                            <td>{{ $testlist->topic_name }}</td>
                            <td>{{ $testlist->test_duration }}</td>
                            <td>{{ $testlist->max_attempt }}</td>
                            <td>{{ $testlist->test_start_date }}</td>
                            <td>{{ $testlist->test_end_date }}</td>
                            <td>
                                <div class="form-check form-switch">
                                    @if ($testlist->test_status == 1)
                                    <i class="ri-checkbox-circle-line align-middle text-success"></i> Active 
                                    @else
                                    <i class="ri-close-circle-line align-middle text-danger"></i> Inactive 
                                    @endif
                                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" onclick="changestatus('{{ $testlist->test_id }}','{{ $testlist->test_status }}');"
                                    class="checkbox" @if ($testlist->test_status == 1) then checked @endif>
                                </div>
                            </td>
                            
                            <td>
                                <div class="text-center"><a class="badge bg-primary"
                                        href="{{ url('admin/onlinetests') . '/' . $testlist->test_id }}">View/Update</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach

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
    @endsection
