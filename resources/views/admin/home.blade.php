@extends('master')
@section('site-title')
DashBoard Of Admin
@endsection
@section('style')
<style>
    .visual {
        color: #f7f6ff;
    }

    .pranto {
        margin-bottom: 5px;
    }

    rect:nth-child(even) {
        fill: #8e44ad;
    }

    rect:nth-child(odd) {
        fill: #2980b9;
    }
</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
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
        @if (Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif




        <div class="row">
            <div class="col-md-12">
                <div class="portlet box dark">
                    <div class="portlet-title">
                        <div class="caption uppercase bold"><i class="fab fa-adversal"></i> PTC Panel</div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="pranto pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="dashboard-stat blue-hoki">
                                    <div class="visual">
                                        <i class="fab fa-buysellads"></i>
                                    </div>
                                    <div class="details">
                                        <div class="number">
                                            <span data-counter="counterup"
                                                data-value="{{\App\Advertise::where('package_status', 1)->count()}}">0</span>
                                        </div>
                                        <div class="desc"> Total Advertises </div>
                                    </div>
                                    <a class="more" href="{{url('admin/add/new')}}"> View more
                                        <i class="m-icon-swapright m-icon-white"></i>
                                    </a>
                                </div>
                            </div>

                            {{-- <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <div class="dashboard-stat grey-salsa">
                                                <div class="visual">
                                                    <i class="fas fa-universal-access"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup" data-value="{{\App\Advertise::where('user_id', '!=', null)->where('package_status',1)->count()}}">0</span>
                        </div>
                        <div class="desc">User Given Ad</div>
                    </div>
                    <a class="more" href="{{url('admin/advertises')}}"> View more
                        <i class="m-icon-swapright m-icon-white"></i>
                    </a>
                </div>
            </div> --}}

            {{-- <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat red-haze">
                    <div class="visual">
                        <i class="fas fa-ban"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"
                                data-value="{{\App\Advertise::where('package_status', 0)->count()}}">0</span>
        </div>
        <div class="desc">Total Rejected Ad</div>
    </div>
    <a class="more" href="{{url('admin/reject/advertise')}}"> View more
        <i class="m-icon-swapright m-icon-white"></i>
    </a>
</div>
</div> --}}

<div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat purple-sharp">
        <div class="visual">
            <i class="fas fa-cart-arrow-down"></i>
        </div>
        <div class="details">
            <div class="number">
                <span data-counter="counterup" data-value="{{\App\Transaction::where('type', 9)->count()}}">0</span>
            </div>
            <div class="desc">Total Package Buy</div>
        </div>
        <a class="more" href="{{route('buy.package.user')}}"> View more
            <i class="m-icon-swapright m-icon-white"></i>
        </a>
    </div>
</div>
</div>

</div>
</div>
</div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="portlet box dark">
            <div class="portlet-title">
                <div class="caption uppercase bold"><i class="fas fa-chart-bar"></i> Deposit Chart </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="myfirstchart" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="portlet box dark">
            <div class="portlet-title">
                <div class="caption uppercase bold"><i class="fas fa-chart-bar"></i> Withdraw Chart </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="myfirstchart2" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@php

$trans = \App\Deposit::orderBy('id', 'desc')->where('status', 1)->take(10)->get();

$main_chart_data = "[";

foreach ($trans as $index => $data)
{
$main_chart_data .= "{ year: '".date('Y-m-d', strtotime($data->created_at))."' , value: ".abs($data->amount)." }".",";
}

$main_chart_data .= "]";

$withdaw = \App\WithdrawTrasection::orderBy('id', 'desc')->where('status', 1)->take(10)->get();

$main_chart_data2 = "[";

foreach ($withdaw as $index => $data)
{
$main_chart_data2 .= "{ year: '".date('Y-m-d', strtotime($data->created_at))."' , value: ".abs($data->amount)." }".",";
}

$main_chart_data2 .= "]";

@endphp

<div class="row">
    <div class="col-md-12">
        <div class="portlet box dark">
            <div class="portlet-title">
                <div class="caption uppercase bold"><i class="fas fa-money-bill-alt"></i> Statistics Transactions </div>
            </div>
            <div class="portlet-body">
                <div class="row">

                    <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat green">
                            <div class="visual">
                                <i class="fas fa-money-bill-alt"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup" data-value="{{round(\App\User::sum('balance'),2)}}">0
                                    </span> {{$general->symbol}}
                                </div>
                                <div class="desc"> All Users Balance</div>
                            </div>
                            <a class="more" href="{{url('admin/users')}}"> View more
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>

                    <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat blue-sharp ">
                            <div class="visual">
                                <i class="far fa-credit-card"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup"
                                        data-value="{{\App\Deposit::where('status', 1)->sum('amount')}}">0</span>
                                    {{$general->symbol}}
                                </div>
                                <div class="desc">Total Add Fund</div>
                            </div>
                            <a class="more" href="{{route('index.deposit.user')}}"> View more
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>

                    <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat grey-mint ">
                            <div class="visual">
                                <i class="fas fa-retweet"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup"
                                        data-value="{{\App\WithdrawTrasection::where('status', 1)->sum('amount')}}">0</span>
                                    {{$general->symbol}}
                                </div>
                                <div class="desc">Total Withdraw</div>
                            </div>
                            <a class="more" href="{{url('admin/withdraw/log')}}"> View more
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>

                    <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat green-jungle ">
                            <div class="visual">
                                <i class="fas fa-lock-open"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup"
                                        data-value="{{abs(\App\Transaction::where('type', 5)->sum('amount'))}}">0</span>
                                    {{$general->symbol}}
                                </div>
                                <div class="desc">Admin Generated</div>
                            </div>
                            <a class="more" href="{{route('admin.generate.view')}}"> View more
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat red-pink ">
                            <div class="visual">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup"
                                        data-value="{{abs(\App\Transaction::where('type', 6)->sum('amount'))}}">0</span>
                                    {{$general->symbol}}
                                </div>
                                <div class="desc">Admin Subtract</div>
                            </div>
                            <a class="more" href="{{route('admin.subtract.view')}}"> View more
                                <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>

                    {{-- <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="dashboard-stat blue-chambray">
                            <div class="visual">
                                <i class="fas fa-stopwatch"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span data-counter="counterup"
                                        data-value="{{\App\Income::where('type', 'B')->sum('amount')}}">0</span>
                    {{$general->symbol}}
                </div>
                <div class="desc">Total Binary Amount</div>
            </div>
            <a class="more" href="{{url('admin/match')}}"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div> --}}

    <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-seagreen ">
            <div class="visual">
                <i class="fas fa-link"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"
                        data-value="{{\App\Income::where('type', 'R')->sum('amount')}}">0</span>
                    {{$general->symbol}}
                </div>
                <div class="desc">Total Referral Amount</div>
            </div>
            <a class="more" href="{{route('ref.amount.total')}}"> View more
                <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>

    <div class="pranto col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-thunderbird  ">
            <div class="visual">
                <i class="fas fa-spinner"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup"
                        data-value="{{\App\WithdrawTrasection::where('status', 0)->count()}}">0</span>
                </div>
                <div class="desc">Withdraw Requests</div>
            </div>
            <a class="more" href="{{ url('admin/withdraw/requests') }}"> View more
                <i class="m-icon-swapright m-icon-white"></i>
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


@endsection
@section('script')
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    $(document).ready(function () {
            new Morris.Bar({
                element: 'myfirstchart',
                data: @php echo $main_chart_data  @endphp,
                xkey: 'year',
                ykeys: ['value'],
                // chart.
                labels: ['Value']
            });

            new Morris.Bar({
                element: 'myfirstchart2',
                data: @php echo $main_chart_data2  @endphp,
                xkey: 'year',
                ykeys: ['value'],
                // chart.
                labels: ['Value']
            });
        });
</script>
@endsection