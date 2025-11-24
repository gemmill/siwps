<?php 
$gallery = get_field('gallery');
$the_image = !empty($gallery) ? $gallery[0] : null;
$the_size = "large";
?>
<?php get_header(); ?>
<?php global $post; ?>
    
    

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>




    
   

<div class="single_header">
	<div class="header_container">
		<div>


			<h2><?php the_title() ?></h2>

			<div class="subtitle meta">
			<?php global $post;

			$parent_id= wp_get_post_parent_id( $post->ID );
			if ($parent_id) echo '<a href="'.get_permalink($post->post_parent).'">'.get_the_title($parent_id ).'</a>';
?>
			</div>
		</div>
	</div>

	<div class="image_container landscape">
		<div>
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $the_image['sizes'][$the_size] ?>" width="<?php echo $the_image['sizes'][$the_size.'-width'] ?>" height="<?php echo $the_image['sizes'][$the_size.'-height'] ?>" alt="<?php echo esc_attr(get_the_title()); ?>">


		</div>
	</div>

</div>













		
  <div class="main-content single">



  <div class="bodycopy">
  <?php the_content(); ?>	
  </div>







<?php
// we query for specific pages rather than all sub pages, so some can be excluded.
$blog = $post->post_name === 'saltzman-student-scholars-blog';
$args = array(
    'post_type'      => $blog ? 'blog' : 'programs',
    'posts_per_page' => -1,
    'post_parent'    => $blog ? 0 : $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );



$parent = new WP_Query( $args );


if ( $parent->have_posts() ) : ?>

<h4 class="section sidebar"><?php echo $blog ? 'LATEST BLOGS' : 'MORE INFORMATION' ?></h4>
<div class="subpages">
    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

       <? get_template_part('item','pages'); ?>
       
    <?php endwhile; ?>

	</div>



<?php endif; wp_reset_postdata(); ?>





<?php
  
$deliverables = get_field('deliverables');   ?>

<?php if ($deliverables): ?>

 <h4  class="section sidebar">Deliverables</h4>
<?php   foreach($deliverables as $d): ?>


<div class="deliverables">
   <?php if ($d['file']): ?>
   <a class="dl" href="<?php echo $d['file']; ?>"><?php echo $d['title']; ?></a>
   <?php elseif ($d['link']): ?>
   <a  class="ln" href="<?php echo $d['link']; ?>"><?php echo $d['title']; ?></a>
   <?php else: ?>
  <h5><?php echo $d['title']; ?></h5>
  <?php endif; ?>
  
   <?php if ($d['summary']): ?>
  <p><?php echo $d['summary']; ?> </p>
  <?php endif; ?>

  <?php if ($d['file']): ?><a href="<?php echo $d['file']; ?>"></a><?php endif; ?>
 
</div>

<?php
  endforeach;
endif;
  
?>





	


</div>


<div class="sub-content">




	
	<div class="items">
		
	




		<?php // Find connected pubs
		
	$rn = get_field('featured_publications');
	$args = array(
	    'post_type' => array( 'publications' ),
	    'orderby' => 'post__in',
	    'post__in' => $rn
	);
	
	
	if (!empty($rn)):
		$connected = new WP_Query( $args );
		
		// Display connected pages
		if ( $connected->have_posts() ) :
		?>
		
		
		
			<a href="/publications"><h4 class="section">Recent Publications</h4></a>
			
			<div class="featured_book">			
  			<a href="/publications">
			<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>


      	

	<?php
			

		$images = get_field('cover_image');
		$foundImage = false;
		$authorID = get_field('person');
		$authorName = get_the_title($authorID[0]);
		
		
		if ($images["sizes"]):
			
				
				
					$foundImage = true;
					
					$the_image = $images["sizes"]["large"];
					$the_image_width = $images["sizes"]["thumbnail-width"];
					$the_image_height = $images["sizes"]["thumbnail-height"];
					?>
					
									<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  data-src="<?php echo $the_image?>" width="<?php echo $the_image_width ?>" height="<?php echo  $the_image_height ?>">
					

					
					
								
									
		<?php else: ?>
		
		
		<img src="<?php echo get_template_directory_uri(); ?>/img/document.svg" width="70" height="auto">	
		
		
		

		
		
		<?php endif; ?>

    
		<h4><?php the_title(); ?></h4>
		<?php echo $authorName; ?>





			<?php endwhile; ?>
  			</a>
		</div>
		<?php 
		// Prevent weirdness
		wp_reset_postdata();
		endif;
	endif;
		
?>








<?php // Find connected people
			
		$re = get_field('related_events');
		$args = array(
		    'post_type' => array( 'events' ),
		    'orderby' => 'post__in',
		    'post__in' => $re,
		    'posts_per_page' => 4,
		   
		);
		
		
		if (!empty($re)):
			$connected = new WP_Query( $args );
			
			// Display connected pages
			if ( $connected->have_posts() ) :
			?>
			
			
			
				<h4 class="section sidebar">Related Events</h4>
				<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
			    <?php get_template_part( 'related', 'event' ); ?>
				<?php endwhile; ?>
			
			
			<?php 
			// Prevent weirdness
			wp_reset_postdata();
			endif;
		endif;
			
		
		?>










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
