<!-- Modal -->
<div class="modal fade loginModel" id="loginPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content loginModel">
            <div class="modal-header" style="border: none;">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h3 class="text-center">Login</h3>
            <form class="loginForm" action="{{ url('/student-login') }}" method="GET">
              @csrf
                <div class="form-group">
                    <label for="number">Mobile Number</label>
                    <input type="number" class="form-control" id="username" name="username" aria-describedby=""
                        placeholder="Your Number">
                </div>
                <span class="text-danger">
                    @error('username')
                        {{ $message }}
                    @enderror
                </span>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" aria-describedby=""
                        placeholder="Password">
                </div>
                <span class="text-danger" style="font-size:10px">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
                <p>Login as</p>
                <div class="radioBtn">
                    <div class="row">
                        <div class="col-4">
                            <div class="radioLogin active-btn">
                                <input type="radio" id="loginAsStudent" name="loginAs" value="student" checked> <span>Student</span>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="radioLogin">
                                <input type="radio" id="loginAsTutor" name="loginAs" value="tutor"> <span>Tutor</span>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="radioLogin">
                                <input type="radio" id="loginAsParent" name="loginAs" value="parent"> <span>Parent</span>
                            </div>
                        </div>
                    </div>
                    <span class="text-danger">
                        @error('loginAs')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <hr>
                <button type="submit" class="btn brand-bg-Color mb-3">Login</button>
            
                <br>
                <a href="#">
                    <div class="googleLogin">

                        <img src="{{ url('frontendnew/img/icons/google-logo.png') }}" alt=""><span>Sign in with
                            Google</span>

                    </div>

                </a>

                <div class="forgotPwd mt-3">
                    <p> Don't have an account? <a href="{{ '/student/register' }}" class="register">Register</a></p>
                    <a href="#">Forgot password?</a>
                </div>







            </form>
        </div>
    </div>
</div>






<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>


<footer class="footerArea mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <h5 class="mb-4">Quick Links</h5>
                <ul>
                    <li>About us</li>
                    <li>Who we are</li>
                    <li>Find Tutor</li>
                    <li>Subjects</li>
                    <li>Contact Us</li>
                    <li>Privacy Policy</li>
                    <li>Terms and Conditions</li>

                </ul>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <h5 class="mb-4">Popular Subjects</h5>
                <ul>
                    <li>Psychology</li>
                    <li>Biology</li>
                    <li>Business Studies</li>
                    <li>Chemistry</li>
                    <li>Computer Science</li>
                    <li>English Language</li>
                    <li>French</li>
                    <li>German</li>
                    <li>History</li>
                    <li>Mathematics</li>
                    <li>Physics</li>
                </ul>
            </div>


            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <h5 class="mb-4">Follow us</h5>
                <ul class="contactDetail">
                    <li><img src="{{ url('frontendnew/img/icons/Group.png') }}" alt="">07761 975326</li>
                    <li><img src="{{ url('frontendnew/img/icons/Vector.png') }}" alt="">07761 975326</li>
                    <li><img src="{{ url('frontendnew/img/icons/email.png') }}" alt="">info@mychoicetutor.com
                    </li>

                </ul>

                <div class="social">
                    <a href="#"><img src="{{ url('frontendnew/img/icons/facebook.png') }}" alt=""></a>
                    <a href="#"><img src="{{ url('frontendnew/img/icons/OUTLINE_copy_2.png') }}"
                            alt=""></a>
                    <a href="#"><img src="{{ url('frontendnew/img/icons/Group 797.png') }}" alt=""></a>

                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <h5 class="mt-4">Help</h5>
                <ul>
                    <li>Help Center</li>
                    <li>Contact Us</li>
                </ul>

                <div class="social">
                    <img src="{{ url('frontendnew/img/footer-logo.png') }}" width="160px" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>Copyright © 2024 MyChoiceTutor. All rights reserved.</p>
    </div>
</footer>

<script src="{{ url('frontendnew/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('frontendnew/js/popper.min.js') }}"></script>
<script src="{{ url('frontendnew/js/bootstrap.min.js') }}"></script>
<script src="{{ url('frontendnew/js/jquery.sticky.js') }}"></script>
<script src="{{ url('frontendnew/js/main.js') }}"></script>
</body>

</html>
