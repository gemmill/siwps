
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

<?php
		$alt_text = '';
		if (!empty($the_image['title'])) {
			$alt_text = $the_image['title'];
		} elseif (!empty($the_image['caption'])) {
			$alt_text = $the_image['caption'];
		} else {
			$alt_text = get_the_title();
		}
?>
<article id="post-<?php the_ID(); ?>" class="event list">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
		<div class="thumb">
		

	?>
	<img 
		src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
		data-src="<?php echo $the_image['sizes'][$color_size] ?>" 
		width="<?php echo $the_image['sizes'][$color_size.'-width'] ?>"  
		height="<?php echo $the_image['sizes'][$color_size.'-height'] ?>" 
		alt="<?php echo esc_attr($alt_text); ?>"
	>

			<div class="datebox">
				<div class="the_date">
					<?php  
						echo date("l F d",$event_date );  //, Y
						if (date("Y", $event_date) !== date("Y")) echo " ".date("Y", $event_date)
					?>
				</div>	
				
				<!--
				<?php if ($location): ?>
				<div class="location"><?php echo $location ?></div>
				<?php elseif($location_): ?> 
				<div class="location"><?php echo $location_ ?></div>
				<?endif; ?>
				-->
			</div>
		
		
		</div>
	
		
		
		<h2 class="entry-title">
		<?php echo util_breaker(":",get_the_title()); ?>
		</h2>
			
		
	</a>
</article>
