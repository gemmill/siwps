<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="single_header">
	<div class="header_container">
	<h2 class="section">Events</h2>
	</div>


</div>



<div class="main-content">



	<?php // include(locate_template('section-events_upcoming.php')); ?>
  <?php include(locate_template('section-events_past.php')); ?>



	


</div>




<?php endwhile; endif; ?>


<?php get_footer(); ?>