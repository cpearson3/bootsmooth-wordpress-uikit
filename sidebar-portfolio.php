<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bootsmooth-wordpress-uikit
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<div class="uk-panel uk-panel-box">
        <?php include ("contactform.php"); ?>
    </div>
    
    
</aside><!-- #secondary -->
