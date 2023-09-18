@extends('admin.layouts.main')
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

                    <div class="page-title-box">
                    <h3 class="text-center">Tutors List</h3>
                    </div>



                    <form id="payment-search">
                        <div class="row py-3">

                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text"  class="form-control" name="tutor_name" id="sname" placeholder="Tutor Name">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tutor_mobile" id="smob" placeholder="Tutor Mobile">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select  class="form-control" name="class_name" id="class">
                                        <option value="">Select Class</option>
                                        @foreach ($classes as $class)
                                            <option  value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select  class="form-control" name="status_field">
                                        <option value="">Select Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">In Active</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <button class="btn btn-primary" style="float:right"> <span
                                    class="fa fa-search"></span> Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>

                    <div class="mt-4 table-responsive" id="">
                        <table class="table table-hover table-striped align-middlemb-0 users-table">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Tutor Name</th>
                                    <th scope="col">Tutor Mobile</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Rate/Hr (£)</th>
                                    <th scope="col">Commission/Hr</th>
                                    <th scope="col">Current Status</th>
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ttrlists as $ttrlist)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="tutorprofile/{{ $ttrlist->tutor_id }}">{{ $ttrlist->tutor_name }}</a></td>
                                        <td>{{ $ttrlist->tutor_mobile }}</td>
                                        <td>{{ $ttrlist->class_name }}</td>
                                        <td>{{ $ttrlist->subject_name }}</td>
                                        <td>£ {{ $ttrlist->rate }}</td>
                                        <td><a href="#" onclick="updatecommission('{{$ttrlist->rate_id}}','{{$ttrlist->admin_commission}}')"> {{ $ttrlist->admin_commission }}% <span class="badge bg-primary ml-3"> Update</span> </a>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                @if ($ttrlist->tutor_status == 1)
                                                <i class="ri-checkbox-circle-line align-middle text-success"></i> Active
                                                @else
                                                <i class="ri-close-circle-line align-middle text-danger"></i> Inactive
                                                @endif
                                                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" onclick="changestatus('{{ $ttrlist->tutor_id }}','{{ $ttrlist->tutor_status }}');"
                                                class="checkbox" @if ($ttrlist->tutor_status == 1) then checked @endif>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center" id="paginationContainer">
                        {!! $ttrlists->links() !!}
                    </div>

                </div>
            </div>
        </div>

         <!--confirm modal -->
         <div class="modal fade" id="admincommissionmodal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4">Admin Commission</h3>
                        </header>

                        {{-- <form action="{{ route('admin.demo.confirm') }}" method="POST">
                @csrf --}}
                        <div class="row mb-3">
                            <input type="hidden" id="commissionid" name="commissionid">

                            <div class="col-12 col-md-4 col-ms-12">
                                <label>Commission/Hr<i style="color: red;">*</i></label>
                                <input type="text" class="form-control" id="commissionperhr"
                                    name="commissionperhr" placeholder="0">
                                <span class="text-danger">
                                    @error('commissionperhr')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-12 col-md-6 col-ms-12" style="margin-top:35px">
                                <button type="button" id="" class="btn btn-sm btn-success float-right"
                                    onclick="commissionupdate();"><span class="fa fa-check"></span> Update</button>
                                <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                                    data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
                            </div>

                        </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

        <script>
            function changestatus(id, status) {

                var url = "{{ URL('admin/tutors/status') }}";
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
                            // window.location = "/admin/tutors";
                            toastr.success('status changed')
                            window.location = "{{URL('admin/tutors')}}" ;
                        } else {
                            alert("Something went wrong. Please try again later");
                        }

                    }
                });

            }

            function updatecommission(id,rate) {
                $('#commissionid').val(id);
                $('#commissionperhr').val(rate);
                $('#admincommissionmodal').modal('show')
            }
            function commissionupdate(){
                var url = "{{ URL('admin/commission/update') }}";
                var id= $('#commissionid').val()
                var commission= $('#commissionperhr').val()
                $.ajax({
                    url: url,
                    type: "GET",
                    cache: false,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        commission: commission
                    },
                    success: function(dataResult) {
                        dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode) {
                            window.location = "/admin/tutors";
                        } else {
                            alert("Something went wrong. Please try again later");
                        }

                    }
                });
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function updateTableAndPagination(data) {
                // $('#tableContainer').html(data.table);
                 $('.users-table tbody').html(data.table);
                 $('#paginationContainer').html(data.pagination);
            }

            $(document).ready(function () {
                $('#payment-search').submit(function (e) {
                    // alert('test');
                    e.preventDefault();
                    const page = 1;
                    const ajaxUrl = '{{ route("admin.tutors-search") }}'
                    var formData = $(this).serialize();
                    formData += `&page=${page}`;

                    $.ajax({
                        type: 'post',
                        url: ajaxUrl, // Define your route here
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function (data) {
                            // console.log(data)
                            updateTableAndPagination(data);
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });

                });


                $(document).on('click', '#paginationContainer .pagination a', function (e) {
                e.preventDefault();
                var formData = $('#payment-search').serialize();
                const page = $(this).attr('href').split('page=')[1];
                formData += `&page=${page}`;
                $.ajax({
                    type: 'post',
                    url: '{{ route("admin.tutors-search") }}', // Define your route here
                    data:formData,
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    success: function (data) {
                        updateTableAndPagination(data);
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });



            });
        </script>
    @endsection
