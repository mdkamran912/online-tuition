@extends('front-cms.layouts.main')
@section('main-section')
        {{-- <section>
            <div class="container">
                <img src="images/banner300.jpg" alt="">
            </div>
        </section> --}}
       <!-- CATEGORIES START -->
       <section class="tu-main-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="tu-maintitle text-center">
                        <img src="{{url('frontend/images/zigzag-line.svg')}}" alt="img">
                        <h4>Let’s make a quick start today</h4>
                        <h2>Choose from the top visited categories you may like</h2>
                        <p>Explore our top-visited categories tailored for your preferences. From trending topics to personalized recommendations, discover a curated selection that aligns with your interests and ensures an engaging experience. Choose from the best and elevate your exploration.</p>
                    </div>
                </div>
            </div>
            <div id="tu-categoriesslider" class="splide tu-categoriesslider tu-splidedots">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($subjectcategories as $subjectcatgory)
                            
                        
                        <li class="splide__slide">
                            <a class="tu-categories_content" href="#getsubjects">
                                <img src="{{$subjectcatgory->category_image}}" alt="img">
                                <div class="tu-categories_title">
                                    <h6>{{$subjectcatgory->name}}</h6>
                                    <span>{{$subjectcatgory->subject_count}}+ Subjects</span>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tu-mainbtn">
                <a href="/findatutor" class="tu-primbtn-lg"><span>Explore All Tutors</span><i class="icon icon-chevron-right"></i></a>
            </div>
        </div>
    </section>
     <!-- CATEGORIES END -->

@endsection