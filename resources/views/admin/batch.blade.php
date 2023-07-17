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
            <div id="listHeader" class="mb-3">
                <h3>List Of Batches</h3>
                <button class="btn btn-sm btn-primary" onclick="openmodal();"> <span class="fa fa-plus"></span> New
                    Batch</button>
            </div>
            <div class="mt-4" id="">
                <table class="table table-bordered table-hover mt-3 table-responsive">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>S.No.</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Tutor Name</th>
                            <th>Batch</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Students</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <thead name="classbody">
                        @foreach ($batches as $batch)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $batch->class_name }}</td>
                                <td>{{ $batch->subject_name }}</td>
                                <td><a
                                        href="{{ url('admin/tutorprofile') . '/' . $batch->tutor_id }}">{{ $batch->tutor_name }}</a>
                                </td>
                                <td>{{ $batch->batch_name }}</td>
                                <td>{{ $batch->batch_description }}</td>

                                <td>
                                    <div class="toggle-button-cover">
                                        <div class="button-cover">
                                            <div class="button r" id="button-3">
                                                <input type="checkbox"
                                                    onclick="changestatus('{{ $batch->batch_id }}','{{ $batch->batch_status }}');"
                                                    class="checkbox" @if ($batch->batch_status == 1) then checked @endif>
                                                <div class="knobs"></div>
                                                <div class="layer"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><button type="button" class="badge btn-sm btn-primary"
                                        onclick="addstudentsmodal({{ $batch->class_id }});">Add Students</button>
                                    <br><br><button type="button" class="badge btn-sm btn-primary"
                                        onclick="viewstudentsmodal('{{ $batch->batch_id }}','{{ $batch->class_id }}','{{ $batch->subject_id }}','{{ $batch->tutor_id }}','{{ $batch->batch_name }}','{{ $batch->batch_description }}');">Add
                                        Students</button>
                                </td>

                                <td><button type="button" class="badge btn-sm btn-primary"
                                        onclick="edit('{{ $batch->batch_id }}','{{ $batch->class_id }}','{{ $batch->subject_id }}','{{ $batch->tutor_id }}','{{ $batch->batch_name }}','{{ $batch->batch_description }}');">Edit
                                        Record</button></td>

                            </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
            <!-- content-wrapper ends -->
            <div class="d-flex justify-content-center">
                {!! $batches->links() !!}
            </div>
        </div>

        <!-- content-wrapper ends -->

        <!-- modal -->
        <div class="modal fade" id="addTopicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <h3 class="text-center mb-3"><u>Add New Batch</u></h3>
                        <form action="{{ route('admin.batch.create') }}" method="POST">
                            @csrf
                            <div class=" row">
                                <div class="form-group col-md-6">
                                    <label for="">Class<i style="color:red">*</i></label>
                                    <select type="text" class="form-control" id="classname" name="classname"
                                        onchange="fetchSubjects();" required>
                                        <option value="">--Select--</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" id="id" name="id" class="form-group">
                                    <label for="">Subject<i style="color:red">*</i></label>
                                    <select type="text" class="form-control" id="subject" name="subject" required>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="hidden" id="id" name="id" class="form-group">
                                    <label for="">Tutor<i style="color:red">*</i></label>
                                    <select type="text" class="form-control" id="tutor" name="tutor" required>
                                        <option value="">--Select--</option>
                                        @foreach ($tutors as $tutor)
                                            <option value="{{ $tutor->id }}">{{ $tutor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Topic<i style="color:red">*</i></label>
                                    <input type="text" class="form-control" placeholder="Enter Batch Name"
                                        name="batchname" id="batchname" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Description</label>
                                    <textarea type="text" class="form-control" placeholder="Enter Description" name="description" id="description"></textarea>
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
        {{-- Modal add students --}}
        <div class="modal fade" id="addStudentsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-body">
                        <h3 class="text-center mb-3"><u>Add Student</u></h3>
                        <form action="" method="">
                            {{-- <div class=" row">
                        <div class="form-group col-md-12">
                            <label for="">Class</label>
                            <select type="text" class="form-control" id="batchclassid" name="batchclassid">
                                @foreach ($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                            <input type="text" id="classid" name="classid">
                            <table class="table table-bordered table-hover mb-3">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Select</th>
                                        <th>Student</th>
                                    </tr>
                                </thead>
                                <tbody id="studentlisttbl" name="studentlisttbl">
                                    <tr>
                                        <td>1</td>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td>qwertyhjk sdfgh sdfg</td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <button type="button" id="" class="btn btn-sm btn-primary float-right"><span
                                class="fa fa-plus"></span>
                            Add</button>
                        <button type="button" class="btn btn-sm btn-danger mr-1 moveRight" data-dismiss="modal"><span
                                class="fa fa-times"></span> Close</button>

                    </div>

                </div>
            </div>
        </div>

        <script>
            function openmodal() {

                $('#id').val('');
                $('#classname').val('');
                $('#subject').val('');
                $('#tutor').val('');
                $('#batchname').val('');
                $('#description').val('');
                $('#addTopicModal').modal('show');
            }

            function edit(id, classname, subjectname, tutorid, batchname, description) {
                $('#id').val(id);
                $('#classname').val(classname);
                $('#subject').val(subjectname)
                $('#tutor').val(tutorid)
                $('#batchname').val(batchname)
                $('#description').val(description)
                $('#addTopicModal').modal('show');
            }

            function changestatus(id, status) {

                var url = "{{ URL('admin/batch/status') }}";
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
                            window.location = "/admin/batch";
                        } else {
                            alert("Something went wrong. Please try again later");
                        }

                    }
                });

            }

            function fetchSubjects() {

                var classId = $('#classname option:selected').val();
                $("#subject").html('');
                $.ajax({
                    url: "{{ url('fetchsubjects') }}",
                    type: "POST",
                    data: {
                        class_id: classId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#subject').html('<option value="">-- Select Type --</option>');
                        $.each(result.subjects, function(key, value) {
                            $("#subject").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }
                });
            };
            var data = "";

            function addstudentsmodal(classId) {
                $('#addStudentsModal').modal('show');

                $.ajax({
                    url: "{{ url('studentsbyclass') }}",
                    type: "POST",
                    data: {
                        class_id: classId,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        data = result.students;
                        populateTable();
                    }
                });
            };

            function populateTable() {
                var table = "";
                var p=0;
                for (var i in data) {
                    p++;
                    table += "<tr>";
                    table += "<td hidden>" +
                        data[i].id + "</td>" +
                        "<td>" + p + "</td>" +
                        "<td>" + data[i].name + "</td>" +
                        "<td><input id='sel"+data[i].id+"' type='checkbox'><label for=''>&nbsp; Select</label></td>";
                    table += "</tr>";
                }

                document.getElementById("studentlisttbl").innerHTML = table;

            }
        </script>
    @endsection
