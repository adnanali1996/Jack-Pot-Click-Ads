<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="zxx">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>{{$general->web_title}} @yield('site')</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/fontend_logo/icon.png')}}" />
    <!--Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/fonts/css/bootstrap.css">
    <!--Owl Carousel CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/fonts/css/owl.carousel.min.css">
    <!--Magnific PopUp CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/fonts/css/magnific-popup.css">
    <!--Icofont CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/fonts/css/icofont.css">
    <!--Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/fonts/css/style.css">
    <!--Responsive CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/fonts/css/responsive.css"> @yield('style')
    <link href="{{url('/')}}/assets/fonts/colors/base-color.php?color={{$general->theme}}&second={{ $general->sec_color }}" rel="stylesheet">
    <!--Modanizr JS-->
    <script src="{{url('/')}}/assets/fonts/js/modernizr.custom.js"></script>
    <script src="{{url('/')}}/assets/admin_assets/new.fontawesome.js " type="text/javascript"></script>
</head>

<body>
    <!--Start Preloader-->
    <div class="site-preloader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <!--End Preloader-->

    <!--Start Body Wrap-->
    <div id="body-wrap">
        <!--Start Header-->
        <header id="header">
            <div class="main-menu" data-spy="affix" data-offset-top="10">
                <div class="container">
                    <!--Start Mainmenu-->
                    <div class="main-menu">
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                                <a class="navbar-brand" href="{{url('/')}}">
                                <img style=" max-width: 60px;" src="{{asset('assets/images/fontend_logo/logo.png')}}" class="img-responsive" alt="Image">
                            </a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    @guest
                                    <li><a @if(request()->path() == '/') href="#header" @else href="{{url('/')}}" @endif >Home</a></li>
                                    <li><a @if(request()->path() == '/') href="#about-area" @else href="{{url('/')}}" @endif>About</a></li>
                                    <li><a @if(request()->path() == '/') href="#why-choose-us" @else href="{{url('/')}}" @endif >Services</a></li>
                                    <li><a href="{{route('news.blog')}}">News</a></li>
                                    <li><a @if(request()->path() == '/') href="#contact-area" @else href="{{url('/')}}" @endif>Contact</a></li>
                                    <li><a href="{{url('/login')}}">Sign In</a></li>  
                                    <li><a href="{{url('/register')}}">Sign Up</a></li>
                                    @else
                                    <li><a href="{{url('/home')}}"> Dashboard</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">Logout
                                    </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>
                    </div>
                    <!--End Mainmenu-->
                </div>
            </div>
        </header>
        <!--End Header-->

        @yield('content')

        <!--Start Footer-->
        <footer id="footer">
            <div class="copyright-text text-center">
                <p class="white-color">{{$general->footer}}</p>
            </div>
        </footer>
        <!--End Footer-->
    </div>
    <!--End Body Wrap-->

    <!--Google Map-->
    <script>
        function initMap() {
        // Styles a map in night mode.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 40.680,
                lng: -73.945
            },
            zoom: 12,
            styles: [{
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#444444"
                }]
            }, {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [{
                    "color": "#f2f2f2"
                }]
            }, {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "road",
                "elementType": "all",
                "stylers": [{
                    "saturation": -100
                }, {
                    "lightness": 45
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [{
                    "visibility": "simplified"
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "water",
                "elementType": "all",
                "stylers": [{
                    "color": "#444444"
                }, {
                    "visibility": "on"
                }]
            }]
        });
        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.6700, -73.9400),
            map: map,
            icon: {
                url: '{{url('/')}}/assets/fonts/images/map-marker.png',
            },
            animation: google.maps.Animation.BOUNCE
        });
    }
    </script>
    <!--jQuery JS-->
    <script src="{{url('/')}}/assets/fonts/js/jquery.min.js"></script>
    <!--Google Map API Key-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqFuLx8S7A8eianoUhkYMeXpGPvsXp1NM&callback=initMap" async
        defer></script>
    <!--Counter JS-->
    <script src="{{url('/')}}/assets/fonts/js/waypoints.js"></script>
    <script src="{{url('/')}}/assets/fonts/js/jquery.counterup.min.js"></script>
    <!--Scrolly JS-->
    <script src="{{url('/')}}/assets/fonts/js/jquery.scrolly.js"></script>
    <!--Bootstrap JS-->
    <script src="{{url('/')}}/assets/fonts/js/bootstrap.min.js"></script>
    <!--Magnic PopUp JS-->
    <script src="{{url('/')}}/assets/fonts/js/magnific-popup.min.js"></script>
    <!--Isotope JS-->
    <script src="{{url('/')}}/assets/fonts/js/isotope.min.js"></script>
    <!--Image Loded JS-->
    <script src="{{url('/')}}/assets/fonts/js/images-loded.min.js"></script>
    <!--Owl Carousel JS-->
    <script src="{{url('/')}}/assets/fonts/js/owl.carousel.min.js"></script>
    <!--Custom JS-->
    <script src="{{url('/')}}/assets/fonts/js/custom.js"></script>
    @yield('script')

</body>

</html>