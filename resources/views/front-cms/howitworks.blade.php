@extends('front-cms.layouts.main')
@section('main-section')

       <!-- MAIN START -->
	<main class="tu-main tu-bgmain">
        <section class="tu-main-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="tu-maintitle text-center">
                            <h4>Making ease for everyone</h4>
                            <h2>We made it in easy way</h2>
                            <p>Experience seamless learning with our online tuition app. We've simplified education, making it easy for students, parents, and tutors to connect and excel. Effortless, effective, and engaging learning awaits you.</p>
                        </div>
                    </div>
                </div>
                <div class="row tu-howit-steps gy-4">
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="tu-howit-steps_content">
                            <figure><img src="{{url('frontend/images/how-it-work/img-01.jpg')}}" alt="images"></figure>
                            <div class="tu-howit-steps_info">
                                <span class="tu-step-tag tu-orange-bgclr">STEP 01</span>
                                <h5>Search tutors</h5>
                                <p>Find the perfect tutor with ease. Explore our platform to search and connect with qualified tutors tailored to your learning needs. Unlock the path to academic success through personalized guidance.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="tu-howit-steps_content">
                            <figure><img src="{{url('frontend/images/how-it-work/img-02.jpg')}}" alt="images"></figure>
                            <div class="tu-howit-steps_info">
                                <span class="tu-step-tag tu-purple-bgclr">STEP 02</span>
                                <h5>Hire your best match</h5>
                                <p>Secure your ideal match effortlessly. Hire top-notch professionals tailored to your specific needs. Elevate your experience by choosing the perfect fit for your requirements and ensuring the best results.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="tu-howit-steps_content">
                            <figure><img src="{{('frontend/images/how-it-work/img-03.jpg')}}" alt="images"></figure>
                            <div class="tu-howit-steps_info">
                                <span class="tu-step-tag tu-green-bgclr">STEP 03</span>
                                <h5>Get it done on time</h5>
                                <p>Achieve timely completion with efficiency. Our commitment ensures tasks are done promptly, meeting deadlines with precision and reliability. Get things done on time, every time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="tu-processing-holder">
                <div class="tu-processing-img">
                     <figure><img src="{{url('frontend/images/how-it-work/howitworks.jpg')}}" alt="image"></figure>
                </div>
                <div class="tu-betterresult tu-processing-content">
                    <div class="tu-maintitle">
                        <img src="{{url('frontend/images/zigzag-line.svg')}}" alt="img">
                        <h4>Why our working is so unique</h4>
                        <h2>See how our working process easily adapt your need</h2>
                    </div>
                    <ul class="tu-processing-list">
                        <li>
                            <div class="tu-processinglist-info">
                                <i class="icon icon-smile tu-iconpurple_bgclr"></i>
                                <h4>User friendly hiring process</h4>
                            </div>
                            <p>Experience a hiring process that's user-friendly and efficient. Our streamlined approach ensures simplicity and ease, making it a breeze for you to find and onboard the perfect candidate. Your journey to hiring excellence starts here.</p>
                        </li>
                        <li>
                            <div class="tu-processinglist-info">
                                <i class="icon icon-umbrella tu-icongreen_bgclr"></i>
                                <h4>Verified process with ease</h4>
                            </div>
                            <p>Streamlined and verified, our process ensures ease and trust. Experience a hassle-free journey with our verified procedures, providing you with confidence and peace of mind.</p>
                        </li>
                        <li>
                            <div class="tu-processinglist-info">
                                <i class="icon icon-shield tu-iconorange_bgclr"></i>
                                <h4>Secure payment gateway integrated</h4>
                            </div>
                            <p>Enjoy peace of mind with our seamlessly integrated secure payment gateway. Your transactions are safeguarded, providing a trustworthy and worry-free experience.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="tu-main-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="tu-maintitle text-center">
                            <h4>We guarantee quality process</h4>
                            <h2>Let’s join our community today</h2>
                            <p>Become a part of our community today. Join us to connect, collaborate, and share experiences with like-minded individuals. Together, let's create a vibrant and supportive community.</p>
                        </div>
                        <ul class="tu-banner_list tu-banner_list-two">
                            <li>
                                <a href="student/register" class="tu-primbtn tu-primbtn-gradient"><span>Start as student</span><i class="icon icon-chevron-right"></i></a>
                            </li>
                            <li>
                                <a href="tutor/register" class="tu-secbtn"><span>Join as Instructor</span><em>It’s Free!</em></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
	</main>
	<!-- MAIN END -->
@endsection