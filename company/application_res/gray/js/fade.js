jQuery(document).ready(function () {
	//=================================== FADE EFFECT ===================================//
	if (jQuery.browser.msie && jQuery.browser.version < 7) return; // Don't execute code if it's IE6 or below cause it doesn't support it.
	
	jQuery('.ts-display-pf-img').hover(
	function(){
	jQuery(this).find('.rollover').stop(true,true).fadeIn(300, function(){

			// image appears
			jQuery(this).find('.image').stop().animate({
				left: '50%', opacity: 1
			},{ 
				duration:400 , easing: 'easeInOutExpo'
			});
			
			// link appears
			jQuery(this).find('.link').stop().animate({
				left: '50%', opacity: 1
			},{ 
				duration:400 , easing: 'easeInOutExpo'
			});
		});
	
	},
	
	function(){
		
			// image disappears
			jQuery(this).find('.image').stop().animate({
				left: '120%', opacity: 0
			},{ 
				duration:400 , easing: 'easeInOutExpo'
			});
			
			// link disappears
			jQuery(this).find('.link').stop().animate({
				left: '-20%', opacity: 0
			},{ 
				duration:400 , easing: 'easeInOutExpo'
			});
			
			jQuery(this).find('.rollover').stop(true,true).delay(400).fadeOut(300, function(){
			jQuery(this).find('.image').css({ left: '120%'});
			jQuery(this).find('.link').css({ left: '-20%'});
			});
	
	});
	
	//=================================== PRETTYPHOTO ===================================//
	jQuery('a[data-rel]').each(function() {jQuery(this).attr('rel', jQuery(this).data('rel'));});
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'facebook', gallery_markup:'',slideshow:2000});
});