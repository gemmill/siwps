<?php 


function convertYoutube($string) {
	return preg_replace(
		"/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
		"<iframe width=\"100%\" height=\"auto\" src=\"//www.youtube.com/embed/$2\" allowfullscreen style=\"position:absolute; top:0; left:0; width:100%; height:100%; \"></iframe>",
		$string
	);
}


 get_header(); 
 
 ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php 
$the_image = get_field('image');  
$the_size = "gallery";

$speakers = get_field('speakers'); 
$speakerlabel= (strpos($speakers,",") > 0) ? "Speakers:" : "Speaker:";

$location = get_field('location'); 

$location_ = get_field('location_'); 
$time = get_field('event_time'); 
$end_time = get_field('event_end_time');

$event_date = strtotime(get_field('event_date'));	
?>




<div class="single_header event">
	<div class="header_container">
		<div>


			<h2><?php the_title() ?></h2>


			<?php if ($speakers ): ?>
				<div class="" style="">
					<div class="speakers">
						<?php echo $speakerlabel.' '.$speakers; ?>
					</div>
				</div>
			<?php endif; ?>	


			<div class="subtitle meta">
				<div class="date the_date header">
						<?php  echo date("l F d, Y",$event_date ); ?>

						<?php  if ($time) echo ", " . $time; ?>
						<?php if ($end_time) echo " – " . $end_time; ?>

					</div>


					<?php 
						$registration_link = get_field('register_link');
						if ($registration_link):
						?>
						<div class="date the_date header" style="background:#278cc0;" >
							<a href="<?= $registration_link ?>" style="text-decoration:none; color:#fff; ">Click to Register</a>
						</div>
						<?php endif; ?>



					<?php if ($location || $location_ ): ?>
						<div class="location ">
						<?php 
							if ($location) echo $location; 
							elseif ($location_ ) echo $location_; 
						?>			
						</div>


					<?php endif; ?>
				</div>

		</div>
	</div>

	<div class="image_container">
		<div>
		<img 
			src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
			data-src="<?php echo $the_image['sizes'][$the_size] ?>"
			width="<?php echo $the_image['sizes'][$the_size.'-width'] ?>"
			height="<?php echo $the_image['sizes'][$the_size.'-height'] ?>"
			alt="<?php echo !empty($the_image['title']) ? esc_attr($the_image['title']) : esc_attr(get_the_title()); ?>"
		>


		</div>
	</div>

</div>



	
		

	<div class="main-content single">

			
	<?php 
						$video_link = get_field('video_link');
						if ($video_link):
						?>
						<div class="video" style="padding-bottom: 56.25%; position:relative;">

						<?php echo convertYoutube($video_link); ?>
						</div>
						<?php endif; ?>



		<div class="bodycopy">
		<?php the_content( ); ?>
		</div>
	</div>


<div class="sub-content">
	<div class="items">
	<?php // Find connected people
		
	$rn = get_field('related_people');
	
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
	

	</div>
</div>




<?php endwhile; endif; ?>

<?php get_footer(); ?>