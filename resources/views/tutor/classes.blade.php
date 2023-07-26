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
            <h3 class="text-center">Classes</h3>
            <div class="mt-4" id="">

                <table class="table table-hover table-bordered ">
                    <thead class="thead-dark ">
                        <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Class.</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Topic</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Link</th>
                                <th scope="col">Status</th>
                            </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>class</td>
                        <td>Mathematics</td>
                        <td>topic 1</td>
                        <td> 23 jun 2023 11:00</td>
                        <td> 23 jun 2023 01:00</td>
                        <td>Link</td>
                        <td></td>
                      </tr>

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $demos->links() !!} --}}
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->

    
    @endsection
