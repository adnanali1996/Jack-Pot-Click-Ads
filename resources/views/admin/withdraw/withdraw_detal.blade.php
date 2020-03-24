@extends('master')
@section('site-title')
Withdraw Detail
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
                            <span class="caption-subject bold uppercase">Withdraw Detail</span>

                        </div>
                    </div>
                    <div class="portlet-body table-responsive">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th>Title</th>
                                        <td><b>Detail</b></td>
                                    </tr>
                                    <tr>
                                        <th>Transaction:</th>
                                        <td>{{$data->withdraw_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Member Name:</th>
                                        <td><a href="{{route('user.view', $data->memeber->id)}}">{{$data->memeber->first_name}}
                                                {{$data->memeber->last_name}}</a></td>
                                    </tr>

                                    <tr>
                                        <th>Member Email:</th>
                                        <td>{{$data->memeber->email}} </td>
                                    </tr>

                                    <tr>
                                        <th>Amount Of Withdraw</th>
                                        <td>{{$data->amount}} {{$general->currency}}</td>
                                    </tr>

                                    <tr>
                                        <th>Charge Of Withdraw</th>
                                        <td> {{$data->charge}} {{$general->currency}}</td>
                                    </tr>

                                    <tr>
                                        <th>Withdraw Method</th>
                                        <td> <b>{{$data->method_name}} </b></td>
                                    </tr>

                                    <tr>
                                        <th>Given Processing Time</th>
                                        <td> {{$data->processing_time}} Days</td>
                                    </tr>

                                    <tr>
                                        <th>Amount In Method Currency</th>
                                        <td> {{round($data->method_cur, 4)}}</td>
                                    </tr>

                                    <tr>
                                        <th>Date Of Create</th>
                                        <td> {{ date('g:ia \o\n l jS F Y', strtotime($data->created_at)) }}</td>
                                    </tr>

                                    <tr>
                                        <th>Detail</th>
                                        <td> {!! $data->detail !!}</td>
                                    </tr>

                                </table>
                                @php $amo = \App\Withdraw::where('name', $data->method_name)->first(); @endphp
                                @if($amo == '')
                                <p style="color: red">{{$data->method_name}} method Deleted</p>
                                @else
                                {{-- <p style="color: red">Charge Already taken. Send {{$data->amount * $amo->rate }}
                                {{$amo->currency}} To The User</p> --}}
                                <p style="color: red">Charge Already taken.</p>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <form class="form-horizontal" method="post"
                                    action="{{route('withdraw.process', $data->id)}}">
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <strong class="col-md-12">Message</strong>
                                                    <hr>
                                                    <textarea class="form-control col-md-12" name="message"
                                                        rows="5"></textarea>
                                                </div>
                                                <button type="submit" name="status" value="1"
                                                    class="btn btn-success pull-left">Processed</button>
                                                <button type="submit" name="status" value="3"
                                                    class="btn red pull-right">Refund</button>
                                            </div>
                                        </div>
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