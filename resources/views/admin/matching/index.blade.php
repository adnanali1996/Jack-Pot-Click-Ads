@extends('master')
@section('site-title')
    Matching History
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="bold">Matching History</h3>
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
                                    <th  width="5%"> Sl</th>
                                    <th> Username </th>
                                    <th> Name </th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th> Created On </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($match as $key => $data)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->memeber->username}}</td>
                                        <td>{{$data->memeber->first_name}} {{$data->memeber->last_name}} </td>
                                        <td><b>{{$data->amount}} {{$general->symbol}}</b></td>
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

