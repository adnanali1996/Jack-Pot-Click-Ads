@extends('master')
@section('site-title')
    Team
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
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
                        <span class="caption-subject font-black bold uppercase">Our Team</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle  btn-primary"  data-toggle="modal" data-target="#addsocial">
                           <i class="icon-plus"></i> New Team Member
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th> Team Member Image </th>
                                <th>Full Name</th>
                                <th> Designation </th>
                                <th> FaceBook Profile Link </th>
                                <th> Linkedin Profile Link </th>
                                <th> Twiter Profile Link </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($team as $data)
                            <tr>
                                <td> <img style="height: 50px" src="{{asset('assets/images/team/'. $data->image)}}" > </td>
                                <td> {{$data->name}} </td>
                                <td> {{$data->designation}} </td>
                                <td> {{$data->facebook}} </td>
                                <td> {{$data->linkedin}} </td>
                                <td> {{$data->twitter}} </td>
                                <td>
                                  <a class="btn btn-circle btn-icon-only btn-warning"  data-toggle="modal" data-target="#edit{{$data->id}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-circle btn-icon-only btn-danger" type="button" data-toggle="modal" href="#deleteModal{{$data->id}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                <div class="modal-content">
                                    <form role="form" action="{{route('team.delete.delete', $data->id)}}" method="post">
                                        {{csrf_field()}}
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                            <button type="submit" class="btn red"><i class="fa fa-trash"></i> Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                <!--Edit Modal -->
                <div id="edit{{$data->id}}" class="modal fade" role="dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Team Members</h4>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="{{route('team.update.update', $data->id)}}" enctype="multipart/form-data">
                                     {{ csrf_field() }}
                                      {{method_field('PUT')}}
                                    <div class="col-md-6">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                <img src="{{asset('assets/images/team/'. $data->image)}}">
                                            </div>
                                            <span class="btn default btn-file">
                                                 <span class="fileinput-new">
                                                 Change image </span>
                                                 <span class="fileinput-exists">
                                                 Change </span>
                                                 <input type="file"  name="image">
                                                 </span>
                                            <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                Remove </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" value="{{$data->name}}" required name="name" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Designation</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" value="{{$data->designation}}" required name="designation" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Facebook Profile Url</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" value="{{$data->facebook}}"  required name="facebook" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Linkedin Profile Url</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" value="{{$data->linkedin}}" required name="linkedin" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-12">Twitter Profile Url</label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" value="{{$data->twitter}}"  required name="twitter" >
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default form-control" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info form-control">Update</button>
                                    </div>
                                </form>
                            </div>


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

    <!-- Modal -->
    <div id="addsocial" class="modal fade" role="dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Team Member</h4>
                </div>
                <form class="form-horizontal" method="POST" action="{{route('team.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                         {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-md-12">Image</label>
                        <div class="col-md-12">
                           <input type="file" class="form-control btn btn-info" required name="image" >
                            <span class="badge-success">600px * 600px is standard size of image</span>
                        </div>

                    </div>

                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                               <input type="text" class="form-control" required name="name" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Designation</label>
                            <div class="col-md-12">
                               <input type="text" class="form-control" required name="designation" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Facebook Profile Url</label>
                            <div class="col-md-12">
                               <input type="text" class="form-control" required name="facebook" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Linkedin Profile Url</label>
                            <div class="col-md-12">
                               <input type="text" class="form-control" required name="linkedin" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Twitter Profile Url</label>
                            <div class="col-md-12">
                               <input type="text" class="form-control" required name="twitter" >
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

                </form>
            </div>


    </div>
        </div>
    </div>
@endsection