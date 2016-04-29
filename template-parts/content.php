<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bootsmooth-wordpress-uikit
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('uk-article'); ?>>
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="uk-article-title">', '</h1>' );
			} else {
				the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="uk-article-meta">
			<?php bootsmooth_wordpress_uikit_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
	<hr class="uk-article-divider">
	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bootsmooth-wordpress-uikit' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bootsmooth-wordpress-uikit' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<!-- footer class="entry-footer">
		<?php bootsmooth_wordpress_uikit_entry_footer(); ?>
	</footer --><!-- .entry-footer -->
</article><!-- #post-## -->
