@extends('fonts.layouts.user')
@section('site')
    | View | Ticket
@endsection
@section('style')
    {{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />--}}
    <style>
        fieldset
        {
            border: 1px solid #ddd !important;
            margin: 0;
            xmin-width: 0;
            padding: 10px;
            position: relative;
            border-radius:4px;
            background-color:#f5f5f5;
            padding-left:10px!important;
        }

        legend
        {
            font-size:14px;
            font-weight:bold;
            margin-bottom: 0px;
            width: 35%;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px 5px 5px 10px;
            background-color: #ffffff;
        }
        .panel-primary>.panel-heading.has-btn {
            position:  relative;
        }

        .panel-primary>.panel-heading.has-btn .the-btn {
            position:  absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }
        .panel-heading {
            padding: 2px 15px;
        }

          @media only screen and (max-width: 480px) { 
                legend {
                width: 74% !important;
            }
          }
    </style>
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">


                        <div class="panel-heading has-btn">
                            <h4 style="color:#fff;"> #{{$ticket_object->ticket}} - {{$ticket_object->subject}}
                            </h4>
                            <div class="the-btn">
                                @if($ticket_object->status == 1)
                                    <button class="btn btn-warning "> Opened</button>
                                @elseif($ticket_object->status == 2)
                                    <button type="button" class="btn btn-success  ">  Answered </button>
                                @elseif($ticket_object->status == 3)
                                    <button type="button" class="btn btn-info  "> Customer Reply </button>
                                @elseif($ticket_object->status == 9)
                                    <button type="button" class="btn btn-danger  ">  Closed </button>
                                @endif
                                <a href="{{route('ticket.close', $ticket_object->ticket)}}" class="btn btn-danger  make-close-support" style="height: 35px;">Click To Make Close</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <form method="POST" class="form-horizontal" action="{{route('store.customer.reply', $ticket_object->ticket)}}" accept-charset="UTF-8" >
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            @foreach($ticket_data as $data)
                                                <div class="panel-body">
                                                    <fieldset class="col-md-12">
                                                        @if($data->type == 1)
                                                            <legend><span style="color: #0e76a8">{{Auth::user()->first_name}}</span> , <small>{{ \Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i A') }}</small></legend>
                                                        @else
                                                            <legend><span style="color: #0e76a8">{{$general->web_title}}</span> , <small>{{ \Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i A') }}</small></legend>
                                                        @endif


                                                        <div class="panel panel-danger">
                                                            <div class="panel-body">
                                                                <p>{!! $data->comment !!}</p>
                                                            </div>
                                                        </div>

                                                    </fieldset>

                                                    <div class="clearfix"></div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('comment') ? ' has-error' : '' }}">
                                        <div class="col-md-12">
                                            <label class="col-md-12 bold">Reply: </label>
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="comment" rows="10"></textarea>
                                                @if ($errors->has('comment'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('comment') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">

                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Post</button>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>
                <!-- END PAGE CONTENT-->
            </div>
        </div>
    </div>
@endsection