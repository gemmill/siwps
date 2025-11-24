<?php
	
// get rid of weird emoji stuff
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );



add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}

function register_jquery() {
    if (!is_admin() && $GLOBALS['pagenow'] != 'wp-login.php') {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', false, '1.11.2');
        wp_enqueue_script('jquery');
    }
}







add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
	//wp_enqueue_script( 'jquery' );
	register_jquery();


	wp_register_script('slick', get_stylesheet_directory_uri() . '/js/slick.js');
	wp_enqueue_script('slick');
	
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js');
	wp_enqueue_script('scripts');


}



add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{

}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

////////////////////////////////////////////////////

// we need to override some odds and ends


////////////////////////////////////////////////////


//////////////////////////////
// add site options page

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(
  	array(
  			'page_title' 	=> 'SIWPS Homepage Settings',
        'menu_title'	=> 'Home Page',
		)
	);
}







add_action( 'pre_get_posts', 'custom_query_vars' );

function custom_query_vars( $query ) {
	if ($query->is_main_query()){
		

	    if ( is_post_type_archive( 'publications' ) ) {
	        // Display 50 posts for a custom post type called 'movie'
	        $query->set( 'posts_per_page', 5000 );
	        //$query->set('orderby', array('title' => 'ASC'));
	        
	         $query->set('meta_key','person');
			 $query->set('orderby',array('meta_value' => 'ASC'));
	        return;
	    }
	    
	    
	     if ( is_post_type_archive( 'people' ) ) {
	        // Display posts for a custom post type called 'people'
	        $query->set( 'posts_per_page', 500 );
	        $query->set('meta_key','type');
			 $query->set('orderby',array('meta_value' => 'ASC'));
	        return;
	    }
    
    }

  return $query;
}






/////////////////////
// them custom image sizes 
/////////////////////////

function siwps_add_image_sizes() {
	add_image_size( 'headshot', 200, 200, true );
	add_image_size( 'hero', 1200, 275, true );
	add_image_size( 'gallery', 1200, 800, true );
	add_image_size( 'hero-short', 1800, 275, true );
    add_image_size( 'news-feed', 200, 150, false );
    
}

add_action( 'init', 'siwps_add_image_sizes' );

    





//add_image_size( 'trans_white', 350, 250 );
//add_image_size( 'trans_regular', 350, 250 );



function util_breaker($breakat, $string){
	return $string;
	return str_replace($breakat, $breakat.'<br>', $string);
	
}



function strip_specific_tags ($str, $tags) {
    if (!is_array($tags)) { $tags = array($tags); }
  
    foreach ($tags as $tag) {
      $_str = preg_replace('/<\/' . $tag . '>/i', '', $str);
      if ($_str != $str) {
        $str = preg_replace('/<' . $tag . '[^>]*>/i', '', $_str);
      }
    }
    return $str;
  }


function format_phone_string( $raw_number ) {
    // Remove all non-digit characters
    $raw_number = preg_replace( '/\D/', '', $raw_number );

    // Format based on length (assume US numbers)
    if ( strlen( $raw_number ) === 10 ) {
        // (123) 456-7890
        return sprintf( '(%s) %s-%s',
            substr( $raw_number, 0, 3 ),
            substr( $raw_number, 3, 3 ),
            substr( $raw_number, 6, 4 )
        );
    } elseif ( strlen( $raw_number ) === 7 ) {
        // 456-7890
        return sprintf( '%s-%s',
            substr( $raw_number, 0, 3 ),
            substr( $raw_number, 3, 4 )
        );
    } else {
        // Return as-is if not 7 or 10 digits
        return $raw_number;
    }
}


function change_wp_search_size($query) {
	if ( $query->is_search ) // Make sure it is a search page
		$query->query_vars['posts_per_page'] = 240; // Change 10 to the number of posts you would like to show

	return $query; // Return our modified query variables
}
add_filter('pre_get_posts', 'change_wp_search_size'); // Hook our custom function onto the request filter

add_filter( 'posts_orderby', 'order_search_by_posttype', 10, 2 );
function order_search_by_posttype( $orderby, $wp_query ){
    if( ! $wp_query->is_admin && $wp_query->is_search ) :
        global $wpdb;
        $orderby =
            "
            CASE WHEN {$wpdb->prefix}posts.post_type = 'publications' THEN '1' 
                 WHEN {$wpdb->prefix}posts.post_type = 'people' THEN '2' 
                 WHEN {$wpdb->prefix}posts.post_type = 'post' THEN '3' 
            ELSE {$wpdb->prefix}posts.post_type END ASC, 
            {$wpdb->prefix}posts.post_title ASC";
    endif;
    return $orderby;
}



function siwps_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
}
function siwps_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}
 
add_action( 'admin_menu', 'siwps_change_post_label' );
add_action( 'init', 'siwps_change_post_object' );



require_once( get_template_directory() . '/functions/functions_acf.php' );

require_once( get_template_directory() . '/functions/cpt/cpt.php' );

require_once( get_template_directory() . '/functions/functions_widgets.php' );

require_once( get_template_directory() . '/functions/functions_relationships.php' );

require_once( get_template_directory() . '/functions/functions_sidebars.php' );
            
require_once( get_template_directory() . '/functions/functions_admin.php' );
