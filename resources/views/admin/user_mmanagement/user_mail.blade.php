@extends('master')
@section('site-title')
    Send Mail
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption uppercase bold">
                                <i class="fa fa-envelope"></i>  Send email to {{$user->first_name}} {{$user->last_name}}
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form action="{{route('send.mail.user', $user->id)}}" method="post">
                                {{csrf_field()}}
                                <div class="row uppercase">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-12"><strong>SUBJECT</strong></label>
                                            <div class="col-md-12">
                                                <input class="form-control input-lg" name="subject"  type="text" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- row -->
                                <br><br>
                                <div class="row uppercase">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-12"><strong>Message</strong> NB: EMAIL WILL SENT USING EMAIL TEMPLATE</label>
                                            <div class="col-md-12">
                                                <textarea name="message" rows="10" class="form-control" id="shaons"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- row -->
                                <br><br>
                                <div class="row uppercase">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn blue-chambray btn-lg btn-block"> SUBMIT </button>
                                    </div>
                                </div><!-- row -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

