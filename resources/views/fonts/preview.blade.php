@extends('fonts.layouts.user')
@section('site')
    | Preview
@endsection
@section('style')
    <style>
        li.list-group-item {
            font-size: 18px;
        }
    </style>
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-06">
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

            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            <div class="row">

                <div class="col-md-12">
                    <div class="portlet box blue-ebonyclay">
                        <div class="portlet-title">
                            <div class="caption uppercase bold"><i class="fa fa-th"></i> Preview Add Fund</div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel panel-inverse">
                                        <div class="panel-heading">
                                            <h3 class="text-center bold">Preview of Add Fund</h3>
                                        </div>
                                        <div class="panel-body table-responsive text-center">
                                            <ul class="list-group">
                                                <li class="list-group-item">Request for Add Amount: <strong>{{$amount}}</strong> {{$general->currency}}</li>

                                                @php
                                                    $one = $amount + $gate->chargefx;
                                                    $two = ($amount * $gate->chargepc)/100;
                                                    $charge = $gate->chargefx + ( $amount *  $gate->chargepc )/100

                                                @endphp
                                                @if ($gate->id == 3 || $gate->id == 6 || $gate->id == 7 || $gate->id == 8)
                                                    <li class="list-group-item" style="color: red">Total Charge: <strong>{{$charge}}</strong> {{$general->currency}}</li>
                                                    <li class="list-group-item">Total Payable Amount: <strong>{{$one + $two}}</strong> {{$general->currency}}</li>
                                                    <li class="list-group-item" style="color: firebrick">In BTC: <strong>{{ $payablebtc }}</strong> BTC</li>
                                                    <li class="list-group-item">Payment Gateway: <strong>{{$gate->name}}</strong></li>
                                                @else

                                                    <li class="list-group-item" style="color: red">Total Charge: <strong>{{$charge}}</strong> {{$general->currency}}</li>
                                                    <li class="list-group-item">Total Payable Amount: <strong>{{$one + $two}}</strong> {{$general->currency}}</li>
                                                    <li class="list-group-item" style="color: firebrick">In USD: <strong>{{number_format(($one + $two)/$gate->rate, 2) }}</strong> USD</li>

                                                    <li class="list-group-item">Payment Gateway: <strong>{{$gate->name}}</strong></li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="panel-footer">
                                            <a class="btn blue-ebonyclay btn-lg btn-block" href="{{route('buy.confirm')}}">
                                                Pay Now
                                            </a>
                                        </div>
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