<?php 	
$images = array();

$the_image = get_field('image');  

if ($the_image) $images[] = $the_image;

$more_images = get_field('gallery');

if ($more_images) {

	foreach ($more_images as $more) $images[] = $more;
}

if ($images):
?>
<div class="slick large">
<?php 
$sizename = "hero";
if (count($images) > 1) $sizename = "gallery";
foreach($images as $i):
	
	
	if ($i["sizes"]["gallery"]):
		
		$the_image = $i["sizes"][$sizename];
		$the_image_width = $i["sizes"]["$sizename-width"];
		$the_image_height = $i["sizes"]["$sizename-height"];
		?>
		
		<?php if ($i['caption']): ?>
		<div class="slickchild" >
		<img data-lazy="<?php echo $the_image ?>" width="<?php echo $the_image_width ?>" height="<?php echo $the_image_height ?>" alt="<?php echo esc_attr($i['caption']) ?>">
		<div class="caption"><?php echo $i['caption'] ?></div>
		</div>
		<?php endif; ?>
		<?php 
	endif;
	
				
endforeach;

?>
</div>

<?php  else:  ?>
<div style="height:70px">
</div>
<?php endif; ?>
		
		
		