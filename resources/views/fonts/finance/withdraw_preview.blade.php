@extends('fonts.layouts.user')
@section('site')
    | Withdraw | Preview
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
            <div class="row">

                <div class="col-md-12">
                    <div class="portlet box blue-ebonyclay">
                        <div class="portlet-title">
                            <div class="caption uppercase bold"><i class="fa fa-th"></i> Confirm Withdraw</div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel panel-inverse">
                                        <div class="panel-heading">
                                            <h3 class="text-center bold">Confirm Withdraw</h3>
                                        </div>
                                        @if (count($errors) > 0)
                                            <div class="row">
                                                <div class="col-md-010">
                                                    <div class="alert alert-danger alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <h12><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</h12>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <form action="{{route('confirm.withdraw.store')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="panel-body table-responsive text-center">
                                                <ul class="list-group">
                                                    @php
                                                        $one = $amount + $method->chargefx;
                                                        $two = ($amount * $method->chargepc)/100;
                                                        $charge = $method->chargefx + ( $amount *  $method->chargepc )/100
                                                    @endphp
                                                    <input type="hidden" name="amount" value="{{$amount}}" >
                                                    <input type="hidden" name="charge" value="{{$charge}}" >
                                                    <input type="hidden" name="method_name" value="{{$method->name}}" >
                                                    <input type="hidden" name="processing_time" value="{{$method->processing_day}}" >
                                                    <input type="hidden" name="method_cur" value="{{$amount / $method->rate}}" >

                                                    <li class="list-group-item">Request for Withdraw Amount: <strong>{{$amount}}</strong> {{$general->symbol}}</li>
                                                    <li class="list-group-item" style="color: red">Charge : <strong>{{$charge}}</strong> {{$general->symbol}}</li>
                                                    <li class="list-group-item">Total Withdraw Amount: <strong>{{$amount - $charge}}</strong> {{$general->symbol}}</li>
                                                    <li class="list-group-item" style="color: firebrick">In {{$method->currency}}: <strong>{{round($amount / $method->rate, 4)}}</strong> {{$method->currency}}</li>
                                                    <li class="list-group-item">Payment Gateway: <strong>{{$method->name}}</strong> <img style="height: 30px; width: 30px;" src="{{asset('assets/images/withdraw/'.$method->image)}}"> </li>
                                                </ul>
                                            </div>
                                            <div class="panel-body table-responsive text-center">
                                                <strong class="col-md-12">INFORMATION OF WITHDRAW MONEY</strong>
                                               <textarea class="form-control" name="detail" rows="5" placeholder="Provide all information"></textarea>
                                            </div>
                                            <div class="panel-footer">
                                                <button class="btn blue-ebonyclay btn-lg btn-block" type="submit">Confirm Withdraw</button>
                                            </div>
                                        </form>
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


