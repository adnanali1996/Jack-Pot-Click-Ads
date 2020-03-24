@extends('master')
@section('site-title')
    Manage Limitation
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
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
            <div class="row">

                <div class="col-md-12">
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-th"></i> Manage Limitation
                            </div>
                        </div>
                        <div class="portlet-body">

                            <div class="row">
                                <form method="POST" action="{{route('manage.limit', $general->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('put')}}

                                    <div class="form-group col-md-12">
                                        <div class="col-md-12">
                                            <strong class="col-md-12">Advertise Showing Limit</strong>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="add_show"  value="{{$general->add_show}}">
                                                    <span class="input-group-addon">Seconds</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6" style="display:none">
                                        <div class="col-md-12">
                                            <strong class="col-md-12">Display Advertise On User Panel Limit</strong>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="number" class="form-control" name="add_show_limit"  value="{{$general->add_show_limit}}">
                                                    <span class="input-group-addon"><i class="fas fa-eye"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            <div class="form-actions">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn-block btn dark"><i class="fa fa-check"></i> Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>

            </div>
        </div>
    </div>
@endsection
