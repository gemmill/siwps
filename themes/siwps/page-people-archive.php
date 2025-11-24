<?php get_header(); ?>




<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="single_header">
	<div class="header_container">
	<h2 class="section ">People</h2>
	</div>


</div>

		
<?php 

$sections = array(
	'Administration' => 'Administration',
	'Faculty and Resident Members' => 'Faculty and Resident Members',
	'Members and Affiliates' => 'Members and Affiliates',
	'Visiting Scholars' => 'Visiting Scholar',
	'Staff' => 'Staff'
);	
	
?>
		

		
<div class="people">

<?php foreach ($sections as $k => $v): ?>
<div class="personrow">
<h4 class="section people"><?php echo $k ?></h4>
<?php 
	

	// Find connected pages
	$args = array(
		'post_type' => 'people',
		'posts_per_page' => 500,
		'meta_query' => array(
        	'relation' => 'AND',
			'type_clause' => array(
           		'key' => 'type',
		   		'value' => $v,
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
	
	<div>
	<?php while ( $connected->have_posts() ) : $connected->the_post(); 
  	
  	$hide = get_field('hide');

	?>
	<?php if (!$hide) get_template_part( 'item', 'person' ); ?>
	<?php endwhile; ?>
	</div>
	
	<?php 
	// Prevent weirdness
	wp_reset_postdata();
	endif;
?>
</div>
<?php endforeach; ?>



</div>

<?php endwhile; endif; ?>


<?php get_footer(); ?>