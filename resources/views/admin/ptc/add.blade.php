@extends('master')
@section('site-title')
Advertise
@endsection
@section('main-content')
<div class="page-content-wrapper">
    <div class="page-content">
        <h3 class="page-title bold">PTC Advertise
            <a class="btn blue-ebonyclay btn-md pull-right" data-toggle="modal" href="#basic">
                <i class="fa fa-plus"></i> Add New Advertise
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
                <div class="portlet box blue-ebonyclay">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-th"></i> Add New Advertise
                        </div>
                    </div>
                    <div class="portlet-body table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> Sl</th>
                                    <th> Advertise Title </th>
                                    <th>Token Code</th>
                                    {{--  <th>Advertise Price </th>
                                    <th>Advertise Quantity</th>  --}}
                                    <th>Cliked </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($add as $key => $data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><a href="{{$data->link}}" target="_blank"><b>{{$data->title}}</b></a> </td>
                                    <td>{{ $data->token }}</td>
                                    {{--  <td>{{ $data->price}} {{$general->symbol}}</td>
                                    <td>{{ $data->quantity }}</td>  --}}
                                    <td>{{ $data->remain }}</td>
                                    <td>
                                        <a class="btn blue-ebonyclay" href="{{route('add.view.admin', $data->id)}}"><i
                                                class="fas fa-edit"></i></a>
                                        <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1"
                                    data-backdrop="static" data-keyboard="false">
                                    <div class="modal-content">
                                        <form method="post" action="{{route('add.delete', $data->id)}}">
                                            {{csrf_field()}}


                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal"
                                                    class="btn default">Cancel</button>
                                                <button type="submit" class="btn red" id="delete"><i
                                                        class="fa fa-trash"></i> Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12 text-center">{{$add->links()}}</div>
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
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title bold">Create New Advertise for PTC</h4>
        </div>
        <form class="form-horizontal" role="form" method="post" action="{{route('create.addvertise')}}">
            {{csrf_field()}}
            <input type="hidden" name="token" value="{{str_random()}}">
            <div class="form-group">
                <div class="col-md-12">
                    <strong class="col-md-12">Title</strong>
                    <div class="col-md-12">
                        <input class="form-control" placeholder="Advertisement Title" type="text" required name="title">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <strong class="col-md-12">Link/URL</strong>
                    <div class="col-md-12">
                        <input class="form-control" placeholder="Advertisement Link" type="text" required name="link">
                    </div>
                </div>
            </div>
            <!--
            <div class="form-group">
                <div class="col-md-12">
                    <strong class="col-md-12">Price</strong>
                    <div class="col-md-12">
                        <div class="input-group">

                            <input type="text" class="form-control" name="price" placeholder="Advertisement Price">
                            <span class="input-group-addon">{{$general->symbol}}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <strong class="col-md-12">Quantity</strong>
                    <div class="col-md-12">
                        <input class="form-control" placeholder="Example: 10, 25, 50" type="text" required
                            name="quantity">
                    </div>
                </div>
            </div>
        -->
           <!-- <div class="form-group">
                <div class="col-md-12">
                    <strong class="col-md-12">Select Package</strong>
                    <div class="col-md-12">
                        <select name="package_id" id="package_id" class="form-control">
                            <option value="">----- Select Package -----</option>
                            @foreach ($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->title }}, Price {{ $package->price }},
                                Clicks {{ $package->click }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div> -->



            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                <button type="submit" class="btn blue-ebonyclay">Create</button>
            </div>
        </form>
    </div>

</div>
@endsection