@extends('fonts.layouts.master')
@section('site')
    | 404
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
                            <h1 class="white-color m-0">404 Not Found</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start Notfound Wrap-->
        <div class="not-found-wrap">
            <!--Start Container-->
            <div class="container">
                <!--Start Row-->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                        <div class="not-found-content text-center">
                            <h1>404</h1>
                            <h2>Not Found</h2>
                            <h4>The Page You are Looking is Not Found.</h4>
                            <div class="notfound-btn">
                                <a href="">Back To Home</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </div>
        <!--End Notfound Wrap-->
    </section>
    <!--End Page Content-->
@endsection