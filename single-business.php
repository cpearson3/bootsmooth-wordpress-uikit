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
				<div itemscope itemtype="http://schema.org/LocalBusiness">
				<h1 class="uk-article-title"><span itemprop="name"><?php the_title(); ?></span></h1>
				<p>Category: <strong><?php the_field('category'); ?></strong></p>
				<p itemprop="address">Location: <?php the_field('address')['address']; ?></p>
				<p itemprop="telephone">Phone: <?php the_field('telephone'); ?></p>
				<p itemprop="openingHours" content="<?php the_field('opening_hours'); ?>">Hours: <?php the_field('opening_hours'); ?></p>
				<hr class="uk-article-divider">
				<p itemprop="description"><?php the_field('description'); ?></p>
				<p itemprop="url" content="http://<?php the_field('website'); ?>"><a href="http://<?php the_field('website'); ?>" target="_blank">Visit web site.</a></p>
				</div>
			<?php
			endwhile; // End of the loop.
			?>
	
			</article><!-- #main -->
		</div><!-- #primary -->
		<div class="uk-width-medium-1-4">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php 
get_footer();
