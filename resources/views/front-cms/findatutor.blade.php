@extends('front-cms.layouts.main')
@section('main-section')
    <!-- END header -->
    <section class="bannerSec tutBann">
        <div class="container-fluid">
            <div class="tutorHeader">
                <h1>
                    Discover the perfect tutor for you
                </h1>
                <div class="findtutor-btns">
                    <select style="border-radius: 60px; border:0;padding:10px">
                        <option>Select a subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    <select style="border-radius: 60px; border:0;padding:10px">
                        <option>Select a grade</option>
                        @foreach ($gradelists as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                        @endforeach
                    </select>

                    <button class="btn search-tutor">Search</button>
                </div>
                <div class="advance-search">
                    <p>Find the tutor of your choice use advance search</p>
                    <span><a href=""><img src="img/icons/magnifire.png" width="14px" alt=""> Advance
                            Search</a></span>

                </div>
            </div>
        </div>
        </div>
    </section>
     <!-- tutor section -->
     <section class="tutor-section">
        <div class="container tutor-card">
            <h4>10 million evaluated private tutors</h4>
            <br>
            <div class="row">
                @foreach ($tutors as $tutor)
                    
                <div class="col-lg-3 col-md-3-col-sm-12 col-xs-12 tutorCol">
                    <div class="tutorDetails">
                        <div class="tutorImg">
                            <img src="{{ url('images/tutors/profilepics', '/') }}{{ $tutor->profile_pic }}" width="100%" alt="">
                        </div>
                        <div class="star">
                            <span>
                                <i class="fa fa-star"></i>
                                {{$tutor->avg_rating}} ({{$tutor->total_reviews}})
                            </span>
                            <span>${{$tutor->rateperhour}}/h</span>
                        </div>
                        <span class="name">
                            {{$tutor->name}}
                            <p>{{$tutor->subjects}}</p>
                        </span>
                        <span class="desc-tutor">{{$tutor->headline}}</span>
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="expMore">
                        <a href="#" class="btn btn-lg">Explore more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="tutor-banner">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="trial">
                            <h2>Experience our free trial classes today!</h2>
                            <button>Book free trial class today</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   @endsection