<?php get_header(); ?>
<section id="content" role="main">


<div class="main-content">



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'item', get_post_type( ) ); ?>
<?php endwhile; endif; ?>

</div>




<div class="sub-content">

yeah
	
</div>









</section>

<?php get_footer(); ?>

