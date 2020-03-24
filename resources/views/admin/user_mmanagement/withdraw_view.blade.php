@extends('master')
@section('site-title')
    Withdraw View
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            @if($trans_object == null)

                <div class="col-md-12">
                    <div class="portlet box red">
                        <div class="portlet-title">
                            <div class="caption uppercase bold"><i class="fa fa-user"></i> User</div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1 class="bold" style="color: red">Withdraw Detail Not Found <i class="far fa-smile"></i></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <h3 class="bold">Withdraw View of {{$trans_object->memeber->first_name }} {{$trans_object->memeber->last_name }}</h3>
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
                                    <th> Withdraw ID </th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Method Currency</th>
                                    <th> Created On </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trans as $key => $data)
                                    <tr>
                                        <td>{{$data->withdraw_id}}</td>
                                        <td><b>{{abs($data->amount)}} {{$general->symbol}}</b></td>
                                        <td>{{ $data->method_name}}</td>
                                        <td>{{ $data->method_cur}}</td>
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
            @endif
        </div>
    </div>
@endsection

