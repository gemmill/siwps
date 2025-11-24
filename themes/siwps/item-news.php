<article id="post-<?php the_ID(); ?>" class="news list">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">

		<div class="the_date">
		<?php echo get_the_date( "F d"); ?> 
		</div>	
				
		
		<h2 class="entry-title">
		<?php echo util_breaker(":",get_the_title()); ?>
		</h2>
	
		
	</a>
</article>
