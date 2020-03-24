@extends('master')
@section('site-title')
    Contact
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
                        <span class="caption-subject font-black bold uppercase">Contact Page Content</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">

                        <form class="form-horizontal" method="post" action="{{route('contact.admin.update')}}">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="form-group col-md-6">
                                <strong class="col-md-12 ">Address:</strong>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="address" required value="{{$general->address}}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <strong class="col-md-12 ">Email:</strong>
                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" required value="{{$general->email}}">
                                </div>
                            </div>
                             <div class="form-group col-md-12">
                                <strong class="col-md-12 ">Mobile:</strong>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="mobile" required value="{{$general->mobile}}">
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <strong class="col-md-12 ">Google Map Address Link (Embed Map < iframe >):</strong>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="google_map_address" required value="{{$general->google_map_address}}">
                                </div>
                            </div>



                            <div class="col-md-12">
                                <button type="submit" class="btn-block btn dark"><i class="fa fa-check"></i> Update</button>
                            </div>
                        </form>

                      </div>
                     </div>
                 </div>
                </div>
            </div>
        </div>
    </div>
@endsection