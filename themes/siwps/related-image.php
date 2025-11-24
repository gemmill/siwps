<?php 
$has_image = false;
$the_image = get_field('image');
    
    
if ($the_image['sizes']['headshot']): ?>
<div class="thumb">



<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  data-src="<?php echo $the_image['sizes']['headshot'] ?>" width="<?php echo $the_image['sizes']['trans_regular_small-width'] ?>"  height="<?php echo $the_image['sizes']['trans_regular_small-height'] ?>" style="background:#75abda;" class="">
</a>
</div>
<?php  endif; ?>




			
			
