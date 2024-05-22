@extends('front-cms.layouts.main')
@section('main-section')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .slot {
    width: 50px; /* Adjust width as needed */
    /* height: 50px; */
     /* Adjust height as needed */
    border: .5px solid #000; /* Border color */
    border-radius: 10%;
    margin: 5px;
    cursor: pointer;
    display: inline-block;
    text-align: center;
    font-size: 11px;
    /* box-shadow: 2px 1px 1px gray; */
}

.available {
    background-color: #198754; /* Available slot color */
    color: white;
}

.booked {
    background-color: #dcdcdc; /* Booked slot color */
    /* color: white; */
}
</style>

<!-- Main start -->
<main class="tu-bgmain tu-main">
    <section class="tu-main-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tu-listing-wrapper">
                        <div class="tu-sort">
                            <h3>{{ count($tutorlists) }} Search result for tutors</h3>
                            {{-- <div class="tu-sort-right-area">
                                <div class="tu-sortby">
                                    <span>Sort by: </span>
                                    <div class="tu-select">
                                        <select class="form-control tu-selectv">
                                            <option>Price low to high </option>
                                            <option>Price high to low</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tu-filter-btn">
                                    <a class="tu-listbtn active" href="{{url('search-listing.html')}}"><i class="icon icon-list"></i></a>
                                    <a class="tu-listbtn" href="{{url('search-listing-two.html')}}"><i class="icon icon-grid"></i></a>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="tu-searchbar-wrapper">
                            <div class="tu-appendinput">
                                <div class="tu-searcbar">
                                    <div class="tu-inputicon">
                                        <a href="javascript:void(0);"><i class="icon icon-search"></i></a>
                                        <input type="text" class="form-control" placeholder="What do you want to explore?">
                                    </div>
                                    <div class="tu-select">
                                        <i class="icon icon-layers"></i>
                                        <select id="selectv8" data-placeholderinput="Select list" data-placeholder="Select category" class="form-control">
                                            <option label="Select category"></option>
                                            <option >Automotive</option>
                                            <option >Beauty &amp; Care</option>
                                            <option >Marketing</option>
                                            <option >Child Care</option>
                                            <option >House Cleaning</option>
                                        </select>
                                    </div>
                                    <a href="{{url('search-listing.html')}}" class="tu-primbtn-lg tu-primbtn-orange">Search now</a>
                                </div>
                            </div>
                            <div class="tu-listing-search">
                                <figure>
                                    <img src="{{url('frontend/images/listing/shape.png')}}" alt="image">
                                </figure>
                                <span>Start from here</span>
                            </div>
                        </div>
                        <ul class="tu-searchtags">
                            <li>
                                <span>Pre-School <a href="javascript:void(0)"><i class="icon icon-x"></i></a></span>
                            </li>
                            <li>
                                <span> Middle (Class 6-8) <a href="javascript:void(0)"><i class="icon icon-x"></i></a></span>
                            </li>
                            <li>
                                <span>Intermediate <a href="javascript:void(0)"><i class="icon icon-x"></i></a></span>
                            </li>
                            <li>
                                <span>5.0 Stars <a href="javascript:void(0)"><i class="icon icon-x"></i></a></span>
                            </li>
                            <li>
                                <span>Online bookings <a href="javascript:void(0)"><i class="icon icon-x"></i></a></span>
                            </li>
                            <li>
                                <span>Male only <a href="javascript:void(0)"><i class="icon icon-x"></i></a></span>
                            </li>
                        </ul> --}}
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-3">
                    <aside class="tu-asidewrapper">
                        <a href="javascript:void(0)" class="tu-dbmenu"><i class="icon icon-chevron-left"></i></a>
                        <form action="{{route('guest.tutorsindexsearch')}}" method="POST">
                            @csrf
                        <div class="tu-aside-menu">
                            <div class="tu-aside-holder">
                                <div class="tu-asidetitle" data-bs-toggle="collapse" data-bs-target="#side2" role="button" aria-expanded="true">
                                    <h5>Education level</h5>
                                </div>
                                <div id="side2" class="collapse show">
                                    <div class="tu-aside-content">
                                        <div class="tu-filterselect">
                                            <div class="tu-select">
                                                <select id="gradelistid" name="gradelistid" data-placeholder="Select education level" data-placeholderinput="Select education level" class="form-control tu-input-field">
                                                    <option label="Select Grade"></option>
                                                    @foreach ( $classes as  $class)
                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="tu-filterselect">
                                            <h6>Choose subjects</h6>
                                            <ul class="tu-categoriesfilter">
                                                @foreach($subjectlist as $subject)
                                                    <li>
                                                        <div class="tu-check tu-checksm">
                                                            <input type="checkbox" id="subject{{ $subject->id }}" name="subjectlistid[]" value="{{ $subject->id }}">
                                                            <label for="subject{{ $subject->id }}">{{ $subject->name }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="show-more">
                                                <a href="javascript:void(0);" class="tu-readmorebtn tu-show_more">Show all</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tu-aside-holder">
                                <div class="tu-asidetitle" data-bs-toggle="collapse" data-bs-target="#side3" role="button" aria-expanded="true">
                                    <h5>Price range</h5>
                                </div>
                                <div id="side3" class="collapse show">
                                    <div class="tu-aside-content">
                                        <div class="tu-rangevalue" data-bs-target="#tu-rangecollapse" role="list" aria-expanded="false">
                                            <div class="tu-areasizebox">
                                                <input type="number" class="form-control tu-input-field" step="1" placeholder="Min price" id="tminprice" name="tminprice" />
                                                <input type="number" class="form-control tu-input-field" step="1" placeholder="Max price" id="tmaxprice" name="tmaxprice" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tu-distanceholder">
                                        <div id="tu-rangecollapse" class="collapse">	
                                            <div class="tu-distance">
                                                <div id="tu-rangeslider" class="tu-tooltiparrow tu-rangeslider"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tu-aside-holder">
                                <div class="tu-asidetitle" data-bs-toggle="collapse" data-bs-target="#side1a" role="button" aria-expanded="true">
                                    <h5>Rating</h5>
                                </div>
                                <div id="side1a" class="collapse show">
                                    <div class="tu-aside-content">
                                        <ul class="tu-categoriesfilter">
                                            <li>
                                                <div class="tu-check tu-checksm">
                                                    <input type="checkbox" id="rate" name="rate" checked>
                                                    <label for="rate">
                                                        <span class="tu-stars">
                                                            <span></span>
                                                        </span>
                                                        <em class="tu-totalreview">
                                                            <span>5.0/<em>5.0</em></span>
                                                        </em>  
                                                    </label>
                                                </div>
                                            </li>                                              
                                            <li>
                                                <div class="tu-check tu-checksm">
                                                    <input type="checkbox" id="rate4" name="rate4">
                                                    <label for="rate4">
                                                        <span class="tu-stars tu-fourstar">
                                                            <span></span>
                                                        </span>
                                                        <em class="tu-totalreview">
                                                            <span>4.0/<em>5.0</em></span>
                                                        </em>
                                                    </label>
                                                </div>
                                            </li>                                              
                                            <li>
                                                <div class="tu-check tu-checksm">
                                                    <input type="checkbox" id="rate3" name="rate2" checked>
                                                    <label for="rate3">
                                                        <span class="tu-stars tu-threestar">
                                                            <span></span>
                                                        </span>
                                                        <em class="tu-totalreview">
                                                            <span>3.0/<em>5.0</em></span>
                                                        </em>
                                                    </label>
                                                </div>
                                            </li>                                              
                                            <li>
                                                <div class="tu-check tu-checksm">
                                                    <input type="checkbox" id="rate2a" name="rate2a">
                                                    <label for="rate2a">
                                                        <span class="tu-stars tu-twostar">
                                                            <span></span>
                                                        </span>
                                                        <em class="tu-totalreview">
                                                            <span>2.0/<em>5.0</em></span>
                                                        </em>
                                                    </label>
                                                </div>
                                            </li>                                              
                                            <li>
                                                <div class="tu-check tu-checksm">
                                                    <input type="checkbox" id="rate1a" name="rate1a">
                                                    <label for="rate1a">
                                                        <span class="tu-stars tu-onestar">
                                                            <span></span>
                                                        </span>
                                                        <em class="tu-totalreview">
                                                            <span>1.0/<em>5.0</em></span>
                                                        </em>
                                                    </label>
                                                </div>
                                            </li>                                              
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tu-aside-holder">
                                <div class="tu-asidetitle" data-bs-toggle="collapse" data-bs-target="#side1ab" role="button" aria-expanded="true">
                                    <h5>Location</h5>
                                </div>
                                <div id="side1ab" class="collapse show">
                                    <div class="tu-aside-content">
                                        <ul class="tu-categoriesfilter">
                                            @foreach ($countrylist as $country)
                                                
                                            
                                            <li>
                                                <div class="tu-check tu-checksm">
                                                    <input type="checkbox" id="name{{$country->id}}" name="expcheck">
                                                    <label for="nameaa">{{$country->name}}</label>
                                                </div>
                                            </li>
                                            @endforeach
                                                                    
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tu-filterbtns">
                             <button type="submit" class="tu-primbtn">Apply filters</button>
                             <button type="button" onclick="clearfilter()">   <a href="{{url('#clearfilter')}}" class="tu-sb-sliver">Clear all filters</a></button>
                            </div>
                        </div>
                    </form>
                    </aside>
                </div>
                <div class="col-xl-8 col-xxl-9">
                    <div class="tu-listinginfo-holder">
                        @if(isset($tutorlists))
                        @foreach ($tutorlists as $tutorlist)
                        <div class="tu-listinginfo">
                            <span class="tu-cardtag"></span>
                            <div class="tu-listinginfo_wrapper">
                                <div class="tu-listinginfo_title">
                                    <div class="tu-listinginfo-img">
                                        <figure>
                                            <img src="{{ url('images/tutors/profilepics', '/') }}{{ $tutorlist->profile_pic ?? url('images/avatar/default-profile-pic.png') }}" width="60px" alt="imge">
                                        </figure>
                                        <div class="tu-listing-heading">
                                            <h5><a href="{{url('#')}}">{{ $tutorlist->name }}</a> <i class="icon icon-check-circle tu-greenclr" data-tippy-trigger="mouseenter" data-tippy-html="#tu-verifed" data-tippy-interactive="true" data-tippy-placement="top"></i></h5>
                                            <div class="tu-listing-location">
                                                <span>{{$tutorlist->starrating}} <i class="fa-solid fa-star"></i><em></em></span><address><i class="icon icon-map-pin"></i> <span>Exp:</span> {{$tutorlist->experience}}</address>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tu-listinginfo_price">
                                        <span>Starting from:</span>
                                        <h4>£{{$tutorlist->rate}}/hr</h4>
                                    </div>
                                </div>
                                <div class="tu-listinginfo_description">
                                    <p>{{ $tutorlist->headline }}</p>
                                </div>
                                <div class="tu-listinginfo_service">
                                    <h6>You can get teaching service direct at</h6>
                                    <ul class="tu-service-list">
                                        <li>
                                            <span>
                                                <i class="icon icon-home tu-greenclr"></i>
                                                {{ $tutorlist->subject }}
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="icon icon-map-pin tu-blueclr"></i>
                                                {{$tutorlist->total_classes_done}}+ Lessons Completed
                                            </span>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="icon icon-video tu-orangeclr"></i>
                                                {{ $tutorlist->total_topics }}+ Topics
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tu-listinginfo_btn">
                                <div class="tu-iconheart">
                                    {{-- <i class="icon icon-heart"></i><span>Add to save</span> --}}
                                </div>
                                <div class="tu-btnarea">
                                    {{-- <a href="#checkslots" onclick="checkslots('{{$tutorlist->tutor_id}}')" class="btn btn-success">Check Slots</a> --}}
                                    <a href="{{url('student/searchtutor')}}" class="btn btn-primary">Book Trial</a>
                                    <a href="{{url('tutor-details')}}/{{$tutorlist->tutor_id}}" class="tu-primbtn">View full profile</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    {{-- <nav class="tu-pagination">
                        <ul>
                            <li class="tu-pagination-prev"><a href="#"><i class="icon icon-chevron-left"></i></a> </li>
                            <li><a href="#">1</a> </li>
                            <li><a href="#">2</a> </li>
                            <li><a href="#">3</a> </li>
                            <li class="active"><a href="#">4</a> </li>
                            <li><a href="#">...</a> </li>
                            <li><a href="#">60</a> </li>
                            <li class="tu-pagination-next"><a href="#"><i class="icon icon-chevron-right"></i></a> </li>
                        </ul>
                    </nav> --}}
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Main end -->
       <!-- Schedule modal -->
<div class="modal fade" id="scheduleclassmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">

        <div class="modal-body">

            <header>
                <h3 class="text-center mb-4">Schedule New Class</h3>
            </header>

            <div class="row">
                <div class="col-4 mb-3">
                    <input type="hidden" id="tutorslotid" name="tutorslotid">
                    <label>Date<span style="color:red">*</span></label>
                    <input type="date" class="form-control" id="classdate" name="classdate"
                        min="{{ date('Y-m-d', strtotime('+0 day')) }}" onchange="searchSlots()">
                    <span class="text-danger">
                        @error('classdate')
                        {{ 'Date is required' }}
                        @enderror
                    </span>
                </div>
                {{-- <div class="col-12 mb-3">
                    <button type="button" class="btn btn-sm btn-primary" onclick="searchSlots();">Search</button>
                </div> --}}
            </div>

            <!-- Available Slots Section -->
            <div id="availableSlots" class="mt-4">
                <!-- Slots will be dynamically added here based on search results -->
                <!-- Example Slot: <div class="slot" onclick="toggleSlot(this)"></div> -->
            </div>


        </div>
    </div>
</div>
</div>

<script>
function searchSlots() {
    const tutorid = document.getElementById('tutorslotid').value;
    const selectedDate = document.getElementById('classdate').value;
    const csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token from meta tag

    // Make an AJAX request to fetch available slots based on the selected date
    $.ajax({
        url: "{{ route('index.slots.search') }}",
        type: 'GET',
        data: { date: selectedDate, tutorid: tutorid },
        headers: {
            'X-CSRF-TOKEN': csrfToken, // Include CSRF token in headers
        },
        success: function (response) {
            // Assuming 'response' is an array of slot data
            displayAvailableSlots(response);
        },
        error: function (error) {
            console.error('Error fetching slot data:', error);
        }
    });
}


function displayAvailableSlots(slots) {
    const availableSlotsContainer = document.getElementById('availableSlots');
    availableSlotsContainer.innerHTML = '';

    if (slots.length === 0) {
        // Display an error message when no slots are found
        const errorMessage = document.createElement('div');
        errorMessage.className = 'error-message';
        errorMessage.innerHTML = 'No slots found';
        availableSlotsContainer.appendChild(errorMessage);
        return;
    }

    for (let i = 0; i < slots.length; i++) {
        const slot = document.createElement('div');
        slot.className = 'slot';
        slot.setAttribute('data-slot-id', slots[i].id); // Set slot ID as a data attribute
        slot.onclick = function () {
            toggleSlot(this);
        };

        // Customize the slot appearance based on the slot data
        if (slots[i].status === 0) {
            // Available slot styling
            slot.classList.add('available');
        } else {
            // Booked slot styling
            slot.classList.add('booked');
        }

        // Add slot information to the slot element
        const slotInfo = document.createElement('div');
        slotInfo.innerHTML = `${convertToAmPm(slots[i].slot)}`;
        slot.appendChild(slotInfo);

        availableSlotsContainer.appendChild(slot);
    }
}

// Function to convert 24-hour time to AM/PM format
function convertToAmPm(timeString) {
    const convertedTime = new Date(`2000-01-01 ${timeString}`);
    return convertedTime.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
}



function toggleSlot(slot) {
    // Implement logic to toggle the slot selection status
    // You can add a class to the selected slot for styling, and track the selection status in your JavaScript
}
</script>

<script>
    function checkslots(id){
        document.getElementById('tutorslotid').value = id;

        $('#scheduleclassmodal').modal('show')
        searchSlots();
    }
</script>
@endsection