<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="single_header">
	<div class="header_container">
	<h2 class="section">Blog</h2>
	</div>


</div>


<div class="main-content nosub">
<?php

$args = array(
    'post_type'      => 'blog',
    'posts_per_page' => -1,
    

 );


$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>

    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

	<? get_template_part('item','blog'); ?>
    <?php endwhile; ?>

<?php endif; wp_reset_postdata(); ?>


<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>