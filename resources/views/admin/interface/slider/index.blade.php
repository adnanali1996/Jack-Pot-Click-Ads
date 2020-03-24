@extends('master')
@section('site-title')
    Slider
@endsection
@section('style')
    <style>



        .box header {
            border-bottom: 1px solid #ddd;
            padding: 0.5em 1em;
            margin-bottom: 1em;
        }
        .box .content {
            padding: 1em;
        }

        .btn, button {
            color: #fff;
            background-color: #09f;
            border: 1px solid #09f;
            text-align: center;
            display: inline-block;
            vertical-align: middle;
            white-space: nowrap;
            margin: 0.6em 0.6em .6em 0;
            padding: 0.35em .7em 0.4em;
            text-decoration: none;
            width: auto;
            position: relative;
            border-radius: 4px;
            user-select: none;
            outline: none;
            -webkit-transition: all, 0.25s, ease-in;
            -moz-transition: all, 0.25s, ease-in;
            transition: all, 0.25s, ease-in;
        }
        .btn:hover, button:hover {
            background-color: #ddd;
            color: #333;
            -webkit-transition: all, 0.25s, ease-in;
            -moz-transition: all, 0.25s, ease-in;
            transition: all, 0.25s, ease-in;
        }
        .btn:active, button:active {
            background-color: #ccc;
            box-shadow: 0 !important;
            top: 2px;
            -webkit-transition: background-color, 0.2s, linear;
            -moz-transition: background-color, 0.2s, linear;
            transition: background-color, 0.2s, linear;
            box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
        }

        form {
            display: table;
        }

        input {
            border: 2px solid #eee;
            padding: 1em .25em;
            width: 96%;
            color: #999;
            border-radius: 4px;
        }

        .left, .right {
            display: table-cell;
            vertical-align: middle;
        }

        .left {
            width: 6em;
            min-width: 6em;
            padding-right: 1em;
        }
        .left img {
            width: 100%;
        }

        .img-holder {
            display: block;
            vertical-align: middle;
            width: 2em;
            height: 2em;
        }
        .img-holder img {
            width: 100%;
            max-width: 100%;
        }

        .file-wrapper {
            cursor: pointer;
            display: inline-block;
            overflow: hidden;
            position: relative;
        }
        .file-wrapper:hover .btn {
            background-color: #33adff !important;
        }

        .file-wrapper input {
            cursor: pointer;
            font-size: 100px;
            height: 100%;
            filter: alpha(opacity=1);
            -moz-opacity: 0.01;
            opacity: 0.01;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 9;
        }
    </style>

@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title uppercase bold"> Slider Settings
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

            @if(Session::has('msg'))
                <script>
                    $(document).ready(function() {
                        swal("{{Session::get('msg')}}", "", "success");
                    });
                </script>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-list font-blue"></i>
                                <span class="caption-subject font-black bold uppercase">Slider/Banner Settings</span>
                            </div>
                        </div>

                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th> Slide Image</th>
                                        <th> Slider Head </th>
                                        <th> Slider Detail </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($slider as $data)
                                        <tr>
                                            <td><img style="height: 80px" src="{{asset('assets/images/fontend_slide/'. $data->image)}}"></td>
                                            <td><h3 class="bold">{{$data->heading}}</h3> </td>
                                            <td>{{$data->description}}</td>
                                            <td>
                                                <button class="btn purple" type="button" data-toggle="modal" data-target="#editModal{{$data->id}}"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>


                                        <div id="editModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Edit Slide</h4>
                                                </div>
                                                <form class="form-horizontal" role="form" method="POST" action="{{route('slider.update.pranto', $data->id)}}" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    {{method_field('put')}}
                                                    <div class="modal-body">
                                                        <div class="form-group ">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <div class="left">
                                                                        <img id="img-uploaded" src="{{asset('assets/images/fontend_slide/'. $data->image)}}" alt="your image" />
                                                                    </div>
                                                                    <div class="right">
                                                                        <input type="text" class="img-path" placeholder="Image Path">
                                                                        <span class="file-wrapper">
                                  <input type="file" name="image" id="imgInp" class="uploader" />
                                  <span class="btn btn-large btn-alpha">Upload Image</span>
                                </span>
                                                                    </div>
                                                                    <span class="badge-danger">Height:750px, Width:1440px is perfect </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Head Text</label>
                                                                    <input class="form-control text-capitalize" value="{{$data->heading}}" type="text" required name="heading">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Small Text (Description Type)</label>
                                                                    <input class="form-control text-capitalize" value="{{$data->description}}" type="text" required name="description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                        <button type="submit" class="btn blue">Update</button>
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

            <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New Slide</h4>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{route('slider.store.pranto')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group ">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="left">
                                            <img id="img-uploaded" src="http://placehold.it/350x350" alt="your image" />
                                        </div>
                                        <div class="right">
                                            <input type="text" class="img-path" placeholder="Image Path">
                                            <span class="file-wrapper">
                                  <input type="file" name="image" id="imgInp" class="uploader" />
                                  <span class="btn btn-large btn-alpha">Upload Image</span>
                                </span>
                                        </div>
                                        <span class="badge-danger">Height:750px, Width:1440px is perfect </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Head Text</label>
                                        <input class="form-control text-capitalize" placeholder="Header" type="text" required name="heading">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label class="control-label">Small Text (Description Type)</label>
                                        <input class="form-control text-capitalize" placeholder="Small Detail" type="text" required name="description">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                            <button type="submit" class="btn blue">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection