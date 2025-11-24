<?php get_header(); ?>
<section id="content" role="main">


<div class="main-content">



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'item', get_the_category() ); ?>
<?php endwhile; endif; ?>

</div>




<div class="sub-content">
	
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
		
		<h2>Recent News</h2>
		
		
	<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
	
    <?php get_template_part( 'related', 'news' ); ?>
	
	
	
	<?php endwhile; ?>
	</div>
	
	<?php 
	// Prevent weirdness
	wp_reset_postdata();
	
	endif;
	

?>
</div>









</section>

<?php get_footer(); ?>

