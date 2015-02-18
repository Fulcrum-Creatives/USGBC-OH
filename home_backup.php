<?php
  /* Template Name: Custom Home Page */

get_header(); ?>

		<div id="primary">
        <div id="carousel"></div>
        <div id="mission">To transform the Central Ohio built environment to be more healthy, prosperous and sustainable.</div>
				<div id="buckets">
					<div class="join">
                    <h2 id="h21">Join</h2>
                    	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('left_column')) : else : ?>  							
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac nibh nunc, at facilisis eros. Etiam ante nisl, gravida sit amet rhoncus sit amet, aliquam.</p>
							<p><a href="#">Learn more</a></p> 
    					<?php endif; ?>  		
					</div>
					<div class="sponsor">
                    <h2 id="h22">Sponsor</h2>
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('center_column')) : else : ?>
				
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac nibh nunc, at facilisis eros. Etiam ante nisl, gravida sit amet rhoncus sit amet, aliquam.</p>
						<p><a href="#">View sponsors</a></p>
                        <?php endif; ?>  
					</div>
					<div class="learn">
                    <h2 id="h23">Learn</h2>
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('right_column')) : else : ?>
						
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac nibh nunc, at facilisis eros. Etiam ante nisl, gravida sit amet rhoncus sit amet, aliquam.</p>
						<p><a href="#">View LEED info</a></p>
                    <?php endif; ?> 
					</div>
				</div>
                <h3>Current Sponsors</h3>
				<div class="sponsors">
					<img class="prev" src="<?php bloginfo('template_url'); ?>/images/sponsors-left.png" width="18" height="85" />
						<ul id="logos"> 
						<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sponsors_rotator')) : else : ?>
							<li><img src="<?php bloginfo('template_url'); ?>/images/sponsor-1.gif" alt="" width="201" height="62" ></li>
							<li><img src="<?php bloginfo('template_url'); ?>/images/sponsor-2.gif" alt="" width="167" height="62" ></li>
							<li><img src="<?php bloginfo('template_url'); ?>/images/sponsor-3.gif" alt="" width="187" height="62" ></li>
                        <?php endif; ?> 
						</ul>
					<img class="next" src="<?php bloginfo('template_url'); ?>/images/sponsors-right.png" width="18" height="85" />
				</div>
                <div id="titleBar">
                	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('title_bar')) : else : ?>
						<div class="textwidget">From the Chapter</div>
                    <?php endif; ?> 
                </div>
			<div id="content" role="main">
			<?php query_posts ($query_string . '&cat=4'.'&showposts=3'); ?>
			<?php   if ( have_posts() ) : ?>

				 <?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'USGBCOH' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                    <div class="entry-meta">
						<?php USGBCOH_posted_on(); ?>
					</div>
					<?php the_excerpt( __( '<span>Read more</span>', 'USGBCOH' ) ); ?>

				<?php endwhile; ?>

				<?php USGBCOH_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'USGBCOH' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'USGBCOH' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
			

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>