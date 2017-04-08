<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package testworkgh
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'testworkgh' ); ?></a>

	<header id="masthead" class="site-header container-fluid" role="banner">
        <div class="container">
            <div class="row">

                <div class="site-branding">
                    <?php
                    if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo wp_get_attachment_url(get_theme_mod('testworkgh-logo')); ?>" /></a></h1>
                    <?php else : ?>
                        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo wp_get_attachment_url(get_theme_mod('testworkgh-logo')); ?>" /></a></p>
                        <?php
                    endif; ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'testworkgh' ); ?></button>
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
                </nav><!-- #site-navigation -->

            </div>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

