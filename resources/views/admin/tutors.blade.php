@extends('admin.layouts.main')
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
            <h3 class="text-center">Tutors List</h3>
            <div class="mt-4" id="">

                <table class="table table-hover table-bordered ">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Tutor Name</th>
                            <th scope="col">Tutor Mobile</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Current Status</th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ttrlists as $ttrlist)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="tutorprofile/{{$ttrlist->tutor_id}}">{{ $ttrlist->tutor_name }}</a></td>
                                <td>{{ $ttrlist->tutor_mobile }}</td>
                                
                                <td>{{ $ttrlist->subject_name }}</td>
                                <td>
                                    <div class="toggle-button-cover">
                                        <div class="button-cover">
                                            <div class="button r" id="button-3">
                                                <input type="checkbox" onclick="changestatus('{{$ttrlist->tutor_id}}','{{$ttrlist->tutor_status}}');" class="checkbox" @if ($ttrlist->tutor_status == 1) then checked
                                                    
                                                @endif>
                                                <div class="knobs"></div>
                                                <div class="layer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                {{-- <td><button class="badge badge-success"
                                        onclick="openconfirmmodal({{ $ttrlist->demo_id }});">Confirm</button>
                                    <button class="badge badge-primary"
                                        onclick="openupdatemodal({{ $ttrlist->demo_id }})">Modify</button>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $ttrlists->links() !!} --}}
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->

        <script>
function changestatus(id,status){
            
            var url = "{{URL('admin/tutors/status')}}";
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
                    window.location = "/admin/tutors";
                 }
                 else{
                     alert("Something went wrong. Please try again later");
                 }
                    
                }
            });
            
        }
        </script>
    @endsection
