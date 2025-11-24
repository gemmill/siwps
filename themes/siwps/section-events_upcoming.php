 <section class="events upcoming">
 <?php if (!isset($_GET["pp"])):?>

	
	
    <?php
	  $events_total = 0;
	  	
	  $meta_query =  array(
		  'key' => 'event_date',
		  'value' => date("Ymd"),
		  'compare' => '>='
		
	  );
    // Find connected pages
	// Find connected pages
	$args = array(
		'orderby' => 'meta_value_num event_date',
		'order' => 'ASC',
	  'post_type' => 'events',
		'posts_per_page' => 4,
		
		 'meta_key' => 'event_date',
		 'meta_query' => $meta_query
);
    	
    $connected = new WP_Query( $args );
	
	$events_total =  $connected->found_posts;

    ?>

    
	<? if ( $connected->have_posts() ) : ?>
	


		  <h4 class="section">SIWPS Events</h4>
		  <div class="events_home">
			
			
			<?php 

			if ($events_total >= 0):
				while ( $connected->have_posts() ) : $connected->the_post(); 
				
				get_template_part( 'item', 'events' ); 
				endwhile; 

				wp_reset_postdata();
			else:
				//wp_reset_postdata();
			
				$meta_query = array(
					array(
						'key' => 'event_date',
						'value' => date("Ymd"),
						
						'compare' => '>='
					)
				);
				// Find connected pages
				$args = array(
					'post_type' => 'events',
					'posts_per_page' => 4,
					'order' => 'ASC',
					'orderby' => 'meta_value_num event_date',
					'meta_key' => 'event_date',
					// 'meta_query' => $meta_query
				);
					
				$connected = new WP_Query( $args );

				$array_rev = array_reverse($connected->posts);
				//reassign the reversed posts array to the $home_shows object
				$connected->posts = $array_rev;
				while ( $connected->have_posts() ) : $connected->the_post(); 
					get_template_part( 'item', 'events' ); 
				endwhile; 

				wp_reset_postdata();
	
			
			endif;




			?>



		



			</div>
		
		
    <?php endif; ?>


	<?php   ?>	
<?php endif; ?>
</section>