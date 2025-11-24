
        <div id="parent-<?php the_ID(); ?>" class="pageitem list">
	        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<div class="page-image">
			<?php 
			$the_image = get_field('gallery')[0]; 
			if ($the_image['sizes']['large']):
			?>
			
				
			<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $the_image['sizes']['large'] ?>" width="<?php echo $the_image['sizes']['large-width'] ?>"  height="<?php echo $the_image['sizes']['large-height'] ?>" style="position:absolute; top:0; left:0; ">
			
			
			<?php elseif (get_the_post_thumbnail( get_the_ID() )): ?>
			<?php print_r(get_the_post_thumbnail( get_the_ID() )) ?>
			<?php endif; ?>

			</div>
	        
            <h3><?php the_title(); ?></h3>
			</a>
          

        </div>
