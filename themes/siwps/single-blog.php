<?php 
$the_image = wp_get_attachment_image_url(get_post_thumbnail_id(), 'gallery');
?>
<?php get_header(); ?>
<?php global $post; ?>
    

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

	<div class="image_container landscape">
		<div>
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  data-src="<?php echo $the_image ?>" style="width:100%; height:100%; object-fit:cover" >


		</div>
	</div>

</div>


		

  <div class="main-content single">



  <div class="item">

	<div class="bodycopy">


  		<?php the_content(); ?>	

		  <div class="disclaimer" style="font-style:italic; font-size:80%; margin-bottom:.5em; padding-bottom:.5em;">
		
		The views expressed in the Saltzman Student Blog “blog” represent the views and opinions of
	the authors, and are not necessarily the views or opinions of the Saltzman Institute of War and
	Peace Studies, its members or affiliates, “SIWPS.” The mere appearance of this blog on our
	website does not constitute an endorsement by SIWPS of such content. This blog is presented for
	informational and educational purposes only.
	</div>

		  
	</div>


  </div>

</div>


<div class="sub-content">




	
	<div class="items">
		
	




















<?php




  $people_text = 'People @ SIWPS';
	$rn = get_field('featured_people');
	if (empty($rn)){
  	 $people_text = 'Related People';
    $rn = get_field('related_people');  	
	}
	
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
		
		
		
			<h4 class="section sidebar"><a href="/people"><?php echo $people_text ?></a></h4>
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


	
		</div>
	
	
	
	



</div>




<?php endwhile; endif; ?>


<?php get_footer(); ?>
