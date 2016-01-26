<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Woo_Strap
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<?php if (is_front_page()) : ?>
		<!-- Font Page Navigation  -->
	   <header id="masthead" class="ufold ufold-header site-header" role="banner">
	      <nav class="navbar navbar-default">
	         <div class="container">
	            <div class="navbar-header">
	               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	                  <span class="sr-only">Toggle navigation</span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	               </button>
	               <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_self">Bootstrap <span style="transition-delay: 0.32s;">4</span> me</a>
	            </div>
	            <div id="navbar" class="navbar-collapse collapse" >
	               <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav navbar-nav'  ) ); ?>
	            </div><!--/.navbar-collapse -->
	         </div>
	      </nav>
	   </header>
	<?php elseif (is_404()): ?>
		<!-- NO HEADER -->
	<?php else: ?>
		<!-- Navigation 2  -->
	   <header class="ufold angebot-header" ng-controller="mainNavController">
	      <div class="img-overlay"></div>
	      <nav class="navbar navbar-default" role="navigation"> <!-- navbar-fixed-top -->
	         <div class="container">
	            <div class="navbar-header">
	               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	                  <span class="sr-only">Toggle navigation</span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	               </button>
	               <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">Bootstrap <span style="transition-delay: 0.32s;">4</span> me</a>
	            </div>
	            <div id="navbar" class="navbar-collapse collapse" >
		               <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav navbar-nav'  ) ); ?>
		            </div><!--/.navbar-collapse -->
	         </div>
	      </nav>
	   </header>
	<?php endif; ?>

	<div id="content" class="site-content">
