@extends('master')
@section('site-title')
    Withdraw Log
@endsection

@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="bold">Withdraw Log</h3>
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-010">
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
                                <div class="caption font-dark">

                                </div>
                                <div class="tools"> </div>
                            </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th> Wd Id </th>
                                    <th> User </th>
                                    <th> Amount </th>
                                    <th> Charge </th>
                                    <th> Method </th>
                                    <th> Details </th>
                                    <th> Requested On</th>
                                    <th> Processed On</th>
                                    <th> ACTION</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($withdraw as $key=>$data)
                                    <tr class="@if($data->status == 3) danger @elseif($data->status == 1) success @else warning @endif">

                                        <td >{{$data->withdraw_id}}</td>
                                        <td>
                                            <p><a href="{{route('user.view', $data->memeber->id)}}">{{$data->memeber->first_name}} {{$data->memeber->last_name}}</a> </p>
                                            <p>{{$data->memeber->email}}</p>
                                        </td>
                                        <td>{{$data->amount}} {{$general->symbol}}</td>
                                        <td>{{$data->charge}} {{$general->symbol}}</td>
                                        <td>{{$data->method_name}}</td>

                                        <td>
                                            <a type="button" class="btn btn-info" data-toggle="modal" href="#viewtable{{$data->id}}" >View Detail</a>
                                            <div id="viewtable{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">View Detail #{{$data->withdraw_id}}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-hover">
                                                                <thead>
                                                                <th>Detail</th>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        {!! $data->detail !!}
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </td>

                                        <td>{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</td>
                                        <td>{{date('g:ia \o\n l jS F Y', strtotime($data->updated_at))}}</td>
                                        <td>
                                            @if($data->status == 3)
                                                <span class="badge badge-pill badge-danger">REFUNDED</span>
                                            @elseif($data->status == 1)
                                                <span class="badge badge-pill badge-success"> PAID</span>
                                            @else
                                                <span class="badge badge-pill badge-warning"> PENDING</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection