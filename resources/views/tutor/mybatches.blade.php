@extends('tutor.layouts.main')
@section('main-section')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <h3 class="text-center">Demo List</h3>
            <div class="mt-4" id="">

                <table class="table table-hover table-bordered table-responsive ">
                    <thead class="thead-dark ">
                        <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Class.</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Batch</th>
                                <th scope="col">Batch Start Date</th>
                                <th scope="col">Batch End Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">View-List Of Students</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($demos as $demo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                 <td>{{ $demo->class }}</td>
                                  <td>{{ $demo->subject }}</td>
                                
                                <td><a href="studentprofile/{{$demo->student_id}}">{{ $demo->student_name }}</a></td>
                                {{-- <td>{{ $demo->student_mobile }}</td>
                                <td><a href="tutorprofile/{{$demo->tutor_id}}">{{ $demo->tutor }}</a></td>
                                <td>{{ $demo->tutor_mobile }}</td> --}}
                               
                                <td>
                                    @if ($demo->status == 1)
                                        <span class="badge badge-info">{{ $demo->currentstatus }}</span>
                                    @elseif ($demo->status == 2)
                                        <span class="badge badge-primary">{{ $demo->currentstatus }}</span>
                                    @elseif ($demo->status == 3)
                                        <span class="badge badge-success">{{ $demo->currentstatus }}</span>
                                    @elseif ($demo->status == 4)
                                        <span class="badge badge-success">{{ $demo->currentstatus }}</span>
                                    @elseif ($demo->status == 5)
                                        <span class="badge badge-danger">{{ $demo->currentstatus }}</span>
                                    @endif
                                </td>
                                {{-- <td>{{ $demo->slot_1 }}</td>
                                <td>{{ $demo->slot_2 }}</td>
                                <td>{{ $demo->slot_3 }}</td> --}}
                                <td>{{ $demo->slot_confirmed }}</td>
                                <td><a href="{{ $demo->demo_link }}">{{ $demo->demo_link }}</a></td>
                                <td>{{ $demo->remarks }}</td>
                                <td>
                                    <button class="badge badge-primary"
                                        onclick="openupdatemodal({{ $demo->demo_id }})">Update</button>
                                </td>
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

         <!-- modal -->
                <div class="modal fade" id="studentList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">


                            <div class="modal-body">


                                <header>
                                    <h3 class="text-center mb-4">Add New Class</h3>
                                </header>

                                <form action="" method="">
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-ms-12 mb-3">
                                            <label>Class</label>
                                            <input type="text" class="form-control" id="classname" name="classname">
                                        </div>
                                    </div>


                                    <button type="button" id="" class="btn btn-sm btn-primary float-right"><span
                                            class="fa fa-plus"></span> Add</button>
                                    <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                                        data-dismiss="modal"><span class="fa fa-times"></span> Close</button>



                                </form>
                            </div>
                        </div>
                    </div>
                </div>


        <script>
            function openconfirmmodal(id) {
                $.ajax({
                    url: "{{ url('admin/demodetails') }}/" + id,
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        result = result[0]
                        $('#confirmid').val(id)
                        $('#slot_1').html(result.slot_1)
                        $('#slot_2').html(result.slot_2)
                        $('#slot_3').html(result.slot_3)
                        $('#demolink').val(result.demo_link)
                        $('#demoremarks').val(result.remarks)
                        $('#slot1').val(result.slot_1)
                        $('#slot2').val(result.slot_2)
                        $('#slot3').val(result.slot_3)

                    }
                });

                $('#confirmModal').modal('show')
            }

            function openupdatemodal(id) {
                $.ajax({
                    url: "{{ url('admin/demodetails') }}/" + id,
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        console.log(result)
                        result = result[0]
                        $('#demoupdateid').val(id)
                        $('#slotupdate1').val(result.slot_1)
                        $('#slotupdate2').val(result.slot_2)
                        $('#slotupdate3').val(result.slot_3)
                        $('#statusupdate').val(result.status)

                    }
                });
                $('#editModal').modal('show')
            }
        </script>
    @endsection
