<?php get_header(); ?>



<div class="single_header">
	<div class="header_container">
		<div>


			<h2>Search</h2>




		</div>
	</div>


</div>

<div class="main-content">

<?php if ( have_posts() ) : ?>
<h4 class="section">Items matching "<?php echo get_search_query(); ?>"</h4>
<div class="search_results">

<?php while ( have_posts() ) : the_post(); ?>
	
	<?php $post_type = get_post_type(); ?>

	<?php if ($post_type == "post") get_template_part( 'item', 'news' ); ?>
	<?php if ($post_type == "publications") get_template_part( 'item', 'publications' ); ?>
	<?php if ($post_type == "people") get_template_part( 'item', 'person' ); ?>
	<?php if ($post_type == "events") get_template_part( 'item', 'events' ); ?>
	
<?php endwhile; ?>
	
</div>






<?php endif; ?>	





</div>



<?php get_footer(); ?>