<?php 
  
  
  
  function cptui_register_my_cpts_publications() {

	/**
	 * Post Type: Publications.
	 */

	$labels = array(
		"name" => __( "Publications", "custom-post-type-ui" ),
		"singular_name" => __( "Publication", "custom-post-type-ui" ),
		"archives" => __( "Publications", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Publications", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "publications", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "publications", $args );
}

add_action( 'init', 'cptui_register_my_cpts_publications' );


function cptui_register_my_cpts_events() {

	/**
	 * Post Type: Events.
	 */

	$labels = [
		"name" => __( "Events", "custom-post-type-ui" ),
		"singular_name" => __( "Event", "custom-post-type-ui" ),
		"menu_name" => __( "Events", "custom-post-type-ui" ),
		"all_items" => __( "All Events", "custom-post-type-ui" ),
		"add_new_item" => __( "Add New Event", "custom-post-type-ui" ),
		"edit_item" => __( "Edit Event", "custom-post-type-ui" ),
		"new_item" => __( "New Event", "custom-post-type-ui" ),
		"view_item" => __( "View Event", "custom-post-type-ui" ),
		"view_items" => __( "View Events", "custom-post-type-ui" ),
		"search_items" => __( "Search Events", "custom-post-type-ui" ),
	];

	$args = [
		"label" => __( "Events", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "events", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
	];

	register_post_type( "events", $args );
}

add_action( 'init', 'cptui_register_my_cpts_events' );




function cptui_register_my_cpts_people() {

	/**
	 * Post Type: People.
	 */

	$labels = array(
		"name" => __( "People", "custom-post-type-ui" ),
		"singular_name" => __( "Person", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "People", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "people", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "people", $args );
}

add_action( 'init', 'cptui_register_my_cpts_people' );


function cptui_register_my_cpts_newsletter() {

	/**
	 * Post Type: Newsletters.
	 */

	$labels = array(
		"name" => __( "Newsletters", "custom-post-type-ui" ),
		"singular_name" => __( "Newsletter", "custom-post-type-ui" ),
		"menu_name" => __( "Newsletters", "custom-post-type-ui" ),
	);

	$args = array(
		"label" => __( "Newsletters", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "newsletter", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail" ),
	);

	register_post_type( "newsletter", $args );
}

add_action( 'init', 'cptui_register_my_cpts_newsletter' );
