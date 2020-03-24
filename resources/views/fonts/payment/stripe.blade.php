@extends('fonts.layouts.user')
@section('style')
	<link href="{{url('/')}}/assets/dist/card.css" rel="stylesheet">
	<style>
		.credit-card-box .form-control.error {
			border-color: red;
			outline: 0;
			box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
		}
		.credit-card-box label.error {
			font-weight: bold;
			color: red;
			padding: 2px 8px;
			margin-top: 2px;
		}

		label#cardNumber-error,
		label#cardCVC-error,
		label#cardExpiry-error{
			color: red;
		}
		/*responsive for user dashboard*/
		@media only screen and (min-width: 768px) and (max-width: 991px) {
			.input-lg{
				width: 100% !important;
			}
		}

		@media only screen and (max-width: 480px) { 
			input#cardNumber {
				width: 174px !important;
				font-size: 14px;
			}

			input#cardCVC,
			input#cardExpiry {
				width: 215px !important;
			}

			.row {
				width: 100%;
			}
		}

	</style>
@endsection
@section('main-content')

	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box dark">
						<div class="portlet-title">
							<div class="caption uppercase bold"><i class="fa fa-plus"></i> Stripe Payment</div>
						</div>
						<div class="portlet-body">
							<div class="row">

					<div class='card-wrapper'></div>
					<div class="col-xs-12 col-md-8 col-md-offset-2">
						<div class="well">
							<h1 class="text-center">Stripe Payment</h1>
							<hr/>
							<form role="form" class="form-horizontal" id="payment-form" method="POST" action="{{ route('ipn.stripe')}}">
								{{csrf_field()}}
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="cardNumber">CARD NUMBER</label>
											<div class="input-group">
												<input
														type="tel"
														class="form-control input-lg"
														id="cardNumber"
														name="cardNumber"
														placeholder="Valid Card Number"
														autocomplete="off"
														required autofocus
												/>
												<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
											</div>
										</div>
									</div>
								</div>
								<br>

								<div class="row">
									<div class="col-xs-12 col-md-7">
										<div class="form-group">
											<label for="cardExpiry">EXPIRATION DATE</label>
											<input
													type="tel"
													id="cardExpiry"
													class="form-control input-lg input-sz"
													name="cardExpiry"
													placeholder="MM / YYYY"
													autocomplete="off"
													required
											/>
										</div>
									</div>
									<div class="col-xs-12 col-md-5 pull-right">
										<div class="form-group">
											<label for="cardCVC">CVC CODE</label>
											<input
													type="tel"
													id="cardCVC"
													class="form-control input-lg input-sz"
													name="cardCVC"
													placeholder="CVC"
													autocomplete="off"
													required
											/>
										</div>
									</div>
								</div>

								<br>

								<div class="row">
									<div class="col-xs-12">
										<button class="btn dark btn-lg btn-block" type="submit"> PAY NOW </button>
									</div>
								</div>

							</form>

						</div>
					</div>
							</div>

					</div>
				</div>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="{{ asset('assets/user/stripe/payvalid.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/user/stripe/paymin.js') }}"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript" src="{{ asset('assets/user/stripe/payform.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/dist/card.js') }}"></script>


	<script>

        var card = new Card({
            // a selector or DOM element for the form where users will
            // be entering their information
            form: '#payment-form', // *required*
            // a selector or DOM element for the container
            // where you want the card to appear
            container: '.card-wrapper', // *required*

            formSelectors: {
                numberInput: 'input#cardNumber', // optional — default input[name="number"]
                expiryInput: 'input#cardExpiry', // optional — default input[name="expiry"]
                cvcInput: 'input#cardCVC' // optional — default input[name="cvc"]

            },

            width: 200, // optional — default 350px
            formatting: true, // optional - default true

            // Strings for translation - optional
            messages: {
                validDate: 'valid\ndate', // optional - default 'valid\nthru'
                monthYear: 'mm/yyyy', // optional - default 'month/year'
            },

            // Default placeholders for rendered fields - optional
            placeholders: {
                number: '•••• •••• •••• ••••',
                expiry: '••/••',
                cvc: '•••'
            },

            masks: {
                cardNumber: '•' // optional - mask card number
            },

            // if true, will log helpful messages for setting up Card
            debug: false // optional - default false
        });

	</script>
@endsection


