<?php
/* Template Name: Custom Default page */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main" class="defaultPage">

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php comments_template( '', true ); ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>