<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package themesflat
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

<div class="themesflat-boxed">
	<!-- Preloader -->
	<div class="preloader">
		<div class="clear-loading loading-effect-2">
			<span></span>
		</div>
	</div>
	
	<!-- Hero Slider 1 -->	
	<?php themesflat_header(); ?>

	<!-- Page Title -->
	<?php get_template_part( 'tpl/page-title'); ?>
	
	<div id="content" class="page-wrap <?php echo esc_attr( themesflat_blog_layout() ); ?>">
		<div class="container content-wrapper">
			<div class="row row-wrapper">
