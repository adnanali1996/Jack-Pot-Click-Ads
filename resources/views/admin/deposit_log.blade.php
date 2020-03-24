@extends('master')
@section('site-title')
    Deposit Log
@endsection

@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="bold">Deposit History</h3>
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-12">
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
                                    <th> DP Id </th>
                                    <th> User </th>
                                    <th> Amount </th>
                                    <th> Charge </th>
                                    <th> Method </th>
                                    <th> Requested On</th>
                                    <th> Processed On</th>

                                </tr>

                                </thead>
                                <tbody>
                                @foreach($add_fund as $key=>$data)
                                    <tr>
                                        <td >{{$data->trx}}</td>
                                        <td>
                                            <p><a href="{{route('user.view', $data->member->id)}}">{{$data->member->first_name}} {{$data->member->last_name}}</a> </p>
                                            <p>{{$data->member->email}}</p>
                                        </td>
                                        <td>{{$data->amount}} {{$general->symbol}}</td>
                                        <td>{{$data->trx_charge}} {{$general->symbol}}</td>
                                        <td>{{$data->method_name->name}}</td>
                                        <td>{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</td>
                                        <td>{{date('g:ia \o\n l jS F Y', strtotime($data->updated_at))}}</td>

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