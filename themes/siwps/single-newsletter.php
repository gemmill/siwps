<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php wp_head(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<style type="text/css">
	.ReadMsgBody {width: 100%; background-color: #ffffff;}
	.ExternalClass {width: 100%; background-color: #ffffff;}
	body	 {width: 100%; background-color: #ffffff; margin:0; padding:0; -webkit-font-smoothing: antialiased;font-family: Georgia, Times, serif}
	table {border-collapse: collapse;}

	@media only screen and (max-width: 640px)  {
					.deviceWidth {width:440px!important; padding:0;}
					.center {text-align: center!important;}
			}

	@media only screen and (max-width: 479px) {
					.deviceWidth {width:280px!important; padding:0;}
					.center {text-align: center!important;}
			}

</style>

</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="font-family: Georgia, Times, serif">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- Wrapper -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td width="100%" valign="top" bgcolor="#ffffff" style="padding-top:20px">

			<!-- Start Header-->
			<table width="580" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth" style="margin:0 auto;">
				<tr>
					<td width="100%" bgcolor="#ffffff">

                            <!-- Logo -->
                            <table border="0" cellpadding="0" cellspacing="0" align="left" class="deviceWidth">
                                <tr>
                                    <td style="padding:10px 20px" class="center">
                                        <a href="#"><img src="http://www.siwps.org/wp-content/themes/siwps/img/logo.png" alt="" border="0" style="max-width:100%; height:auto;" /></a>
                                    </td>
                                </tr>
                            </table><!-- End Logo -->

					</td>
				</tr>
			</table><!-- End Header -->

			<!-- One Column -->
			<?php if (get_the_content()): ?>
			<table width="580"  class="deviceWidth" border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#d4d3c1" style="margin:0 auto;">

                <tr>
                    <td style="font-size: 15px; color: #222222; font-weight: bold; text-align: left; font-family: Arial, sans-serif; line-height: 19px; vertical-align: top; padding:12px 22px; " bgcolor="#d4d3c1">


                      <?php the_content(); ?>
                    </td>
                </tr>
			</table><!-- End One Column -->
			<?php endif; ?>


	
			



			<table width="580" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth" bgcolor="#ffffff" style="margin:0 auto;">

			<tr>
		<td style="padding:10px 0">


<?php // Find connected pages
		
	$rn = get_field('news');
	
	$args = array(
	    'post_type' => array( 'post' ),
	    'orderby' => 'post__in',
	    'post__in' => $rn
	);
	

	
	$connected = new WP_Query( $args );
	
	// Display connected pages
	if ( $connected->have_posts() ) :
	?>
		
		
			
	
	<div style="font-size:18px; font-family:arial, sans-serif; color:#278cc0; font-weight:bold; margin-top:18px; margin-bottom:18px;">
				RECENT NEWS
			</div>
		
			
			<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
        
              <?php get_template_part( 'item', 'newsletter_odd' ); ?>
        
			<?php endwhile; ?>
			
		
		
	<?php 
	// Prevent weirdness
	wp_reset_postdata();
	endif;
		
	
	?>

		</td></tr>










<?php // Find connected pages
		
	$rn = get_field('events');
	
	$args = array(
	    'post_type' => array( 'events' ),
	    'orderby' => 'post__in',
	    'post__in' => $rn
	);
	

	
	$connected = new WP_Query( $args );
	
	// Display connected pages
	if ( $connected->have_posts() ) :
	?>
		
		
			
			
	<tr>
		<td style="padding:10px 0">
  		
	<div style="font-size:18px; font-family:arial, sans-serif; color:#278cc0; font-weight:bold; margin-top:18px;">
				 EVENTS
			</div>
		</td></tr>	</table>	
		
			
			
			
			<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>

              <?php get_template_part( 'item', 'newsletter_even' ); ?>
       
			<?php endwhile; ?>
			
		
		
	<?php 
	// Prevent weirdness
	wp_reset_postdata();
	endif;
		
	
	?>

			
					
			
			
			<table width="580" border="0" cellpadding="0" cellspacing="0" align="center" class="deviceWidth" bgcolor="#ffffff" style="margin:0 auto;">

	</table>	
			



<div style="height:35px;margin:0 auto;">&nbsp;</div><!-- spacer -->


			<!-- 4 Columns -->
			<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
				<tr>
					<td bgcolor="#363636" style="padding:30px 0">
                        <table width="580" border="0" cellpadding="10" cellspacing="0" align="center" class="deviceWidth" style="margin:0 auto;">
                            <tr>
                                <td>
                                        <table width="100%" cellpadding="0" cellspacing="0"  border="0" align="center" class="deviceWidth">
                                            <tr>
                                                <td valign="top" style="font-size: 11px; color: #f1f1f1; color:#999; font-family: Arial, sans-serif; padding-bottom:20px; text-align: center;" class="center">

                                                    You are receiving this email because you subscribed via <a href="http://siwps.org" style="color:#999;text-decoration:underline;">our website</a><br/>

                                                    <br/><br/>
                                                    Want to be removed? No problem, <a href="" style="color:#999;text-decoration:underline;">click here</a> and we won't bug you again.

                                                </td>
                                            </tr>
                                        </table>

                                        <table width="100%" cellpadding="0" cellspacing="0"  border="0" align="center" class="deviceWidth">
                                            <tr>
                                                <td valign="top" style="font-size: 11px; color: #f1f1f1; font-weight: normal; font-family: Georgia, Times, serif; line-height: 26px; vertical-align: top; text-align:center" class="center">

                                                 
                                                    <a href="https://twitter.com/SIWPSColumbia"><img src="https://www.emailonacid.com/images/emails/5_13/footer_twitter.gif" width="42" height="42" alt="Twitter" title="Twitter" border="0" /></a>

                                                    <a href="https://www.facebook.com/SIWPSColumbia"><img src="https://www.emailonacid.com/images/emails/5_13/footer_fb.gif" width="42" height="42" alt="Facebook" title="Facebook" border="0" /></a>
                                      
                                                      <br/>
                                                      <br/>
                                                    Arnold A. Saltzman Institute of War and Peace Studies<br>
                                                    420 West 118th Street, Suite 1336 / Mail Code 3347 / New York, NY 10027
                                                </td>
                                            </tr>
                                        </table>

                        		</td>
                        	</tr>
                        </table>
                    </td>
                </tr>
            </table><!-- End 4 Columns -->

		</td>
	</tr>
</table> <!-- End Wrapper -->
<div style="display:none; white-space:nowrap; font:15px courier; color:#ffffff;">
- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
</div>

<?php endwhile; endif; ?>
<?php wp_footer(); ?>
</body>
</html>


