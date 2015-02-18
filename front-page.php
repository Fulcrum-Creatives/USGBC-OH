<?php
  /* Template Name: Custom Home Page */

get_header(); ?>

		<div id="primary">
        <div id="carousel"></div>
        <div id="mission">Transforming the Central Ohio built environment to be more healthy, prosperous and sustainable.</div>
				<div id="buckets">
					<div class="join">
                    <h2 id="h21">Join</h2>
                    	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('left_column')) : else : ?>  							
							
    					<?php endif; ?>  		
					</div>
					<div class="sponsor">
                    <h2 id="h22">Sponsor</h2>
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('center_column')) : else : ?>
				
						
                        <?php endif; ?>  
					</div>
					<div class="learn">
                    <h2 id="h23">Learn</h2>
                    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('right_column')) : else : ?>
                    <?php endif; ?> 
					</div>
				</div>
				
				<?php // Slider area below ?>
                <h3>Current Sponsors</h3>
		<div class="sponsor-rotator-cont">
		
		<?php echo render_view(array('title' =>'Sponsor Rotator')); ?>
		</div>
				
            <div id="buckets2">
            <div class="email-twit"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('email_form')) : else : ?>
                    <?php endif; ?> <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('twitter')) : else : ?>
                    <?php endif; ?></div>
            
            <div class="facebook"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('facebook')) : else : ?>
                    <div class="fb-like-box" data-href="https://www.facebook.com/USGBCCentralOhio" data-width="390" data-show-faces="true" data-stream="true" data-header="false"></div><?php endif; ?></div>
		</div>
<div id="content" role="main">
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>