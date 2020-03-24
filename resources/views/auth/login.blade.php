@extends ('fonts.layouts.master')
@section('style')
    <link href="{{url('/')}}/assets/fonts/register.css" rel="stylesheet">
    <style>
        #page-content{
            background-image: url("assets/fonts/img/login_bg.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
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
                            <h1 class="white-color m-0">Sign In</h1>
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

                <div class="wrapper fadeInDown">
                    <div id="formContent">
                        <!-- Tabs Titles -->
                        <h2 class="active"> Sign In </h2>

                        <!-- Icon -->
                        <div class="fadeIn first">
                            <img  src="{{asset('assets/user/no_user.png')}}" id="icon" alt="User Icon" />
                        </div>
                        <!-- Login Form -->
                        <form method="post" action="{{ route('login') }}" >
                            {{csrf_field()}}
                            <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username">
                            @if ($errors->has('username'))
                                <span class="help-block" style="color: red">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                            @if ($errors->has('password'))
                                <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <input type="submit" class="fadeIn fourth" value="Log In">
                        </form>

                        <!-- Remind Passowrd -->
                        <div id="formFooter">
                            <a class="underlineHover" href="{{url('password/reset')}}">Forgot Password?</a>
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
