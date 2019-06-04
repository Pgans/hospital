<?php function wordpress_footer_menu(){if(!(function_exists("worpdress_footer")&&function_exists("worpdress_header"))){echo('This theme is released under creative commons licence, all links in the footer should remain intact. Delete the theme via ftp if you are having any problem accessing the dashboard.');die;}}wordpress_footer_menu(); function wordpress_functions_valid(){if(!file_exists(dirname(__FILE__)."/functions.php")){echo('<p style="text-align:center;background:#ccc;color:#000;font-size:16px;padding:20px">This theme is released under creative commons licence, all links in the footer should remain intact. Delete the theme via ftp if you are having any problem accessing the dashboard.</p>');die;}}wordpress_functions_valid(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!--[if lte IE 7]><style media="screen,projection" type="text/css">@import "<?php bloginfo('stylesheet_directory'); ?>/style-ie.css";</style><![endif]-->
	<!--[if IE 6]>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/DD_belatedPNG_0.0.7a-min.js"></script>
		<script type="text/javascript">
		  DD_belatedPNG.fix('.body_end, .body_top, .post-top .post_comments, #sidebar_social img');
		</script>
	<![endif]-->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.min.1.2.6.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/jqueryslidemenu/jqueryslidemenu.js"></script>
	<!-- /Main Menu -->
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/carousel/stepcarousel.js"></script>
	<script type="text/javascript" src="<?=bloginfo('template_url')?>/js/tabs/tabcontent.js"></script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head();worpdress_header(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">

<div id="header">
	<div id="logo">
        <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
    </div>
</div>
<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_id' => 'mainmenu' ) ); ?>
<div class="body">
<div class="body_top">
<div class="body_end">