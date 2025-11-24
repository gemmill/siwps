
<?php 
	
	
	$images = get_field('gallery');
	$foundImage = false;
	
	if ($images):
		foreach($images as $i):
			
			
			if ($i["sizes"]["hero"] && !$foundImage):
				$foundImage = true;
				
				$the_image = $i["sizes"]["hero"];
				$the_image_width = $i["sizes"]["hero-width"];
				$the_image_height = $i["sizes"]["hero-height"];
				?>
				
				<div class="hero">
				<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"  data-src="<?php echo $the_image?>" width="<?php echo $the_image_width ?>" height="<?php echo  $the_image_height ?>">
				</div>
				
				<?php 
					
				
			endif;
			
						
		endforeach;
	else:
	?>
				<div class="hero" style=" padding-bottom:10px;">
				
				</div>
	<?php
	endif;
?>

		
		