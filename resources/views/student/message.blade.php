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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/chat.css">

    <!-- endinject -->
    <!-- <link rel="shortcut icon" href="images/favicon.png" /> -->
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
                <a class="navbar-brand brand-logo mr-5" href="studentDashboard.html"><img
                        src="images/onlineTutor_logo.png" class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="studentDashboard.html"></a>
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
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="studentProfile.html">
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



            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="studentDashboard.html">
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
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="ti-pencil-alt2 menu-icon"></i>
                            <span class="menu-title">Tutor</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="yourTutor.html">Your Tutor</a></li>
                                <li class="nav-item"> <a class="nav-link" href="tutorSearchPage.html">Search Tutor</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="candidateSelectedSubjects.html">
                            <i class="ti-book menu-icon"></i>
                            <span class="menu-title">Subjects</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="myLearnings.html">
                            <i class="ti-stats-up menu-icon"></i>
                            <span class="menu-title">My Learning</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="scheduleClasses.html" aria-controls="form-elements">
                            <i class="ti-pencil-alt menu-icon"></i>
                            <span class="menu-title">Class</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="studentActivity.html" aria-controls="form-elements">
                            <i class="ti-ruler-pencil menu-icon"></i>
                            <span class="menu-title">Activity</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exam.html" aria-controls="form-elements">
                            <i class="ti-target menu-icon"></i>
                            <span class="menu-title">Examination</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fees.html" aria-controls="form-elements">
                            <i class="ti-money menu-icon"></i>
                            <span class="menu-title">Fees</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="message.html" aria-controls="form-elements">
                            <i class="ti-email menu-icon"></i>
                            <span class="menu-title">Message</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                    </li>



                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">



                    <div class="card chatPannel">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5 col-xl-3 border-right">

                                <div class="px-4 d-none d-md-block">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <input type="text" class="form-control my-3" placeholder="Search...">
                                        </div>
                                    </div>
                                </div>

                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex align-items-start">
                                        <img src="images/faces/face1.jpg" class="rounded-circle mr-1"
                                            alt="Richard" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            Richard
                                            <div class="small"><span class="fas fa-circle chat-online"></span>
                                                Online</div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="badge bg-success float-right">5</div>
                                    <div class="d-flex align-items-start">
                                        <img src="images/faces/face3.jpg" class="rounded-circle mr-1"
                                            alt="Vanessa Tucker" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            Christopher
                                            <div class="small"><span class="fas fa-circle chat-online"></span>
                                                Online</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="badge bg-success float-right">2</div>
                                    <div class="d-flex align-items-start">
                                        <img src="images/faces/face4.jpg" class="rounded-circle mr-1"
                                            alt="William Harris" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            David
                                            <div class="small"><span class="fas fa-circle chat-online"></span>
                                                Online</div>
                                        </div>
                                    </div>
                                </a>

                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex align-items-start">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                            class="rounded-circle mr-1" alt="Christina Mason" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            Christina Mason
                                            <div class="small"><span class="fas fa-circle chat-offline"></span>
                                                Offline</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex align-items-start">
                                        <img src="images/faces/face2.jpg" class="rounded-circle mr-1"
                                            alt="Fiona Green" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            Hazel
                                            <div class="small"><span class="fas fa-circle chat-offline"></span>
                                                Offline</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex align-items-start">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                            class="rounded-circle mr-1" alt="Doris Wilder" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            Doris Wilder
                                            <div class="small"><span class="fas fa-circle chat-offline"></span>
                                                Offline</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex align-items-start">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                            class="rounded-circle mr-1" alt="Haley Kennedy" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            Haley Kennedy
                                            <div class="small"><span class="fas fa-circle chat-offline"></span>
                                                Offline</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="d-flex align-items-start">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                            class="rounded-circle mr-1" alt="Jennifer Chang" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            Jennifer Chang
                                            <div class="small"><span class="fas fa-circle chat-offline"></span>
                                                Offline</div>
                                        </div>
                                    </div>
                                </a>

                                <hr class="d-block d-lg-none mt-1 mb-0">
                            </div>
                            <div class="col-12 col-lg-7 col-xl-9">
                                <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                    <div class="d-flex align-items-center py-1">
                                        <div class="position-relative">
                                            <img src="images/faces/face1.jpg" class="rounded-circle mr-1"
                                                alt="Richard" width="40" height="40">
                                        </div>
                                        <div class="flex-grow-1 pl-3">
                                            <strong>Richard</strong>
                                            <div class="text-muted small"><em>Typing...</em></div>
                                        </div>

                                    </div>
                                </div>

                                <div class="position-relative">
                                    <div class="chat-messages p-4">

                                        <div class="chat-message-right pb-4">
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                                    class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                <div class="font-weight-bold mb-1">You</div>
                                                Lorem ipsum dolor sit amet, vis erat denique in, dicunt
                                                prodesset te vix.
                                            </div>
                                        </div>

                                        <div class="chat-message-left pb-4">
                                            <div>
                                                <img src="images/faces/face1.jpg" class="rounded-circle mr-1"
                                                    alt="Richard" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                <div class="font-weight-bold mb-1">Richard</div>
                                                Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat
                                                animal commodo.
                                            </div>
                                        </div>

                                        <div class="chat-message-right mb-4">
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                                    class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:35 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                <div class="font-weight-bold mb-1">You</div>
                                                Cum ea graeci tractatos.
                                            </div>
                                        </div>

                                        <div class="chat-message-left pb-4">
                                            <div>
                                                <img src="images/faces/face1.jpg" class="rounded-circle mr-1"
                                                    alt="Richard" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:36 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                <div class="font-weight-bold mb-1">Richard</div>
                                                Sed pulvinar, massa vitae interdum pulvinar, risus lectus
                                                porttitor magna, vitae
                                                commodo lectus mauris et velit.
                                                Proin ultricies placerat imperdiet. Morbi varius quam ac
                                                venenatis tempus.
                                            </div>
                                        </div>

                                        <div class="chat-message-left pb-4">
                                            <div>
                                                <img src="images/faces/face1.jpg" class="rounded-circle mr-1"
                                                    alt="Richard" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:37 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                <div class="font-weight-bold mb-1">Richard</div>
                                                Cras pulvinar, sapien id vehicula aliquet, diam velit elementum
                                                orci.
                                            </div>
                                        </div>

                                        <div class="chat-message-right mb-4">
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                                    class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:38 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                <div class="font-weight-bold mb-1">You</div>
                                                Lorem ipsum dolor sit amet, vis erat denique in, dicunt
                                                prodesset te vix.
                                            </div>
                                        </div>

                                        <div class="chat-message-left pb-4">
                                            <div>
                                                <img src="images/faces/face1.jpg" class="rounded-circle mr-1"
                                                    alt="Richard" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:39 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                <div class="font-weight-bold mb-1">Richard</div>
                                                Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat
                                                animal commodo.
                                            </div>
                                        </div>

                                        <div class="chat-message-right mb-4">
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                                    class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:40 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                <div class="font-weight-bold mb-1">You</div>
                                                Cum ea graeci tractatos.
                                            </div>
                                        </div>

                                        <div class="chat-message-right mb-4">
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                                    class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:41 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                <div class="font-weight-bold mb-1">You</div>
                                                Morbi finibus, lorem id placerat ullamcorper, nunc enim ultrices
                                                massa, id dignissim
                                                metus urna eget purus.
                                            </div>
                                        </div>

                                        <div class="chat-message-left pb-4">
                                            <div>
                                                <img src="images/faces/face1.jpg" class="rounded-circle mr-1"
                                                    alt="Richard" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:42 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                <div class="font-weight-bold mb-1">Richard</div>
                                                Sed pulvinar, massa vitae interdum pulvinar, risus lectus
                                                porttitor magna, vitae
                                                commodo lectus mauris et velit.
                                                Proin ultricies placerat imperdiet. Morbi varius quam ac
                                                venenatis tempus.
                                            </div>
                                        </div>

                                        <div class="chat-message-right mb-4">
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                                                    class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:43 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                <div class="font-weight-bold mb-1">You</div>
                                                Lorem ipsum dolor sit amet, vis erat denique in, dicunt
                                                prodesset te vix.
                                            </div>
                                        </div>

                                        <div class="chat-message-left pb-4">
                                            <div>
                                                <img src="images/faces/face1.jpg" class="rounded-circle mr-1"
                                                    alt="Richard" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:44 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                <div class="font-weight-bold mb-1">Richard</div>
                                                Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat
                                                animal commodo.
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="flex-grow-0 py-3 px-4 border-top">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Type your message">
                                        <button class="btn btn-sm btn-primary ml-1"> Send</i></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- login modal -->




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
    <!-- End custom js for this page-->
</body>


<!-- Mirrored from bootstrapdash.com/demo/skydash-free/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Jun 2023 12:22:40 GMT -->

</html>