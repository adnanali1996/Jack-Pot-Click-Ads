@extends('fonts.layouts.user')
@section('site')
   | My | Advertises
@endsection

@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    @if (count($errors) > 0)
                        <div class="row">
                            <div class="col-md-06">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif

                    @if (Session::has('alert'))
                        <div class="alert alert-danger">{{ Session::get('alert') }}</div>
                    @endif

                    @foreach($pack as $data)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Buy {{$data->title}}</h4>
                                </div>
                                <div class="panel-body"> <h4 class="bold text-center">{{$general->symbol}} {{$data->price}} for {{$data->click}} Clicks</h4></div>
                                <div class="panel-body text-center">
                                    @foreach($data->detail as $value)
                                        <p style="color: darkblue; font-size: 15px; border-bottom:1px solid blue">{{$value->detail}}</p>
                                    @endforeach
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-success btn-block" data-toggle="modal" data-target="#buyModal{{$data->id}}"> Buy </button>
                                </div>
                            </div>
                        </div>
                        <!--Buy Modal -->
                        <div id="buyModal{{$data->id}}" class="modal fade" role="dialog">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Confirm to Buy <strong>{{$data->title}}</strong></h4>
                                    </div>
                                    <form method="POST" action="{{route('package.buy')}}">
                                        <div class="modal-body">
                                            <p style="color: red; text-align:center;"> {{$general->symbol}} {{$data->price}} will charge from your main balance </p>
                                            {{csrf_field()}}
                                            <input type="hidden" name="package_id" value="{{$data->id}}">
                                        </div>
                                        <div class="modal-footer">
                                            @if($data->price > Auth::user()->balance)
                                                <a class="btn btn-info" href="{{url('fund')}}">Add Fund</a>
                                            @else
                                                <button type="submit" class="btn btn-success">Confirm Buy</button>
                                            @endif
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

