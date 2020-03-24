@extends('fonts.layouts.master')
@section('site')
    | Contact
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
                            <h1 class="white-color m-0">Our News</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Title-->

        <!--Start Blog Wrap-->
        <div class="blog-wrap">
            <!--Start Container-->
            <div class="container">
                <!--Start Row-->
                <div class="row">
                    <!--Start All Blog Post-->
                    <div class="col-md-9 col-sm-8">

                    @foreach($news->chunk(2) as $chunk)
                            <div class="row">
                        @foreach($chunk as $data)

                        <div class="col-md-6">
                            <!--Start Blog Post Single-->
                            <div class="blog-post-single">
                                <div class="post-media">
                                    <a href="{{route('news.show.pranto',['id' => $data->id , 'title' => Replace($data->title)])}}">
                                        <img class="img-responsive" src="{{asset('assets/images/blog/'.$data->image)}}" alt="image">
                                    </a>
                                </div>
                                <div class="post-meta">
                                    <h2 class="post-title m-0">
                                        <a href="{{route('news.show.pranto',['id' => $data->id , 'title' => Replace($data->title)])}}">{{$data->title}}</a>
                                    </h2>
                                    <span><a href=""><i class="icofont icofont-ui-calendar"></i> {{date('d F, Y', strtotime($data->created_at))}}</a></span>
                                </div>
                                <div class="post-content">
                                    <p>{{ Short_Text($data->description, 0) }}</p>
                                    <a href="{{route('news.show.pranto',['id' => $data->id , 'title' => Replace($data->title)])}}">Read More <i class="icofont icofont-rounded-right"></i></a>
                                </div>
                            </div>
                            <!--End Blog Post Single-->
                        </div>
                        @endforeach
                            </div>
                        @endforeach

                        <!--Start Pagination-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="blog-pagination text-center">
                                    {{ $news->links() }}
                                </div>
                            </div>
                        </div>
                        <!--End Pagination-->
                    </div>
                    <!--End All Blog Post-->

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
                                        <p>{{ Short_Text($data->description, 20) }}</p>
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