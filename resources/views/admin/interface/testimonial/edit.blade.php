@extends('master')
@section('site-title')
    Testimonial Edit
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

            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-list font-green"></i>
                                <span class="caption-subject font-green bold uppercase">Edit {{$test->name}} </span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form class="form-horizontal" role="form" method="post" action="{{route('test.update', $test->id)}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Image Upload #1</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 80px;">
                                                <img height="80px" src="{{asset('assets/images/testimonial/'. $test->image)}}"></div>

                                            <div>
                        <span class="btn green-soft btn-outline btn-file">
                        <span class="fileinput-new"> Select image </span>
                        <span class="fileinput-exists"> Change </span>
                        <input type="file" name="image"> </span>
                                                <a href="javascript:;" class="btn green-soft fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Name</label>
                                            <input class="form-control text-capitalize" value="{{$test->name}}" type="text" required name="name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Company</label>
                                            <input class="form-control text-capitalize" value="{{$test->company}}" type="text" required name="company">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Star</label>
                                            <input class="form-control text-capitalize" value="{{$test->star}}" type="text" required name="star">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Comment</label>
                                            <input class="form-control text-capitalize" value="{{$test->comment}}" type="text" required name="comment">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn blue-madison btn-block">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection