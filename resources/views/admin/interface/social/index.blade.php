@extends('master')
@section('site-title')
    Social
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title uppercase bold">Social
                <a class="btn blue-madison btn-md pull-right" data-toggle="modal" href="#basic">
                    <i class="fa fa-plus"></i>   ADD NEW
                </a>

                <a class="btn blue-madison btn-md" href="https://fontawesome.com/icons?d=gallery">
                    <i class="fab fa-font-awesome"></i> Click to get Font Awesome Icons
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
                                    <i class="icon-list font-green"></i>
                                    <span class="caption-subject font-black bold uppercase">Service</span>
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-scrollable table-bordered table-hover" id="awards">
                                        <thead>
                                        <tr>
                                            <th> Icon </th>
                                            <th>Link</th>

                                            <th style="text-align: center"> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($social as $key => $data)
                                            <tr id="table_tr_{{$data->id}}">
                                                <td>
                                                    <i class="fab {{$data->icon}}"></i>
                                                </td>
                                                <td>{{$data->link}}</td>
                                                <td>
                                                    <a class="btn blue-madison" data-toggle="modal" href="#editModal{{$data->id}}"><i class="fa fa-edit"></i></a>
                                                    <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-content">
                                                    <form role="form" action="{{route('social.delete', $data->id)}}" method="post">
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


                                            <div id="editModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Update Social Account</h4>
                                                    </div>
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('update.social', $data->id)}}">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}

                                                       <div class="row">
                                                           <div class="form-group">
                                                               <div class="col-md-12">
                                                                   <div class="col-md-12">
                                                                       <label class="control-label">Social Icon Pick</label>
                                                                       <input class="form-control" name="icon" value="{{$data->icon}}" type="text">
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <div class="row">
                                                           <div class="form-group">
                                                               <div class="col-md-12">
                                                                   <div class="col-md-12">
                                                                       <label class="control-label">Social Link</label>
                                                                       <input class="form-control text-capitalize" value="{{$data->link}}" type="text" required name="link">
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>


                                                       <div class="modal-footer">
                                                           <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                           <button type="submit" class="btn blue-madison">Update</button>
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
                <h4 class="modal-title">Add New Social Account</h4>
            </div>
            <form class="form-horizontal" role="form" method="post" action="{{route('store.social')}}">
                {{csrf_field()}}

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <label class="control-label">Social Icon Pick</label>
                            <input class="form-control" name="icon" placeholder="fa-facebook" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <label class="control-label">Social Link</label>
                            <input class="form-control text-capitalize" placeholder="Link" type="text" required name="link">
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