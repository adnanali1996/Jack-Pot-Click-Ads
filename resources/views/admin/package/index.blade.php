@extends('master')
@section('site-title')
    Packages
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title bold">PTC Packages
                <a class="btn dark btn-md pull-right" data-toggle="modal" href="#basic">
                    <i class="fa fa-plus"></i>  Add New Packages
                </a>
            </h3>
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
                                <i class="fa fa-th"></i> Packages List
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                @foreach($pack as $data)
                                    <div class="col-md-3">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading text-center">
                                                {{$data->title}}
                                            </div>
                                            <div class="panel-body">
                                                @foreach($data->detail as $value)
                                                <p>{{$value->detail}}</p>
                                                @endforeach
                                                <h3 class="text-center"> {{$data->price}} {{$general->symbol}}</h3>
                                                <ul class="list-group">
                                                    <li class="list-group-item"><h4  class="btn btn-block btn-{{$data->status == 1 ? 'success' : 'danger'}}">{{$data->status == 1 ? 'Active' : 'Deactive'}}</h4></li>
                                                </ul>

                                            </div>
                                            <div class="panel-footer">
                                                <a class="btn btn-primary" href="{{route('package.edit', $data->id)}}">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$data->id}}">
                                                    <i class="fa fa-trash"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-content">
                                            <form method="post" action="{{route('package.delete', $data->id)}}">
                                                {{csrf_field()}}
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                <button type="submit" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>

            </div>
        </div>
    </div>

    <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create New Package for PTC Plan</h4>
                </div>
                <form class="form-horizontal" role="form" method="post" action="{{route('create.package')}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <div class="col-md-12">
                            <strong class="col-md-12">Title</strong>
                            <div class="col-md-12">
                                <input class="form-control" placeholder="Package Title" type="text" required name="title">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <strong class="col-md-12">Price</strong>
                            <div class="col-md-12">
                                <div class="input-group">

                                    <input type="text" class="form-control" name="price" required placeholder="Package Price">
                                    <span class="input-group-addon">{{$general->symbol}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <strong class="col-md-12">Clicks</strong>
                            <div class="col-md-12">
                                <input class="form-control" placeholder="Example: 10, 25, 50" type="text" required name="click">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <strong class="col-md-12">Unit Price</strong>
                            <div class="col-md-12">
                                <input class="form-control" placeholder="Example: 3, 6, 9" type="text" required name="unit_price">
                            </div>
                        </div>
                    </div>

                     <div class="form-group">
                        <div class="col-md-12">
                            <strong class="col-md-12" title="MINIMUM WITHDRAW LIMIT">Minimum Withdraw Limit</strong>
                            <div class="col-md-12">
                                <input class="form-control" placeholder="Example: 500, 1000, 2000, 4000" type="text" required name="minimum_withdraw">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="description" style="width: 100%;border: 1px solid #ddd;padding: 10px;border-radius: 5px" >
                                <div class="col-md-12" id="planDescriptionContainer">
                                    <div class="input-group">
                                        <input name="detail[]" class="form-control margin-top-10" type="text" required placeholder="Package Detail">
                                        <span class="input-group-btn">
                                                        <button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class='fa fa-times'></i></button></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right margin-top-10">
                                        <button id="btnAddDescription" type="button" class="btn btn-sm grey-mint pullri">Add Package Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                        <button type="submit" class="btn dark">Create</button>
                    </div>
                </form>
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
            });
        });

        function appendPlanDescField(container) {
            max++;
            container.append(
                '<div class="input-group">' +
                '<input name="detail[]'+max+'" value="" class="form-control margin-top-10" type="text" required placeholder="Package Detail">\n' +
                '<span class="input-group-btn">'+
                '<button class="btn btn-danger margin-top-10 delete_desc" type="button"><i class="fa fa-times"></i></button>' +
                '</span>' +
                '</div>'
            );
        }
    </script>
@endsection
