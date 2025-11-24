
<div class="single_header">
	<div class="header_container">
		<div>


			<h2><?php the_title() ?></h2>



			<div class="subtitle meta">

			</div>

		</div>
	</div>

	<div class="image_container landscape">
		<?php if (isset($the_image)) : ?>
			<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" 
				data-src="<?php echo $the_image['sizes'][$the_size]; ?>" 
				width="<?php echo $the_image['sizes'][$the_size.'-width']; ?>" 
				height="<?php echo $the_image['sizes'][$the_size.'-height']; ?>" 
				alt="<?php echo esc_attr(get_the_title()); ?>" />	</div>
		<?php endif; ?>
	</div>

</div>

		

<div class="main-content single">
	<div class="bodycopy">
	<?php the_content(); ?>	
	</div>

	<?php include(locate_template('section-childpages.php')); ?>
</div>
