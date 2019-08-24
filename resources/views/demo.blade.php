@extends('layouts.site')

@section('css')
	<link rel="stylesheet" href="{{ asset('demos/app-landing/app-landing.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('demos/app-landing/css/fonts.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('one-page/css/et-line.css') }}" type="text/css" />
@endsection

@section('page_title')展示頁@stop

@section('pri_nav')
	<nav id="primary-menu" class="{{ setting('canvas.pri_menu_class') }}" >
		{{ menu('frontend_demo_left','menu.priMenu_one_page',['data_easing'=>'easeInOutExpo','data_speed'=>'1250','data_offset'=>'160']) }}
		{{ menu('frontend_demo_right','menu.priMenu_one_page',['data_easing'=>'easeInOutExpo','data_speed'=>'1250','data_offset'=>'160']) }}
	</nav><!-- #primary-menu end -->
@endsection

@section('page_top')
	@include('easyweb2::includes._slider3')
@endsection

@section('body')
	<!-- Modal -->
			@include('easyweb2::partials.modal_login')

			@include('easyweb2::includes._chars',['item_top' => $item_why_top , 'items' => $items_why])

			<div class="line"></div>
				<div class="container clearfix">

					<div id="section-nextgen" class="page-section bottommargin-lg">
						<div class="row clearfix">

							<div class="col-lg-7 center">
								<img src="{{ Voyager::image($item_row1->pic) }}" alt="{{ $item_row1->alt }}" data-animate="fadeInLeft">
							</div>

							<div class="col-lg-5">
								<div class="topmargin-lg d-none d-lg-block"></div>
								<div class="emphasis-title bottommargin-sm">
									<span class="before-heading">{{ $item_row1->subtitle }}</span>
									<h2 style="font-size: 42px;" class="font-body ls1 t400">{{ $item_row1->title }}</h2>
								</div>
								<p style="color: #777;" class="lead">{!! $item_row1->content !!}</p>
								<a href="{{ $item_row1->url }}" class="section-more-link">{{ $item_row1->url_txt }} <i class="icon-angle-right"></i></a>
							</div>

						</div>
					</div>

					<div class="line"></div><div class="clear"></div>

					<div id="section-stunning-graphics" class="page-section topmargin bottommargin-lg">
						<div class="row clearfix">

							<div class="col-lg-5">
								<div class="topmargin-lg d-none d-lg-block"></div>
								<div class="emphasis-title bottommargin-sm">
									<span class="before-heading">{{ $item_row2->subtitle }}</span>
									<h2 style="font-size: 42px;" class="font-body ls1 t400">{{ $item_row2->title }}</h2>
								</div>
								<p style="color: #777;" class="lead">{!! $item_row2->content !!}</p>
								<a href="{{ $item_row2->url }}" class="section-more-link">{{ $item_row2->url_txt }} <i class="icon-angle-right"></i></a>
							</div>

							<div class="col-lg-7 center">
								<img src="{{ Voyager::image( $item_row2->pic) }}" alt="{{ $item_row2->alt }}" data-animate="fadeInRight">
							</div>

						</div>
					</div>

					<div class="line"></div><div class="clear"></div>

					<div id="section-integration" class="page-section bottommargin-lg">
						<div class="row clearfix">
							<div class="col-lg-7 center">
								<img src="{{ Voyager::image($item_row3->pic) }}" alt="{{ $item_row1->alt }}" data-animate="fadeInLeft">
							</div>

							<div class="col-lg-5">
								<div class="topmargin-lg d-none d-lg-block"></div>
								<div class="emphasis-title bottommargin-sm">
									<span class="before-heading">{{ $item_row3->subtitle }}</span>
									<h2 style="font-size: 42px;" class="font-body ls1 t400">{{ $item_row3->title }}</h2>
								</div>
								<p style="color: #777;" class="lead">{!! $item_row3->content !!}</p>
								<a href="{{ $item_row3->url }}" class="section-more-link">{{ $item_row3->url_txt }} <i class="icon-angle-right"></i></a>
							</div>
						</div>
					</div>
				</div>

				<div class="line"></div><div class="clear"></div>

				@include('easyweb2::includes._gallery',['item_top' => $item_gallery_top , 'items' => $items_gallery])

				<div class="clear bottommargin"></div>

				@include('easyweb2::includes._spec',['item_top' => $item_how_top , 'items' => $items_how])

				<div class="clear bottommargin"></div>

				@include('easyweb2::includes._prices2',['items' => $items_prices])

				<div class="clear"></div>

				@include('easyweb2::includes._call_to_action',['item' => $item_call_to_action])

				<div class="clear"></div>

				@include('easyweb2::includes._media',['item' => $item_media])

				<div class="clear"></div>

				@include('easyweb2::includes._qna2',['items' => $items_qna])

				{{--  @include('easyweb2::includes._feedback3',['items' => $items_comment])  --}}

				<div class="clear"></div>

				<div class="section center nobottommargin nobg">
					<div class="container clearfix">

						<h3 class="ls1 t400" style="font-size: 32px;">{{ $item_row4->title }} <span>{{ $item_row4->subtitle }}</span> </h3>
						<a href="{{ $item_row4->url }}" data-lightbox="inline" class="button button-large button-black capitalize" style="border-radius: 23px;">{{ $item_row4->url_txt }}</a>
						{!! $item_row4->content !!}

						<div class="clear bottommargin"></div>

					</div>
				</div>

				@include('easyweb2::includes._fullChars2',['items' => $items_row5])
@endsection

@section('js')
	<script>
		jQuery(document).ready( function($){

			function pricingSwitcher( elementCheck, elementParent, elementPricing ) {
				elementParent.find('.pts-left,.pts-right').removeClass('pts-switch-active');
				elementPricing.find('.pts-switch-content-left,.pts-switch-content-right').addClass('hidden');

				if( elementCheck.filter(':checked').length > 0 ) {
					elementParent.find('.pts-right').addClass('pts-switch-active');
					elementPricing.find('.pts-switch-content-right').removeClass('hidden');
				} else {
					elementParent.find('.pts-left').addClass('pts-switch-active');
					elementPricing.find('.pts-switch-content-left').removeClass('hidden');
				}
			}

			$('.pts-switcher').each( function(){
				var element = $(this),
					elementCheck = element.find(':checkbox'),
					elementParent = $(this).parents('.pricing-tenure-switcher'),
					elementPricing = $( elementParent.attr('data-container') );

				pricingSwitcher( elementCheck, elementParent, elementPricing );

				elementCheck.on( 'change', function(){
					pricingSwitcher( elementCheck, elementParent, elementPricing );
				});
			});

			// Get Started From Validation
			var getStartedForm = $('#get-started-form'),
				getStartedFormAlert = getStartedForm.attr('data-alert-type'),
				getStartedFormLoader = getStartedForm.attr('data-loader'),
				getStartedFormResult = getStartedForm.find('.contact-form-result'),
				getStartedFormRedirect = getStartedForm.attr('data-redirect');

			getStartedForm.validate({
				submitHandler: function(form) {

					getStartedFormResult.hide();

					if( getStartedFormLoader == 'button' ) {
						var defButton = $(form).find('button'),
							defButtonText = defButton.html();

						defButton.html('<i class="icon-line-loader icon-spin nomargin"></i>');
					} else {
						$(form).find('.form-process').fadeIn();
					}

					$(form).ajaxSubmit({
						target: getStartedFormResult,
						dataType: 'json',
						resetForm: true,
						success: function( data ) {
							if( getStartedFormLoader == 'button' ) {
								defButton.html( defButtonText );
							} else {
								$(form).find('.form-process').fadeOut();
							}
							if( data.alert != 'error' && getStartedFormRedirect ){
								window.location.replace( getStartedFormRedirect );
								return true;
							}
							if( getStartedFormAlert == 'inline' ) {
								if( data.alert == 'error' ) {
									var alertType = 'alert-danger';
								} else {
									var alertType = 'alert-success';
								}

								getStartedFormResult.addClass( 'alert ' + alertType ).html( data.message ).slideDown( 400 );
							} else {
								getStartedFormResult.attr( 'data-notify-type', data.alert ).attr( 'data-notify-msg', data.message ).html('');
								SEMICOLON.widget.notifications( getStartedFormResult );
							}
						}
					});
				}
			});

			$('[data-pricing-plan]').click( function(){
				getStartedForm.find('#get-started-form-package').val( $(this).attr('data-pricing-plan') );
				getStartedForm.find('#modal-get-started-package').html( $(this).attr('data-pricing-plan') );
			});

		});
	</script>
@endsection
