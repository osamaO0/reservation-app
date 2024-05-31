<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="" />

    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,500i,700|Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('website/css/vendor/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/vendor/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/vendor/aos.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/vendor/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/vendor/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">

    @yield('css')

    <title>@yield('title', 'reservation')</title>

  </head>
  <body>

    <div id="untree_co--overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <nav class="untree_co--site-mobile-menu">
      <div class="close-wrap d-flex">
        <a href="#" class="d-flex ml-auto js-menu-toggle">
          <span class="close-label">Close</span>
          <div class="close-times">
            <span class="bar1"></span>
            <span class="bar2"></span>
          </div>
        </a>
      </div>
      <div class="site-mobile-inner"></div>
    </nav>


    <div class="untree_co--site-wrap">

      <nav class="untree_co--site-nav js-sticky-nav">
        <div class="container d-flex align-items-center">
          <div class="logo-wrap">
            <a href="{{route('website.home')}}" class="untree_co--site-logo">Booking</a>
          </div>
          <div class="site-nav-ul-wrap text-center d-none d-lg-block">
            <ul class="site-nav-ul js-clone-nav">
              <li class="active"><a href="{{route('website.home')}}">Home</a></li>
              <li class="has-children">
                <a href="{{route('website.rooms')}}">Rooms</a>
                <ul class="dropdown">
                  <li>
                    <a href="{{route('website.rooms', ['type' => '1'])}}">Single room</a>
                  </li>
                  <li>
                    <a href="{{route('website.rooms', ['type' => '2'])}}">Double room</a>
                  </li>
                  <li>
                    <a href="{{route('website.rooms', ['type' => '3'])}}">Triple room</a>
                  </li>
                </ul>
              </li>
                @auth
                    @can('access dashboard')
                        <li><a href="{{route('admin.home')}}">Dashboard</a></li>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                @method('post')
                                <button type="submit" class="btn btn-primary">Logout</button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{route('website.profile')}}">Profile</a></li>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                @method('post')
                                <button type="submit" class="btn btn-primary">Logout</button>
                            </form>
                        </li>
                    @endcan
                @else
                    <li><a href="{{route('login')}}">Login</a></li>
                    <li><a href="{{route('register')}}">Register</a></li>
                @endauth
            </ul>
          </div>
          <div class="icons-wrap text-md-right">

            <ul class="icons-top d-none d-lg-block">
              <li class="mr-4">
                <a href="#" class="js-search-toggle"><span class="icon-search2"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-facebook"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-twitter"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-instagram"></span></a>
              </li>
            </ul>

            <!-- Mobile Toggle -->
            <a href="#" class="d-block d-lg-none burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
          </div>
        </div>
      </nav>

      <main class="site-untree_co--main">

        @yield('content')

        <div class="untree_co--site-section py-5 bg-body-darker cta">
            <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                <h3 class="m-0 p-0">If you have any special requests, please feel free to call us. <a href="tel://+201061851679">+201061851679</a></h3>
                </div>
            </div>
            </div>
        </div>
      </main>


      <footer class="untree_co--site-footer">

        <div class="container">
          <div class="row">
            <div class="col-md-4 pr-md-5">
              <h3>About Us</h3>
              <p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided may range from a modest-quality.</p>
              <p><a href="https://osamashrara.me" class="readmore">Read more</a></p>
            </div>
            <div class="col-md-8 ml-auto">
              <div class="row">
                <div class="col-md-3">
                  <h3>Navigation</h3>
                  <ul class="list-unstyled">
                    <li><a href="{{route('website.home')}}">Home</a></li>
                    <li><a href="{{route('website.rooms')}}">Rooms</a></li>
                  </ul>
                </div>
                <div class="col-md-9 ml-auto">
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <h3>Address</h3>
                      <address> Cairo, Egypt</address>
                    </div>
                    <div class="col-md-6">
                      <h3>Telephone</h3>
                      <p>
                        <a href="#">+201061851679</a> <br>
                        <a href="#">+201557700404</a>
                      </p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="row mt-5 pt-5 align-items-center">
            <div class="col-md-6 text-md-left">
              <!-- Link back to Untree.co can't be removed. Template is licensed under CC BY 3.0. If you purchased a license you can remove this. -->
              <p>
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="{{route('website.home')}}">Booking</a>. All Rights Reserved. Design by <a href="https://osamashrara.me" target="_blank" class="text-primary">Osama Shrara</a>
              </p>
            <!-- Link back to Untree.co can't be removed. Template is licensed under CC BY 3.0. If you purchased a license you can remove this. -->
            </div>
            <div class="col-md-6 text-md-right">
              <ul class="icons-top icons-dark">
              <li>
                <a href="#"><span class="icon-facebook"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-twitter"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-instagram"></span></a>
              </li>
              <li>
                <a href="#"><span class="icon-tripadvisor"></span></a>
              </li>
            </ul>

            </div>
          </div>
        </div>

      </footer>
    </div>

    <!-- Search -->
    <div class="search-wrap">
      <a href="#" class="close-search js-search-toggle">
        <span>Close</span>
      </a>
      <div class="container">
        <div class="row justify-content-center align-items-center text-center">
          <div class="col-md-12">
            <form action="{{route('website.search')}}" method="get">
                <input type="search" name="search" id="s" placeholder="Type a keyword and hit enter..."  autocomplete="false">
            </form>
          </div>
        </div>
      </div>
    </div>



    <script src="{{asset('website/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('website/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('website/js/vendor/bootstrap.min.js')}}"></script>

    <script src="{{asset('website/js/vendor/owl.carousel.min.js')}}"></script>

    <script src="{{asset('website/js/vendor/jarallax.min.js')}}"></script>
    <script src="{{asset('website/js/vendor/jarallax-element.min.js')}}"></script>
    <script src="{{asset('website/js/vendor/ofi.min.js')}}"></script>

    <script src="{{asset('website/js/vendor/aos.js')}}"></script>

    <script src="{{asset('website/js/vendor/jquery.lettering.js')}}"></script>
    <script src="{{asset('website/js/vendor/jquery.sticky.js')}}"></script>

    <script src="{{asset('website/js/vendor/TweenMax.min.js')}}"></script>
    <script src="{{asset('website/js/vendor/ScrollMagic.min.js')}}"></script>
    <script src="{{asset('website/js/vendor/scrollmagic.animation.gsap.min.js')}}"></script>
    <script src="{{asset('website/js/vendor/debug.addIndicators.min.js')}}"></script>


    <script src="{{asset('website/js/main.js')}}"></script>

    @yield('js')
  </body>
</html>
