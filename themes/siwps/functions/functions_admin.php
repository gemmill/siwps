<?php
  
  // Change the columns for the edit CPT screen

function change_columns( $columns ) {
  $newcolumns = array(

    'event_date'  => __( 'Event Date', 'trans' ),
  );
  return array_merge($columns, $newcolumns);
}


add_filter( "manage_events_posts_columns", "change_columns" );

function custom_columns( $column, $post_id ) {
  switch ( $column ) {
    case "event_date":
      echo date("Y/m/d",strtotime(get_post_meta( $post_id, 'event_date', true)));
      break;
  }
}
add_action( "manage_posts_custom_column", "custom_columns", 10, 2 );

// Make edit screen columns sortable

add_filter( 'manage_edit-events_sortable_columns', 'my_sortable_event_column' );

function my_sortable_event_column( $columns ) {
    $columns['event_date'] = 'event_date';
   

    return $columns;
}

add_action( 'pre_get_posts', 'manage_wp_posts_be_qe_pre_get_posts', 1 );
function manage_wp_posts_be_qe_pre_get_posts( $query ) {

   if ( $query->is_main_query() && ( $orderby = $query->get( 'orderby' ) ) ) {
      switch( $orderby ) {
         case 'event_date':
            $query->set( 'meta_key', 'event_date' );
            $query->set( 'orderby', 'meta_value' );      
            break;

      }
   }
}


///////////////////////////////////////////

add_filter( 'manage_people_posts_columns', 'people_filter_posts_columns' );
function people_filter_posts_columns( $columns ) {
 $columns = array();
 $columns['image'] = __( 'Image', 'siwps' ); 
 $columns['title'] = __( 'Title' );
//  $columns['position'] = __( 'Position' );
  $columns['type'] = __( 'Type' );
  $columns['archived'] = __( 'Archived' );
  
  $columns['academic_year'] = __( 'Academic Year', 'siwps' );
  return $columns;
}


add_action( 'manage_people_posts_custom_column', 'people_column', 10, 2);
function people_column( $column, $post_id ) {
  
  if ( 'image' === $column ) {
    $image = get_field('image', $post_id);
    echo '<img src="'.$image['url'].'" style="max-width:75px; height:auto"/>';
  }

  if ( 'academic_year' === $column ) {
    echo get_field('academic_year', $post_id);
    

  }


  if ( 'archived' === $column ) {
    $archived = get_field('archived', $post_id);
    if ($archived) { echo 'Archived';}
    else echo $archived;
  }



  // if ( 'position' === $column ) {
  //   echo get_field('position', $post_id);
   
  // }

  if ( 'type' === $column ) {
    echo get_field('type', $post_id);
   
  }
}


add_filter( 'manage_edit-people_sortable_columns', 'people_sortable_columns');
function people_sortable_columns( $columns ) {
  $columns['type'] = 'people_type';
  $columns['academic_year'] = 'people_academic_year';
  $columns['archived'] = 'people_archived';
  return $columns;
}


add_action( 'pre_get_posts', 'people_orderby' );
function people_orderby( $query ) {
  if( ! is_admin() || ! $query->is_main_query() ) {
    return;
  }

  $queries = array('relation' => 'AND');


  if ( 'people_archived' === $query->get( 'orderby') ) {
    $query->set( 'orderby', 'meta_value' );
    $query->set( 'meta_key', 'archived' );
  }
  


  if ( 'people_type' === $query->get( 'orderby') ) {
    $query->set( 'orderby', 'meta_value' );
    $query->set( 'meta_key', 'type' );
  }

  if ( 'people_academic_year' === $query->get( 'orderby') ) {
    $query->set( 'orderby', 'meta_value' );
    $query->set( 'meta_key', 'academic_year' );

  }




  if ( $_GET['people_type'] ) {

    $queries[] = array('key'=>'type', 'value'=>sanitize_text_field($_GET['people_type'] ), 'compare'=>'=');
  }

  if ( $_GET['people_status']==='active') {

    $queries[] = array(
      'relation' => 'OR',
      array(
          'key'     => 'archived',
          'value'   => 0,
          'compare' => '='
      ),
      array(
          'key'     => 'archived',
          'compare' => 'NOT EXISTS',
      ),
  
    );
  }


  if ( $_GET['people_status']==='archived') {
    $queries[] = array('key'=>'archived', 'value'=>1 , 'compare'=>'=');
  }


    $query->set('meta_query',$queries);
}





add_action('restrict_manage_posts', 'add_extra_tablenav');
function add_extra_tablenav($post_type){

    global $wpdb;

    /** Ensure this is the correct Post Type*/
    if($post_type !== 'people')
        return;

    /** Grab the results from the DB */
    $query = $wpdb->prepare('
        SELECT DISTINCT pm.meta_value FROM %1$s pm
        LEFT JOIN %2$s p ON p.ID = pm.post_id
        WHERE pm.meta_key = "%3$s" 
        AND p.post_status = "%4$s" 
        AND p.post_type = "%5$s"
        ORDER BY "%3$s"',
        $wpdb->postmeta,
        $wpdb->posts,
        'type', // Your meta key - change as required
        'publish',          // Post status - change as required
        $post_type
    );
    $results = $wpdb->get_col($query);

    /** Ensure there are options to show */
    if(empty($results))
        return;

    // get selected option if there is one selected
    if (isset( $_GET['people_type'] ) && $_GET['people_type'] != '') {
        $selectedName = $_GET['people_type'];
    } else {
        $selectedName = -1;
    }

    /** Grab all of the options that should be shown */
    $options[] = sprintf('<option value="">%1$s</option>', __('Filter by Type', 'your-text-domain'));
    foreach($results as $result) :
        if ($result == $selectedName) {
            $options[] = sprintf('<option value="%1$s" selected>%2$s</option>', esc_attr($result), $result);
        } else {
            $options[] = sprintf('<option value="%1$s">%2$s</option>', esc_attr($result), $result);
        }
    endforeach;

    /** Output the dropdown menu */
    echo '<select class="" id="people_type" name="people_type">';
    echo join("\n", $options);
    echo '</select>';


       /** Output the dropdown menu */
       echo '<select class="" id="people_status" name="people_status">';
       echo '<option value="">Filter by Status</option>';
       echo $_GET['people_status'] === 'active' ? '<option value="active" selected>' : '<option value="active">';
       echo 'Current</option>';

       echo $_GET['people_status'] === 'archived' ? '<option value="archived" selected>' : '<option value="archived">';
       echo 'Archived</option>';
       

       echo '</select>';
   



}