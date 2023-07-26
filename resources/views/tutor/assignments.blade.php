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
            <h3 class="text-center">Assignments</h3>
            <div class="mt-4" id="">

                <table class="table table-hover table-bordered table-responsive">
                    <thead class="thead-dark ">
                        <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Class.</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Topic</th>
                                <th scope="col">Assignment Name</th>
                                <th scope="col">Assignment On</th>
                                <th scope="col">Assignment End Date</th>
                                <th scope="col">View Submission</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                    </thead>
                    
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $demos->links() !!} --}}
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->

    
    @endsection
