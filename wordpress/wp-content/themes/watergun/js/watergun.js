$(document).ready(function() {
	
	var makeCarousel = function(obj_id) {
		//the carousel and its navigation elements
		var carousel_section = $('#' + obj_id);
		var carousel_length = carousel_section.children('ul').children('li').length;
		
		carousel_section.append('<nav id="car_nav"><ol></ol></nav>');


		carousel_section.jcarousel({
			'list' : 'ul',
			'wrap' : 'circular'
		}).jcarouselAutoscroll();
		
		for(var i = 0; i < carousel_length; i++) {
			$('#car_nav ol').append('<li><a href="#' + i + '">●</a></li>');
		}
		
		$('#car_nav a').click(function() {
			var index_value = $(this).attr('href');
			index_value = index_value.substr(1);
			
			$('#' + obj_id).jcarousel('scroll', index_value);

			return false;
		});
	}

	makeCarousel('featured');
	makeCarousel('gallery');

	//sub-menu on primary navigation
	if ( !$('body').is('.project') ) {
		$('#primary-menu .second-level').hide();
		$('.work-toggle').click(function() {
			$('#primary-menu .second-level').fadeToggle('fast');
			return false;
		});
	}

});
