@extends('front-cms.layouts.main')
@section('main-section')
    <!-- END header -->
    <section class="bannerSec tutBann">
        <div class="container">


            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="registop">
                        <h1 class="">
                            Become a tutor <br> share your passion!
                        </h1>
                        <img src="{{url('frontendnew/img/registrationImg.png')}}" width="100%" alt="">

                        <p class="charcol"> Lorem ipsum dolor sit amet consectetur. Dolor morbi vitae et ultrices
                            aliquet. Morbi libero ridiculus quis amet sagittis vel. Duis nec quis adipiscing scelerisque
                            eros.</p>

                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="regidform">
                        <h3 class="text-center mt-4">To Register with us fill out the following</h3>

                        <form action="" class="">
                            <div class="form-group">
                                <label for="name">Full Name:<span class="reqrd">*</span></label>
                                <input type="text" class="form-control" id="" aria-describedby=""
                                    placeholder="Your name">
                            </div>

                            <div class="form-group">
                                <label for="email">Email:<span class="reqrd">*</span></label>
                                <input type="email" class="form-control" id="" aria-describedby=""
                                    placeholder="Your email address">
                            </div>
                            <div class="form-group">
                                <label for="number">Mobile:<span class="reqrd">*</span></label>
                                <input type="number" class="form-control" id="" aria-describedby=""
                                    placeholder="Your mobile number">
                            </div>

                            <div class="form-group">
                                <label for="password">Create password:<span class="reqrd">*</span></label>
                                <input type="password" class="form-control" id="" aria-describedby=""
                                    placeholder="&#8226; &#8226; &#8226; &#8226; &#8226; &#8226; &#8226; &#8226;">
                            </div>
                            <div class="form-group">
                                <label for="password">Retype password:<span class="reqrd">*</span></label>
                                <input type="password" class="form-control" id="" aria-describedby=""
                                    placeholder="&#8226; &#8226; &#8226; &#8226; &#8226; &#8226; &#8226; &#8226;">
                            </div>

                            <p>Register as<span class="reqrd">*</span></p>
                            <div class="radioBtn">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="radioLogin student active-btn">
                                            <input type="radio" class="" value="Student" name="loginAs"
                                                id="student" checked> <span>Student</span>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="radioLogin tutor">
                                            <input type="radio" value="Tutor" name="loginAs" id="tutor">
                                            <span>Tutor</span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="term-Condition">
                                <input type="checkbox"> <span for="termCondition">I have read and agree to all <a
                                        href="#">Terms & conditions</a></span>
                            </div>


                            <div class="row mt-4">
                                <div class="col-12 ">
                                    <div class="regSub">
                                        <button class="btn btn-lg">Create</button>
                                    </div>
                                </div>
                            </div>


                            <div class="row mt-4">
                                <div class="col-12 ">
                                    <div class="fb-btn">
                                        <img src="{{url('frontendnew/img/icons/facebook-icon.png')}}" alt="">
                                        <span>Sign up with Facebook</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12 ">
                                    <div class="google-btn">
                                        <img src="{{url('frontendnew/img/icons/google-logo.png')}}" alt="">
                                        <span>Sign up with Google</span>
                                    </div>
                                </div>
                            </div>

                            <div class="haveAnAccount">
                                <p>Already have an account <a href="#" data-toggle="modal" data-target="#loginPopup"><u>Login now</u></a></p>
                            </div>






                        </form>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const studentRadio = document.getElementById('student');
            const tutorRadio = document.getElementById('tutor');
            const studentDiv = document.querySelector('.student');
            const tutorDiv = document.querySelector('.tutor');

            function switchActiveClass() {
                if (studentRadio.checked) {
                    studentDiv.classList.add('active-btn');
                    tutorDiv.classList.remove('active-btn');
                } else if (tutorRadio.checked) {
                    tutorDiv.classList.add('active-btn');
                    studentDiv.classList.remove('active-btn');
                }
            }

            studentRadio.addEventListener('change', switchActiveClass);
            tutorRadio.addEventListener('change', switchActiveClass);
        });
    </script>
@endsection
