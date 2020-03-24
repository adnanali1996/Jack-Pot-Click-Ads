@extends ('fonts.layouts.master')
@section('site')
    | {{$menu_content->menu_name}}
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
                            <h1 class="white-color m-0">{{$menu_content->menu_name}}</h1>
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
                    <div class="col-md-9 col-sm-8">
                        <!--Start Blog Post Single-->
                        <div class="blog-post-single">
                            <div class="post-media">
                                <img style="max-width: 80%;" class="img-responsive" src="{{asset('assets/images/blog/'.$menu_content->image)}}" alt="image">
                            </div>
                            <div class="post-meta">
                                <h2 class="post-title">{{$menu_content->title}}</h2>
                                <span><a href=""><i class="icofont icofont-ui-calendar"></i>{{date('d F, Y', strtotime($menu_content->created_at))}}</a></span>
                            </div>
                            <div class="post-content">
                                <p>{!! $menu_content->description!!}</p>
                            </div>
                        </div>
                        <!--End Blog Post Single-->

                        <div class="blog-social">
                            <h4>Share This Post</h4>

                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}">
                                        <i class="icofont icofont-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}">
                                        <i class="icofont icofont-social-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://plus.google.com/share?url={{urlencode(url()->current()) }}">
                                        <i class="icofont icofont-social-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary">
                                        <i class="icofont icofont-brand-linkedin"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!--Start Blog Comments-->
                        <div class="blog-comments">
                            <!--Start Comments List-->
                            <h3>Comments:</h3>
                            <!--Start Comment Single-->
                            <div class="comment-list">
                                <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s); js.id = id;
                                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1421567158073949";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));
                                </script>
                                <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
                            </div>
                            <!--End Comment Single-->
                        </div>
                        <!--End Blog Comments-->

                        <!--Start Comment Form-->

                        <!--End Comment Form-->
                    </div>
                    <!--End Blog Post Col-->

                    <!--Start Sidebar-->
                    <div class="col-md-3 col-sm-4">
                        <div class="blog-sidebar">

                            <!--Start Recent Post-->
                            <div class="widget recent-post">
                                <h4>Recent Post</h4>
                                @foreach($last_first as $data)
                                <div class="recent-post-item">
                                    <h5><a href="{{route('news.show.pranto',['id' => $data->id , 'title' => Replace($data->title)])}}">{{$data->title}}</a></h5>
                                    <p><span>{{date('d F, Y', strtotime($data->created_at))}}</span></p>
                                    <p>{{ Short_Text($data->description, 30) }}</p>
                                </div>
                                @endforeach

                            </div>
                            <!--End Recent Post-->

                            <!--Start Archive Widget-->
                            <div class="widget archive">
                                <h4>Related</h4>
                                <ul>
                                    @foreach($first_last as $data)
                                    <li>
                                        <a href="{{route('news.show.pranto',['id' => $data->id , 'title' => Replace($data->title)])}}"><i class="icofont icofont-simple-right"></i> {{$data->title}}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            <!--End Archive Widget-->
                        </div>
                    </div>
                    <!--End Sidebar-->
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </div>
        <!--End Blog Wrap-->

    </section>
    <!--End Page Content-->
@endsection