<?php



  // set the page	
	$pp = isset($_GET['pp']) ? intval($_GET['pp']) : 0;
	settype($pp,"int");
	if ($pp > 0) $pp = $pp-1;
	
	// posts per page
	$ppp = 12;
	
	
	$meta_query = array(
		array(
			'key' => 'event_date',
			'value' => date("Ymd"),
			'type' => 'NUMERIC',
			'compare' => '<',

		)
	);
	// Find connected pages
	$args = array(
			'orderby' => 'meta_value_num event_date',
		  'post_type' => 'events',
			'posts_per_page' => $ppp,
			'offset' => ($pp  * $ppp), //  + (4 - $events_total),
			'order' => 'DESC',
						'posts_per_page' =>$ppp,
			 'meta_key' => 'event_date',
			// 'meta_query' => $meta_query
	);

	$connected = new WP_Query( $args );
	
	// Display connected pages
	if ( $connected->have_posts() ) :
	?>


	<div class="clearfix" style="padding-top:1em">

	<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
	   
	<?php get_template_part( 'item', 'events' ); ?>
	<?php endwhile; ?>
	</div>


<!-- pagination has path -->
<div class="pager">
	<?php 

	$total_pages = $connected->max_num_pages;
	if ($total_pages > 1){
        $page = max(1, $_GET['pp']);
		
		echo "Page " . $page." of ".$total_pages;

        if ($page < $total_pages):
        	?><a class="pagination__next" href="?pp=<?php echo $page + 1 ?>">Older</a><?php
        endif;       
        
        if ($page > 1):
        	?><a href="?pp=<?php echo $page - 1 ?>" class="pagination__prev" >Newer</a><?php
        endif;
    }
	
	
?>
</div>
<?php
// Prevent weirdness
wp_reset_postdata();
	endif;

?>


