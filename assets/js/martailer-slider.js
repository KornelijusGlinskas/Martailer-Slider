( function( $ ) {
	/**
	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */
	var WidgetHelloWorldHandler = function( $scope, $ ) {
		console.log( $scope );
	};

	const sliders = $('.js-martailer-slider');

	$(document).ready(function () {
		sliders.each(function() {
			$(this).slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 7000,
				speed: 1000,
				dots: true,
				prevArrow: `<button type="button" class="slick-prev"><i class="fas fa-chevron-left fa-toggle" /></button>`,
				nextArrow: `<button type="button" class="slick-next"><i class="fas fa-chevron-right fa-toggle" /></button>`,
				appendArrows: $(this).next(),
				appendDots: $(this).next()
			})
		});
	});

	// Make sure you run this code under Elementor.
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/hello-world.default', WidgetHelloWorldHandler );
	} );
} )( jQuery );
