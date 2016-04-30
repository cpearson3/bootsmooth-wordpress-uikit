<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bootsmooth-wordpress-uikit
 */
 
  /*
 Template Name: Blog
 */


get_header(); ?>
<div id="content" class="site-content  uk-container uk-container-center uk-margin-top">
	<div id="primary" class="content-area uk-grid">
		<main id="main" class="site-main uk-width-medium-3-4" role="main">
			<h1><?php echo the_title(); ?></h1>
			<div data-uk-grid="{gutter: 16}">
			
			<?php
			// THE LOOP
			
			// ARGS
			$args = array(
				'order'    => 'DESC'
			);
			query_posts( $args );
			while ( have_posts() ) : the_post(); 
			?>

				<div class="uk-width-small-1-2 uk-width-medium-1-3">
					<div class="uk-panel uk-panel-box">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><small><?php the_date(); ?></small></p>
						<p><?php the_excerpt(); ?></p>
					</div>
				</div>
			<?php endwhile; // End of the loop.
			?>
			</div>


		</main><!-- #main -->
		<div class="uk-width-medium-1-4">
			<?php get_sidebar(); ?>
		</div><!-- #sidebar -->
	</div><!-- #primary -->
</div>
<?php 
get_footer();
