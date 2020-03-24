@extends('fonts.layouts.user')


















@section('main-content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">

            <div class="col-md-12">
                <div class="portlet box blue-ebonyclay">
                    <div class="portlet-title">
                        <div class="caption uppercase bold"> <i class="fas fa-mouse-pointer"></i> Get Your Refferal Link
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="10%"> SL# </th>
                                    <th>Affilate Code </th>
                                    {{--  <th> Price Per Click</th>  --}}
                                    <th>Click</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{--  @foreach($add as $key => $data)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                <td><b>{{$data->advertise->title}}</b></td>
                                <td>{{ $data->advertise->price }} {{$general->symbol}}</td>
                                <td>@if($data->status == 0)<p class="text text-danger">Already Viewed</p> @else <a
                                        target="_blank" href="{{route('iframe.open', $data->advertise->token)}}">Click
                                        Here</a>
                                    @endif</td>
                                </tr>
                                @endforeach --}}
                                <tr>
                                    <td>1</td>
                                    <td>{{ $affiliate_id  }}</td>
                                    <td><a
                                            href="{{ route('affiliate_register', ['id' =>$affiliate_id]) }}">{{ url('/') }}/user/affiliate/{{ $affiliate_id }}</a>
                                    </td>
                                </tr>
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