<?php
	

	// Find connected pages
	$args = array(
	    'orderby' => 'DESC',
	    'post_type' => 'post',
	    'category_name' => 'news',
	    'posts_per_page' => 5,
	);
	
	$connected = new WP_Query( $args );
	
	// Display connected pages
	if ( $connected->have_posts() ) :
	?>
	
	
	<div class="items">
		
		<h4 class="section sidebar">Recent News</h4>
		
		
	<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
	
    <?php get_template_part( 'related', 'news' ); ?>
	
	
	
	<?php endwhile; ?>
	</div>
	
	<?php 
	// Prevent weirdness
	wp_reset_postdata();
	
	endif;
	

?>
