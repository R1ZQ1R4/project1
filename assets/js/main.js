.$(document).ready(function() {
	
	var navToggle = $('.navbar-toggle'),
		toggle = $('.toggle'),
		dropdown = $('.dropdown');


	function default(isi){
		isi.on(click(function(event) {
			event.preventDefault();
		});)
	}

	default(navToggle);
	default(dropdown);
	default(toggle);
});