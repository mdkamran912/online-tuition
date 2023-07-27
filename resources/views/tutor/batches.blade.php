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
                        @foreach ($batches as $batch)
                            
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$batch->class_name}}</td>
                        <td>{{$batch->subject_name}}</td>
                        <td>{{$batch->batch_name}}</td>
                        <td>{{$batch->batch_description}}</td>
                        <td><button class="btn btn-sm btn-primary" onclick="openstudentmodal({{$batch->batch_id}});"><span class="fa fa-search"></span> View Students</button> <button class="btn btn-sm btn-primary" onclick="openclassmodal();"><span class="fa fa-plus-circle"></span> Schedule Class</button></td>
                        
                      </tr>
                      @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{-- {!! $demos->links() !!} --}}
                </div>


            </div>
        </div>
        <!-- content-wrapper ends -->


         <!--Student List modal -->
         <div class="modal fade" id="studentlistmodal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">


                 <div class="modal-body">


                     <header>
                         <h3 class="text-center mb-4">Student List</h3>
                     </header>

                     <form action="" method="">
                         <div class="row">
                            <div class="col-12 col-md-6 col-ms-6 mb-3">
                         <select id="studentlist" name="studentlist" multiple>

                         </select>
                            </div>
                         </div>


                         <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                             data-dismiss="modal"><span class="fa fa-times"></span> Close</button>



                     </form>
                 </div>
             </div>
         </div>
     </div>

        
                <!--Schedule modal -->
                <div class="modal fade" id="scheduleclassmodal" tabindex="-1" role="dialog"
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
            function openclassmodal(){

                 $('#scheduleclassmodal').modal('show')

            }
            function openstudentmodal(id){
                var classId = $('#classname option:selected').val();
                $("#subject").html('');
                $.ajax({
                    url: "{{ url('tutor/batches/students') }}/"+id,
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        console.log(result.student_data);
                        $('#studentlist').html('<option value="">-- Select Type --</option>');
                        $.each(result.students, function(key, value) {
                            $("#studentlist").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }

                });
                // $('#studentlist').val()
            $('#studentlistmodal').modal('show')

            }
        </script>
    @endsection
