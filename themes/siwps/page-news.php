<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="single_header">
	<div class="header_container">
	<h2 class="section">News Archive</h2>
	</div>


</div>

<div class="main-content">



<?php
	
	$pp = $_GET['pp'];
	settype($pp,"int");
	
	$ppp = 24;
	
	
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
	
	<div class="clearfix" style="padding-top:1em">
	<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
	
	<?php get_template_part( 'item', 'news' ); ?>
	<?php endwhile; ?>
	</div>


<!-- pagination has path -->
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
wp_reset_postdata();
	endif;

?>




	


</div>





<?php endwhile; endif; ?>

<?php get_footer(); ?>
