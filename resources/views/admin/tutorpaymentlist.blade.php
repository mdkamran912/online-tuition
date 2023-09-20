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

    .btns button {
        float: right;
        margin: 2px;
    }
    </style>

    <div class="page-content">
        <div class="container-fluid">
            @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            <div class=" listHeader mb-3 page-title-box">
                <h3>Tutor Payments </h3>
                <button class="btn btn-sm btn-primary" onclick="openmodal();"> <span class="fa fa-plus"></span> Make
                    Payment</button>
            </div>

            <div class="row py-3">

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="tname " id="tname" placeholder="Tutor Name">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="tmob " id="tmob" placeholder="Tutor Mobile">

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email " id="email" placeholder="Tutor Email">

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="tranx " id="tranx" placeholder="Transaction No.">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" class="form-control" name="smob " id="smob" placeholder="Student Mobile">

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" class="form-control" name="smob " id="smob" placeholder="Student Mobile">

                    </div>
                </div>

                <div class="col-md-3 mt-4">
                    <div class="form-group">
                        <select class="form-control" name="byststus" id="byststus">
                            <option>--Status--</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <div class="form-group">
                        <button class="btn btn-primary" style="float:right"> <span class="fa fa-search"></span>
                            Search</button>
                    </div>
                </div>
            </div>
            <hr>

            <div class="mt-4 table-responsive">
            <table class="table table-hover table-striped align-middle table-nowrap mb-0 users-table">

                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Tutor Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Total Amount</th>
                            <th>Net Amount Paid</th>
                            <th>Admin Commission(%)</th>
                            <th>Admin Commission(&pound;)</th>
                            <th>Account No.</th>
                            <th>Transaction No.</th>
                            <th>Transaction Date</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="{{route('admin.tutorpayments')}}">Benjamin</td>
                            <td>12345353453</td>
                            <td>benjamin@gmail.com</td>
                            <td>&pound;1230</td>
                            <td>&pound;1107</td>
                            <td>10%</td>
                            <td>&pound;123</td>
                            <td>1234567890987654</td>
                            <td>TNX0000000000001</td>
                            <td>02 Aug 2023</td>
                            <td class="text-success">Success</td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <!-- content-wrapper ends -->

        </div>

    </div>
    <!-- content-wrapper ends -->
</div>

<!-- modal -->
<div class="modal fade" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">


            <div class="modal-body">


                <header>
                    <h3 class="text-center mb-4">Add Payment Details</h3>
                </header>

                <form action="" method="">

                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Class</label>
                            <select class="form-control" id="class" name="class"></select>
                        </div>
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Subject</label>
                            <select class="form-control" id="sub" name="sub"></select>
                        </div>

                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Tutor</label>
                            <select class="form-control" id="tutor" name="totor"></select>
                        </div>
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Account No.</label>
                            <select class="form-control" id="account" name="account"></select>
                        </div>
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Transaction No.</label>
                            <input type="text" class="form-control" id="transNo" name="transNo"
                                placehodler="Transaction No.">
                        </div>
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>


                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Mode Of Payment</label>
                            <select class="form-control" id="mop" name="mop"></select>
                        </div>
                        <div class="col-12 col-md-6 col-ms-6 mb-3">
                            <label>Status</label>
                            <select class="form-control" id="" name=""></select>
                        </div>

                    </div>
                    <div class="btns">
                        <button type="button" id="" class="btn btn-sm btn-success">Submit</button>
                        <button type="button" class="btn btn-sm btn-danger  " data-dismiss="modal"><span
                                class="fa fa-times"></span> Close</button>

                    </div>







                </form>
            </div>
        </div>
    </div>
</div>





<script>
function openmodal() {
    $("#openmodal").modal('show');
}
</script>



@endsection