@extends('master')
@section('site-title')
	Email Template
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
		<h2>Email Template Settings</h2>
		<hr/>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-bookmark"></i> Short Code</div>

				</div>
				<div class="portlet-body">
					<div class="table-scrollable">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th> # </th>
									<th> CODE </th>
									<th> DESCRIPTION </th>
								</tr>
							</thead>
							<tbody>


								<tr>
									<td> 1 </td>
									<td> <pre>&#123;&#123;message&#125;&#125;</pre> </td>
									<td> Details Text From Script</td>
								</tr>

								<tr>
									<td> 2 </td>
									<td> <pre>&#123;&#123;name&#125;&#125;</pre> </td>
									<td> Users Name. Will Pull From Database and Use in EMAIL text</td>
								</tr>



							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="portlet light bordered">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-envelope font-blue-sharp"></i>
						<span class="caption-subject font-blue-sharp bold uppercase">Email and SMS Template</span>
					</div>
				</div>
				<div class="portlet-body form">
					<form role="form" method="POST" action="{{route('template.update')}}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-body">
							<div class="form-group">
								<label>Email Sent Form</label>
								<input type="email" name="esender" class="form-control input-lg" value="{{$temp->esender}}">
							</div>
							<div class="form-group">
								<label>Email Message</label>
								<textarea class="form-control" name="emessage" rows="10">
									{{$temp->emessage}}
								</textarea>
							</div>
						</div>
						<div class="form-actions">
							<button type="submit" class="btn green btn-block btn-lg">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
		</div>
	</div>
	
	@endsection