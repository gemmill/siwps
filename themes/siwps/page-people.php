<?php get_header(); ?>




<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="single_header">


<?php if (!isset($_GET["archive"])):?>
	<div class="header_container">
	<h2 class="section ">People</h2>
	</div>
	<a href="?archive" class="archivelink">
	View Archive
	</a>

<?php else: ?>

	<div class="header_container">
	<h2 class="section ">People Archive</h2>
	</div>
	<a href="?archive" class="archivelink">
	View Current
	</a>

<?php endif; ?>

</div>

		
<?php 
/* 
Administration
Executive Committee
Senior and Associate Members
Saltzman Student Scholars
Senior Members
Associate Members
Affiliate Members
Faculty and Resident Members
Members and Affiliates
Visiting Scholar
Staff

Administration
Executive Committee
Senior and Associate Members
Affiliate Members
Saltzman Student Scholars 
Visiting Scholars
Staff 
*/
$sections = array(
	'Administration' => 'Administration',
	'Administration and Staff'=>'Administration and Staff',
	'Executive Committee' => 'Executive Committee',
	'Senior and Associate Members'=>'Senior and Associate Members',
	'Senior Members'=>'Senior Members',
	'Associate Members'=>'Associate Members',
	'Affiliate Members'=>'Affiliate Members',
	// 'Faculty and Resident Members' => 'Faculty and Resident Members',
	// 'Members and Affiliates' => 'Members and Affiliates',
	'Visiting Scholars' => 'Visiting Scholar',
	'Staff' => 'Staff',
	'Student Staff' => 'Student Staff',
	'Saltzman Student Scholars'=>'Saltzman Student Scholars',
	'Saltzman Student Scholar Alumni' => 'Saltzman Student Scholar Alumni'


	
	
);	
	
?>
		
		
<div class="people">

<?php foreach ($sections as $k => $v): ?>

<?php 
	

	// Find connected pages
	$args = array(
		'post_type' => 'people',
		'posts_per_page' => 500,
		'meta_query' => array(
        	'relation' => 'AND',
			'type_clause' => array(
           		'key' => 'type',
		   		'value' => $v,
		   	),
		   	'lastname_clause' => array(
            	'key' => 'last_first',
				'compare' => 'EXISTS',
			), 
			'archive_clase'=>array(
				'key'=>'archived',
				'value'=> 0
			)
		),
		'orderby' => array(
			'lastname_clause' => 'ASC'
		)
	);
	
	$connected = new WP_Query( $args );
	
	// Display connected pages
	if ( $connected->have_posts() ) :
	?>
	<div class="personrow">
		<a style="text-decoration:none; color:inherit" href="#<?php echo sanitize_title($k) ?>"><h4 class="section people" id="<?php echo sanitize_title($k) ?>"><?php echo $k ?></h4></a>
	<div>
	<?php while ( $connected->have_posts() ) : $connected->the_post(); 
  	
	  $hide = get_field('hide');
	  $archived =  get_field('archived');

	  $archived_condition = (isset($_GET['archive'])) ? !$archived : $archived;

	?>
	<?php if (!$hide && !$archived_condition) get_template_part( 'item', 'person' ); ?>
	<?php endwhile; ?>
	</div>
	
	</div>
	<?php 
	// Prevent weirdness
	wp_reset_postdata();
	endif;
?>

<?php endforeach; ?>



</div>

<?php endwhile; endif; ?>


<?php get_footer(); ?>