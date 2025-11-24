<?php  
$the_image = get_field('image'); 
$event_date = strtotime(get_field('event_date'));
$time = get_field('event_time'); 
$end_time = get_field('event_end_time'); 
?>
<?php $width = ($the_image['sizes']['trans_regular_small']) ? '69%' : '100%'; ?>


<!-- 2 Column Images & Text Side by SIde -->
<table width="580" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth" bgcolor="#ffffff" style="margin:0 auto;">


    <tr>
        <td style="padding:10px 0">

          <table>
              <tr>
                 
                  <td valign="top" style="padding:10px 10px 10px 0" width="200">
					  
					  <a href="<?php the_permalink() ?>">
					  	<img src="<?php echo $the_image['sizes']['gallery'] ?>"  style="max-width:100%; width:100%; height:auto" width="100%" height="auto">

					  </a>
				  </td>
				  <td valign="top" style="padding:10px 10px 10px 0" width="380">
					  <a href="<?php the_permalink(); ?>" style="text-decoration: none; font-size: 16px; color: #222; font-weight: bold; font-family:Arial, sans-serif ">
					  
					  
					  
					  <?php the_title(); ?></a><br/>
					  
					  <?php if ($event_date): ?>
					  <span style="color:#278cc0; text-decoration: none; font-size: 16px;  font-weight: bold; font-family:Arial, sans-serif ">
					  	<?php  
						
						echo date("l F d",$event_date );  //, Y
						if (date("Y", $event_date) !== date("Y")) echo " ".date("Y", $event_date);
					  if ($time) echo ", " . $time; ?>
						<?php if ($end_time) echo " – " . $end_time; ?>
					
					</span>
					  <?php endif; ?>
					  
					  
					  <div style="font-size: 15px; color: #222222; font-weight: normal; text-align: left; font-family: Georgia, Times, serif; line-height: 24px; vertical-align: top; padding:0px 8px 10px 0px"> 
						  
					 
                            <p style="mso-table-lspace:0;mso-table-rspace:0; margin:0">
                                <?php the_excerpt(); ?>
                          
                            </p>
						   </div>



						   <div >

						   <?php 


						$registration_link = get_field('register_link');
						if ( $registration_link):
						?>
					
							<a href="<?= $registration_link ?>" style="text-decoration: none; font-size: 16px; color:#fff; background:#278cc0; font-weight: bold; font-family:Arial, sans-serif; padding:5px 10px; border-radius:3px; ">Register</a>
						
						<?php endif; ?>



						<?php 


$video_link = get_field('video_link');
if ( $video_link):
?>

	<a href="<?= $video_link ?>" style="text-decoration: none; font-size: 16px; color:#fff; background:#278cc0; font-weight: bold; font-family:Arial, sans-serif; padding:5px 10px; border-radius:3px; ">Watch Video</a>

<?php endif; ?>
</div>
                  </td>
              </tr>
          </table>
                
                
                
                
              
        </td>
    </tr>
	    <tr>
        <td bgcolor="#278cc0"><div style="height:2px">&nbsp;</div></td>
    </tr>

</table><!-- End 2 Column Images & Text Side by SIde -->



