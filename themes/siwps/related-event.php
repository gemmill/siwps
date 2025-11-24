
<?php 
$event_date = strtotime(get_field('event_date'));
$event_time = get_field('event_time'); 
$event_end_time = get_field('event_end_time');
$speakers = get_field('speakers'); 
$location = get_field('location'); 
$location_ = get_field('location_'); 
$the_image = get_field('image');  
$size =  "large";
$color_size = "large";
			
 ?>

<article id="post-<?php the_ID(); ?>" class="event list related">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
	<div class="the_date">
		<?php 
		$year = get_the_date('Y');
		$current_year = date('Y');
		if ($year == $current_year) {
			echo get_the_date('F d');
		} else {
			echo get_the_date('F d, Y');
		}
		?>
		</div>	
				
		
		<h2 class="entry-title">
		<?php echo util_breaker(":",get_the_title()); ?>
		</h2>
	
	</a>
</article>
