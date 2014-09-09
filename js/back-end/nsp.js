jQuery(window).load(function() {
	if(jQuery(document).find('body').hasClass('widgets-php')) {
		// add click tracker ;)
		jQuery(jQuery(document).find('.widget-liquid-right')[0]).click(function(){
			//console.log(jQuery(e.target).hasClass('gk-order') ? 'X' : 'Y');
		});
	}
});