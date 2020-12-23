$(window).scroll(function () {
	if ($(this).scrollTop() > 100) {
		$('img.logo_ns').attr("src", "assets/img/logodark.svg");
	} else {
		$('img.logo_ns').attr("src", "assets/img/logolight.svg");
	}
});


$('.owl-carousel').owlCarousel({
	loop: true,
	autoplay: true,
	margin: 5,
	nav: false,
	navText: [
	"<i class='fa fa-caret-left'></i>",
	"<i class='fa fa-caret-right'></i>"],
	autoplayHoverPause: true,
	responsive: {
		0: {
			items: 1 },
			600: {
				items: 3 },
				1000: {
					items: 5 } } 
				});