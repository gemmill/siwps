<?php 
	$link = "/publications";
	$author = get_field('person');
	if ($author):
		if ($author[0] != 1784) $link = get_the_permalink( $author[0] ) . "#publications";
	endif;
	
?>


<article id="post-<?php the_ID(); ?>" class="publication list">
<a href="<?php echo $link; ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
		<div class="documenticon">
			<img src="<?php echo get_template_directory_uri(); ?>/img/document.svg" width="70" height="auto"  role="presentation" aria-hidden="true" alt="">		
		</div>
		
			
		
		<div class="citation">
			
		<?php 
			$citation = get_field("citation");
			if (is_search()) $citation = strip_specific_tags($citation,"a");
			if ($citation) echo $citation; 
			else the_title();
		?>		
			
		</div>
		</a>
</article>
