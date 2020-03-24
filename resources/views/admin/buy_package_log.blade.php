@extends('master')
@section('site-title')
    Buy Package
@endsection

@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="bold">Buy Package History</h3>
            <div class="row">
                <div class="col-md-12">
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
                                    <th> DP Id </th>
                                    <th> Description </th>
                                    <th> User </th>
                                    <th> Amount </th>
                                    <th> Buy Time</th>


                                </tr>

                                </thead>
                                <tbody>
                                @foreach($pack as $key=>$data)
                                    <tr>
                                        <td >{{$data->trans_id}}</td>
                                        <td >{{$data->description}}</td>
                                        <td>
                                            <p><a href="{{route('user.view', $data->member->id)}}">{{$data->member->first_name}} {{$data->member->last_name}}</a> </p>
                                            <p>{{$data->member->email}}</p>
                                        </td>
                                        <td>{{abs($data->amount)}} {{$general->symbol}}</td>

                                        <td>{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</td>
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