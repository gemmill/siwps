<?php
$the_image = get_field('image');  
$the_size = "gallery";

?>


<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>





<div class="single_header">
	<div class="header_container">
		<div>


			<h2><?php the_title() ?></h2>



			<div class="subtitle meta">
					<div class="date the_date header">
						<?php  the_date("l F d, Y" ); ?>
					</div>
			</div>

		</div>
	</div>

	<div class="image_container">
		<div>
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  data-src="<?php echo $the_image['sizes'][$the_size] ?>" width="<?php echo $the_image['sizes'][$the_size.'-width'] ?>"  height="<?php echo $the_image['sizes'][$the_size.'-height'] ?>" >


		</div>
	</div>

</div>


<div class="main-content single">
	<div class="item single">
		<div class="bodycopy">
		<?php the_content( ); ?>
		</div>
	</div>
</div>


<div class="sub-content">
	<div class="items">
<?php // Find connected people
		
	$rn = get_field('people');
	
	$args = array(
	    'post_type' => array( 'people' ),
	    'orderby' => 'post__in',
	    'post__in' => $rn
	);
	
	
	if (!empty($rn)):
		$connected = new WP_Query( $args );
		
		// Display connected pages
		if ( $connected->have_posts() ) :
		?>
		
		
		
			<h4 class="section sidebar">Related People</h4>
			<?php while ( $connected->have_posts() ) : $connected->the_post(); 
			$hide = get_field('hide');
			?>
		    <?php if (!$hide) get_template_part( 'related', 'person' ); ?>
			<?php endwhile; ?>
		
		
		<?php 
		// Prevent weirdness
		wp_reset_postdata();
		endif;
	endif;
		
	
	?>	
	<?php // Find connected pages
		

	
	 $args = array(
	    'orderby' => 'DESC',
	    'post_type' => 'post',
	    'category_name' => 'news',
	    'posts_per_page' => 3,
	);
	
	
	
	$connected = new WP_Query( $args );
	
	// Display connected pages
	if ( $connected->have_posts() ) :
	?>
		
		
		
			
			
			<h4 class="section sidebar">Recent News</h4>
			
			
			<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
			<?php get_template_part( 'related', 'news' ); ?>
			<?php endwhile; ?>
			
		
		
	<?php 
	// Prevent weirdness
	wp_reset_postdata();
	endif;
		
	
	?>
	</div>
</div>




<?php endwhile; endif; ?>


<?php get_footer(); ?>