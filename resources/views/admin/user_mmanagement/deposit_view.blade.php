@extends('master')
@section('site-title')
    Add Fund View
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
                                    <h1 class="bold" style="color: red">Add Fund Not Found <i class="far fa-smile"></i></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @else
            <h3 class="bold">Add Fund View of {{$trans_object->member->first_name }} {{$trans_object->member->last_name }}</h3>
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
                                    <th> Add Fund ID </th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th> Created On </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trans as $key => $data)
                                    <tr>
                                        <td>{{$data->trx}}</td>
                                        <td><b>{{abs($data->amount)}} {{$general->symbol}}</b></td>
                                        <td>{{ $data->method_name->name}}</td>
                                        @if($data->usd_amount == '')

                                        @else
                                        <td>{{ $data->usd_amount}} USD</td>
                                        @endif
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

