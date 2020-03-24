@extends ('fonts.layouts.master')
@section('site')
    | Policy
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
                            <h1 class="white-color m-0">Our Policy</h1>
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
                    <!--Start Blog Post Col-->
                    <div class="col-md-12 col-sm-12">
                        <!--Start Blog Post Single-->
                        <div class="blog-post-single">
                            <div class="post-content">
                                <p>{!! $general->policy !!}</p>
                            </div>
                        </div>
                        <!--End Blog Post Single-->
                        <!--End Comment Form-->
                    </div>
                    <!--End Blog Post Col-->
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </div>
        <!--End Blog Wrap-->
    </section>
    <!--End Page Content-->
@endsection