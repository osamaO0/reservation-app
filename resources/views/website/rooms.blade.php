@extends('layouts.base')

@section('title', 'Rooms')

@section('content')
<div class="untree_co--site-hero inner-page" style="background-image: url('{{asset('website/images/slider_2.jpg')}}')">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center">
          <div class="site-hero-contents" data-aos="fade-up">
            <h1 class="hero-heading text-white">Available Rooms</h1>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="untree_co--site-section">
    <div class="container">

    <div class="row justify-content-center text-center pt-0 pb-5">
        <div class="col-lg-6 section-heading" data-aos="fade-up">
        <h3 class="text-center">All Rooms</h3>
        </div>
    </div>

    <div class="row custom-row-02192 align-items-stretch">
        <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="media-29191 text-center h-100">
            <div class="media-29191-icon">
            <img src="images/svg/parking.svg" alt="Image" class="img-fluid">
            </div>
            <h3>Free Self-Parking</h3>
            <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
            <p><p><a href="#" class="readmore reverse">Read More</a></p></p>
        </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
        <div class="media-29191 text-center h-100">
            <div class="media-29191-icon">
            <img src="images/svg/internet.svg" alt="Image" class="img-fluid">
            </div>
            <h3>High speed Internet access</h3>
            <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
            <p><p><a href="#" class="readmore reverse">Read More</a></p></p>
        </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="media-29191 text-center h-100">
            <div class="media-29191-icon">
            <img src="images/svg/wifi.svg" alt="Image" class="img-fluid">
            </div>
            <h3>Complimentary WiFi in public areas</h3>
            <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
            <p><p><a href="#" class="readmore reverse">Read More</a></p></p>
        </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
        <div class="media-29191 text-center h-100">
            <div class="media-29191-icon">
            <img src="images/svg/elevator.svg" alt="Image" class="img-fluid">
            </div>
            <h3>Elevators</h3>
            <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
            <p><p><a href="#" class="readmore reverse">Read More</a></p></p>
        </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="media-29191 text-center h-100">
            <div class="media-29191-icon">
            <img src="images/svg/partners.svg" alt="Image" class="img-fluid">
            </div>

            <h3>Meeting rooms</h3>
            <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
            <p><p><a href="#" class="readmore reverse">Read More</a></p></p>
        </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
        <div class="media-29191 text-center h-100">
            <div class="media-29191-icon">
            <img src="images/svg/washing-machine.svg" alt="Image" class="img-fluid">
            </div>
            <h3>Laundry and Valet service</h3>
            <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
            <p><p><a href="#" class="readmore reverse">Read More</a></p></p>
        </div>
        </div>

    </div>
    </div>
</div>
@endsection
