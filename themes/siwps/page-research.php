<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="single_header">
	<div class="header_container">
	<h2 class="section publications">Research</h2>
	</div>


</div>


<div class="main-content nosub">
<?php

$args = array(
    'post_type'      => 'research',
    'posts_per_page' => -1,
    'post_parent'    => 0,
    'order'          => 'ASC',
    'orderby'        => 'menu_order',
  'meta_query' => array(
       'relation' => 'OR',
    array(
        'key'     => 'archived',
        'value'   => 0,
        'compare' => '='
    ),
    array(
        'key'     => 'archived',
        'compare' => 'NOT EXISTS',
    ),    )
 );


$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>

    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

	<? get_template_part('item','pages'); ?>
    <?php endwhile; ?>

<?php endif; wp_reset_postdata(); ?>


<?php endwhile; endif; ?>

</div>
<div class="archivelink" >
    <a href="/research-archive">Archived Research</a>

</div>
<?php get_footer(); ?>