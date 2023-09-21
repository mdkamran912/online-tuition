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
            <h3 class="text-center">Completed Classes</h3>
            <div class="mt-4" id="">

                <table class="table table-hover table-striped align-middlemb-0 table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            {{-- <th scope="col">Meeting ID</th> --}}
                            <th scope="col">Subject</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Topic</th>
                            <th scope="col">Start Time</th>
                            <th scope="col">Duration</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($liveclasses as $liveclass)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            {{-- <td>{{ $liveclass->meeting_id }}</td> --}}
                            <td>{{ $liveclass->subjects }}</td>
                            <td>{{ $liveclass->batch }}</td>
                            <td>{{ $liveclass->topics }}</td>
                            <td>{{ $liveclass->start_time }}</td>
                            <td>{{ $liveclass->duration }}</td>
                            {{-- <td>{{ $liveclass->status }}</td> --}}
                            <td>
                                @if ($liveclass->status == 'confirmed' || $liveclass->status == 'Confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @elseif ($liveclass->status == 'waiting' || $liveclass->status == 'Waiting')
                                    <span class="badge bg-primary">Waiting Confirmation</span>
                                @elseif ($liveclass->status == 'started' || $liveclass->status == 'Started')
                                    <span class="badge bg-success">Started</span>
                                @elseif ($liveclass->status == 'cancelled' || $liveclass->status == 'Cancelled')
                                    <span class="badge bg-danger">Cancelled</span>
                                @elseif ($liveclass->status == 'completed' || $liveclass->status == 'Completed')
                                    <span class="badge bg-success">Completed</span>
                                {{-- @elseif ($liveclasses->status == 8)
                                    <span class="badge bg-primary">{{ $liveclasses->currentstatus }}</span> --}}
                                @endif
                            </td>
                            <td><button class="btn btn-sm btn-primary" onclick="openAttModal();">Attendance</button></td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $demos->links() !!} --}}
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->

        <div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4" id="header">Attendance(Batch Name)</h3>
                        </header>

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Student Name<span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="" name="">
                                </div>
                            </div>



                            <div style="float:right">
                                <button type="button" class="btn btn-sm btn-danger mr-1 " data-dismiss="modal"><span
                                        class="fa fa-times"></span> Close</button>
                                <button type="submit" id="" class="btn btn-sm btn-success ">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        <script>
        function openAttModal() {
            $("#openmodal").modal('show');
        }
        </script>


        @endsection