@extends('master')
@section('site-title')
    Commission Setting
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
        @if (count($errors) > 0)
            <div class="row">
                <div class="col-md-012">
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
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div id="load">
                    </div>
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Commission Settings
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form method="POST" action="{{route('commission.update', $charge->id)}}" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="form-body">
                                        <div class="form-group col-md-4">
                                            <strong class="col-md-12 ">Transfer Charge User To User:
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="transfer_charge"  value="{{$charge->transfer_charge}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <strong class="col-md-12">Withdraw Charge:
                                            </strong>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required name="withdraw_charge"  value="{{$charge->withdraw_charge}}">
                                                <span class="input-group-addon" id="start-date"><i class="fas fa-percent"></i></span>
                                            </div>
                                        </div>
                                   
                                   <div class="form-group col-md-4">
                                        <strong class="col-md-12 ">Matching Bonus:
                                        </strong>
                                        <div class="input-group">
                                            <input type="text" class="form-control" required name="match_bonus"  value="{{$charge->match_bonus}}">
                                            <span class="input-group-addon" id="start-date">{{$general->symbol}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <strong class="col-md-12 ">UPGRADE Charge:
                                        </strong>
                                        <div class="input-group">
                                            <input type="text" class="form-control" required name="update_charge"  value="{{$charge->update_charge}}">
                                            <span class="input-group-addon" id="start-date">{{$general->symbol}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <strong class="col-md-12 ">UPGRADE Commision To TREE:
                                        </strong>
                                        <div class="input-group">
                                            <input type="text" class="form-control" required name="update_commision_tree"  value="{{$charge->update_commision_tree}}">
                                            <span class="input-group-addon" id="start-date">{{$general->symbol}}</span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <strong class="col-md-12 ">UPGRADE Commision To Sponsor:
                                        </strong>
                                        <div class="input-group">
                                            <input type="text" class="form-control" required name="update_commision_sponsor"  value="{{$charge->update_commision_sponsor}}">
                                            <span class="input-group-addon" id="start-date">{{$general->symbol}}</span>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <strong class="col-md-12 ">UPGRADE To Premium Text:
                                        </strong>
                                        <div class="">
                                            <textarea class="form-control" name="update_text" rows="5">{!! $charge->update_text !!}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn-block btn blue"><i class="fa fa-check"></i> Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
@endsection

