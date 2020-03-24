@extends('master')
@section('site-title')
    Footer
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
                        <span class="caption-subject font-black bold uppercase">Footer Content</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">

                        <form class="form-horizontal" method="post" action="{{route('footer.update')}}">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="form-group col-md-12">
                                <strong class="col-md-12 ">Footer
                                </strong>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" required name="footer"  value="{{$general->footer}}">
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <strong class="col-md-12 ">Footer Content Link
                                </strong>
                                <div class="col-md-12">
                                    <textarea class="form-control"  rows="5" name="footer_text">{!! $general->footer_text !!}</textarea>
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