@extends('master')
@section('site-title')
Edit Advertise
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
            <div class="col-md-6 col-md-offset-3" style="margin-top: 50px;">
                <div class="portlet box blue-ebonyclay">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-th"></i> Edit Advertise
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form class="form-horizontal" role="form" method="post"
                            action="{{route('update.addvertise', $add->id)}}">
                            {{csrf_field()}}
                            {{ method_field('put') }}
                            <input type="hidden" name="token" value="{{str_random()}}">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong class="col-md-12">Title</strong>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" value="{{$add->title}}" required
                                            name="title">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong class="col-md-12">Link/URL</strong>
                                    <div class="col-md-12">
                                        <input class="form-control" value="{{$add->link}}" type="text" required
                                            name="link">
                                    </div>
                                </div>
                            </div>


                            {{--  <div class="form-group">
                                <div class="col-md-12">
                                    <strong class="col-md-12">Price</strong>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="price"
                                                value="{{$add->price}}">
                                            <span class="input-group-addon">{{$general->symbol}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>  --}}

                            {{--  <div class="form-group">
                                <div class="col-md-12">
                                    <strong class="col-md-12">Quantity</strong>
                                    <div class="col-md-12">
                                        <input class="form-control" value="{{$add->quantity}}" type="text" required
                            name="quantity">
                    </div>
                </div>
            </div> --}}
            {{--  <div class="form-group">
                <div class="col-md-12">
                    <strong class="col-md-12">Select Package</strong>
                    <div class="col-md-12">
                        <select name="package_id" id="package_id" class="form-control">
                            <option value="">----- Select Package -----</option>
                            @foreach ($packages as $package)
                            @if($add->package_id == $package->id)
                            <option selected value="{{ $package->id }}">{{ $package->title }}, Price
                                {{ $package->price }},
                                Clicks {{ $package->click }}
                            </option>
                            @else
                            <option value="{{ $package->id }}">{{ $package->title }}, Price {{ $package->price }},
                                Clicks {{ $package->click }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>  --}}
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn blue-ebonyclay btn-block">Update</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>
</div>
</div>
@endsection