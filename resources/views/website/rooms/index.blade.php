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

    <div class="row custom-row-02192 align-items-stretch">
        @foreach ($rooms as $room)
        <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="media-29191 text-center h-100">
                <div class="media-29191-icon">
                    @php $mediaItems = $room->getMedia("images") @endphp
                    <img src="{{$mediaItems[0]->getUrl()}}" alt="Room Image" class="img-fluid">
                </div>
                <h3>{{$room->name}}</h3>
                <p>{{$room->description}}</p>
                <p><p><a href="{{route('website.rooms.show', $room->id)}}" class="readmore reverse">Read More</a></p></p>
            </div>
        </div>
        @endforeach

    </div>
    </div>
</div>
@endsection
