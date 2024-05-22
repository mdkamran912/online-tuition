@extends('front-cms.layouts.main')
@section('main-section')
   
    <!-- MAIN START -->
	<main>
		<style>
			.tu-radio-group {
    display: flex;
    gap: 10px; /* Adjust the gap value as needed */
    align-items: center;
}

.tu-radio-group input[type="radio"] {
    margin-top: 2px; /* Adjust the value to vertically center-align the radio button */
}
</style>
       <div class="tu-main-login">
            <div class="tu-login-left">
                <figure>
					<img src="{{url('frontend/images/login/img-01.png')}}" alt="images">
				</figure>
				<div class="tu-login-left_title">
					<h2>Yes! we’re making progress</h2>
					<span>every minute & every second</span>
				</div>
            </div>
            <div class="tu-login-right">
				@if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
				<div class="tu-login-right_title">
					<h2>Welcome!</h2>
					<h3>We know you'll come back</h3>
				</div>
				<form class="tu-themeform tu-login-form" action="{{ url('/student-login') }}" method="GET">
					@csrf
					<fieldset>
						<div class="tu-themeform__wrap">
							<div class="form-group-wrap">
								<div class="form-group">
									<div class="tu-placeholderholder">
										<input type="text" class="form-control" required="" placeholder="Mobile Number" value="" id="username" name="username">
										<div class="tu-placeholder">
											<span>Mobile No.</span>
											<em>*</em>
										</div>
									</div>
									<span class="text-danger">
                                        @error('username')
                                            {{ $message }}
                                        @enderror
                                    </span>
								</div>
								<div class="form-group">
									<div class="tu-placeholderholder">
										<input type="password" class="form-control" required="" placeholder="Passowrd" value="" id="password" name="password" >
										<div class="tu-placeholder">
											<span>Your password</span>
											<em>*</em>
										</div>
									</div>
									<span class="text-danger">
										@error('password')
											{{ $message }}
										@enderror
									</span>
								</div>
								<div class="form-group">
									<label>Login as: &nbsp;</label>
									<div class="tu-radio-group">
										<input type="radio" id="loginAsStudent" name="loginAs" value="student" style="margin-top: -7px" required>
										<label for="loginAsStudent">Student</label>
								
										<input type="radio" id="loginAsParent" name="loginAs" value="parent"  style="margin-top: -7px" required>
										<label for="loginAsParent">Parent</label>
								
										<input type="radio" id="loginAsTutor" name="loginAs" value="tutor" style="margin-top: -7px" required>
										<label for="loginAsTutor">Tutor</label>
									</div>
									<span class="text-danger">
										@error('loginAs')
											{{ $message }}
										@enderror
									</span>
								</div>
								<div class="form-group">
									<a ><button class="tu-primbtn-lg"><span>Login now</span><i class="icon icon-arrow-right"></i></button></a>
								</div>
								<div class="form-group">
                                    <div class="tu-optioanl-or">
                                        <span>OR</span>
                                    </div>
                                </div>
								<div class="form-group">
                                    <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&amp;flowEntry=ServiceLogin" target="_blank" class="tu-btn-signup">
                                        <img src="{{url('frontend/images/google.png')}}" alt="images">
                                        Sign in with Google
                                    </a>
                                </div>
								<div class="tu-lost-password form-group">
                                    <a href="{{ route('std_registration') }}">Join us today</a>
                                    <a href="forgotpassword" class="tu-password-clr_light">Lost password?</a>
                                </div>
							</div>
						</div>
					</fieldset>
				</form>
            </div>
       </div>
	</main>
	<!-- MAIN END -->
	@endsection