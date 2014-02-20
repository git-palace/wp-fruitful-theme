jQuery(document).ready(function($) {
		$('.menu').mobileMenu({
			defaultText: 'Navigate to...',
			className: 	 'select-menu',
			subMenuDash: '&nbsp;&nbsp;&ndash;'
		});
		
		/*Fancy Box*/
		$('article.format-image .entry-content a img').each(function (i) {
			$(this).parent('a').addClass('fancybox');
		});
		
		if ($(".fancybox").length > 0) {
			$(".fancybox").fancybox({
				'overlayShow'	 : true,
				'transitionIn'	 : 'elastic',
				'transitionOut'	 : 'elastic',
				'padding'		 : 0,
				'autoScale'		 : false,
				'speedIn' 		 : 250,
				'speedOut'  	 : 250,
				'width' 		 : 800,
				'height' 		 : 600,
				'overlayOpacity' : 0.25,
				'overlayColor'   : '#000',
				'autoScale' : true,
				'autoDimensions' : false,
				'centerOnScroll' : true
		});
		}
		
		$('#back-top a').click(function () {
			$('body,html').animate({ scrollTop: 0}, 850)
			return false;
		});
		
		if ($(".tabbed-nav").length > 0 ) {
			$(".tabbed-nav").easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		}
		
		$('.menu li:has(ul)').mobileMenuDropdown();
		$(window).resize();
});

jQuery(window).bind('resize', function() { 
	vhGroupClass   = jQuery('.responsive #page .container header hgroup').data('originalstyle');
	vmWrapperClass = jQuery('.responsive #page .container header .menu-wrapper').data('originalstyle');
	
	if (jQuery(window).width() <= 767)	 {
		if (jQuery('.responsive .cart-button').length > 0) {
			jQuery('.responsive .select-menu').css({'max-width':'80%', 'margin' : '6px 0 25px 0'});		
		} 
		jQuery('.responsive #page .container header hgroup').removeClass(vhGroupClass).addClass('center-pos');
		jQuery('.responsive #page .container header .menu-wrapper').removeClass(vmWrapperClass).addClass('center-pos');
	} else {
		jQuery('.select-menu').css({'max-width':'none', 'margin' : '0 0 25px 0'});		
			
		jQuery('.responsive #page .container header hgroup').removeClass('center-pos').addClass(vhGroupClass);
		jQuery('.responsive #page .container header .menu-wrapper').removeClass('center-pos').addClass(vmWrapperClass);
	}
	
	autoWidthMenu();
	jQuery(window).scroll();
});

function autoWidthMenu () {
	if (jQuery('.menu-wrapper').hasClass('center-pos')) {
		if (jQuery('.cart-button').length > 0) {
			vElemsWidth = jQuery('.cart-button').outerWidth() + jQuery('.site-navigation').outerWidth();
		} else {
			vElemsWidth = jQuery('.site-navigation').outerWidth();
		}		
		vElemsWidth = vElemsWidth + 50;
		jQuery('.menu-wrapper').css({'max-width': vElemsWidth + 'px'})
	} else {
		jQuery('.menu-wrapper').css({'max-width': 'none'})
	}
}

jQuery(window).bind('scroll', function() { 
	var is_sufficient_height = false;
	var vContentHeight 	 = jQuery('#page').outerHeight();
	var vWinHeight  	 = jQuery(window).height();
	var vHeaderContainer = jQuery('.head-container').outerHeight();
	console.log(vContentHeight);
	console.log(vWinHeight);
	console.log(vHeaderContainer);
	
	if ((vContentHeight - vWinHeight) > 0) {
		if (((vContentHeight - vWinHeight) - (vHeaderContainer+100)) > vHeaderContainer) {
			is_sufficient_height = true;
		}
	}
	console.log(is_sufficient_height);
	if ((ThGlobal.is_fixed_header != -1) && (is_sufficient_height)) {
		if ((jQuery(this).scrollTop() + 50) > vHeaderContainer) {
			if (jQuery('#wpadminbar').length > 0) {
				jQuery(".head-container").addClass('fixed is_indent'); 
			} else {
				jQuery(".head-container").addClass('fixed'); 
			}  
		} else { 
			jQuery(".head-container").removeClass('fixed is_indent');
		}
	} else {
			jQuery(".head-container").removeClass('fixed is_indent');
	}
  
	if(jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height()) {
		jQuery('#back-top').fadeIn('slow'); 
	} else {
		jQuery('#back-top').fadeOut('slow');
	}
});