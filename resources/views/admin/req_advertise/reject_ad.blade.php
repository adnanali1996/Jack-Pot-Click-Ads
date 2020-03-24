@extends('master')
@section('site-title')
    Rejected Advertise
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption uppercase bold"><i class="fa fa-user"></i> Rejected Advertise List</div>
                        </div>
                        <div class="portlet-body table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th> Sl</th>
                                    <th> Title </th>
                                    <th>Link</th>
                                    <th>User</th>
                                    <th> Package </th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($add as $key => $data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->title}}</td>
                                        <td><a href="{{$data->link}}" target="_blank">Advertise Link</a></td>
                                        <td><a href="{{route('user.view', $data->member->id)}}" target="_blank">{{$data->member->first_name}} {{$data->member->last_name}}</a></td>
                                        @if($data->package != '')
                                        <td> <a href="{{route('package.index')}}" target="_blank">{{ $data->package->title }}</a></td>
                                        @endif
                                        <td><span class="badge badge-danger">Rejected</span> </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-12 text-center">{{$add->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection

