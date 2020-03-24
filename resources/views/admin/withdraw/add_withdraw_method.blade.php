@extends('master')
@section('site-title')
    Gateway
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
                <h3 class="page-title uppercase bold">Add Payemnt Method
                    <div class="pull-right">
                        <a class="btn blue-dark btn-md " data-toggle="modal" href="#basic">
                            <i class="fa fa-plus"></i>   ADD NEW
                        </a>
                    </div>
                </h3>

                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box blue-dark">
                            <div class="portlet-title">
                                <div class="caption font-white">
                                    <i class="icon-settings font-red-sunglo"></i>
                                    <span class="caption-subject bold uppercase">Payment Gateways</span>

                                </div>
                            </div>
                            <div class="portlet-body table-responsive">
                                <div class="row">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>
                                                Method Name
                                            </th>
                                            <th>
                                                Method Logo
                                            </th>
                                            <th>
                                                Min Amount
                                            </th>
                                            <th>Max Amount</th>
                                            <th>Fix Charge</th>
                                            <th>Percent of Charge</th>
                                            <th>Rate</th>
                                            <th>Processing Day</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($withdraw as $key=> $data)
                                            <tr id="row1">
                                                <td> <b>{{$data->name}}</b></td>
                                                <td> <img style="height: 80px; width: 80px" src="{{asset('assets/images/withdraw/'.$data->image)}}"></td>
                                                <td> {{$data->min_amo}} </td>
                                                <td> {{$data->max_amo}} </td>
                                                <td> {{$data->chargefx}} {{$general->currency}}</td>
                                                <td> {{$data->chargepc}} %</td>
                                                <td> {{$data->rate}}</td>
                                                <td> {{$data->processing_day}} Days</td>
                                                <td>
                                                    @if($data->status == 1)
                                                        <span class="badge badge-info">Active</span>
                                                        @else
                                                        <span class="badge badge-danger">Deactive</span>
                                                    @endif
                                                    </td>
                                                <td><a class="btn blue-dark" data-toggle="modal" href="#editModal{{$data->id}}">Edit </a></td>
                                            </tr>
                                            <div id="editModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Edit {{$data->name}}</h4>
                                                    </div>
                                                    <form role="form" method="post" action="{{route('update.method', $data->id)}}" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Payment Method Image</label>
                                                                    <input class="form-control" type="file" name="image">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Payment Method Name</label>
                                                                    <input class="form-control text-capitalize" value="{{$data->name}}" type="text" required name="name">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Minimum Amount For Withdraw ( {{$general->currency}} )</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control text-capitalize" value="{{$data->min_amo}}" type="number" required name="min_amo">
                                                                        <span class="input-group-addon"> {{$general->currency}}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Maximum Amount For Withdraw</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control text-capitalize"  value="{{$data->max_amo}}" type="number" required name="max_amo">
                                                                        <span class="input-group-addon"> {{$general->currency}}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Fixed Charge For With Draw ( {{$general->currency}} )</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control text-capitalize"  value="{{$data->chargefx}}"  type="text" required name="chargefx">
                                                                        <span class="input-group-addon"> {{$general->currency}}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Charge Percentage ( {{$general->currency}} )</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control text-capitalize" value="{{$data->chargepc}}"  type="text" required name="chargepc">
                                                                        <span class="input-group-addon"> %</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Rate for 1 {{$data->currency}}</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control text-capitalize" placeholder="Rate" value="{{$data->rate}}" type="text" required name="rate">
                                                                        <span class="input-group-addon"> {{$general->currency}}</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label">Method Currency</label>
                                                                        <div class="input-group">
                                                                            <input class="form-control text-capitalize" value="{{$data->currency}}" placeholder="Currency" type="text" required name="currency">
                                                                            <span class="input-group-addon"> {{$data->currency}}</span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Payback Days</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control text-capitalize" placeholder="Day" value="{{$data->processing_day}}" type="text" required name="processing_day">
                                                                        <span class="input-group-addon">Days</span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Status</label>
                                                                    <select class="form-control" name="status">
                                                                        <option  @if($data->status == 1) selected @else   @endif value="1">Active</option>
                                                                        <option @if($data->status == 0) selected @else   @endif value="0">Deactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <div class="col-md-12">
                                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                <button type="submit" class="btn purple-intense"> Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>

                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Add New Method</h4>
                                        </div>
                                        <form class="form-horizontal" role="form" method="post" action="{{route('store.withdraw.method')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <label class="control-label">Payment Method Image</label>
                                                        <input class="form-control"  type="file" required name="image">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <label class="control-label">Payment Method Name</label>
                                                        <input class="form-control text-capitalize" placeholder="Method Name" type="text" required name="name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <label class="control-label">Minimum Amount For Withdraw</label>
                                                        <div class="input-group">
                                                            <input class="form-control text-capitalize" placeholder="Minimum Amount" type="number" required name="min_amo">
                                                            <span class="input-group-addon"> {{$general->currency}}</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <label class="control-label">Maximum Amount For Withdraw</label>
                                                        <div class="input-group">
                                                            <input class="form-control text-capitalize" placeholder="Maximum Amount" type="number" required name="max_amo">
                                                            <span class="input-group-addon"> {{$general->currency}}</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <label class="control-label">Fixed Charge For With Draw</label>
                                                        <div class="input-group">
                                                            <input class="form-control text-capitalize" placeholder="Charge" type="text" required name="chargefx">
                                                            <span class="input-group-addon"> {{$general->currency}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <label class="control-label">Charge Percentage</label>
                                                        <div class="input-group">
                                                            <input class="form-control text-capitalize" placeholder="Charge Percentage" type="text" required name="chargepc">
                                                            <span class="input-group-addon">%</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <label class="control-label">Rate for 1 Method Currency</label>
                                                        <div class="input-group">
                                                            <input class="form-control text-capitalize" placeholder="Rate" type="text" required name="rate">
                                                            <span class="input-group-addon">%</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <label class="control-label">Method Currency</label>
                                                        <input class="form-control text-capitalize" placeholder="Currency" type="text" required name="currency">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <label class="control-label">Payback Days</label>
                                                        <div class="input-group">
                                                            <input class="form-control text-capitalize" placeholder="Day" type="text" required name="processing_day">
                                                            <span class="input-group-addon">Days</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                <button type="submit" class="btn purple-intense"> Save</button>
                                            </div>
                                        </form>
                                    </div>

                            </div>

                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection