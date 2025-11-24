<article id="post-<?php the_ID(); ?>" class="person list">
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
		
		<?php if ( !isset($_GET['archive'])): ?>
		<div class="thumb">
		  
		
  		<?php 
		  $the_image = get_field('image'); 
		  
		

		  if ($the_image['sizes']['large']):
			
			
  		?>
  		
  			
  		  <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  data-src="<?php echo $the_image['sizes']['large'] ?>" width="<?php echo $the_image['sizes']['medium-width'] ?>"  height="<?php echo $the_image['sizes']['medium-height'] ?>">
  		<?php else: ?>
  		  <img src="/wp-content/themes/siwps/img/whitelogo.png" class="headless">
  		<?php endif; ?>
  
		</div>
		  <?php endif; ?>

		
		<div class="info">
		<h3>

			
			<?php the_title(); ?>
  	

		</h3>

		
		  <?php echo strip_tags(get_field('position')); ?>
		
		</div>
		</a>
</article>
