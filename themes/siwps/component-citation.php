<div id="post-<?php the_ID(); ?>" class="detail citation">
		<div class="documenticon">
			<img src="<?php echo get_template_directory_uri(); ?>/img/document.svg" width="70" height="auto">	
			<?php 	if (user_can( wp_get_current_user(), 'administrator' )) edit_post_link('edit'); ?>	
		</div>
				

			
		
		<div class="citation">
		
		<?php 
			$citation = get_field("citation");
			
			if ($citation) echo strip_specific_tags($citation,['p','span']); 
			else the_title();
		?>		
		</div>
		
		
</div>



