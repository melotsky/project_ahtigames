/**************************/

//CAROUSEL SETTINGS 

/**************************/



var $theFlexS = jQuery.noConflict();


jQuery(document).ready(function($){

	jQuery("#home_slider").css("height","auto");
	jQuery("#home_slider").css("overflow","unset");

	jQuery('#hp__wrapper').slick({
		dots: true,
		infinite: true,
		speed: 500,
		autoplay: true,
		lazyLoad: 'none',
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		prevArrow: '<span class="left-arrow"></span>',
		nextArrow: '<span class="right-arrow"></span>',
	});

setTimeout(function(){
  jQuery('#thecarousel').slick({
	  dots: true,
	  infinite: true,
	  speed: 500,
	  autoplay: true,
	  lazyLoad: 'none',
	  slidesToShow: 3,
	  slidesToScroll: 3,
	  prevArrow: '<span class="left-arrow"></span>',
	  nextArrow: '<span class="right-arrow"></span>',

	  responsive: [
		{
		  breakpoint: 780,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
	
	  ]
  })
},1500);


setTimeout(function(){
	jQuery('#testimonial_main').slick({
		dots: false,
		infinite: true,
		speed: 500,
		autoplay: true,
		lazyLoad: 'none',
		slidesToShow: 3,
		slidesToScroll: 3,
		prevArrow: '',
		nextArrow: '',
		centerMode: false,
		centerPadding: '0px',
		responsive: [
			{
				breakpoint: 1000,
				settings: {
				centerMode: true,
				centerPadding: '100px',
				slidesToShow: 1,
				slidesToScroll: 1,
				}
			},		
			{
			breakpoint: 560,
			settings: {
				centerMode: true,
				centerPadding: '100px',
				slidesToShow: 1,
				slidesToScroll: 1,
			}
			},
			{
			breakpoint: 481,
			settings: {
				centerMode: false,
				centerPadding: '0px',
				slidesToShow: 1,
				slidesToScroll: 1,
			}
			},
			{
			breakpoint: 460,
			settings: {
				centerMode: false,
				centerPadding: '0px',
				slidesToShow: 1,
				slidesToScroll: 1,
			}
			}
		]
	});
},2000);

});
