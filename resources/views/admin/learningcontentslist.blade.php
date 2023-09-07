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
        <div id="" class="mb-3 listHeader page-title-box">
            <h3>Learning Contents</h3>
            <button class="btn btn-sm btn-primary"> <a  class="text-white" href="{{route('admin.addlearningcontents')}}">Add Content</a></button>
        </div>

        <div class="row">


            <div class="col-md-2">
                <div class="form-group">
                    <select  class="form-control" name="class" id="class">
                        <option>--Select Class--</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <select  class="form-control" name="sub" id="sub">
                        <option>--Select Subject--</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <select  class="form-control" name="topic" id="topic">
                        <option>--Select Topic--</option>
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
            <div class="col-md-4">
                <div class="form-group">
                <button class="btn btn-primary" style="float:right"> <span
                    class="fa fa-search"></span> Search</button>
                </div>
            </div>
        </div>
        <hr>



        <div class="mt-4 table-responsive" id="">
            <table class="table table-hover table-striped align-middlemb-0 ">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Class/Grade</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Topic</th>
                        <th scope="col">Content</th>
                        <th scope="col">Video</th>
                        <th scope="col">Blog</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($contents as $content)
                       <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$content->classname}}</td>
                        <td>{{$content->subjectname}}</td>
                        <td>{{$content->topicname}}</td>
                        <td><div class="text-center">{{$content->content_description}}</div><br>
                            @if ($content->content_link)
                            <div class="text-center"><a href="{{url('uploads/documents/learningcontents')}}/{{$content->content_link}}" target="_blank" class="badge bg-primary mt-2 ">View</a></div>
                                
                            @endif
                        </td>
                        <td><div class="text-center">{{$content->video_description}}</div><br>
                            @if ($content->video_link)
                            
                            <div class="text-center"><a href="{{url('uploads/videos/learningcontents')}}/{{$content->video_link}}" target="_blank" class="badge bg-primary">View</a></div>
                            @endif
                        </td>
                        <td><div class="text-center">{{$content->blog_description}}</div><br>
                            @if ($content->blog_link)
                                
                            <div class="text-center"><a href="{{$content->blog_link}}" target="_blank" class="badge bg-primary">View</a></div>
                            @endif
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                @if ($content->contentstatus == 1)
                                <i class="ri-checkbox-circle-line align-middle text-success"></i> Active 
                                @else
                                <i class="ri-close-circle-line align-middle text-danger"></i> Inactive 
                                @endif
                                <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" onclick="changestatus('{{$content->contentid}}','{{$content->contentstatus}}');" class="checkbox" @if ($content->contentstatus == 1) then checked
                                            
                                @endif>
                            </div>
                        </td>
                      
                        <td><a href="learningcontents/{{$content->contentid}}"><button class="badge bg-danger">Modify</button></a></td>
                       </tr>
                   @endforeach
                </tbody>
            </table>
        </div>



    </div>
<script>
    function changestatus(id,status){
            
            var url = "{{URL('admin/learningcontents/status')}}";
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
                    window.location = "/admin/learningcontents";
                 }
                 else{
                     alert("Something went wrong. Please try again later");
                 }
                    
                }
            });
            
        }
        </script>
@endsection