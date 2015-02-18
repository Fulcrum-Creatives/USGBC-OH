(function(jQuery) {
	jQuery(document).ready( function() {
	    jQuery('.feature-slider a').click(function(e) {
	        jQuery('.featured-posts section.featured-post').css({
	            opacity: 0,
	            visibility: 'hidden'
	        });
	        jQuery(this.hash).css({
	            opacity: 1,
	            visibility: 'visible'
	        });
	        jQuery('.feature-slider a').removeClass('active');
	        jQuery(this).addClass('active');
	        e.preventDefault();
	    });
	});
})(jQuery);