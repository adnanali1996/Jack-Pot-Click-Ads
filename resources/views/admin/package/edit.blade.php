@extends('master')
@section('site-title')
    Edit Package
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
                <div class="col-md-6 col-md-offset-3" style="margin-top: 20px;">
                    <div class="portlet box blue-ebonyclay">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-th"></i> Edit Package
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form action="{{route('package.update', $pack->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-body">
                                            <div class="form-group clearfix">
                                                <label class="col-md-3 control-label">Package Title</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="{{$pack->title}}" required name="title">
                                                        <span class="input-group-addon"><i class="fa fa-th" aria-hidden="true"></i>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group clearfix">
                                                <label class="col-md-3 control-label">Package Price</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="{{$pack->price}}" required name="price">
                                                        <span class="input-group-addon">{{$general->symbol}}
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group clearfix">
                                                <label class="col-md-3 control-label">Click</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="{{$pack->click}}" required name="click">
                                                        <span class="input-group-addon"><i class="far fa-hand-pointer"></i>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="form-group clearfix">
                                                <label class="col-md-3 control-label">Unit Price</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="{{$pack->unit_price}}" required name="unit_price">
                                                        <span class="input-group-addon"><i class="far fa-hand-pointer"></i>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group clearfix">
                                                <label class="col-md-3 control-label" title="MINIMUM WITHDRAW LIMIT">MWL</label>
                                                <div class="col-md-9">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="{{$pack->minimum_withdraw}}" required name="minimum_withdraw">
                                                        <span class="input-group-addon"><i class="far fa-hand-pointer"></i>
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="form-group clearfix">
                                                    <label class="col-md-12 control-label">Status</label>
                                                    <div class="col-md-12">
                                                        <input name="status" data-toggle="toggle" {{ $pack->status == "1" ? 'checked' : '' }} data-onstyle="success" data-offstyle="danger" data-on="On" data-off="Off"  data-width="100%" type="checkbox">
                                                    </div>
                                                </div>


                                            <div class="form-group clearfix">
                                                <div class="col-md-12">
                                                    <div class="description" style="width: 100%;border: 1px solid #ddd;padding: 10px;border-radius: 5px" >
                                                        <label class="col-md-3 control-label">Package Detail</label>
                                                        <div class="col-md-12" id="planDescriptionContainer">
                                                            @foreach($pack->detail as $value)
                                                                <div class="input-group">
                                                                    <input type="hidden" name="deg_id[]" value="{{$value->id}}">
                                                                    <input name="detail[]" id="designaion_id" data_value="{{$value->id }}" class="form-control margin-top-10" type="text" required value="{{$value->detail}}">
                                                                    <span class="input-group-btn">
                                                        <button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class='fa fa-times'></i></button></span>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 text-right margin-top-10">
                                                                <button id="btnAddDescription" type="button" class="btn btn-sm grey-mint pullri">Add Detail </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group clearfix">
                                                <div class="col-md-12">
                                                    <button class="btn btn-info col-md-12" type="submit" ><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                        Update</button>
                                                </div>
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
        </div>
    </div>
@endsection
@section('script')
    <script>
        var max = 1;
        $(document).ready(function () {
            $("#btnAddDescription").on('click', function () {
                appendPlanDescField($("#planDescriptionContainer"));
            });

            $(document).on('click', '.delete_desc', function () {
                $(this).closest('.input-group').remove();
                var dep = $(this).closest('.input-group');
                var a = dep.find('#designaion_id').attr('data_value');

                $.ajax({
                    type:'GET',
                    url:'{{route('detail.delete')}}',
                    data:{
                        id:a
                    },
                    success:function(data){
                        console.log(data);
                        location.reload();
                    }
                });
            });
        });


        function appendPlanDescField(container) {
            max++;
            container.append(
                '<div class="input-group">' +
                '<input type="hidden" name="deg_id[]">' +
                '<input name="detail[]'+max+'" class="form-control margin-top-10" type="text" required placeholder="Package Detail">\n' +
                '<span class="input-group-btn">'+
                '<button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class="fa fa-times"></i></button>' +
                '</span>' +
                '</div>'
            );
        }
    </script>
@endsection

