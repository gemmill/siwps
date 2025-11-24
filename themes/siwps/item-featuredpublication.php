<article id="post-<?php the_ID(); ?>" class="featuredpublication list">
		<div class="cover" >

		<?php
			

		$images = get_field('cover_image');
		$foundImage = false;
		
		if ($images["sizes"]):
			
				
				
					$foundImage = true;
					
					$the_image = $images["sizes"]["large"];
					$the_image_width = $images["sizes"]["large-width"];
					$the_image_height = $images["sizes"]["large-height"];
					?>
					
					
					<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  data-src="<?php echo $the_image?>" width="<?php echo $the_image_width ?>" height="<?php echo  $the_image_height ?>">
					
					
		<?php else: ?>
		
		
		<img src="<?php echo get_template_directory_uri(); ?>/img/document.svg" >	
		
		
		<?php endif; ?>
			
			
		</div>
		<h3>
		
		<?php the_title(); ?>
		
		
		</h3>

		<div class="authorname">
		<?php 
			$person = get_field('person'); 
			
			if ($person):
				echo get_the_title($person[0]);
			endif;
			
		 ?>
		</div>
</article>
