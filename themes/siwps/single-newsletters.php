


<section id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


<?php get_template_part('component','gallery'); ?>


<div class="title-header">
<h2 class="single"><?php the_title() ?></h2>


	<div class="sub-header event single">
		<span class="date">
		<?php echo date("F d, Y",strtotime(get_the_date( ))); ?> 
	</div>

</div>

		
		
<section class="entry-content">


<div class="main-content single">




<div class="item single">
	<?php the_content( ); ?>
</div>

</div>




</section>
</article>
<?php endwhile; endif; ?>
</section>
sdfsd
<?php get_footer(); ?>