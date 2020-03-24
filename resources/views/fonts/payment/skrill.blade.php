@extends('fonts.layouts.user')
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box dark">
                        <div class="portlet-title">
                            <div class="caption uppercase bold"><i class="fa fa-plus"></i> Skrill Payment</div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="row">
                                    <div class="main-login main-center">
                                        <div class="col-md-12">
                                            <section>
                                                {!!$send_pay_request!!}
                                            </section>
                                        </div>
                                    </div>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $("#pament_form" ).submit();
            $( "body" ).contextmenu(function() {
                alert( "Right Click Not Allow!" );
            });

        });
    </script>
@endsection
