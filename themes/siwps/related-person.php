
		<article id="post-<?php the_ID(); ?>" class="related people">
		
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
		
    
			<?php //get_template_part( "related", "image" ); ?>

			<?php echo '<h3 class="entry-title">';  ?>
			
			<?php the_title(); ?>
			
			<?php echo '</h3>'; ?>
			
		
		
		<?php echo strip_tags(get_field('position')); ?>
		</a>
		</article>
	