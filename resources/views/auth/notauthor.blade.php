@extends ('fonts.layouts.master')
@section('site')
    | Dashboard
@endsection
@section('content')
    <!--Start Page Content-->
    <section id="page-content">
        <!--Start Page Title-->
        <div class="page-title bg-cover">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-content text-center">
                            <h1 class="white-color m-0"> Authorization </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start Blog Wrap-->
        <div class="blog-single-wrap">
            <!--Start Container-->
            <div class="container">
                <!--Start Row-->
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="main-login main-center" style="overflow: hidden; margin-top: 50px;">
                            @if (Session::has('alert'))
                                <div class="alert alert-danger">{{ Session::get('alert') }}</div>
                            @endif
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif

                            <div class="col-md-12">
                                <div class="contact-form-wrapper">
                                    @if (Auth::user()->status != '1')
                                        <h3 style="color: #cc0000;" class="text-center" >Please Pay Your Selected Package Amount {{ $general->symbol }}{{ $user->package->price }}  To Continue Earning!</h3>

                                    @elseif(Auth::user()->emailv != '1')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-title text-center">Please verify your Email</div>
                                                    <div class="card-body">
                                                        <p>Your Email address:</p>
                                                        <h3>{{Auth::user()->email}}</h3>
                                                        <form action="{{route('sendemailver')}}" method="POST">
                                                            {{csrf_field()}}
                                                            <button type="submit" class="btn btn-lg btn-block btn-primary">Send Verification Code</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-title text-center">Verify Code</div>

                                                    <form action="{{route('emailverify') }}" method="POST">
                                                        {{csrf_field()}}
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"  name="code" placeholder="Enter Verification Code" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-block btn-success">Verify</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    @elseif(Auth::user()->smsv != '1')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-title text-center">Please verify your Mobile</div>
                                                    <div class="card-body">
                                                        <p>Your Mobile no:</p>
                                                        <h3>{{Auth::user()->mobile}}</h3>
                                                        <form action="{{route('sendsmsver')}}" method="POST">
                                                            {{csrf_field()}}
                                                            <button type="submit" class="btn btn-lg btn-block btn-primary">Send Verification Code</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-title text-center">Verify Code</div>

                                                    <form action="{{route('smsverify') }}" method="POST">
                                                        {{csrf_field()}}
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" required name="code" placeholder="Enter Verification Code">
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-block btn-lg btn-success">Verify</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    @elseif(Auth::user()->tfver != '1')
                                        <div class="col-md-12">

                                            <h2 class="text-center">Verify Google Authenticator Code</h2>
                                            <div class="form-body">
                                                <form action="{{route('go2fa.verify') }}" method="POST">
                                                    {{csrf_field()}}
                                                    <div class="form-group col-md-12">
                                                        <input type="text" class="form-control" name="code" required placeholder="Enter Google Authenticator Code">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-lg btn-success btn-block">Verify</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </div>
        <!--End Blog Wrap-->
    </section>
    <!--End Page Content-->

@endsection
