@extends('layouts.base')

@section('title', $room->name ?? 'Room')

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="untree_co--site-hero inner-page" style="background-image: url('{{$room->media->first()->getUrl()}}')">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center">
          <div class="site-hero-contents" data-aos="fade-up">
            <h1 class="hero-heading text-white">Room Details</h1>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="untree_co--site-section">

    <div class="container-fluid px-0">

      <div class="row justify-content-center text-center pt-0 pb-5">
        <div class="col-lg-6 section-heading" data-aos="fade-up">
          <h3 class="text-center">Gallery</h3>
        </div>
      </div>

      <div class="row align-items-stretch">
        <div class="col-9 relative" data-aos="fade-up" data-aos-delay="">
          <div class="owl-carousel owl-gallery-big">
            @foreach ($room->media as $media)
                <div class="slide-thumb bg-image" style="background-image: url('{{$media->getUrl()}}')"></div>
            @endforeach
          </div>

          <div class="slider-counter text-center"></div>

        </div>
        <div class="col-3 relative"  data-aos="fade-up" data-aos-delay="100">

          <div class="owl-carousel owl-gallery-small">
            @foreach ($room->media as $media)
                <div class="slide-thumb bg-image" style="background-image: url('{{$media->getUrl()}}')"><a href="#"></a></div>
            @endforeach
          </div>

        </div>
      </div>
    </div>

</div>

<div class="untree_co--site-section">
    <div class="container">

        <div class="row">
          <div class="col-12 text-center" data-aos="fade-up">
            <h2 class="display-4 mb-5">book this room now</h2>
          </div>
          <div class="col-md-8 mb-5 mb-md-0 mx-auto" data-aos="fade-up" data-aos-delay="100">

            <form action="{{route('website.rooms.book', $room)}}" method="post">
              @csrf
              @method('post')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="name">Your Name *</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="phone">Your phone *</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="name">start date *</label>
                        <input type="date" class="form-control" id="name" name="start_date">
                        @error('start_date')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="phone">end date *</label>
                        <input type="date" class="form-control" id="phone" name="end_date">
                        @error('end_date')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">number of people *</label>
                            <input type="number" class="form-control" id="name" name="number_of_people">
                            @error('number_of_people')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="Book" class="btn btn-black px-5 text-white">
                </div>
            </form>
          </div>

        </div>

    </div>
</div>
@endsection
