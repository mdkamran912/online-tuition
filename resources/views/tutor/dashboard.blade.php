@extends('tutor.layouts.main')
@section('main-section')
<<<<<<< Updated upstream
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
=======


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
>>>>>>> Stashed changes
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome {{session('userid')->name}}</h3>
                                    <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                                            class="text-primary">0 unread alerts!</span></h6>
                                </div>
                                <div class="col-12 col-xl-4">
                                    <div class="justify-content-end d-flex">
                                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                                id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">
                                                <i class="mdi mdi-calendar"></i> <span id="today"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuDate2">
                                                <a class="dropdown-item" href="#">January - March</a>
                                                <a class="dropdown-item" href="#">March - June</a>
                                                <a class="dropdown-item" href="#">June - August</a>
                                                <a class="dropdown-item" href="#">August - November</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
<<<<<<< Updated upstream
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card tale-bg">
                                <div class="card-people mt-auto">
                                    <img src="{{url('images/dashboard/educationDashboard.svg')}}" alt="people"
                                        height="290px">
                                    <div class="weather-info" style="padding:8%;">
                                        <div class="d-flex">
                                            <div>
                                                <h2 class="mb-0 font-weight-normal"><i
                                                        class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                                            </div>
                                            <div class="ml-2">
                                                <h4 class="location font-weight-normal">USA</h4>
                                                <h6 class="font-weight-normal">California</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
=======
                        <div class="col-xxl-5">
                            <div class="d-flex flex-column h-100">
                                <div class="row h-100">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <div class="alert alert-success border-0 rounded-0 m-0 d-flex align-items-center" role="alert">
                                                    {{-- <i data-feather="alert-triangle" class="text-warning me-2 icon-sm"></i> --}}
                                                    <div class="flex-grow-1 text-truncate">
                                                        Welcome To Dashboard

                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <a  class="text-reset text-decoration-underline"><b>{{session('userid')->name}}!</b></a>
                                                    </div>
                                                </div>

                                                <div class="row align-items-end">
                                                    <div class="col-sm-12">
                                                        <div class="p-3">
                                                            <p class="fs-16 lh-base">"Education is the key to unlocking a world of possibilities, and with this online tuition app, we're not just gaining knowledge; we're gaining the future. Welcome to a journey of learning, where every lesson brings us closer to our dreams. Together, let's explore, discover, and excel. Here's to the start of an exciting educational adventure!"</p>

                                                            <div class="mt-3">
                                                                {{-- <a href="pages-pricing.html" class="btn btn-success">Upgrade Account!</a> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-sm-4">
                                                        <div class="px-3">
                                                            <img src="assets/images/user-illustarator-2.png" class="img-fluid" alt="">
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div> <!-- end card-body-->
                                        </div>
                                    </div> <!-- end col-->
                                </div> <!-- end row-->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Demo Pending</p>
                                                       <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$pending_demos ?? '0'}}">{{$pending_demos ?? '0'}}</span></h4>
                                                            <a href="" class="text-decoration-underline">View details</a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                                <i data-feather="users" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Classes Taken</p>
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$classes_taken ?? '0'}}">{{$classes_taken ?? '0'}}</span></h4>
                                                            <a href="" class="text-decoration-underline">View details</a>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                                <i data-feather="activity" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row-->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Total Earning</p>
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">£<span class="counter-value" data-target="{{$moneyEarned->total_earned ?? "0"}}">{{$moneyEarned->total_earned ?? "0"}}</span></h4>
                                                            <a href="" class="text-decoration-underline">View details</a>
                                                        </div></div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                                <i data-feather="clock" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->

                                    <div class="col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <p class="fw-medium text-muted mb-0">Students Enrolled</p>
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="{{$moneyEarned->student_count ?? "0"}}">{{$moneyEarned->student_count ?? "0"}}</span></h4>
                                                            <a href="" class="text-decoration-underline">View details</a>
                                                        </div></div>
                                                    <div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded-circle fs-2">
                                                                <i data-feather="external-link" class="text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- end card body -->
                                        </div> <!-- end card-->
                                    </div> <!-- end col-->
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end col-->

                        <div class="col-xxl-7">
                            <div class="row h-100">
                                <div class="col-xxl-5">
                                    <div class="card card-height-100">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Upcoming Classes</h4>

                                        </div><!-- end card header -->

                                        {{-- <div class="card-body pt-0">
                                            <ul class="list-group list-group-flush border-dashed">
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">25</h5>
                                                                    <div class="text-muted">Tue</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">12:00am - 03:30pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Meeting for campaign with sales team</a>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">20</h5>
                                                                    <div class="text-muted">Wed</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">02:00pm - 03:45pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Adding a new event with attachments</a>
                                                        </div>
                                                   </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">17</h5>
                                                                    <div class="text-muted">Wed</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">04:30pm - 07:15pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Create new project Bundling Product</a>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">12</h5>
                                                                    <div class="text-muted">Tue</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">10:30am - 01:15pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Weekly closed sales won checking with sales team</a>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                            </ul><!-- end -->
                                            <div class="align-items-center mt-2 row text-center text-sm-start">
                                                <div class="col-sm">
                                                    <div class="text-muted">Showing<span class="fw-semibold">4</span> of <span class="fw-semibold">125</span> Results</div>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                                        <li class="page-item disabled">
                                                            <a href="#" class="page-link">←</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">1</a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a href="#" class="page-link">2</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">→</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- end card body --> --}}
                                        <div class="card-body pt-0">
                                            <ul class="list-group list-group-flush border-dashed">
                                                @foreach ($upcomingClasses as $class)
                                                    <li class="list-group-item ps-0">
                                                        <div class="row align-items-center g-3">
                                                            <div class="col-auto">
                                                                <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                    <div class="text-center">
                                                                        <h5 class="mb-0">{{ $class->start_time->format('d') }}</h5>
                                                                        <div class="text-muted">{{ $class->start_time->format('M') }}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <h5 class="text-muted mt-0 mb-1 fs-13">{{ $class->start_time->format('h:iA') }} - {{ $class->start_time->addMinutes($class->duration)->format('h:iA') }}</h5>
                                                                <a href="#" class="text-reset fs-14 mb-0">{{ $class->topic_name }}</a>
                                                            </div>
                                                        </div><!-- end row -->
                                                    </li><!-- end -->
                                                @endforeach
                                            </ul><!-- end -->
                                            <div class="align-items-center mt-2 row text-center text-sm-start">
                                                <div class="col-sm">
                                                    {{-- <div class="text-muted">Showing <span class="fw-semibold">{{ count($upcomingClasses) }}</span> of <span class="fw-semibold">{{ $totalClassesCount }}</span> Results</div> --}}
                                                </div>
                                                <div class="col-sm-auto">
                                                    <!-- Pagination can be added here if needed -->
                                                </div>
                                            </div>
                                        </div>



                                    </div><!-- end card -->
                                </div>

                                <div class="col-xxl-5">
                                    <div class="card card-height-100">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Upcoming Tests/Quizes</h4>

                                        </div><!-- end card header -->

                                        {{-- <div class="card-body pt-0">
                                            <ul class="list-group list-group-flush border-dashed">
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">25</h5>
                                                                    <div class="text-muted">Tue</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">12:00am - 03:30pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Meeting for campaign with sales team</a>
                                                        </div>

                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">20</h5>
                                                                    <div class="text-muted">Wed</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">02:00pm - 03:45pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Adding a new event with attachments</a>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">17</h5>
                                                                    <div class="text-muted">Wed</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">04:30pm - 07:15pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Create new project Bundling Product</a>
                                                        </div>
                                                   </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">12</h5>
                                                                    <div class="text-muted">Tue</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">10:30am - 01:15pm</h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">Weekly closed sales won checking with sales team</a>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                            </ul><!-- end -->
                                            <div class="align-items-center mt-2 row text-center text-sm-start">
                                                <div class="col-sm">
                                                    <div class="text-muted">Showing<span class="fw-semibold">4</span> of <span class="fw-semibold">125</span> Results</div>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                                        <li class="page-item disabled">
                                                            <a href="#" class="page-link">←</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">1</a>
                                                        </li>
                                                        <li class="page-item active">
                                                            <a href="#" class="page-link">2</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">3</a>
                                                        </li>
                                                        <li class="page-item">
                                                            <a href="#" class="page-link">→</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- end card body --> --}}

                                        <div class="card-body pt-0">
                                            <ul class="list-group list-group-flush border-dashed">
                                                @foreach ($upcomingQuizes as $quiz)
                                                <li class="list-group-item ps-0">
                                                    <div class="row align-items-center g-3">
                                                        <div class="col-auto">
                                                            <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                                <div class="text-center">
                                                                    <h5 class="mb-0">{{ $quiz->test_start_date->format('d') }}</h5>
                                                                    <div class="text-muted">{{ $quiz->test_start_date->format('M') }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <h5 class="text-muted mt-0 mb-1 fs-13">
                                                                {{ $quiz->test_start_date->format('Y/m/d h:i:s A') }} - {{ $quiz->test_end_date->format('Y/m/d h:i:s A') }}
                                                            </h5>
                                                            <a href="#" class="text-reset fs-14 mb-0">{{ $quiz->name }}</a>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </li><!-- end -->
                                                @endforeach
                                            </ul><!-- end -->
                                            <div class="align-items-center mt-2 row text-center text-sm-start">
                                                <div class="col-sm">
                                                    <div class="text-muted">
                                                        {{-- Showing <span class="fw-semibold">{{ $upcomingQuizes->count() }}</span> of <span class="fw-semibold">{{ $totalQuizes }}</span> Results --}}
                                                    </div>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <!-- Pagination can be added here if needed -->
                                                </div>
                                            </div>
                                        </div><!-- end card -->
                                    </div>



                            </div> <!-- end row-->
                        </div><!-- end col -->
                    </div> <!-- end row-->
                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Latest Payments</h4>

                                </div><!-- end card header -->

                                {{-- <div class="card-body pt-0">
                                    <ul class="list-group list-group-flush border-dashed">
                                        <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">25</h5>
                                                            <div class="text-muted">Tue</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">txn-1234657890-5012450-5</h5>
                                                    <a href="#" class="text-reset fs-14 mb-0">Purchased 4 Classes For Maths</a>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </li><!-- end -->
                                        <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">20</h5>
                                                            <div class="text-muted">Wed</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">txn-1234657890-5012450-5</h5>
                                                    <a href="#" class="text-reset fs-14 mb-0">Purchased 4 Classes For Maths</a>
                                                </div>
                                           </div>
                                            <!-- end row -->
                                        </li><!-- end -->
                                        <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">17</h5>
                                                            <div class="text-muted">Wed</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">txn-1234657890-5012450-5</h5>
                                                    <a href="#" class="text-reset fs-14 mb-0">Purchased 4 Classes For Maths</a>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </li><!-- end -->
                                        <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">12</h5>
                                                            <div class="text-muted">Tue</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">txn-1234657890-5012450-5</h5>
                                                    <a href="#" class="text-reset fs-14 mb-0">Purchased 4 Classes For Maths</a>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </li><!-- end -->
                                    </ul><!-- end -->
                                    <div class="align-items-center mt-2 row text-center text-sm-start">
                                        <div class="col-sm">
                                            <div class="text-muted">Showing<span class="fw-semibold">4</span> of <span class="fw-semibold">125</span> Results</div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                                <li class="page-item disabled">
                                                    <a href="#" class="page-link">←</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">1</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="#" class="page-link">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">→</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="card-body pt-0">
                                    <ul class="list-group list-group-flush border-dashed">
                                        @foreach ($latest_payments as $payment)
                                            <li class="list-group-item ps-0">
                                                <div class="row align-items-center g-3">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                            <div class="text-center">
                                                                <h5 class="mb-0">{{ $payment->payment_date->format('d') }}</h5>
                                                                <div class="text-muted">{{ $payment->payment_date->format('M') }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5 class="text-muted mt-0 mb-1 fs-13">{{ $payment->transaction_id }}</h5>
                                                        <a href="#" class="text-reset fs-14 mb-0"> <a href="#" class="text-reset fs-14 mb-0">Purchased {{ $payment->classes_purchased }} Classes For {{ $payment->name }}</a></a>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                            </li><!-- end -->
                                        @endforeach
                                    </ul><!-- end -->
                                    <div class="align-items-center mt-2 row text-center text-sm-start">
                                        <div class="col-sm">
                                            {{-- <div class="text-muted">Showing <span class="fw-semibold">{{ $latest_payments->count() }}</span> of <span class="fw-semibold">125</span> Results</div> --}}
                                        </div>
                                        <div class="col-sm-auto">

                                        </div>
                                    </div>
                                </div>



                            </div><!-- end card -->
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Demo Conversion</h4>

                                </div>

                                <div class="card-body">

                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h6 class="text-muted text-uppercase fw-semibold text-truncate fs-12 mb-3">Total Demo Taken</h6>
                                            <h4 class="mb-0">{{$totalDemosTaken ?? '0'}}</h4>
                                            {{-- <p class="mb-0 mt-2 text-muted"><span class="badge bg-success-subtle text-success mb-0"> <i class="ri-arrow-up-line align-middle"></i> 15.72 % </span> vs. previous month</p> --}}
                                        </div><!-- end col -->
                                        <div class="col-6">
                                            <div class="text-center">
                                                <img src="assets/images/illustrator-1.png" class="img-fluid" alt="">
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                    <div class="mt-3 pt-2">
                                        <div class="progress progress-lg rounded-pill">
                                            @php
                                                $colorClasses = ['primary', 'info', 'success', 'warning', 'danger'];
                                                $colorIndex = 0;
                                            @endphp

                                            @foreach ($subjectData as $subject)
                                                <div class="progress-bar bg-{{ $colorClasses[$colorIndex] }}" role="progressbar" style="width: {{ $subject['percentage'] }}%;" aria-valuenow="{{ $subject['percentage'] }}" aria-valuemin="0" aria-valuemax="100"></div>

                                                {{-- Cycle the color index --}}
                                                @php
                                                    $colorIndex = ($colorIndex + 1) % count($colorClasses);
                                                @endphp
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="mt-3 pt-2">
                                        @php
                                            $colorClasses = ['primary', 'info', 'success', 'warning', 'danger'];
                                            $colorIndex = 0;
                                        @endphp
                                        @foreach ($subjectData as $subject)
                                            <div class="d-flex mb-2">
                                                <div class="flex-grow-1">
                                                    <p class="text-truncate text-muted fs-14 mb-0"><i class="mdi mdi-circle align-middle text-{{ $colorClasses[$colorIndex] }} me-2"></i>{{ $subject['subject_name'] }}</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <p class="mb-0">{{ number_format($subject['percentage'], 2) }}%</p>
                                                </div>
                                            </div><!-- end -->
                                            @php
                                                $colorIndex = ($colorIndex + 1) % count($colorClasses);
                                            @endphp
                                        @endforeach
                                    </div><!-- end -->
                                    <div class="mt-2 text-center">
                                        {{-- <a href="javascript:void(0);" class="text-muted text-decoration-underline">Show All</a> --}}
                                    </div>

                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xxl-4">
                            <div class="card card-height-100">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Upcoming Demo Classes</h4>

                                </div><!-- end card header -->

                                {{-- <div class="card-body pt-0">
                                    <ul class="list-group list-group-flush border-dashed">
                                        <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">25</h5>
                                                            <div class="text-muted">Tue</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">12:00am - 03:30pm</h5>
                                                    <a href="#" class="text-reset fs-14 mb-0">Meeting for campaign with sales team</a>
                                                </div>

                                            </div>
                                            <!-- end row -->
                                        </li><!-- end -->
                                        <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">20</h5>
                                                            <div class="text-muted">Wed</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">02:00pm - 03:45pm</h5>
                                                    <a href="#" class="text-reset fs-14 mb-0">Adding a new event with attachments</a>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </li><!-- end -->
                                        <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">17</h5>
                                                            <div class="text-muted">Wed</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">04:30pm - 07:15pm</h5>
                                                    <a href="#" class="text-reset fs-14 mb-0">Create new project Bundling Product</a>
                                                </div>
                                           </div>
                                            <!-- end row -->
                                        </li><!-- end -->
                                        <li class="list-group-item ps-0">
                                            <div class="row align-items-center g-3">
                                                <div class="col-auto">
                                                    <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                        <div class="text-center">
                                                            <h5 class="mb-0">12</h5>
                                                            <div class="text-muted">Tue</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <h5 class="text-muted mt-0 mb-1 fs-13">10:30am - 01:15pm</h5>
                                                    <a href="#" class="text-reset fs-14 mb-0">Weekly closed sales won checking with sales team</a>
                                                </div>
                                            </div>
                                            <!-- end row -->
                                        </li><!-- end -->
                                    </ul><!-- end -->
                                    <div class="align-items-center mt-2 row text-center text-sm-start">
                                        <div class="col-sm">
                                            <div class="text-muted">Showing<span class="fw-semibold">4</span> of <span class="fw-semibold">125</span> Results</div>
                                        </div>
                                        <div class="col-sm-auto">
                                            <ul class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                                <li class="page-item disabled">
                                                    <a href="#" class="page-link">←</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">1</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="#" class="page-link">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link">→</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="card-body pt-0">
                                    <ul class="list-group list-group-flush border-dashed">
                                        @foreach ($upcoming_demos as $demo)
                                            <li class="list-group-item ps-0">
                                                <div class="row align-items-center g-3">
                                                    <div class="col-auto">
                                                        <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3">
                                                            <div class="text-center">
                                                                <h5 class="mb-0">{{ $demo->slot_confirmed ? $demo->slot_confirmed->format('d') : $demo->slot_1->format('d')}}</h5>
                                                                <div class="text-muted">{{$demo->slot_confirmed ? $demo->slot_confirmed->format('M') : $demo->slot_1->format('M') }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5 class="text-muted mt-0 mb-1 fs-13">{{ $demo->slot_confirmed ? $demo->slot_confirmed->format('Y/m/d h:i:s A') :  $demo->slot_1->format('Y/m/d h:i:s A') }}</h5>
                                                        <a href="#" class="text-reset fs-14 mb-0">{{ $demo->remarks ?? $demo->demo_link}}</a>
                                                    </div>

                                                </div>
                                                <!-- end row -->
                                            </li>
                                        @endforeach
                                    </ul><!-- end -->
                                    <div class="align-items-center mt-2 row text-center text-sm-start">
                                        <div class="col-sm">
                                            {{-- <div class="text-muted">Showing<span class="fw-semibold">4</span> of <span class="fw-semibold">125</span> Results</div> --}}
                                        </div>
                                        <div class="col-sm-auto">

                                        </div>
                                    </div>
                                </div>

                            </div><!-- end card -->
>>>>>>> Stashed changes
                        </div>
                        <div class="col-md-6 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">
                                            <p class="mb-4">My Subjects</p>
                                            <p class="fs-30 mb-2">1</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Total Hours Completed</p>
                                            <p class="fs-30 mb-2">0</p>
                                            <!-- <p>20.00% (30 days)</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">
                                            <p class="mb-4">Assignments Completed </p>
                                            <p class="fs-30 mb-2">0</p>
                                            <p>00.00% (30 days)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">
                                            <p class="mb-4">Quizes Completed</p>
                                            <p class="fs-30 mb-2">0</p>
                                            <!-- <p>0.22% (30 days)</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
<<<<<<< Updated upstream
                <!-- content-wrapper ends -->
 @endsection
=======
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


@endsection
>>>>>>> Stashed changes
