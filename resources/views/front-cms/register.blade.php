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
			<h3>It’s really nice to see you</h3>
		</div>
		<form action="{{Route('student_registration_form')}}" method="POST" class="tu-themeform tu-login-form">
			@csrf
			<fieldset>
				<div class="tu-themeform__wrap">
					<div class="form-group-wrap">
						<div class="form-group">
							<div class="tu-placeholderholder">
								<input type="text" class="form-control" required="" placeholder="Full Name" id="name" name="name">
								<div class="tu-placeholder">
									<span>Full name</span>
									<em>*</em>
								</div>
							</div>
							<span class="text-danger">
								@error('name')
									{{ $message }}
								@enderror
							</span>
						</div>
						<div class="form-group">
							<div class="tu-placeholderholder">
								<input type="email" class="form-control" required="" placeholder="Email address" id="email" name="email">
								<div class="tu-placeholder">
									<span>Your email address</span>
									<em>*</em>
								</div>
							</div>
							<span class="text-danger">
								@error('email')
									{{ $message }}
								@enderror
							</span>
						</div>
						<div class="form-group">
							<div class="tu-placeholderholder">
								<input type="text" class="form-control" required="" placeholder="Mobile number" id="mobile" name="mobile">
								<div class="tu-placeholder">
									<span>Mobile number</span>
									<em>*</em>
								</div>
							</div>
							<span class="text-danger">
								@error('mobile')
									{{ $message }}
								@enderror
							</span>
						</div>
						
						<div class="form-group">
							<div class="tu-placeholderholder">
								<input type="password" class="form-control" required="" placeholder="password" id="password" name="password">
								<div class="tu-placeholder">
									<span>Enter password</span>
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
							<label>Register as: &nbsp;</label>
							<div class="tu-radio-group">
								<input type="radio" id="loginAsStudent" name="registerAs" value="student" style="margin-top: -7px" required>
								<label for="loginAsStudent">Student</label>
{{-- 						
								<input type="radio" id="loginAsParent" name="registerAs" value="parent"  style="margin-top: -7px" required>
								<label for="loginAsParent">Parent</label> --}}
						
								<input type="radio" id="loginAsTutor" name="registerAs" value="tutor" style="margin-top: -7px" required>
								<label for="loginAsTutor">Tutor</label>
							</div>
							<span class="text-danger">
								@error('registerAs')
									{{ $message }}
								@enderror
							</span>
						</div>
						<div class="form-group">
							<div class="tu-check tu-signup-check">
								<input type="checkbox" id="expcheck2" name="expcheck" required>
								<label for="expcheck2"><span>I have read and agree to all <a href="javascript:void(0);">Terms &amp; conditions</a></span></label>
							</div>
							<span class="text-danger">
								@error('expcheck')
									{{ $message }}
								@enderror
							</span>
						</div>
						<div class="form-group">
							<button class="tu-primbtn-lg"><span>Join now</span><i class="icon icon-arrow-right"></i></button>
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
							<a href="login.html">Login now</a>
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