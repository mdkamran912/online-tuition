@extends('student.layouts.main')
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
                        <h3>Demo Classes</h3>
                    </div>

                    <hr>
                    <div class=" table-responsive">
                    <table class="table table-hover table-striped align-middle table-nowrap mb-0 users-table">
                            <thead class=" ">
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Tutor</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Current Status</th>
                                    <th scope="col">Prefer Slot-1</th>
                                    <th scope="col">Prefer Slot-2</th>
                                    <th scope="col">Prefer Slot-3</th>
                                    <th scope="col">Confirm Slot</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>



                    </div>
                    <div class="d-flex justify-content-center" id="paginationContainer">
                        {{-- {!! $demos->links() !!} --}}
                    </div>



                </div>
                <!-- content-wrapper ends -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    function updateTableAndPagination(data) {
                        // $('#tableContainer').html(data.table);
                        $('.users-table tbody').html(data.table);
                        $('#paginationContainer').html(data.pagination);
                    }

                    $(document).ready(function () {
                        $('#payment-search').submit(function (e) {
                            e.preventDefault();
                            // alert('test');
                            const page = 1;
                            const ajaxUrl = '{{ route("student.demolist-search") }}'
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
                            url: '{{ route("student.demolist-search") }}', // Define your route here
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
