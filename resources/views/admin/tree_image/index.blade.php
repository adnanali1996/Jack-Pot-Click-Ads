@extends('master')
@section('site-title')
    Users Tree Image
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
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
                    <div class="portlet box blue-madison">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Logo Settings
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form method="POST" action="{{route('tree.image.update')}}" class="form-horizontal form-bordered" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                   <div class="col-md-6">
                                       <div class="form-group">
                                           <strong class="col-md-12">Paid User Image</strong>
                                           <div class="col-md-6">
                                               <div class="fileinput fileinput-new" data-provides="fileinput">
                                                   <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                       <img style="max-width: 200px; max-height: 120px;" src="{{asset('assets/user/paid_user.png')}}">
                                                   </div>
                                                   <span class="btn default btn-file">
                                                     <span class="fileinput-new">
                                                     Change image </span>
                                                     <span class="fileinput-exists">
                                                     Change </span>
                                                     <input type="file" name="paid_image">
                                                </span>
                                                   <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                       Remove </a>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong class="col-md-12">Free User Image</strong>
                                            <div class="col-md-6">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                        <img style="max-width: 200px; max-height: 120px;" src="{{asset('assets/user/user.png')}}">
                                                    </div>
                                                    <span class="btn default btn-file">
                                                     <span class="fileinput-new">
                                                     Change image </span>
                                                     <span class="fileinput-exists">
                                                     Change </span>
                                                     <input type="file" name="free_image">
                                                </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                        Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <strong class="col-md-12">No User Image</strong>
                                        <div class="col-md-6">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    <img style="max-width: 200px; max-height: 120px;" src="{{asset('assets/user/no_user.png')}}">
                                                </div>
                                                <span class="btn default btn-file">
                                                     <span class="fileinput-new">
                                                     Change image </span>
                                                     <span class="fileinput-exists">
                                                     Change </span>
                                                     <input type="file" name="nouser_image">
                                                     </span>
                                                <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                    Remove </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn-block btn blue"><i class="fa fa-check"></i> Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

