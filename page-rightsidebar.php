<?php
/**
Template Name: Right Sidebar Page
*/

get_header(); ?>

		<div id="primary">
			<div id="content" role="main" class="defaultPage">

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php comments_template( '', true ); ?>

			</div><!-- #content -->
			
			
		</div><!-- #primary -->

<div id="right_col">
			<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('right_sidebar')) : else : ?>
                    <?php endif; ?> 
			</div>

<?php get_footer(); ?>