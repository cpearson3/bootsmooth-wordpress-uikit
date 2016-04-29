<?php
/**
 * page-front.php
 *
 * Front Page Template File
 * 
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bootsmooth-wordpress-uikit
 */
 
 /*
 Template Name: Split Heading Page
 */

get_header(); ?>
<div id="content" class="site-content">
	<!-- Start the loop -->
	<?php while ( have_posts() ) : the_post(); ?>
	<div id="primary" class="content-area uk-container uk-container-center uk-margin-top">
		<main id="main" role="main">
			<div class="uk-grid">
				<div class="uk-width-medium-1-2">
				<?php
					$image = get_field('header_image');
					if( !empty($image) ):
				?>
					<img src="<?php echo $image['url']; ?>" />
				<?php endif; ?>
				</div>
		        <div class="uk-width-medium-1-2">
		            <h1 class="uk-heading-large"><?php the_field('header_copy'); ?></h1>
		            <p class="uk-text-large"><?php the_field('lead_copy'); ?></p>
		            <p>
		                <a class="uk-button uk-button-primary uk-button-large" href="<?php the_field('cta_url') ?>"><?php the_field('cta_copy') ?></a>
		            </p>
		        </div>
			</div>
		    <?php if (the_field('content')) : ?>
	        <article class="uk-article uk-margin">
	        	<?php htmlsafe(the_field('content')); ?>
	        </article>
	        <?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php endwhile; ?>
</div>
<?php 
get_footer();

