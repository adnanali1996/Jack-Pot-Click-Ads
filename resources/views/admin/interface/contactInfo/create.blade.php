@extends("admin.layout.master")
@section('content')
    @if (count($errors) > 0)
        <div class="row">
            <div class="col-md-06">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
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
                        <i class="icon-list font-blue"></i>
                        <span class="caption-subject font-green bold uppercase">Contact Information</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <form role="form" method="POST" action="{{route('contactInfos.update',$contact)}}">
                            {{ csrf_field() }}
                            {{method_field('put')}}
                            <div class="form-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><h3>Email</h3></label>
                                            <input type="email" class="form-control input-lg" value="{{$contact->email}}" name="email" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><h3>Mobile</h3></label>
                                            <input type="text" class="form-control input-lg" value="{{$contact->mobile}}" name="mobile" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><h3>Location</h3></label>
                                           <textarea name="location" class="form-control note-codable" rows="10">{{$contact->location}}</textarea>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn blue btn-lg">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection