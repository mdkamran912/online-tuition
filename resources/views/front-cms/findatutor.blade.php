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
                <div id="accordion" class="mb-5">
        
                            <div class="advceAccordian">
                              <div class="" id="headingTwo">

                                <div class="advance-search">
                                    <a href="" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Find the tutor of your choice use advance search</a>
                                    <span>
                                        <a href="" class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <img src="{{ url('frontendnew/img/icons/magnifire.png') }}" alt="">
                                            Advance Search
                                        </a>
                                    </span>
                                </div>
                               
                              </div>
                              <div id="collapseTwo" class="collapse collapseAdvSearch" aria-labelledby="headingTwo" data-parent="#accordion">
                                <form class="advSearchForm">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="" aria-describedby="" placeholder="Search">
                                    </div>
                                    <div class="row mb-3">
                                      <div class="col">
                                        <label for="">Subject</label>
                                        <select class="form-control">
                                            <option value="">English</option>
                                            <option value="">English</option>
                                        </select>
                                      </div>
                                      <div class="col">
                                        <label for="">Grade</label>
                                        <select class="form-control">
                                            <option value="">10th Grade</option>
                                            <option value="">10th Grade</option>
                                        </select>
                                      </div>
                                      <div class="col">
                                        <label for="">Rating</label>
                                        <select class="form-control rating">
                                            <option value="">5 Star <span class="star-uni-code">&#9733;&#9733;&#9733;&#9733;&#9733;</span></option>
                                            <option value="">4 Star &#9733;&#9733;&#9733;&#9733;</option>
                                            <option value="">3 Star &#9733;&#9733;&#9733;</option>
                                            <option value="">2 Star &#9733;&#9733;</option>
                                            <option value="">1 Star &#9733;</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                          <label for="">Country</label>
                                          <select class="form-control">
                                              <option value="">United Kingdom</option>
                                          </select>
                                        </div>
                                       
                                         
                                        <div class="col-8">
                                           <div class="advSearchBtns">
                                                <button class="btn cancelBtn">Cancel</button>
                                                <button class="applyBtn">Apply</button>
                                           </div>
                                        </div>
                                        
                                      </div>


                                  </form>
                                
                              </div>
                            </div>
                          
                          </div>


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