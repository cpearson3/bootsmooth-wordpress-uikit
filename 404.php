<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bootsmooth-wordpress-uikit
 */

get_header(); ?>
<div id="content" class="uk-container uk-container-center uk-margin-top">
	<div id="primary" class="uk-grid">
		<main id="main" class="site-main uk-width-medium-3-4" role="main">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bootsmooth-wordpress-uikit' ); ?></h1>
			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'bootsmooth-wordpress-uikit' ); ?></p>

				<?php
					get_search_form();

					//the_widget( 'WP_Widget_Recent_Posts' );

					// Only show the widget if site has multiple categories.
					//if ( bootsmooth_wordpress_uikit_categorized_blog() ) :
				?>
			</div><!-- .page-content -->
		</main><!-- #main -->
		<div class="uk-width-medium-1-4">
			<?php get_sidebar(); ?>
		</div><!-- #sidebar -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
