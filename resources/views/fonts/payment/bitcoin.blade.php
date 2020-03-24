@extends('fonts.layouts.user')
@section('main-content')
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box dark">
						<div class="portlet-title">
							<div class="caption uppercase bold"><i class="fa fa-plus"></i> Bitcoin Blockchain</div>
						</div>
						<div class="portlet-body bitcoin">
							<div class="row">

								<div class="col-md-12 text-center">
									<h3>
										Please Send EXACTLY <span style="color:red">{{ $bitcoin['amount']}} </span>BTC <br>
										TO <span style="color:red">{{ $bitcoin['sendto']}} </span>
									</h3>
									<br>
									<br>
									<h2>SCAN TO SEND</h2>
									{!!  $bitcoin['code']  !!}
									<br>
									<br>
									<h3 style="color: red;">** 3 Confirmation Required To credited Your Account</h3>

								</div>
							</div>
						</div>
					</div>
				</div>

		</div>
	</div>
@endsection

