<article id="post-<?php the_ID(); ?>" class="item list">
		
		<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php echo util_breaker(":",get_the_title()); ?></a>
		</h2>
		

	

		
		<?php the_excerpt(); ?>
		
</article>
