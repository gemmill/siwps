<article id="post-<?php the_ID(); ?>" class="person list">
		
				<div class="thumb">
		<?php 
		$the_image = get_field('image'); 
		if ($the_image['sizes']['large']):
		?>
		
			
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  data-src="<?php echo $the_image['sizes']['gallery'] ?>" width="<?php echo $the_image['sizes']['headshot-width'] ?>"  height="<?php echo $the_image['sizes']['headshot-height'] ?>">
		<?php else: ?>
		<img src="/wp-content/themes/siwps/img/whitelogo.png" width="200"  height="200">
		<?php endif; ?>
		</div>
		
				<h3 ><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
		
				<?php echo strip_tags(get_field('position')); ?>
				
				
</article>
