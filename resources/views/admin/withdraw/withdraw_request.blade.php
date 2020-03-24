@extends('master')
@section('site-title')
    Withdraw Request
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
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
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption font-white">
                                    <i class="icon-settings font-red-sunglo"></i>
                                    <span class="caption-subject bold uppercase">Withdraw Requests</span>

                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Withdraw Id</th>
                                            <th>Member Name</th>
                                            <th>Amount Of Withdraw</th>
                                            <th>Method</th>
                                            <th>Amount In Method</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($withdraw as $key=> $data)
                                            <tr id="row1">
                                                <td> <b>{{$data->withdraw_id}}</b></td>
                                                <td> {{$data->memeber->first_name}} {{$data->memeber->last_name}} </td>
                                                <td> {{$data->amount}} {{$general->currency}}</td>
                                                <td><b>{{$data->method_name}} </b></td>
                                                <td> {{round($data->method_cur, 4)}}</td>
                                                <td>@if($data->status == 0)
                                                        <span class="badge badge-pill badge-warning" style="color: black">Pending</span>
                                                        @elseif($data->status == 1)
                                                        <span class="badge badge-pill badge-success" style="color: black">Paid</span>
                                                        @else
                                                        <span class="badge badge-pill badge-danger" style="color: black">Refunded</span>
                                                    @endif
                                                </td>
                                                <td><a class="btn dark" href="{{route('withdraw.detail.user', $data->id)}}">Response </a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            {{$withdraw->links()}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            function disableBack() { window.history.forward() }

            window.onload = disableBack();
            window.onpageshow = function(evt) { if (evt.persisted) disableBack() }
        });
    </script>
@endsection