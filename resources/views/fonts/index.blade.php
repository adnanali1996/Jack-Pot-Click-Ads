@extends('fonts.layouts.master')
@section('content')
    <!--Start Banner Image Area-->
    <section id="banner-image-area" style="background: url({{asset('assets/images/fontend_slide/'. $slider->image)}}); background-size: cover ; background-position:center;opacity: 0.9;">
       
        <div class="banner-content dp-table">
            <div class="tbl-cell text-center">

                <h1>{{$slider->heading}}</h1>
                <p>
                    {{$slider->description}}
                </p>
                <a class="pranto" href="{{url('login')}}">Sign In</a>
                <a class="pranto" href="{{url('register')}}">Sign Up</a>
            </div>
        </div>
    </section>
    <!--End  Banner Image Area-->

    <!--Start About Area-->
    <section id="about-area">
        <!--Start Container-->
        <div class="container">
            <!--Start Row-->
            <div class="row">
                <!--Start About Content-->
                <div class="col-md-6">
                    <div class="about-content">
                        <h2>About Us</h2>
                        <p>{!! $general->about_text !!}</p>
                    </div>
                </div>
                <!--End About Content-->

                <!--Start About Image-->
                <div class="col-md-6">
                    <div class="about-img">
                        <img src="{{asset('assets/images/about_image/'.$general->image)}}" class="img-responsive" alt="Image">
                    </div>
                </div>
                <!--End About Image-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End About Area-->

    <!--Start Why Choose Area-->
    <section id="why-choose-us">
        <!--Image Background-->
        <div class="why-choose-img bg-cover"></div>
        <!--Start Container-->
        <div class="container-fluid">
            <!--Start Row-->
            <div class="row">
                <!--Start Content-->
                <div class="col-md-6 col-md-offset-6 p-0">
                    <div class="why-choose-content">
                        <h2 class="white-color">Why Choose Us?</h2>

                        @foreach($service as $data)
                        <!--Start Single Item-->
                        <div class="single-item row">
                            <div class="col-md-2">
                                <div class="single-item-icon">
                                    <i class="fa {{$data->icon}} white-color"></i>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <h4 class="white-color">{{$data->title}}</h4>
                                <p class="white-color" >{!! $data->description !!}</p>
                            </div>
                        </div>
                        <!--End Single Item-->
                        @endforeach

                    </div>
                </div>
                <!--End Content-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Why Choose Area-->

    <!--Start Pricing Area-->
    <section id="pricing-area">
        <!--Start Container-->
        <div class="container">
            <!--Start Heading Row-->
            <div class="row">
                <!--Start Section Heading-->
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h5>Choose Your Plan</h5>
                        <h2>Our Pricing Plan</h2>
                    </div>
                </div>
                <!--End Section Heading-->
            </div>
            <!--End Heading Row-->

            <!--Start Pricing Row-->
            <div class="row">
            @foreach($pack as $key => $data)
                <!--Start Pricing Table Single-->
                <div class="col-md-3">
                    <div class="pricing-tbl-single @if($key+1 == 0 || $key+1 ==0) popular @endif text-center">
                        <h3>{{$data->title}}</h3>
                        <div class="price-amount ">
                            <h1>{{$general->symbol}} {{$data->price}}</h1>
                            <p>{{$data->click}} Click</p>
                        </div>
                        <div class="pricing-content">
                            <ul>
                                @foreach($data->detail as $value)
                                    <li>{{$value->detail}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="pricing-btn">
                            <a href="{{route('register')}}">Get Started</a>
                        </div>
                    </div>
                </div>
                <!--End Pricing Table Single-->
            @endforeach
            </div>
            <!--End Pricing Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Pricing Area-->

    <!--Start Counter Area-->
 
    <!--End Counter Area-->


    <!--Start Testimonial Area-->
    <section id="testimonial-area" class="section-padding bg-cover">
        <div class="overlay"></div>
        <!--Start Container-->
        <div class="container">
            <!--Start Heading Row-->
            <div class="row">
                <!--Start Section Heading-->
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h5 class="white-color">Clients Feedback</h5>
                        <h2 class="white-color">Our Client Testimonial</h2>
                    </div>
                </div>
                <!--End Section Heading-->
            </div>
            <!--End Heading Row-->

            <!--Start Testimonial Row-->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!--Start Testimonial Carousel-->
                    <div class="testimonial-carousel owl-carousel">

                    @foreach($testimonial as $data)
                        <!--Start Testimonial Single-->
                        <div class="testimonial-single text-center">
                            <div class="testimonial-img">
                                <img src="{{asset('assets/images/testimonial/'. $data->image)}}" class="img-responsive" alt="Image">
                            </div>
                            <div class="testimonial-content">
                                <p>{{$data->name}} , <span>{{$data->company}}</span> </p>
                                <p>{{$data->comment}}</p>
                            </div>
                        </div>
                        <!--End Testimonial Single-->
                    @endforeach


                    </div>
                    <!--End Testimonial Carousel-->
                </div>
            </div>
            <!--End Testimonial Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Testimonial Area-->


    <!--Start Contact Area-->
    <section id="contact-area" class="section-padding bg-cover">
        <!--Start Container-->
        <div class="container">
            <!--Start Heading Row-->
            <div class="row">
                <!--Start Section Heading-->
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h5>Have Any Question?</h5>
                        <h2>Contact With Us</h2>
                    </div>
                </div>
                <!--End Section Heading-->
            </div>
            <!--End Heading Row-->

            <!--Start Row-->
            <div class="row">
                <!--Start Contact Info-->
                <div class="contact-info fix">
                    <!--Start Contact Info Single-->
                    <div class="col-md-4">
                        <div class="contact-info-single text-center">
                            <i class="icofont icofont-social-google-map"></i>
                            <p>{{$general->address}}</p>
                        </div>
                    </div>
                    <!--End Contact Info Single-->

                    <!--Start Contact Info Single-->
                    <div class="col-md-4">
                        <div class="contact-info-single text-center">
                            <i class="icofont icofont-envelope"></i>
                            <p>{{$general->email}}</p>

                        </div>
                    </div>
                    <!--End Contact Info Single-->

                    <!--Start Contact Info Single-->
                    <div class="col-md-4">
                        <div class="contact-info-single text-center">
                            <i class="icofont icofont-phone"></i>
                            <p>{{$general->mobile}}</p>
                        </div>
                    </div>
                    <!--End Contact Info Single-->
                </div>
                <!--End Contact Info-->
            </div>
            <!--End Row-->

            <!--Start Row-->
            <div class="row">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
                <!--Start Contact Form-->
                <div class="col-md-8">
                    <div class="contact-form">
                        <form action="{{route('contact.us.message')}}" method="POST">
                            {{csrf_field()}}
                            <div class="input-box">
                                <div class="contact-icon"><i class="icofont icofont-user-alt-2"></i></div>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Name">
                                @if ($errors->has('name'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-box">
                                <div class="contact-icon"><i class="icofont icofont-email"></i></div>
                                <input type="email" value="{{ old('email') }}" class="form-control"  name="email" placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="textarea-box">
                                <div class="contact-icon"><i class="icofont icofont-comment"></i></div>
                                <textarea class="form-control" name="message" rows="10" placeholder="Message"></textarea>
                                @if ($errors->has('message'))
                                    <span class="help-block" style="color: red">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <!--End Contact Form-->

                <!--Start Google Map-->
                <div class="col-md-4">
                    <div class="map">
                        {!! $general->google_map_address !!}
                    </div>
                </div>
                <!--End Google Map-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Contact Area-->

    <!--Start Partner Area-->
    <section id="partner-area">
        <!--Start Container-->
        <div class="container">
            <!--Start Heading Row-->
            <div class="row">
                <!--Start Section Heading-->
                <div class="col-md-6 col-md-offset-3">
                    <div class="section-heading text-center">
                        <h2>Our Trusted Payment Methods</h2>

                    </div>
                </div>
                <!--End Section Heading-->
            </div>
            <!--End Heading Row-->

            <div class="row">
                <div class="col-md-12">
                    <!--Start Partner List-->
                    <div class="row">
                       <div class="col-md-4">
                            <img src="{{asset('assets/images/gateway')}}/meezan.jpg" class="img-responsive" alt="Image">
                        </div>
                       <div class="col-md-4">
                            <img src="{{asset('assets/images/gateway')}}/1557087517.jpg" class="img-responsive" alt="Image">
                       </div>
                       <div class="col-md-4">
                            <img src="{{asset('assets/images/gateway')}}/1557087434.jpg" class="img-responsive" alt="Image">
                       </div>
                     
                       
                      
                    </div>
                    <!--End Partner List-->
                </div>
            </div>

        </div>
        <!--End Container-->
    </section>
    <!--End Partner Area-->
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $(document).on('click','#post',function(){
                var email = $("#email").val();

                $.ajax({
                    type:"POST",
                    url:"{{route('store.new.letter')}}",
                    data:{

                        'email' : email,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        $('#messsge').html(data);
                        $("#email").val(' ');
                    }
                });
            });
        });
    </script>
@endsection