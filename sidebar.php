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
	<small>Sidebar</small>
	<div class="uk-panel uk-panel-box">
        <?php include ("subscribeform.php"); ?>
    </div>
    <hr>
    <div class="uk-panel uk-panel-box">
	    <h3>Recent Posts</h3>
		<ul class="uk-list uk-list-line">
		<?php
			$recent_posts = wp_get_recent_posts();
			foreach( $recent_posts as $recent ){
				echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
			}
		?>
		</ul>
	</div>
	<hr>
	<div class="uk-panel uk-panel-box">
		<h3>Archives</h3>
		<?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
	</div>
	<hr>
    <div class="uk-panel uk-panel-box">
        <?php include ("contactform.php"); ?>
    </div>
</aside><!-- #secondary -->
