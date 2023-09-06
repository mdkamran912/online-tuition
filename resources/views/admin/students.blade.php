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
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    <div class="page-title-box">
                        <h3 class="text-center">Students List</h3>
                    </div>

                    <div class="row py-3">

                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text"  class="form-control" name="sname " id="sname" placeholder="Student Name">
                                    
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" class="form-control" name="smob " id="smob" placeholder="Student Mobile">
                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select  class="form-control" name="class" id="class">
                                    <option>--Select Class--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select  class="form-control" name="class" id="class">
                                    <option>--Select Status--</option>
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
                    <hr>


                    <div class="mt-4  table-responsive">
                        <table class="table table-hover table-striped align-middlemb-0 ">
                            <thead>
                                <tr>
                                    <th scope="col">S.No</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Student Mobile</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Current Status</th>
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stdlists as $stdlist)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="studentprofile/{{$stdlist->student_id}}">{{ $stdlist->student_name }}</a></td>
                                        <td>{{ $stdlist->student_mobile }}</td>

                                        <td>{{ $stdlist->class_name }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                @if ($stdlist->student_status == 1)
                                                <i class="ri-checkbox-circle-line align-middle text-success"></i> Active 
                                                @else
                                                <i class="ri-close-circle-line align-middle text-danger"></i> Inactive 
                                                @endif
                                                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" onclick="changestatus('{{$stdlist->student_id}}','{{$stdlist->student_status}}');" class="checkbox" @if ($stdlist->student_status == 1) then checked

                                                @endif>
                                            </div>
                                        </td>
                                    
                                        {{-- <td><button class="badge badge-success"
                                                onclick="openconfirmmodal({{ $stdlist->demo_id }});">Confirm</button>
                                            <button class="badge badge-primary"
                                                onclick="openupdatemodal({{ $stdlist->demo_id }})">Modify</button>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                
                    </div>
                </div>
            </div>
        </div>

       
        <!-- content-wrapper ends -->

        <script>
function changestatus(id,status){

            var url = "{{URL('admin/students/status')}}";
            // var id=
            $.ajax({
                url: url,
                type: "GET",
                cache: false,
                data:{
                    _token:'{{ csrf_token() }}',
                    id:id,
                    status:status
                },
                success: function(dataResult){
                    dataResult = JSON.parse(dataResult);
                 if(dataResult.statusCode)
                 {
                    // window.location = "/admin/students";
                    toastr.success('status changed')
                    window.location = "{{URL('admin/students')}}" ;
                 }
                 else{
                     alert("Something went wrong. Please try again later");
                 }

                }
            });

        }
        </script>
    @endsection
