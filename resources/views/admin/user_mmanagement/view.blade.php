@extends('master')
@section('site-title')
User Profile
@endsection
@section('main-content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">

            <div class="col-md-12">
                <div class="portlet box dark">
                    <div class="portlet-title">
                        <div class="caption uppercase bold"><i class="fa fa-user"></i> PROFILE </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-5">
                                <h2 class="bold">{{$user->first_name}} {{$user->last_name}} </h2>
                                <h4>{{$user->email}} </h4>
                            </div>
                            <div class="col-md-5">
                                <h3 class="bold">BALANCE : {{$user->balance}} {{$general->currency}}</h3>
                                <p class="bold">Joined {{\Carbon\Carbon::parse($user->join_date)->diffInDays()}} Days
                                    Ago</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption uppercase bold">
                                    <i class="fa fa-desktop"></i> Details </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <!-- START -->
                                    <a href="{{route('user.total.trans', $user->id)}}">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                            <div class="dashboard-stat grey-cascade">
                                                <div class="visual">
                                                    <i style="color: white" class="far fa-money-bill-alt"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup"
                                                            data-value="{{ \App\Transaction::where('user_id', $user->id)->count() }}"></span>
                                                    </div>
                                                    <div class="desc uppercase"> TRANSACTIONS </div>
                                                </div>
                                                <div class="more">
                                                    <div class="desc uppercase bold text-center">
                                                        {{$general->currency}}.
                                                        <span data-counter="counterup"
                                                            data-value="{{ \App\Deposit::where('user_id', $user->id)->where('status', 1)->sum('amount') + \App\WithdrawTrasection::where('user_id', $user->id)->sum('amount') }}"></span>
                                                        TRANSACTED
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- END -->
                                    <!-- START -->
                                    <a href="{{route('user.total.deposit', $user->id)}}">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                            <div class="dashboard-stat blue-chambray">
                                                <div class="visual">
                                                    <i style="color: white" class="fas fa-suitcase"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup"
                                                            data-value="{{\App\Deposit::where('user_id', $user->id)->where('status', 1)->count()}}"></span>
                                                    </div>
                                                    <div class="desc uppercase"> DEPOSITS </div>
                                                </div>
                                                <div class="more">
                                                    <div class="desc uppercase bold text-center">
                                                        {{$general->currency}}.
                                                        <span data-counter="counterup"
                                                            data-value="{{\App\Deposit::where('user_id', $user->id)->where('status', 1)->sum('amount')}}"></span>
                                                        DEPOSITED
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- END -->
                                    <!-- START -->
                                    <a href="{{route('user.total.withdraw', $user->id)}}">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                            <div class="dashboard-stat red">
                                                <div class="visual">
                                                    <i style="color: white" class="fa fa-upload"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup"
                                                            data-value="{{\App\WithdrawTrasection::where('user_id', $user->id)->where('status', 1)->count()}}"></span>
                                                    </div>
                                                    <div class="desc uppercase">WITHDRAW</div>
                                                </div>
                                                <div class="more">
                                                    <div class="desc uppercase bold text-center">
                                                        {{$general->currency}}.
                                                        <span data-counter="counterup"
                                                            data-value="{{\App\WithdrawTrasection::where('user_id', $user->id)->sum('amount')}}"></span>
                                                        WITHDRAWN
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <a href="{{route('user.total.send.money', $user->id)}}">
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                            <div class="dashboard-stat purple-intense">
                                                <div class="visual">
                                                    <i style="color:white" class="fas fa-share-square"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        <span data-counter="counterup"
                                                            data-value="{{\App\Transaction::where('user_id', $user->id)->where('type', 3)->count()}}"></span>
                                                    </div>
                                                    <div class="desc uppercase">Send Money</div>
                                                </div>
                                                <div class="more">
                                                    <div class="desc uppercase bold text-center">
                                                        {{$general->currency}}.
                                                        <span data-counter="counterup"
                                                            data-value="{{\App\Transaction::where('user_id', $user->id)->where('type', 3)->sum('amount')}}"></span>
                                                        Transferred
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption uppercase bold">
                                    <i style="color: #e6fffa" class="fa fa-cogs"></i> Operations </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-6 uppercase">
                                        <a href="{{route('add.subs.index', $user->id)}}"
                                            class="btn blue btn-lg btn-block"> <i class="fas fa-money-bill-alt"></i> add
                                            / substruct balance </a>
                                    </div>

                                    <div class="col-md-6 uppercase">
                                        <a href="{{route('user.mail.send', $user->id)}}"
                                            class="btn btn-info btn-lg btn-block"> <i class="fa fa-envelope"></i> send
                                            email </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption uppercase bold"><i class="fa fa-cog"></i> Update Profile </div>
                            </div>
                            <div class="portlet-body">
                                <form action="{{route('user.detail.update', $user->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('put')}}

                                    <div class="row uppercase">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>firstname</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="first_name"
                                                        value="{{$user->first_name}}" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>lastname</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="last_name"
                                                        value="{{$user->last_name}}" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>mobile</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="mobile"
                                                        value="{{$user->mobile}}" type="text">
                                                </div>
                                            </div>
                                        </div>


                                    </div><!-- row -->

                                    <br><br>

                                    <div class="row uppercase">


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>Date of birth</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" data-provide="datepicker"
                                                        data-date-format="yyyy-mm-dd" name="birth_day"
                                                        value="{{$user->birth_day}}" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>City</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="city"
                                                        value="{{$user->city}}" type="text">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>Country</strong></label>
                                                <div class="col-md-12">
                                                    <input class="form-control input-lg" name="country"
                                                        value="{{$user->country}}" type="text">
                                                </div>
                                            </div>
                                        </div>
                                       
                                        

                                    </div><!-- row -->

                                    <br><br>
                                    <div class="row uppercase">
                                        <div class="col-md-6">
                                           <div class="form-group">
                                                <label class="col-md-12"><strong>Update Package</strong></label>
                                                <div class="col-md-12">
                                                   <select class="form-control" name="update_pkg">
                                                       @foreach ($packages as $pkg)
                                                            @if($user->package_id  == $pkg->id)
                                                                <option value="{{ $pkg->id }}" selected>{{ $pkg->title }}</option>
                                                            @else
                                                                <option value="{{ $pkg->id }}">{{ $pkg->title }}</option>
                                                            @endif
                                                       @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row uppercase">


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong class="col-md-12"><strong>STATUS</strong></strong>

                                                <input name="status" id="status" data-toggle="toggle"
                                                    {{ $user->status == "1" ? 'checked' : '' }} data-onstyle="success"
                                                    data-offstyle="danger" data-on="Active" data-off="Deactive"
                                                    data-width="100%" type="checkbox">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>EMAIL VERIFICATION</strong></label>

                                                <input name="emailv" id="email_status" data-toggle="toggle"
                                                    {{ $user->emailv == "0" ? 'checked' : '' }} data-onstyle="success"
                                                    data-offstyle="danger" data-on="On" data-off="Off" data-width="100%"
                                                    type="checkbox">
                                            </div>
                                        </div>

                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-md-12"><strong>SMS VERIFICATION</strong></label>
                                                <input name="smsv" data-toggle="toggle" {{ $user->smsv == "0" ? 'checked' : '' }}
                                        data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off"
                                        data-width="100%" type="checkbox">
                                    </div>
                            </div> --}}

                        </div><!-- row -->

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn green btn-block btn-lg">UPDATE</button>
                            </div>
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


@section('script')
<script>
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $(document).ready(function() {

        $("#status").change(function() {
            var value=$("#status").val();
            var id = {{ $user->id }};
            $.ajax( {

                url: "{{ route('user_status') }}",
                type: "post",
                data: {id:id},
                success: function (data) {}

                ,
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            }

            );
        }

        );


         $("#email_status").change(function() {
            var value=$("#email_status").val();
            var id = {{ $user->id }};
            $.ajax( {

                url: "{{ route('user_email_status') }}",
                type: "post",
                data: {id:id},
                success: function (data) {}

                ,
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            }

            );
        }

        );
    }

    );
</script>
@endsection