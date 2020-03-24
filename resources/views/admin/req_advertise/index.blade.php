@extends('master')
@section('site-title')
    Requested Advertise
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption uppercase bold"><i class="fa fa-user"></i> Requested Advertise List</div>
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
                                        <td>
                                            <a class="btn green"  data-toggle="modal" href="#acceptAdd{{$data->id}}"><i class="fas fa-check"></i>Accept</a>
                                            <a class="btn red"  data-toggle="modal" href="#rejectAdd{{$data->id}}"><i class="fas fa-ban"></i>Reject</a>
                                        </td>
                                    </tr>
                                    <div id="acceptAdd{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h3 class="modal-title bold" style="color: green;">Approve Advertise Confirmation</h3>
                                            </div>
                                            <form method="post" class="form-horizontal" action="{{route('aprove.ad')}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="advertise_id" value="{{$data->id}}">
                                                <input type="hidden" name="user_id" value="{{$data->member->id}}">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <strong class="col-md-12">Price for Per Click</strong>

                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="price" placeholder="Advertisement Price">
                                                                <span class="input-group-addon">{{$general->symbol}}</span>
                                                            </div>
                                                    </div>
                                                </div>


                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                <button type="submit" class="btn green"> Approve</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>




                                    <div id="rejectAdd{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h3 class="modal-title bold" style="color: green;">Confirmation to reject</h3>
                                            </div>
                                            <div class="modal-body">
                                                <h4 style="color: red"> After Reject, User will get his/her package buying payment back.</h4>
                                            </div>
                                            <form method="post" action="{{route('reject.ad')}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="advertise_id" value="{{$data->id}}">
                                                <input type="hidden" name="user_id" value="{{$data->member->id}}">
                                                <input type="hidden" name="package_id" value="{{$data->package->id}}">
                                                <div class="modal-footer">
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <button type="submit" class="btn red"> Reject</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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

