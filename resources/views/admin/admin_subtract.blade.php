@extends('master')
@section('site-title')
    Admin Subtract
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="bold"> Admin Subtract History</h3>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
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
                                    <th width="5%"> Sl</th>
                                    <th> Username </th>
                                    <th> Name </th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th> Created On </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trans as $key => $data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->member->username}}</td>
                                        <td><a href="{{route('user.view', $data->user_id)}}">{{$data->member->first_name}} {{$data->member->last_name}}</a> </td>
                                        <td><b>{{abs($data->amount)}} {{$general->symbol}}</b></td>
                                        <td>{{ $data->description}}</td>
                                        <td> {{ \Carbon\Carbon::parse($data->created_at)->format('F dS, Y - h:i A') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection

