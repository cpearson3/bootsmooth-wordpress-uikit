<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bootsmooth-wordpress-uikit
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer uk-text-center uk-margin-large" role="contentinfo">
		<div class="site-info">
			<?php bloginfo('description'); ?>
			<span class="sep"> | </span>
			<?php bloginfo('name'); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
