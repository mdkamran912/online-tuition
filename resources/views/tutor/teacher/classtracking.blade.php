<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from bootstrapdash.com/demo/skydash-free/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jun 2023 12:22:31 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Tutor Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="css/custom.css">

    <!-- endinject -->
    <!-- <link rel="shortcut icon" href="images/favicon.png" /> -->
    <style>
        .studList:hover {
            color: blue;
        }

        .completed {
            color: green;
        }

        .pending {
            color: orange
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium mr-3 buy-now-text">Free 24/7 customer support, updates,
                                and more with
                                this template!</p>
                            <a href="https://www.bootstrapdash.com/product/skydash-admin-template/?utm_source=organic&amp;utm_medium=banner&amp;utm_campaign=buynow_demo"
                                target="_blank" class="btn mr-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/skydash-admin-template/"><i
                                class="ti-home mr-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="ti-close text-white mr-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="tutorDashboard.html"><img
                        src="images/onlineTutor_logo.png" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="tutorDashboard.html"></a>
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
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="images/faces/face1.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="tutorProfileForTutor.html">
                                <i class="ti-user text-primary"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="index.html">
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
                <!-- <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="icon-menu"></span>
                    </button> -->
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                            aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                            aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                        aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                        id="add-task">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                            </ul>
                        </div>
                        <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                            <p class="text-gray mb-0">The total number of sessions</p>
                        </div>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary mr-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="text-gray mb-0 ">Call Sarah Graves</p>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small
                                class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                                All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                <small class="text-muted my-auto">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">47 min</small>
                            </li>
                        </ul>
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="tutorDashboard.html">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item" hidden>
                        <a class="nav-link" href="demo.html">
                            <i class="ti-control-play menu-icon"></i>
                            <span class="menu-title">Demo</span>
                        </a>

                    </li>
                    <li class="nav-item" hidden>
                        <a class="nav-link" href="candidateList.html">
                            <i class="ti-user menu-icon"></i>
                            <span class="menu-title">Candidate</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="addPractice.html">
                            <i class="ti-user menu-icon"></i>
                            <span class="menu-title">Practice</span>
                        </a>
                    </li>
                    <li class="nav-item" hidden>
                        <a class="nav-link" data-toggle="collapse" href="addPractice.html" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="ti-pencil-alt2 menu-icon"></i>
                            <span class="menu-title">Practice</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="scheduleClassByTutor.html" aria-controls="form-elements">
                            <i class="ti-pencil-alt2 menu-icon"></i>
                            <span class="menu-title">Schedule Class</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addVideo.html">
                            <i class="ti-video-clapper menu-icon"></i>
                            <span class="menu-title">Video</span>
                        </a>
                    </li>
                    <!-- <div class="collapse" id="form-elements">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item"> <a class="nav-link" href="yourTutor.html">Your Tutor</a></li>
                                        <li class="nav-item"> <a class="nav-link" href="tutorSearchPage.html">Search Tutor</a>
                                        </li>
                                    </ul>
                                </div> -->
                    </li>

                    <li class="nav-item" hidden>
                        <a class="nav-link" href="candidateSelectedSubjects.html">
                            <i class="ti-book menu-icon"></i>
                            <span class="menu-title">Subjects</span>
                        </a>
                    </li>

                    <li class="nav-item" hidden>
                        <a class="nav-link" href="myLearnings.html">
                            <i class="ti-stats-up menu-icon"></i>
                            <span class="menu-title">My Learning</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" classTracking.html" aria-controls="form-elements">
                            <i class="ti-pencil-alt menu-icon"></i>
                            <span class="menu-title">Class Tracking</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item" hidden>
                        <a class="nav-link" href="studentActivity.html" aria-controls="form-elements">
                            <i class="ti-ruler-pencil menu-icon"></i>
                            <span class="menu-title">Activity</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item" hidden>
                        <a class="nav-link" href="exam.html" aria-controls="form-elements">
                            <i class="ti-target menu-icon"></i>
                            <span class="menu-title">Examination</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item" hidden>
                        <a class="nav-link" href="fees.html" aria-controls="form-elements">
                            <i class="ti-money menu-icon"></i>
                            <span class="menu-title">Fees</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tutorMessagePanel.html" aria-controls="form-elements">
                            <i class="ti-email menu-icon"></i>
                            <span class="menu-title">Message</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="feedback1to1.html">
                            <i class="ti-comment-alt menu-icon"></i>
                            <span class="menu-title">Feedback</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="paymentTracking.html">
                            <i class="ti-money menu-icon"></i>
                            <span class="menu-title">Paymet</span>
                        </a>
                    </li>




                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="mb-2" id="listHeader">
                        <h3>Track Your Classes</h3>
                        <!-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#classesModal">Give
                            Feedback</button> -->
                    </div>


                    <table class="table table-bordered table-hover">
                        <thead class="bg-dark text-white text-center">
                            <tr>
                                <th>S.No.</th>
                                <th>Subject</th>
                                <th>Topic</th>
                                <th>Date & time</th>
                                <th>Students</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mathematics</td>
                                <td>Algebra</td>
                                <td>Mon 19 June 2023 10:00</td>
                                <td><span data-toggle="modal" class="studList" data-target="#listofstudents">See
                                        list of
                                        Student</span>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>Mathematics</td>
                                <td>Coordinate Geometry</td>
                                <td> Tue 20 June 2023 10:00</td>
                                <td><span data-toggle="modal" class="studList" data-target="#listofstudents">See
                                        list of
                                        Student</span>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Mathematics</td>
                                <td>Geometry</td>
                                <td>Wed 21 June 2023 10:00</td>
                                <td><span data-toggle="modal" class="studList" data-target="#listofstudents">See
                                        list of
                                        Student</span>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Mathematics</td>
                                <td>Geometry</td>
                                <td>Thu 21 June 2023 10:00</td>
                                <td><span data-toggle="modal" class="studList" data-target="#listofstudents">See
                                        list of
                                        Student</span>
                                </td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>Mathematics</td>
                                <td>Trigonometry</td>
                                <td>Fri 21 June 2023 10:00</td>
                                <td><span data-toggle="modal" class="studList" data-target="#listofstudents">See
                                        list of
                                        Student</span>
                                </td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>Mathematics</td>
                                <td>Trigonometry</td>
                                <td>Sat 21 June 2023 10:00</td>
                                <td><span data-toggle="modal" class="studList" data-target="#listofstudents">See
                                        list of
                                        Student</span>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Mathematics</td>
                                <td>Trigonometry</td>
                                <td>Sun 21 June 2023 10:00</td>
                                <td><span data-toggle="modal" class="studList" data-target="#listofstudents">See
                                        list of
                                        Student</span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                    <div class="row mt-2">

                        <button class="btn btn-info" data-toggle="modal" data-target="#batchStatus">Check Batch
                            Status</button>
                    </div>


                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                            All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->


    <!-- modal -->


    <div class="modal fade" id="listofstudents" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <h3 class="text-center mb-3"><u>List Of Students</u></h3>

                    <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Thomas</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Olivia</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Daniel</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Elizabeth</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Emma</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>James</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>William</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>John</td>
                            </tr>
                        </tbody>

                    </table>






                    <button type="button" class="btn btn-sm btn-danger mr-1 moveRight"
                        data-dismiss="modal">Close</button>




                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="batchStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <h3 class="text-center mb-3"><u>Batch Status</u></h3>

                    <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>S.No.</th>
                                <th>Class</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Class 1</td>
                                <td class="pending">Pending</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Class 2</td>
                                <td class="pending">Pending</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Class 3</td>
                                <td class="completed">Completed</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Class 4</td>
                                <td class="completed">Completed</td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>Class 5</td>
                                <td class="completed">Completed</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-2">
                        <button type="button" class="btn btn-sm btn-danger moveRight"
                            data-dismiss="modal">Close</button>

                    </div>


                </div>

            </div>
        </div>
    </div>





    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <script src="js/bootstrap.bundle.multi.toggle.min.js"></script>
    <!-- End custom js for this page-->
</body>


<!-- Mirrored from bootstrapdash.com/demo/skydash-free/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jun 2023 12:22:40 GMT -->

</html>