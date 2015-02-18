<?php 
/**
Template Page for the album overview (USGBC Style)

Follow variables are useable :

	$album     	 : Contain information about the album
	$galleries   : Contain all galleries inside this album
	$pagination  : Contain the pagination content

 You can check the content when you insert the tag <?php var_dump($variable) ?>
 If you would like to show the timestamp of the image ,you can use <?php echo $exif['created_timestamp'] ?>
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($galleries)) : ?>

<div class="usgbc-albumoverview">	
	<!-- List of galleries -->
	<?php foreach ($galleries as $gallery) : ?>

	<div class="usgbc-album">
    <div class="usgbc-thumbnail">
					<a href="<?php echo $gallery->pagelink ?>"><img class="Thumb" alt="<?php echo $gallery->title ?>" src="<?php echo $gallery->previewurl ?>"/></a>
				</div>
		<div class="usgbc-albumtitle"><a href="<?php echo $gallery->pagelink ?>"><?php echo $gallery->title ?></a></div>
			<div class="usgbc-albumcontent">
				<div class="usgbc-description">
				<p><?php echo $gallery->galdesc ?></p>
				<?php if ($gallery->counter > 0) : ?>
				<p><strong><?php echo $gallery->counter ?></strong> <?php _e('Photos', 'nggallery') ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>

 	<?php endforeach; ?>
 	
	<!-- Pagination -->
 	<?php echo $pagination ?>
 	
</div>

<?php endif; ?>
<!--
<h3>Design Columbus 2012 Sponsors</h3>
				<div class="sponsors">
					<img class="prev" src="<?php bloginfo('template_url'); ?>/images/sponsors-left.png" width="18" height="85" />
						<ul id="logos"> 
						
							
<li><img src="http://usgbccentralohio.org/wp-content/uploads/2012/08/47-Kingspan-Wesley-Grubb.jpg" alt="" ></li>
<li><img src="http://usgbccentralohio.org/wp-content/uploads/2012/08/42-Tremco-Doug-White.jpg" alt="" ></li>
<li><img src="http://usgbccentralohio.org/wp-content/uploads/2012/08/27-Turner-Construction-Kirt-Smith.jpg" alt="" ></li>
<li><img src="http://usgbccentralohio.org/wp-content/uploads/2012/08/25-AEP-Ohio-Maggie-Ellison.jpg" alt="" ></li>
<li><img src="http://usgbccentralohio.org/wp-content/uploads/2012/08/24-Marvin-Windows-Chick-McBrien.jpg" alt="" ></li>
<li><img src="http://usgbccentralohio.org/wp-content/uploads/2012/08/16-King-Business-Interiors-Merideth-Hulse.jpg" alt="" ></li>
<li><img src="http://usgbccentralohio.org/wp-content/uploads/2012/08/32-OAP-Adam-Olson.jpg" alt="" ></li>
<li><img src="http://usgbccentralohio.org/wp-content/uploads/2012/08/34-VS-Columbus-Galvanizing-Rich-Collins.jpg" alt="" ></li>

          
						</ul>
					<img class="next" src="<?php bloginfo('template_url'); ?>/images/sponsors-right.png" width="18" height="85" />
				</div>
				
				-->
                