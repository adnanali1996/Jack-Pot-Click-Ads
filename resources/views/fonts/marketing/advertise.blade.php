@extends('fonts.layouts.user')
@section('site')
    | Advertises
@endsection

@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">

                <div class="col-md-12">
                    <div class="portlet box blue-ebonyclay">
                        <div class="portlet-title">
                            <div class="caption uppercase bold"> <i class="fas fa-mouse-pointer"></i> Click & Earn</div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="10%"> SL# </th>
                                    <th> Title & Link </th>
                                    <th> Price Per Click</th>
                                    <th>Click</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($add as $key => $data)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><b>{{$data->advertise->title}}</b></td>
                                        <td>{{ $data->user->package->unit_price }} {{$general->symbol}}</td>
                                        <td>@if($data->status == 0)<p class="text text-danger">Already Viewed</p> @else  <a target="_blank" href="{{route('iframe.open', $data->advertise->id)}}">Click Here</a>  @endif</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        var vis = (function(){
            var stateKey, eventKey, keys = {
                hidden: "visibilitychange",
                webkitHidden: "webkitvisibilitychange",
                mozHidden: "mozvisibilitychange",
                msHidden: "msvisibilitychange"
            };
            for (stateKey in keys) {
                if (stateKey in document) {
                    eventKey = keys[stateKey];
                    break;
                }
            }
            return function(c) {
                if (c) document.addEventListener(eventKey, c);
                return !document[stateKey];
            }
        })();

        vis(function(){
            location.reload();
        });
        var msg = localStorage.getItem("message");
        if(msg){
            $('#res').addClass('alert alert-success');
        }
        document.getElementById("res").innerHTML = msg;
        $(document).ready(function () {
            $("#res").fadeOut(10000);
            localStorage.removeItem("message");
            //$('.resrmv').html('');
        });

    </script>
@endsection

