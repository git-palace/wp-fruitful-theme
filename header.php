<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Fruitful theme
 * @since Fruitful theme 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<?php
		$browser_ip 	= strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$browser_an 	= strpos($_SERVER['HTTP_USER_AGENT'],"Android");
		$browser_ipad 	= strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
		
	 if ($browser_ip  	== true) { $browser = 'iphone'; }
	 if ($browser_an	== true) { $browser = 'android'; } 
	 if ($browser_ipad 	== true) { $browser = 'ipad'; }
?>

<?php if($browser == 'iphone') 	{ ?> <meta name="viewport" content="width=480"> <?php } ?> 
<?php if($browser == 'android') { ?> <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width" /> <?php } ?>
<?php if($browser == 'ipad') 	{ ?> <meta name="viewport" content="width=768px, minimum-scale=1.0, maximum-scale=1.0" /> <?php } ?>  

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'fruitful' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php echo get_favicon(); ?>
<?php echo get_responsive_style(); ?>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo get_tracking_code(); ?>']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga 	= document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src 	= ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s 	= document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
  
<?php wp_head(); ?>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		
		<?php 
				 get_sliders();
			echo get_all_style();
			
		?>
		
		$('.menu').mobileMenu({
			defaultText: 'Navigate to...',
			className: 	 'select-menu',
			subMenuDash: '&nbsp;&nbsp;&ndash;'
		});
		
		/*Fancy Box*/
	
		$(".fn_box_img").fancybox({
				padding		: 0,
				openEffect 	: 'elastic',
				openSpeed  	: 150,
				closeEffect : 'elastic',
				closeSpeed  : 150,
				width 		: 800,
				height 		: 600,
				maxWidth 	: 1024,
				maxHeight 	: 768,
				closeClick 	: true,
				helpers 	: {
					overlay : {
							css : {
								'background' : 'rgba(0,0,0,0.25)'
									}
								}
							}
		});
		
		$('#back-top a').click(function () {
			$('body,html').animate({  scrollTop: 0}, 800)
			return false;
		});

			
	});
</script>

</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div class="container">
		<?php do_action( 'before' ); ?>
		<div class="sixteen columns">
			<header id="masthead" class="site-header" role="banner">
				<hgroup>
					<?php echo get_logo(); ?>
				</hgroup>
				<nav role="navigation" class="site-navigation main-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- .site-navigation .main-navigation -->
			</header><!-- #masthead .site-header -->
		</div>
		<div class="sixteen columns">