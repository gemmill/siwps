


<?php get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<div class="single_header">
	<div class="header_container">
		<div>
			<h2><?php the_title() ?></h2>
				
			<div class="position">
				<?php echo strip_tags(get_field('position')); ?>
			</div>
				

			<div class="meta subtitle">



				<div class="">
					
					<?php $email = get_field('email');  if ($email): ?>
					<div><a href="mailto:<?php echo strip_tags($email); ?>"><?php echo strip_tags($email); ?></a></div>
					<?php endif; ?>
					


					
					<?php $phone = get_field('phone');  if ($phone): ?>
					<div><?php echo format_phone_string($phone); ?></div>
					<?php endif; ?>


					<?php $address = get_field('address');  if ($address): ?>
					<div style=""><?php echo strip_tags($address); ?></div>
					<?php endif; ?>

				</div>
		


			</div>


		</div>
	</div>

	<div class="image_container">
		<div>
		<?php 
		$the_image = get_field('image'); 
		if ($the_image['sizes']['gallery']):
		?>
		
			
		<?php
			$alt_text = !empty($the_image['title']) ? $the_image['title'] : get_the_title();
		?>
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src="<?php echo $the_image['sizes']['gallery'] ?>" width="<?php echo $the_image['sizes']['medium-width'] ?>" height="<?php echo $the_image['sizes']['medium-height'] ?>" alt="<?php echo esc_attr($alt_text); ?>">
		<?php endif; ?>

		</div>
	</div>

</div>





			

	
	
	
	
		

		<div class="main-content single">
		


					


			<div class="bodycopy">		
			<?php the_content( ); ?>
			</div>
				
				
				
			
			<?php // Find connected pubs
			
			$re = get_field('selected_publications');
			

		
		
		$sections = array(
			
			'Books' => 'Book',
			'Principal Articles' => 'Journal Articles',
			'Book Chapters' => 'Book Chapter',
			'Other Articles, Testimony and Reports' => 'Other Articles'
		);
		
		
		 foreach ($sections as $k => $v): 
		
			$args = array(
				'post_type' => 'publications',
				'post__in' => $re,
				'posts_per_page' => 5000,
				'meta_query' => array(
		        	'relation' => 'AND',
					'type_clause' => array(
		           		'key' => 'publication_type',
				   		'value' => $v,
				   	),
				   	'date_clause' => array(
		            	'key' => 'date_published',
						'compare' => 'EXISTS',
					), 
				),
				'orderby' => array(
					'date_clause' => 'DESC'
				)
			);
			
		
			$connected = new WP_Query( $args );
			if (!empty($re)):
				$connected = new WP_Query( $args );
				
				// Display connected pages
				if ( $connected->have_posts() ) :
				?>
				
				
				
					<h4 class="section" style="clear:none; padding-left:0"><?php echo $k ?></h4>
					<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				    <?php get_template_part( 'component', 'citation' ); ?>
					<?php endwhile; ?>
				
				
				<?php 
				// Prevent weirdness
				wp_reset_postdata();
				endif;
			endif;
			
		
		endforeach;	





			$args = array(
				'post_type' => 'publications',
				'post__in' => $re,
				'posts_per_page' => 5000,
				'meta_query' => array(
		        	'relation' => 'AND',
					'clause1' => array(
		           		'key' => 'publication_type',
				   		'value' => 'Book',
				   		'compare' => 'NOT LIKE'
				   	),
				   	'clause2' => array(
		           		'key' => 'publication_type',
				   		'value' => 'Book Chapter',
				   		'compare' => 'NOT LIKE'
				   	),
				   	'clause3' => array(
		           		'key' => 'publication_type',
				   		'value' => 'Journal Articles',
				   		'compare' => 'NOT LIKE'
				   	),
				   	'clause4' => array(
		           		'key' => 'publication_type',
				   		'value' => 'Other Articles',
				   		'compare' => 'NOT LIKE'
				   	),
				   	'date_clause' => array(
		            	'key' => 'date_published',
						'compare' => 'EXISTS',
					), 
				),
				'orderby' => array(
					'date_clause' => 'DESC'
				)
			);
			
		
			$connected = new WP_Query( $args );
			if (!empty($re)):
				$connected = new WP_Query( $args );
				
				// Display connected pages
				if ( $connected->have_posts() ) :
				?>
				
				
				
					<h4 class="section" style="clear:none;">Other Publications</h4>
					<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
				    <?php get_template_part( 'component', 'citation' ); ?>
					<?php endwhile; ?>
				
				
				<?php 
				// Prevent weirdness
				wp_reset_postdata();
				endif;
			endif;



		
		?>		
				

		</div>
		



		
		<div class="sub-content">
			
				
			<?php // Find connected pages
				
			$rn = get_field('related_news');
			
			$args = array(
				'post_type' => array( 'post' ),
				'orderby' => 'post__in',
				'post__in' => $rn,
				'posts_per_page' => 3,
			);
			
			
			if ($rn):
				$connected = new WP_Query( $args );
				
				// Display connected pages
				if ( $connected->have_posts() ) :
				?>
					
					<div class="items">
						<h4 class="section sidebar">Recent News</h4>
						
						
						<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
						<?php get_template_part( 'related', 'news' ); ?>
						<?php endwhile; ?>
					</div>
					
					
				<?php 
				// Prevent weirdness
				wp_reset_postdata();
				endif;
			endif;
			
			?>
			
			<?php // Find connected people
				
			$re = get_field('related_events');
			$args = array(
				'post_type' => array( 'events' ),
				'orderby' => 'post__in',
				'post__in' => $re,
				'posts_per_page' => 2,
			
			);
			
			
			if (!empty($re)):
				$connected = new WP_Query( $args );
				
				// Display connected pages
				if ( $connected->have_posts() ) :
				?>
				
				
				<div class="items">
					<h4 class="section sidebar">Related Events</h4>
					<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
					<?php get_template_part( 'related', 'event' ); ?>
					<?php endwhile; ?>
				</div>
				
				<?php 
				// Prevent weirdness
				wp_reset_postdata();
				endif;
			endif;
				
			
			?>

		
		
			
		</div>
		
		

	<?php endwhile; endif; ?>

<?php get_footer(); ?>