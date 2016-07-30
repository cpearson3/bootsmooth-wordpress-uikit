<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bootsmooth-wordpress-uikit
 * 
 * 
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php bloginfo('description'); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text uk-hidden" href="#main"><?php esc_html_e( 'Skip to content', 'bootsmooth-wordpress-uikit' ); ?></a>
	<nav id="site-navigation" class="uk-navbar" role="navigation">
		<a class="uk-navbar-brand uk-hidden-small" href="/"><?php bloginfo(); ?></a>
		<?php wp_nav_menu( array( 'menu_id' => 'primary-menu', 'menu_class'=> 'uk-navbar-nav uk-hidden-small' ) ); ?>
		<div class="uk-navbar-content uk-hidden-small uk-navbar-flip">
            <?php get_search_form(); ?>
        </div>
        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
	</nav>
	<div id="offcanvas" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">
        	<?php wp_nav_menu( array( 'menu_id' => 'primary-menu', 'menu_class'=> 'uk-nav uk-nav-offcanvas' ) ); ?>
        	<hr>
        	<div class="uk-panel">
        		<?php get_search_form(); ?>
        	</div>
        </div>
    </div>