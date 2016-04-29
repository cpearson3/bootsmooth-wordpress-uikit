<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bootsmooth-wordpress-uikit
 */

get_header(); ?>
<div id="content" class="site-content  uk-container uk-container-center uk-margin-top">
	<div id="primary" class="content-area uk-grid">
		<main id="main" class="site-main uk-width-medium-3-4" role="main">
		
		<?php
		if ( have_posts() ) :
		?>

			<h1>Portfolio</h1>
			<!-- Filter Controls -->
			<ul id="grid-filters" class="uk-subnav">
			    <li data-uk-filter=""><a href="">All</a></li>
			    <li data-uk-filter="General"><a href="">General</a></li>
  			    <li data-uk-filter="Food"><a href="">Food</a></li>
			</ul>
			<div class="uk-grid" data-uk-grid="{controls: '#grid-filters'}">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			?>

				<div class="uk-width-small-1-2 uk-width-medium-1-3" data-uk-filter="<?php the_field('category'); ?>">
					<div class="uk-panel uk-panel-box">
						<?php
							$image = get_field('feature_image');
							if( !empty($image) ):
						?>
							<img src="<?php echo $image['url']; ?>" />
						<?php endif; ?>
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<p><small>
							<?php the_date(); ?><br>
						</small></p>
					</div>
				</div>
			<?php endwhile;?>
			</div>
			
		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
		<div class="uk-width-medium-1-4">
			<?php get_sidebar('portfolio'); ?>
		</div><!-- #sidebar -->
	</div><!-- #primary -->
</div>
<?php 
get_footer();
