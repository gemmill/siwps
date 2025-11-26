<?php get_header(); ?>
<?php global $post; ?>
    
    



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


	
<?php if ( is_home() || is_front_page() ): ?>


<?php if (get_field("notice")): ?>
<div class="alert" aria-role="alert">

<?php echo get_field("notice") ?>

</div>

<?php endif; ?>


<?php include(locate_template('section-homehero.php')); ?>
<div class="main-content">
	<?php get_template_part( 'section', 'events_upcoming' ); ?>
	<?php get_template_part( 'section', 'news_home' ); ?>
</div>

				
<?php else: 
include(locate_template('page-page.php'));
endif ?>

	





<?php endwhile; endif; ?>


<?php get_footer(); ?>
