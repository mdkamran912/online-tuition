<!DOCTYPE html>
<html lang="en">



<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Tutor</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{url('vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{url('vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    <link rel="stylesheet" href="{{url('css/chat.css')}}">
    <script src="{{url('js/ckeditor.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{url('vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{url('vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('js/select.dataTables.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('css/vertical-layout-light/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="{{('css/star-rating-svg.css')}}"> --}}
    <!-- endinject -->
    <!-- <link rel="shortcut icon" href="images/favicon.png" /> -->
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="{{url('student/dashboard')}}"><img
                        src="{{url('images/onlineTutor_logo.png')}}" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{url('student/dashboard')}}"></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="icon-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input" placeholder=" Search now"
                                aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item dropdown">

                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="icon-bell mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                            aria-labelledby="notificationDropdown">
                            <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-success">
                                        <i class="ti-info-alt mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Just now
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-warning">
                                        <i class="ti-settings mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">Settings</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        Private message
                                    </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="ti-user mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                    <p class="font-weight-light small-text mb-0 text-muted">
                                        2 days ago
                                    </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown">

                        <a class="nav-link dropdown-toggle ml-2" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="{{url('images/tutors/profilepics','/')}}{{ $studentpro->profile_pic ?? url('images/avatar/default-profile-pic.png')}}"
                                alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">{{session('userid')->name}} &nbsp;<img src="{{url('images/icons/check.png')}}" style="height: 20px;width:20px"></a>
                            <a class="dropdown-item" href="{{url('tutor/profile')}}">
                                <i class="ti-user text-primary"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{route('logout')}}">
                                <i class="ti-power-off text-primary"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                    <!-- <li class="nav-item nav-settings d-none d-lg-flex">
                        <a class="nav-link" href="#">
                            <i class="icon-ellipsis"></i>
                        </a>
                    </li> -->
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
           
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tutor.dashboard')}}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tutor.demolist')}}">
                            <i class="ti-control-play menu-icon"></i>
                            <span class="menu-title">Demo List</span>
                        </a>

<<<<<<< Updated upstream
                    </li>
                    
=======
            <div id="scrollbar">
                <div class="container-fluid">


                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="/tutor/dashboard" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                            </a>

                        </li> <!-- end Dashboard Menu -->

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Apps</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-calendar"> Calendar </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('tutor.messages')}}" class="nav-link" data-key="t-chat"> Chat </a>
                                    </li>

                                </ul>

                            </div>
                        </li>


>>>>>>> Stashed changes

<<<<<<< Updated upstream
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tutor.batches')}}">
                            <i class="ti-book menu-icon"></i>
                            <span class="menu-title">Batches</span>
                        </a>
                    </li>

<<<<<<< Updated upstream
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tutor.liveclass.classlist')}}">
                            <i class="ti-stats-up menu-icon"></i>
                            <span class="menu-title">Upcoming Classes</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tutor.classes')}}">
                            <i class="ti-stats-up menu-icon"></i>
                            <span class="menu-title">Completed Classes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tutor.assignments')}}" aria-controls="form-elements">
                            <i class="ti-ruler-pencil menu-icon"></i>
                            <span class="menu-title">Assignments</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.learningcontents')}}" aria-controls="form-elements">
                            <i class="ti-pencil-alt menu-icon"></i>
                            <span class="menu-title">Learning Contents</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li> --}}
                    
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.questionbank')}}" aria-controls="form-elements">
                            <i class="ti-target menu-icon"></i>
                            <span class="menu-title">Question Bank</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.onlinetests')}}" aria-controls="form-elements">
                            <i class="ti-target menu-icon"></i>
                            <span class="menu-title">Online Tests</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.payments')}}" aria-controls="form-elements">
                            <i class="ti-money menu-icon"></i>
                            <span class="menu-title">My Payments</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tutor.messages')}}" aria-controls="form-elements">
                            <i class="ti-email menu-icon"></i>
                            <span class="menu-title">Message</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tutor.feedback.list')}}" aria-controls="form-elements">
                            <i class="ti-comment-alt menu-icon"></i>
                            <span class="menu-title">Feedback</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('tutor/profile')}}" aria-controls="form-elements">
                            <i class="ti-user menu-icon"></i>
                            <span class="menu-title">My Profile</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>


=======
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Classes</span> <span class="badge badge-pill bg-danger" data-key="t-hot">Updates</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLayouts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('tutor.demolist')}}" target="_blank" class="nav-link" data-key="t-horizontal">Demo Classes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('tutor.classes')}}" target="_blank" class="nav-link" data-key="t-horizontal">Scheduled Classes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('tutor.batches')}}" target="_blank" class="nav-link" data-key="t-horizontal">Batches</a>
                                    </li>


                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Purchase</span></li>
{{--
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                                <i class="ri-pages-line"></i> <span data-key="t-pages">My Purchases</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarPages">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <li class="nav-item">
                                            <a href="{{route('tutor.searchtutor')}}" class="nav-link" data-key="t-starter">Purchase New Tutor </a>
                                        </li>
                                        <a href="{{route('tutor.yourtutor')}}" class="nav-link" data-key="t-starter"> Tutor </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('tutor.subjects')}}" class="nav-link" data-key="t-starter"> Subjects </a>
                                    </li>

                                </ul>
                            </div>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                                <i class="ri-rocket-line"></i> <span data-key="t-landing">Study Materials</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLanding">
                                <ul class="nav nav-sm flex-column">
                                    {{-- <li class="nav-item">
                                        <a href="{{route('tutor.mylearnings')}}" class="nav-link" data-key="t-one-page">Learning Contents</a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="{{route('tutor.assignments')}}" class="nav-link" data-key="t-one-page">Assignments</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

{{--

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                                <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Online Tests</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                                <a href="{{route('tutor.exams')}}" class="nav-link" data-key="t-alerts">Quizes</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li> --}}


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarForms">
                                <i class="ri-file-list-3-line"></i> <span data-key="t-forms">Payments</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarForms">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('tutor.payments')}}" class="nav-link" data-key="t-form-select"> Payment History </a>
                                    </li>


                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCharts">
                                <i class="ri-pie-chart-line"></i> <span data-key="t-charts">Reports</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCharts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-chartjs"> Payments </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-chartjs"> Classes </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-chartjs"> Attendance </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarFormsChat" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarForms">
                                <i class="ri-file-list-3-line"></i> <span data-key="t-forms">Chat & Feedbacks</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarFormsChat">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('tutor.messages')}}" class="nav-link" data-key="t-form-select"> Chat/Messages </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('tutor.feedback.list')}}" class="nav-link" data-key="t-form-select"> Feedbacks </a>
                                    </li>


                                </ul>
                            </div>
                        </li>
>>>>>>> Stashed changes

                </ul>
            </nav>
=======
                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="/tutor/dashboard" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                            </a>

                        </li> <!-- end Dashboard Menu -->

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Apps</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-calendar"> Calendar </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('tutor.messages')}}" class="nav-link" data-key="t-chat"> Chat </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                                <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Classes</span> <span class="badge badge-pill bg-danger" data-key="t-hot">Updates</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLayouts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('tutor.demolist')}}" target="_blank" class="nav-link" data-key="t-horizontal">Demo Classes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('tutor.classes')}}" target="_blank" class="nav-link" data-key="t-horizontal">Scheduled Classes</a>
                                    </li>

                                </ul>
                            </div>
                        </li> <!-- end Dashboard Menu -->

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Purchase</span></li>
{{--
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                                <i class="ri-pages-line"></i> <span data-key="t-pages">My Purchases</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarPages">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <li class="nav-item">
                                            <a href="{{route('tutor.searchtutor')}}" class="nav-link" data-key="t-starter">Purchase New Tutor </a>
                                        </li>
                                        <a href="{{route('tutor.yourtutor')}}" class="nav-link" data-key="t-starter"> Tutor </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('tutor.subjects')}}" class="nav-link" data-key="t-starter"> Subjects </a>
                                    </li>

                                </ul>
                            </div>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarLanding" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLanding">
                                <i class="ri-rocket-line"></i> <span data-key="t-landing">Study Materials</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarLanding">
                                <ul class="nav nav-sm flex-column">
                                    {{-- <li class="nav-item">
                                        <a href="{{route('tutor.mylearnings')}}" class="nav-link" data-key="t-one-page">Learning Contents</a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="{{route('tutor.assignments')}}" class="nav-link" data-key="t-one-page">Assignments</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

{{--

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarAdvanceUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAdvanceUI">
                                <i class="ri-stack-line"></i> <span data-key="t-advance-ui">Online Tests</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAdvanceUI">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                                <a href="{{route('tutor.exams')}}" class="nav-link" data-key="t-alerts">Quizes</a>
                                            </li>

                                        </ul>
                                    </div>
                                </li> --}}


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarForms" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarForms">
                                <i class="ri-file-list-3-line"></i> <span data-key="t-forms">Payments</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarForms">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('tutor.payments')}}" class="nav-link" data-key="t-form-select"> Payment History </a>
                                    </li>


                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarCharts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCharts">
                                <i class="ri-pie-chart-line"></i> <span data-key="t-charts">Reports</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCharts">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-chartjs"> Payments </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-chartjs"> Classes </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-chartjs"> Attendance </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarFormsChat" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarForms">
                                <i class="ri-file-list-3-line"></i> <span data-key="t-forms">Chat & Feedbacks</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarFormsChat">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('tutor.messages')}}" class="nav-link" data-key="t-form-select"> Chat/Messages </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('tutor.feedback.list')}}" class="nav-link" data-key="t-form-select"> Feedbacks </a>
                                    </li>


                                </ul>
                            </div>
                        </li>


                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
>>>>>>> Stashed changes
