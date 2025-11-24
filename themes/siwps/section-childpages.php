		<?php $cp = get_field('child_pages'); ?>

					<?php if ($cp): ?>
						<h4 class="section">MORE INFORMATION</h4>
						<div class="subpages">


						<?php
						// we query for specific pages rather than all sub pages, so some can be excluded.

						$args = array(
							'post_type' => array( 'page' ),
							'orderby' => 'post__in',
							'post__in' => $cp
						);



						$parent = new WP_Query( $args );

						if ( $parent->have_posts() ) :
							while ( $parent->have_posts() ) : $parent->the_post(); 
								get_template_part('item','pages');
							endwhile; 
						
						endif; 
						wp_reset_postdata(); 
						?>


					</div>


				<?php endif; ?>