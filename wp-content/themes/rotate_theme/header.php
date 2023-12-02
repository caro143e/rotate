<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
if ( apply_filters( 'astra_header_profile_gmpg_link', true ) ) {
	?>
	 <link rel="profile" href="https://gmpg.org/xfn/11"> 
	 <?php
} 
?>
<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a
	class="skip-link screen-reader-text"
	href="#content"
	role="link"
	title="<?php echo esc_attr( astra_default_strings( 'string-header-skip-link', false ) ); ?>">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div id="content" class="site-content">
	<div class="ast-container">
		<?php astra_content_top(); ?>

	<header id="head-primary" class="site-header">
		<nav id="site-navigation" class="main-navigation">	
        	<div class="site-branding">
				<img src="<?php echo get_stylesheet_directory_uri() ?>/pictures/logo.svg" alt="Rotate logo">
       		</div>
			<div> 
				<ul class="nav-menu">
                	<li><a href="https://loststudios.dk/kea/rotate/new-arrivals/">NEW ARRIVALS</a></li>
               	 <li><a href="https://loststudios.dk/kea/rotate/shop/">SHOP ALL</a></li>
                	<li><a href="https://loststudios.dk/kea/rotate/rotate-party/">ROTATE PARTY</a></li>
                	<li><a href="https://loststudios.dk/kea/rotate/rotate-sunday/">ROTATE SUNDAY</a></li>
                	<li><a href="https://loststudios.dk/kea/rotate/rotate-world/">ROTATE WORLD</a></li>
           		 </ul>
			</div>
           
			<div class="header-icons">
           		<div>
					<img src="<?php echo get_stylesheet_directory_uri() ?>/pictures/loop_icon.svg" alt="Rotate logo">
		   		</div>
		   		<div>
					<img src="<?php echo get_stylesheet_directory_uri() ?>/pictures/hjerte_icon.svg" alt="Rotate logo">
				</div>
				<div>
					<img src="<?php echo get_stylesheet_directory_uri() ?>/pictures/kurv_icon.svg" alt="Rotate logo">
				</div>
           
           </div>
        </nav>

       
   	 </header>

  </div><!-- .ast-container -->
</div><!-- #content -->

