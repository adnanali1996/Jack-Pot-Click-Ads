@extends('master')
@section('site-title')
    Background Images
@endsection
@section('style')
  <style>
      .size-bar {
          
      }
  </style>
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-06">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</h4>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if(Session::has('msg'))
                <script>
                    $(document).ready(function() {
                        swal("{{Session::get('msg')}}", "", "success");
                    });
                </script>
            @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-list font-green"></i>
                                    <span class="caption-subject font-black bold uppercase">Background Images Content</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <form method="post"  action="{{route('image.background.update')}}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{method_field('put')}}

                                       <div class="row">
                                           <div class="col-md-6 col-sm-12 size-bar">
                                               <div class="portlet box blue-ebonyclay">
                                                   <div class="portlet-title">
                                                       <div class="caption">Service Panel</div>
                                                   </div>
                                                   <div class="portlet-body">
                                                       <img src="{{asset('assets/fonts/img/service-bg.jpg')}}" alt="IMG" style="width:100%;"><br/>
                                                       <h4 class="bold">Service Background Image </h4>
                                                       <span class="badge badge-success">2000px * 1148px Standard</span><br><br>
                                                       <input type="file" class="form-control" name="service">
                                                   </div>
                                               </div>
                                           </div>

                                           <div class="col-md-6 col-sm-12 size-bar">
                                               <div class="portlet box blue-ebonyclay">
                                                   <div class="portlet-title">
                                                       <div class="caption">Counter Panel</div>
                                                   </div>
                                                   <div class="portlet-body">
                                                       <img src="{{asset('assets/fonts/img/counter-bg.jpg')}}" alt="IMG" style="width:100%;"><br/>
                                                       <h4 class="bold">Counter Background Image </h4>
                                                       <span class="badge badge-success">1920px * 1080px Standard</span><br><br>
                                                       <input type="file" class="form-control" name="counter">
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                        <div class="row">
                                            <div class="col-md-4 col-sm-12 size-bar">
                                                <div class="portlet box blue-ebonyclay">
                                                    <div class="portlet-title">
                                                        <div class="caption">Testimonial Panel</div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <img src="{{asset('assets/fonts/img/testimonial-bg.jpg')}}" alt="IMG" style="width:100%;"><br/>
                                                        <h4 class="bold">Testimonial Background Image </h4>
                                                        <span class="badge badge-success">1000px * 347px Standard</span><br><br>
                                                        <input type="file" class="form-control" name="test">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12 size-bar">
                                                <div class="portlet box blue-ebonyclay">
                                                    <div class="portlet-title">
                                                        <div class="caption">Newsletter Panel</div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <img src="{{asset('assets/fonts/img/payment-bg.jpg')}}" alt="IMG" style="width:100%;"><br/>
                                                        <h4 class="bold">Newsletter Background Image </h4>
                                                        <span class="badge badge-success">1030px * 685px Standard</span><br><br>
                                                        <input type="file" class="form-control" name="payment">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12 size-bar">
                                                <div class="portlet box blue-ebonyclay">
                                                    <div class="portlet-title">
                                                        <div class="caption">Menu Banner Panel</div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <img src="{{asset('assets/fonts/img/contact-us.jpg')}}" alt="IMG" style="width:100%;"><br/>
                                                        <h4 class="bold">Menu Background Image </h4>
                                                        <span class="badge badge-success">1440px * 300px Standard</span><br><br>
                                                        <input type="file" class="form-control" name="menu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 col-sm-12 size-bar">
                                                <div class="portlet box blue-ebonyclay">
                                                    <div class="portlet-title">
                                                        <div class="caption">Login Panel</div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <img src="{{asset('assets/fonts/img/login_bg.jpg')}}" alt="IMG" style="width:100%;"><br/>
                                                        <h4 class="bold">Login Background Image </h4>
                                                        <input type="file" class="form-control" name="login">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12 size-bar">
                                                <div class="portlet box blue-ebonyclay">
                                                    <div class="portlet-title">
                                                        <div class="caption">Registration Panel</div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <img src="{{asset('assets/fonts/img/registration.jpg')}}" alt="IMG" style="width:100%;"><br/>
                                                        <h4 class="bold">Registration Background Image </h4>
                                                        <input type="file" class="form-control" name="reg">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12 size-bar">
                                                <div class="portlet box blue-ebonyclay">
                                                    <div class="portlet-title">
                                                        <div class="caption">Forget Password Panel</div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <img src="{{asset('assets/fonts/img/forget_password.jpg')}}" alt="IMG" style="width:100%;"><br/>
                                                        <h4 class="bold">Forget Background Image </h4>
                                                        <input type="file" class="form-control" name="forget">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn-block btn dark"><i class="fa fa-check"></i> Update</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection