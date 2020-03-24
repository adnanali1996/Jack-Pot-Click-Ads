@extends('fonts.layouts.user')
@section('site')
   | Create | Advertises
@endsection
@section('style')
    <style>
        @media only screen and (max-width: 480px) {
            .input-lg {
                width: 100%!important;
            }
        }
    </style>
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
                            <div class="product-service-in">
                                <div class="row">
                                    <form method="post" action="{{route('create.user.add')}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="package_id" value="{{$pack_id}}">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                <input class="form-control input-lg" placeholder="Your Advertise Title"  name="title" type="text" required>
                                                @if ($errors->has('title'))
                                                    <span class="help-block">
                                                       <strong>{{ $errors->first('title') }}</strong>
                                                       </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                                <input class="form-control input-lg" placeholder="Advertise Link"  name="link" type="text" required>
                                                @if ($errors->has('link'))
                                                    <span class="help-block">
                                                       <strong>{{ $errors->first('link') }}</strong>
                                                       </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block"> Submit </button>
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

