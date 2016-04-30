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
				<div itemscope itemtype="http://schema.org/Product">
				<?php
					$image = get_field('image');
					if( !empty($image) ):
				?>
				<img itemprop="image" alt="<?php the_title(); ?>" src="<?php echo $image['url']; ?>">
				<?php endif; ?>
				<h1 class="uk-article-title"><a href="<?php the_permalink(); ?>"><span itemprop="name"><?php the_title(); ?></span></a></h1>
				<div itemprop="category" content="<?php the_field('category'); ?>">Category: <?php the_field('category'); ?></div>
				<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
					<span>Price: </span><span itemprop="priceCurrency" content="USD">$</span><span itemprop="price" content="<?php the_field('price'); ?>"><?php the_field('price'); ?></span>
				</div>
				<hr class="uk-article-divider">
				<p itemprop="description"><?php the_field('description'); ?></p>
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
