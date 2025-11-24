<?php
/// sidebars


if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Sidebar Home',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => '',
  )
);



if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Sidebar Email',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '',
    'after_title' => '',
  )
);


function remove_default_sidebar(){

	// Unregister some of the TwentyTen sidebars
	unregister_sidebar( 'sidebar-widget-area' );
}
add_action( 'widgets_init', 'remove_default_sidebar', 11 );
