
<?php
	
	$pp = $_GET['pp'];
	settype($pp,"int");
	
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

			/*'orderby' => 'meta_value_num ID',*/
		  'post_type' => 'post',
			'posts_per_page' => $ppp,
	    'category_name' => 'news',
		   'offset' => $pp * $ppp,
			'order' => 'DESC',
			/*'meta_key' => 'event_date',
			'meta_query' => $meta_query*/
	);
		
	$connected = new WP_Query( $args );
	
	// Display connected pages
	if ( $connected->have_posts() ) :
	?>
	
	<h4 class="section">RECENT NEWS</h4>
    <div class="news_home">
        <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
            <?php get_template_part( 'item', 'news' ); ?>
        <?php endwhile; ?>
    </div>


<?php
	endif;

?>



<!-- pagination has path -->

<?php 

$total_pages = $connected->max_num_pages;
if ($total_pages > 1){

	if ($pp < $total_pages):
		?><!-- <a class="pagination__next" href="/news?pp=<?php echo $pp + 1 ?>">More News</a>--><?php
	endif;       
}

// Prevent weirdness
wp_reset_postdata();
?>


