$("#carousel-home-2 .owl-carousel").on("initialized.owl.carousel", function() {
  setTimeout(function() {
    $("#carousel-home-2 .owl-carousel .owl-item.active.center .owl-slide-animated").addClass("is-transitioned");
    $("section").show();
  }, 200);
});

const $owlCarousel_ = $("#carousel-home-2 .owl-carousel").owlCarousel({
  autoplay: true,
  items: 2,
  loop: true,
  center: true,
  nav: false,
  dots:true,
  autoplayTimeout: 3000,
	responsive: {
			0: {
				items: 1,
				dots:false
			},
			600: {
				items: 1,
				dots:false
			},
			767: {
				items: 1,
				dots:false
			},
			1000: {
				items: 3,
				dots:true
			},
			1400: {
				items: 3,
				dots:true
			}
		}
});

$owlCarousel_.on("changed.owl.carousel", function(e) {
  $(".owl-slide-animated").removeClass("is-transitioned");
  const $currentOwlItem = $(".owl-item").eq(e.item.index);
  $currentOwlItem.find(".owl-slide-animated").addClass("is-transitioned");
});

$owlCarousel_.on("resize.owl.carousel", function() {
  setTimeout(function() {
  }, 50);
});
