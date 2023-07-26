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
            <h3 class="text-center">Batches</h3>
            <div id="listHeader" class="mb-3">
                        
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#newClassModal"> <span
                                class="fa fa-plus"></span> Schedule New
                            Class</button>
                    </div>
            <div class="mt-4" id="">

                <table class="table table-hover table-bordered ">
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
                      <tr>
                        <td>1</td>
                        <td>class</td>
                        <td>Mathematics</td>
                        <td>Batch 1</td>
                        <td> 23 jun 2023</td>
                        <td>22 Aug 2023</td>
                        <td>Confirm</td>
                        <td><button class="btb btn-sm btn-primary" data-togggle="modal" data-target="#studentList" onclick="openModal();">View</button></td>
                        
                      </tr>

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $demos->links() !!} --}}
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->

        
                <!-- modal -->
                <div class="modal fade" id="newClassModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">


                            <div class="modal-body">


                                <header>
                                    <h3 class="text-center mb-4">Schedule New Class</h3>
                                </header>

                                <form action="" method="">
                                    <div class="row">
                                         <div class="col-12 col-md-6 col-ms-6 mb-3">
                                            <label>Topic</label>
                                            <select type="text" class="form-control" id="topic" name="topic"></select>
                                        </div>
                                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                                            <label>Class Link</label>
                                            <input type="text" class="form-control" id="classname" name="classname">
                                        </div>
                                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                                            <label>Class Link</label>
                                            <input type="datetime-local" class="form-control" id="classname" name="classname">
                                        </div>

                                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                                            <label>Class Link</label>
                                            <input type="datetime-local" class="form-control" id="classname" name="classname">
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
            function openModal(){

                 $('#newClassModal').modal('show')

            }
          
        </script>
    @endsection
