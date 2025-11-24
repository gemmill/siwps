<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


		

<div class="single_header">
	<div class="header_container">
	<h2 class="section">Publications</h2>
	</div>


</div>





<div class="featuredpublications" style="width:100%;">
	<h4 class="section">Featured Publications</h4>
	<div style="margin-top:2em;">
	<?php // Find connected books		
		$re = get_field('featured_publications');
		$args = array(
			'post_type' => array( 'publications' ),
			'orderby' => 'post__in',
			'post__in' => $re,
			'posts_per_page' => 6,
		);
		
		
		if (!empty($re)):
			$connected = new WP_Query( $args );
			
			// Display connected pages
			if ( $connected->have_posts() ) :
			?>
			
			
			
				<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				
				
				<?php get_template_part( 'item', 'featuredpublication' ); ?>
				
				
				<?php endwhile; ?>
			
			
			<?php 
			// Prevent weirdness
			wp_reset_postdata();
			endif;
		endif;
	?>
	</div>
</div>












<?php 
	
	// Find connected pages
	$args = array(
		'post_type' => 'people',
		'posts_per_page' => 500,
		'meta_query' => array(
			'relation' => 'AND',
			'haspublications_clause' => array(
           		'key' => 'selected_publications',
		   		'compare' => 'EXISTS',
		   	),
		   	'lastname_clause' => array(
            	'key' => 'last_first',
				'compare' => 'EXISTS',
			), 

		),
		'orderby' => array(
			'lastname_clause' => 'ASC'
		)
	);
	
	$connected = new WP_Query( $args );
	
	// Display connected pages
	if ( $connected->have_posts() ) :
	?>
	
	<div class="authors">
	<h4 class="section">PUBLICATIONS BY AUTHOR</h4>
	<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
	
	
	<?php  if (get_field('selected_publications') && !get_field('hide')) get_template_part( 'item', 'personpublication' ); ?>
	
	<?php endwhile; ?>
	</div>
	
	<?php 
	// Prevent weirdness
	wp_reset_postdata();
	endif;
?>

<?php endwhile; endif; ?>


<?php get_footer(); ?>
