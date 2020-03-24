@extends('master')
@section('site-title')
    Testimonial
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title uppercase bold"> Testimonial
                <a class="btn blue-dark btn-md pull-right" data-toggle="modal" href="#basic">
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
                    <div class="portlet box blue-dark">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-road"></i>Testimonial
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-scrollable table-bordered table-hover" id="awards">
                                    <thead>
                                    <tr>
                                        <th> Serial </th>
                                        <th> Image </th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Star</th>
                                        <th style="text-align: center"> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($test as $key => $data)
                                        <tr id="table_tr_{{$data->id}}">
                                            <td>{{$key+1}}</td>
                                            <td><img height="80px" src="{{asset('assets/images/testimonial/'. $data->image)}}"></td>
                                            <td>{{$data->name}}</td>
                                            <td><b>{{$data->company}}</b></td>
                                            <td>{{$data->star}}</td>
                                            <td>
                                                <a class="btn green-meadow" href="{{route('test.edit', $data->id)}}"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a class="btn red"  data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            {{csrf_field()}}
                                            <input type="hidden" value="" id="delete_id">

                                                <div class="modal-content">
                                                    <form role="form" action="{{route('testimonial.delete', $data->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>
                                                        </div>
                                                    </form>
                                                </div>

                                        </div>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-md-offset-5"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add New Testimonial</h4>
                            </div>

                            <form class="form-horizontal" role="form" method="POST" action="{{route('testimonial.store')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group ">
                                    <label class="control-label col-md-3">Image Upload #1</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                        <span class="btn green-soft btn-outline btn-file">
                        <span class="fileinput-new"> Select image </span>
                        <span class="fileinput-exists"> Change </span>
                        <input type="file" name="image"> </span>
                                                <a href="javascript:;" class="btn green-soft fileinput-exists" data-dismiss="fileinput"> Remove </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Name</label>
                                            <input class="form-control text-capitalize" placeholder="Full Name" type="text" required name="name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Company</label>
                                            <input class="form-control text-capitalize" placeholder="Company Name" type="text" required name="company">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Star</label>
                                            <input class="form-control text-capitalize" placeholder="Like:1,2,3" type="text" required name="star">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="control-label">Comment</label>
                                            <input class="form-control text-capitalize" placeholder="Comment" type="text" required name="comment">
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    <button type="submit" class="btn green-meadow">Save</button>
                                </div>
                            </form>
                        </div>

                </div>

            </div>
        </div>
    </div>
@endsection
