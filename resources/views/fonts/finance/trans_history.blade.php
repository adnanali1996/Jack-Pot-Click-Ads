@extends('fonts.layouts.user')
@section('site')
    | Transaction History
@endsection
@section('style')
    <style>
        @media only screen and (max-width: 480px) {
            .col-md-12{
                position: relative;
                min-height: 1px;
                padding-left: 12px!important;
                padding-right: 15px;
            }

        }
    </style>
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="bold">Transaction History</h3>
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
                                    <th width="10%"> SL# </th>
                                    <th> Transaction Number </th>
                                    <th> Transected on </th>
                                    <th> Description </th>
                                    <th> Amount </th>
                                    <th>Charge</th>
                                    <th> Post Balance </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($trans as $key=>$data)
                                    <tr class="@if($data->amount <= 0) danger @elseif($data->type == 3 ) danger @elseif($data->type == 5 ) @else success @endif">
                                        <td>{{$key+1}}</td>
                                        <td>{{$data->trans_id}}</td>
                                        <td>{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</td>
                                        <td>{{$data->description}}</td>
                                        <td>{{abs($data->amount)}} {{$general->symbol}}</td>
                                        @if($data->charge != '')
                                            <td>{{ $data->charge }} {{$general->symbol}}</td>
                                        @else
                                            <td></td>
                                        @endif
                                        <td>{{round($data->new_balance,4)}} {{$general->symbol}}</td>
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

