<?php
/**
 * The template for displaying content in the single.php template
 * * @package WordPress
 * @subpackage USGBC-OH
 * @since USGBC-OH 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'USGBCOH' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<div class="entry-meta">
			<?php USGBCOH_posted_on(); ?>
		</div><!-- .entry-meta -->
	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'USGBCOH' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'USGBCOH' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s ', 'USGBCOH' );
			} elseif ( '' != $categories_list ) {
				$utility_text = __( 'This entry was posted in %1$s by <a href="%6$s">%5$s</a>.', 'USGBCOH' );
			} else {
				$utility_text = __( ' ', 'USGBCOH' );
			}

			printf(
				$utility_text,
				$categories_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);
		?>
		<?php edit_post_link( __( 'Edit', 'USGBCOH' ), '<span class="edit-link">', '</span>' ); ?>


	</footer><!-- .entry-meta -->
	

</article><!-- #post-<?php the_ID(); ?> -->
