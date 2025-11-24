<?php  $the_image = get_field('image'); 
$event_date = strtotime(get_field('event_date'));
?>
<?php $width = ($the_image['sizes']['trans_regular_small']) ? '69%' : '100%'; ?>

<!-- 2 Column Images - text left -->
<div>
					  <a href="<?php the_permalink(); ?>" style="text-decoration: none; font-size: 16px; color: #222; font-weight: bold; font-family:Arial, sans-serif ">
					  
					  
					  
					  <?php the_title(); ?></a><br/>
					  
					
					  
					  
					  <div style="font-size: 15px; color: #222222; font-weight: normal; text-align: left; font-family: Georgia, Times, serif; line-height: 24px; vertical-align: top; padding:0px 8px0px"> 
						  
					 
                            <p style="mso-table-lspace:0;mso-table-rspace:0; margin:0">
                                <?php the_excerpt(); ?>
                      
                            </p>
						   </div>
                  </div><!-- End 2 Column Images  - text left -->
