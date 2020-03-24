@extends('master')
@section('site-title')
    Service
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title uppercase bold">Service
                <a class="btn blue-madison btn-md pull-right" data-toggle="modal" href="#basic">
                    <i class="fa fa-plus"></i>   ADD NEW
                </a>
            </h3>
            <hr>
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-06">
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
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-green"></i>
                        <span class="caption-subject font-black bold uppercase">Service</span>
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-scrollable table-bordered table-hover" id="awards">
                            <thead>
                            <tr>
                                <th> Serial </th>
                                <th> Full Name </th>
                                <th>Username</th>
                                <th>Email</th>
                                <th style="text-align: center"> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($service as $key => $data)
                                <tr id="table_tr_{{$data->id}}">
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <i class="fa {{$data->icon}}"></i>
                                    </td>
                                    <td><b>{{$data->title}}</b></td>
                                    <td>{!! $data->description !!}</td>
                                    <td>
                                        <a class="btn blue-madison" href="{{route('service.edit', $data->id)}}"><i class="fa fa-edit"></i></a>
                                        <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-content">
                                        <form role="form" action="{{route('service.delete', $data->id)}}" method="post">
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
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

    <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Service</h4>
                </div>
                <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
                    //<![CDATA[
                    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                    //]]>
                </script>
                <form class="form-horizontal" role="form" method="post" action="{{route('store.service')}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <label class="control-label">Icon Pick</label>
                                <input class="icp demo form-control" name="icon" value="fa-anchor" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <label class="control-label">Service Title</label>
                                <input class="form-control text-capitalize" placeholder="Title" type="text" required name="title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="sample">

                        <div class="col-md-12">
                            <div class="col-md-12">
                                <label class="control-label">Detail</label>
                                <textarea class="form-control" style="width: 470px; height: 100px;" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                        <button type="submit" class="btn blue-madison">Save</button>
                    </div>
                </form>
            </div>

    </div>
@endsection