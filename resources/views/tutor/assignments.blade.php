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
            
             <div id="listHeader" class="mb-3">
                        <h3>Assignments </h3>
                        <button class="btn btn-sm btn-primary" onclick="openmodal();"> <span
                                class="fa fa-plus"></span> Add New Assignment</button>
                    </div>
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

         <!-- modal -->
        <div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4">Add New Assignment</h3>
                        </header>

                        <form action="" method="">

                            <input type="hidden" id="id" name="id">
                            <div class="row">
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Class</label>
                                    <select class="form-control" id="class" name="class"></select>
                                </div>
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Subject</label>
                                    <select class="form-control" id="sub" name="sub"></select>
                                </div>

                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Batch</label>
                                    <select class="form-control" id="batch" name="batch"></select>
                                </div>

                                 <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Topic</label>
                                    <select class="form-control" id="topic" name="topic"></select>
                                </div>

                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Upload Assignment </label>
                                    <input type="file" class="form-control" id="assigupload" name="assigupload">
                                </div>
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Assignment Name</label>
                                    <input type="text" class="form-control" id="assignname" name="assignname">
                                </div>
                                <div class="col-12 col-md-12 col-ms-12 mb-3">
                                    <label>Assignment Description</label>
                                    <textarea class="form-control" id="assigndesc" name="assigndesc"></textarea>
                                </div>

                                 <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Assignment Start Date</label>
                                    <input type="date" class="form-control" id="assigstartdate" name="assigstartdate">
                                </div>
                                 <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Assignment End Date</label>
                                    <input type="date" class="form-control" id="assigenddate" name="assigenddate">
                                </div>
                                
                                
                            </div>


                            <button type="button" id="" class="btn btn-sm btn-primary float-right">Submit</button>
                            <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                                data-dismiss="modal"><span class="fa fa-times"></span> Close</button>



                        </form>
                    </div>
                </div>
            </div>
        </div>
  
    
    <script>
       function openmodal(){
         $("#openmodal").modal('show');
       }
    </script>
    

    
    @endsection
