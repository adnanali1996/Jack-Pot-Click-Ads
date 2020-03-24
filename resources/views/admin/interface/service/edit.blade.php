@extends('master')
@section('site-title')
    Service
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
                        <span class="caption-subject font-black bold uppercase">Edit Service</span>
                    </div>
                </div>

                <div class="portlet-body">
                    <form role="form" method="POST" action="{{route('service.update', $service->id)}}">
                        {{ csrf_field() }}
                        {{method_field('put')}}
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Icon Pick</label>
                                <input class="icp demo form-control" name="icon" value="{{$service->icon}}" type="text">
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control input-lg" name="title" required value="{{$service->title}}">
                            </div>

                            <div class="form-group">
                                <label>Page Content</label>
                                <textarea name="description" style="width: 100%" class="form-control note-codable" rows="5">{!! $service->description !!}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn blue-madison btn-block"> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>


@endsection