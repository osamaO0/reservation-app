@extends('layouts.base')

@section('title', 'Home')

@section('content')
<div class="untree_co--site-main">


    <div class="owl-carousel owl-hero">

      <div class="untree_co--site-hero overlay" style="background-image: url('{{asset('website/images/slider_2.jpg')}}">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-8">
              <div class="site-hero-contents text-center" data-aos="fade-up">
                <h1 class="hero-heading">Booking by name.com</h1>
                <div class="sub-text">
                  <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality mattress in a small room to large suites with bigger </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="untree_co--site-hero overlay"  style="background-image: url('{{asset('website/images/slider_1.jpg')}}">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7">
              <div class="site-hero-contents text-center" data-aos="fade-up">
                <h1 class="hero-heading">Enjoy Your Stay</h1>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="untree_co--site-hero overlay" style="background-image: url('{{asset('website/images/room_1_a.jpg')}}">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-10">
              <div class="site-hero-contents text-center" data-aos="fade-up">
                <h1 class="hero-heading">Away from the Hustle and Bustle of City Life</h1>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="untree_co--site-section float-left pb-0 featured-rooms">

      <div class="container pt-0 pb-5">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6 section-heading" data-aos="fade-up">
            <h3 class="text-center">Featured Rooms</h3>
          </div>
        </div>
      </div>

      <div class="container-fluid pt-5">
        <div class="suite-wrap overlap-image-1">

          <div class="suite">
            <div class="image-stack">
              <div class="image-stack-item image-stack-item-top" data-jarallax-element="-50">
                <div class="overlay"></div>
                <img src="{{asset('website/images/room_1_a.jpg')}}" alt="Image" class="img-fluid pic1">
              </div>
              <div class="image-stack-item image-stack-item-bottom">
                <div class="overlay"></div>
                <img src="{{asset('website/images/room_1_b.jpg')}}" alt="Image" class="img-fluid pic2">
              </div>
            </div>
          </div> <!-- .suite -->

          <div class="suite-contents" data-jarallax-element="50">
            <h2 class="suite-title">King Bedroom</h2>
            <div class="suite-excerpt">
              <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality mattress in a small room to large suites with bigger.</p>
              <p><a href="#" class="readmore">Room Details</a></p>
            </div>
          </div>
        </div>

        <div class="suite-wrap overlap-image-2">

          <div class="suite">
            <div class="image-stack">
              <div class="image-stack-item image-stack-item-top">
                <div class="overlay"></div>
                <img src="{{asset('website/images/room_2_a.jpg')}}" alt="Image" class="img-fluid pic1">
              </div>
              <div class="image-stack-item image-stack-item-bottom" data-jarallax-element="-50">
                <div class="overlay"></div>
                <img src="{{asset('website/images/room_2_b.jpg')}}" alt="Image" class="img-fluid pic2">
              </div>
            </div>
          </div>

          <div class="suite-contents" data-jarallax-element="50">
            <h2 class="suite-title">Queen &amp; Double Bedroom</h2>
            <div class="suite-excerpt pr-5">
              <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality mattress in a small room to large suites with bigger</p>
              <p><a href="#" class="readmore">Room Details</a></p>
            </div>
          </div>

        </div>

      </div>
    </div>

    <div class="untree_co--site-section">
      <div class="container">
        <div class="container pt-0 pb-5">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6 section-heading" data-aos="fade-up">
            <h3 class="text-center">Hotel Amenities</h3>
          </div>
        </div>
      </div>
        <div class="row custom-row-02192 align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="media-29191 text-center h-100">
              <div class="media-29191-icon">
                <img src="{{asset('website/images/svg/parking.svg')}}" alt="Image" class="img-fluid">
              </div>
              <h3>Free Self-Parking</h3>
              <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
              <p><p><a href="#" class="readmore reverse">Read More</a></p></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="media-29191 text-center h-100">
              <div class="media-29191-icon">
                <img src="{{asset('website/images/svg/internet.svg')}}" alt="Image" class="img-fluid">
              </div>
              <h3>High speed Internet access</h3>
              <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
              <p><p><a href="#" class="readmore reverse">Read More</a></p></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="media-29191 text-center h-100">
              <div class="media-29191-icon">
                <img src="{{asset('website/images/svg/wifi.svg')}}" alt="Image" class="img-fluid">
              </div>
              <h3>Complimentary WiFi in public areas</h3>
              <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
              <p><p><a href="#" class="readmore reverse">Read More</a></p></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="media-29191 text-center h-100">
              <div class="media-29191-icon">
                <img src="{{asset('website/images/svg/elevator.svg')}}" alt="Image" class="img-fluid">
              </div>
              <h3>Elevators</h3>
              <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
              <p><p><a href="#" class="readmore reverse">Read More</a></p></p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="media-29191 text-center h-100">
              <div class="media-29191-icon">
                <img src="{{asset('website/images/svg/partners.svg')}}" alt="Image" class="img-fluid">
              </div>

              <h3>Meeting rooms</h3>
              <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
              <p><p><a href="#" class="readmore reverse">Read More</a></p></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="media-29191 text-center h-100">
              <div class="media-29191-icon">
                <img src="{{asset('website/images/svg/washing-machine.svg')}}" alt="Image" class="img-fluid">
              </div>
              <h3>Laundry and Valet service</h3>
              <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
              <p><p><a href="#" class="readmore reverse">Read More</a></p></p>
            </div>
          </div>

        </div>
      </div>
    </div>


</div>
@endsection
