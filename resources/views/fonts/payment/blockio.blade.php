@extends('fonts.layouts.user')
@section('main-content')
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box dark">
						<div class="portlet-title">
							<div class="caption uppercase bold"><i class="fa fa-plus"></i> Block IO Payment</div>
						</div>
						<div class="portlet-body">
							<div class="row">
				<div class="col-md-12">
					<div class="about-us-content">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-inverse">
									<div class="panel-heading">
										<h3 class="panel-title">Confirm Buy {{$general->cur}}</h3>
									</div>
									<div class="panel-body">

										<div  class="col-md-8 col-md-offset-2 text-center">

											<h1><img src="{{ asset('assets/images/logo/fsdf.png') }}"style="width:48px;">{{$amon}}
												<i class="fa fa-exchange"></i> <i class="fa fa-bitcoin"></i>{{ $bcoin }}</h1>
												<br><br><br>
												<h3> PLEASE SEND EXACTLY <span style="color: green"> {{ $bcoin }} BTC</span> <br><br>
													TO <span style="color: green"> {{ $sendadd}}</span> <br></h3>
													<br><br>
													{!! $qrurl !!}
													<h2 style="font-weight:bold;">SCAN TO SEND</h2>

													<br><br>
													<h4 style="color: red;"> ** Minimum 3 confirmations  Required to Credit your account.</h4>
													<br/>

												</div>


											</div>
										</div>
									</div>
								</div>
					</div>
				</div>
			</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection