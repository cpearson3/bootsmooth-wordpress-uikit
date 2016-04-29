<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bootsmooth-wordpress-uikit
 */

get_header(); ?>
<div id="content" class="site-content  uk-container uk-container-center uk-margin-top">
	<div class="uk-grid">
		<div id="primary" class="content-area uk-width-medium-3-4">
			<article id="main" class="uk-article" role="main">
	
			<?php
			while ( have_posts() ) : the_post(); ?>
	
				<h1 class="uk-article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<p><small><?php the_date(); ?></small></p>
				<hr class="uk-article-divider">
				<p><?php the_field('content'); ?></p>
			
			<?php
			endwhile; // End of the loop.
			?>
	
			</article><!-- #main -->
		</div><!-- #primary -->
		<div class="uk-width-medium-1-4">
			<?php get_sidebar('portfolio'); ?>
		</div>
	</div>
</div>
<?php 
get_footer();
