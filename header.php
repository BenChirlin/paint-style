<?php
/**
 * @package WordPress
 * @subpackage Paint Style
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
    
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
        
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if gte IE 9 ]><html class="no-js ie9" lang="en"> <![endif]-->
    
    <title><?php wp_title('|',true,'right'); ?><?php bloginfo('name'); ?></title>
        
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	<link href='http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica:400,400italic|Goudy+Bookletter+1911' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/base.css">
	<link rel="stylesheet" href= "<?php echo get_template_directory_uri(); ?>/style.css">
	<link rel="stylesheet" href= "<?php echo get_template_directory_uri(); ?>/stylesheets/global.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/layout.css">
	<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/javascripts/prefixfree.min.js'></script>
	<!-- JS
  ================================================== -->
	<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/javascripts/jquery-2.0.2.min.js'></script>
	<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/javascripts/jquery.cycle2.min.js'></script>
	<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/javascripts/jquery.cycle2.center.min.js'></script>
	<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/javascripts/global.js'></script>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-114x114.png">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>><!-- the Body  -->

<div class="container main-container">
    
 