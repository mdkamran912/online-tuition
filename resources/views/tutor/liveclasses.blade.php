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
            <h3 class="text-center">Live Classes</h3>
           <a href="{{route('tutor.liveclass.create')}}"> <button class="btn btn-sm btn-danger">Cretae ZOOM API Test</button></a>
            <div class="mt-4" id="">

                <table class="table table-hover table-bordered ">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Class/Grade</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Batch</th>
                            <th scope="col">Batch Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($liveclasses as $liveclass)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $liveclass->id }}</td>
                                <td>{{ $liveclass->meeting_id }}</td>
                                <td>{{ $liveclass->topic }}</td>
                                <td>{{ $liveclass->start_at }}</td>
                                <td><button class="btn btn-sm btn-primary"
                                        onclick="openstudentmodal({{ $liveclass->batch_id }});"><span
                                            class="fa fa-search"></span> View Students</button>
                                    {{-- @if ($classessch)
                                @foreach ($classessch as $classsc)
                                    @if ($classsc->batch_id == $batch->batch_id)
                                        <p>Hello</p>
                                        
                                    @else --}}
                                    {{-- <button class="btn btn-sm btn-primary"
                                        onclick="openclassmodal('{{ $batch->batch_id }}','{{ $batch->subject_id }}');"><span
                                            class="fa fa-plus-circle"></span> Schedule Class</button> --}}
                                    {{-- <button class="btn btn-sm btn-primary" onclick="openclassmodal('{{$batch->batch_id}}','{{$batch->subject_id}}');"><span class="fa fa-plus-circle"></span> Schedule Class</button> --}}
                                    {{-- @endif --}}
                                    {{-- @endforeach
                            @endif --}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $demos->links() !!} --}}
                </div>
<form action="{{route('tutor.liveclass.store')}}" method="POST">
    @csrf
    <input type="text">
<button type="submit" class="success">Submit</button>
</form>

            </div>
        </div>
        <!-- content-wrapper ends -->


        <!--Student List modal -->
        <div class="modal fade" id="studentlistmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4">Student List</h3>
                        </header>

                        <form action="" method="">
                            <div class="row">
                                <div class="col-12 col-md-12 col-ms-12 mb-3">
                                    {{-- <select id="studentlist" name="studentlist[]" multiple>

                         </select> --}}
                                    <style>
                                        .newclass td,
                                        .newclass th {
                                            padding: 2px !important
                                        }
                                    </style>
                                    <table class="table table-bordered newclass" style="margin: 0%;">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Student Name</th>
                                            </tr>
                                        </thead>
                                        <tbody id="studentlist">

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <button type="button" class="btn btn-sm btn-danger mr-1 moveRight" data-dismiss="modal"><span
                                    class="fa fa-times"></span> Close</button>



                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--Schedule modal -->
        <div class="modal fade" id="scheduleclassmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <div class="modal-body">


                        <header>
                            <h3 class="text-center mb-4">Schedule New Class</h3>
                        </header>

                        <form action="{{ route('tutor.classschedule.create') }}" method="POST">
                            @csrf
                            <div class="row">
                                <input type="hidden" id="batchid" name="batchid" class="">
                                <div class="col-12 col-md-12 col-ms-6 mb-3">
                                    <label>Topic</label>
                                    <select type="text" class="form-control" id="topic" name="topic">

                                    </select>
                                    <span class="text-danger">
                                        @error('topic')
                                            {{ 'Topic is required' }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 col-md-12 col-ms-6 mb-3">
                                    <label>Class Link</label>
                                    <input type="text" class="form-control" id="classlink" name="classlink">
                                    <span class="text-danger">
                                        @error('classlink')
                                            {{ 'Class link is required' }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Class Start Time</label>
                                    <input type="datetime-local" class="form-control" id="classstarttime"
                                        name="classstarttime">
                                    <span class="text-danger">
                                        @error('classstarttime')
                                            {{ 'Class start time is required' }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="col-12 col-md-6 col-ms-6 mb-3">
                                    <label>Class End Time</label>
                                    <input type="datetime-local" class="form-control" id="classendtime" name="classendtime">
                                    <span class="text-danger">
                                        @error('classendtime')
                                            {{ 'Class end time is required' }}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                            <button type="submit" id="" class="btn btn-sm btn-success float-right">Submit</button>
                            <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                                data-dismiss="modal">Close</button>



                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openclassmodal(batchid, subjectid) {
                $('#batchid').val(batchid);
                $("#topic").html('');
                $.ajax({
                    url: "{{ url('fetchtopics') }}",
                    type: "POST",
                    data: {
                        subject_id: subjectid,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#topic').html('<option value="">-- Select Topic --</option>');
                        $.each(result.topics, function(key, value) {
                            $("#topic").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }

                });

                $('#scheduleclassmodal').modal('show')

            }

            function openstudentmodal(id) {
                var classId = $('#classname option:selected').val();
                $("#subject").html('');
                $.ajax({
                    url: "{{ url('tutor/batches/students') }}/" + id,
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        // console.log(result)
                        $('#studentlist').html('');
                        $.each(result, function(key, value) {
                            // $("#studentlist").append(value.name);
                        });
                        var table = "";
                        var p = 0;
                        for (var i in result) {
                            p++;
                            table += "<tr>";
                            table += "<td hidden>" +
                                result[i].id + "</td>" +
                                "<td>" + p + "</td>" +
                                "<td>" + result[i].name + "</td>";
                            table += "</tr>";
                        }

                        document.getElementById("studentlist").innerHTML = table;
                    }

                });
                // $('#studentlist').val()
                $('#studentlistmodal').modal('show')

            }

            function testapi() {
                // $.ajax({
                //     url: "https://zoom.us/oauth/authorize",
                //     type: "GET",
                //     data: {
                //         response_type : "code",
                //         redirect_uri : "http://127.0.0.1:8000/student/demolist",
                //         client_id : "oFed_e_zQi6wE8183XRI0A"

                //     },
                //     dataType: 'json',
                //     success: function(data) {
                //         alert(data)
                //     }
                // });
            // window.location.href = 'https://zoom.us/oauth/authorize?response_type=code&client_id=oFed_e_zQi6wE8183XRI0A&redirect_uri=http://127.0.0.1:8000/student/demolist';
            
            
        

        }
        </script>
    @endsection
