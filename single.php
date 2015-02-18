<?php
/**
 * The Template for displaying all single posts.
 * * @package WordPress
 * @subpackage USGBC-OH
 * @since USGBC-OH 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'USGBCOH' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'USGBCOH' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'USGBCOH' ) ); ?></span>
					</nav><!-- #nav-single -->

					<?php get_template_part( 'content', 'single' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<div id="right_col">
<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('blog_sidebar')) : else : ?>
                    <?php endif; ?> 
</div>

<?php get_footer(); ?>