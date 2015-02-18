<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 * @package WordPress
 * @subpackage USGBC-OH
 * @since USGBC-OH 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]--><head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- <meta name="viewport" content="width=device-width" /> -->
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
		echo ' | ' . sprintf( __( 'Page %s', 'USGBCOH' ), max( $paged, $page ) );

	?></title>
    <!-- META -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Transforming the Central Ohio built environment to be more healthy, prosperous and sustainable." />
<meta name="keywords" content="Transforming the Central Ohio built environment to be more healthy, prosperous and sustainable." />
<!-- FAVICON -->
	<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
	<link rel="apple-touch-icon" href="apple-touch-icon.png" />
<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/dropdown.css" media="screen" />
	<!--<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/projekktor/style.css" media="screen" />-->
<!-- JS -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js "></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/global.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jcarousellite-min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.showcase.js"></script>
    
        
<?php
//if ( is_front_page() . is_page(520)) {
if ( is_child(520) ) {
	
	echo    '<script src="http://usgbccentralohio.org/wp-content/themes/USGBC-OH/js/jquery-1.7.2.min.js"></script>
	<script src="http://usgbccentralohio.org/wp-content/themes/USGBC-OH/js/lightbox.js"></script>';
	
} else {

}
?>

    
    
	<script type="text/javascript">
		$(function() {
			var TOTAL_ITEMS = 10;
   		    var randNum = Math.floor(Math.random()*(TOTAL_ITEMS+1));

			
			$(".sponsors").jCarouselLite({
				btnNext: ".next",
				btnPrev: ".prev",
				auto: 1000,
				speed: 1000,
				start: randNum
			});
		});
		//jQuery(function() {
		//Home brew accordion nav
			//jQuery(".drop").toggle( 
				//function () {
					//jQuery(".drop").parent().find("ul").slideUp("fast");
					//jQuery(this).parent().find("ul").slideDown("fast");
					//jQuery(".dropBg").removeClass("active");
					//jQuery(this).parent().addClass("active");
				//},
				//function () {
					//jQuery(this).parent().find("ul").slideUp("fast");
					//jQuery(this).parent().removeClass("active");
				//}
			//);
		
		//});


		//jQuery(function() {
		//	jQuery('.drop').click(function() {			  
		//		if(jQuery(this).parent().hasClass('active')) {
		//			jQuery(this).parent().find("ul").slideUp("fast");
		//	    	jQuery(this).parent().removeClass("active");
		//		}
		//		else {
		//			jQuery(".drop").parent().find("ul").slideUp("fast");
		//			jQuery(this).parent().find("ul").slideDown("fast");
		//			jQuery(".dropBg").removeClass("active");
		//			jQuery(this).parent().addClass("active");
		//		};
		//	});
	//	});
		$(function() {
		    $("#carousel").showcase({
		    	animation: { type: "fade", interval: 5000, stopOnHover: false },
		    	css: { width: "595px", height: "313px" },
		        images: [
		        	/* { url:"<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('top_rotator_img1')) : else : ?><?php bloginfo('template_url'); ?>/images/carousel1.jpg ", height:"595px", width:"313px", description:"", link: "" }<?php endif; ?>,
		        	{ url:"<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('top_rotator_img2')) : else : ?><?php bloginfo('template_url'); ?>/images/carousel2.jpg ", height:"595px", width:"313px", description:".", link: "" }<?php endif; ?>,
		        	{ url:"<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('top_rotator_img3')) : else : ?><?php bloginfo('template_url'); ?>/images/carousel3.jpg ", height:"595px", width:"313px", description:"", link: "" }<?php endif; ?>,
		        	{ url:"<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('top_rotator_img4')) : else : ?><?php bloginfo('template_url'); ?>/images/carousel4.jpg ", height:"595px", width:"313px", description:"", link: "" }<?php endif; ?>, */
					
					
					{ url:"<?php bloginfo('template_url'); ?>/images/carousel5.jpg ", height:"595px", width:"313px", description:"", link: "/?page_id=108" }, 
					/*
					{ url:"<?php bloginfo('template_url'); ?>/images/carousel7.jpg ", height:"595px", width:"313px", description:"", link: "" } */
					
					],
		        navigator: { position: "bottom-right", orientation: "horizontal", showNumber: false, autoHide: false,
		        	css: { padding:"5px" },
		        		item: {
		        			css: { backgroundColor: "#ffffff", borderColor:"#ffffff", color:"#ffffff", padding:"0px" },
		        			cssHover: { backgroundColor: "#aebc1e" },
		        			cssSelected: { backgroundColor: "#aebc1e", borderColor: "#aebc1e", color:"#aebc1e" }
		        		}
		    },
		    	titleBar: { enabled: false }
		    			});
			$("#btnPause").click( function() {
				$("#showcats").pause();
				$("#lblStatus").text("PAUSE");
					});
						$("#btnResume").click( function() {
							$("#showcats").go();
							$("#lblStatus").text("GO");
						});
		});
	</script>
<!-- IE FIXES -->
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/css/ie-fixes.css" />
	<![endif]-->
	<!--[if lt IE 7]>
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.dropdown.js"></script>
	<![endif]-->
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>




<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29854989-1']);
  _gaq.push(['_setDomainName', 'usgbccentralohio.org']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=163565527059519";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="header">
		<div class="wrapper">
		    <div id="search">
                <form id="searchform" action="http://usgbc-coh.org/" method="get">
                	<p>
                		<label class="assistive-text" for="s">Search Site</label>
                		<input id="s" class="field" type="text" placeholder="Search" name="s">
                	</p>
                	<input type="image" name="submit" class="submit" src="<?php bloginfo('template_url'); ?>/images/go-btn.png" width="41" height="21" />
                </form>
		    </div>
		</div>
	</div>    
<div id="mainContent" class="hfeed">
	<div class="wrapper">
    	<div id="logonav">
			<a href="/"><img src="<?php bloginfo('template_url'); ?>/images/usgbc-co-logo.png" width="148" height="236" alt="U.S. Green Building Council, Central Ohio Chapter" /></a>
			<div id="nav">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div>
		</div>
		<div id="main">