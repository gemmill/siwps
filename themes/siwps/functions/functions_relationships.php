<?php

    add_filter('acf/update_value/key=field_5b05cd4eb1786', 'acf_reciprocal_relationship_people_events', 10, 3); // event -> people
    add_filter('acf/update_value/key=field_5b06279f678e4', 'acf_reciprocal_relationship_people_events', 10, 3); // person -> events
    
    function acf_reciprocal_relationship_people_events($value, $post_id, $field) {
        
        // set the two fields that you want to create
        // a two way relationship for
        // these values can be the same field key
        // if you are using a single relationship field
        // on a single post type
        
        // the field key of one side of the relationship
        $key_a = 'field_5b05cd4eb1786';
        // the field key of the other side of the relationship
        // as noted above, this can be the same as $key_a
        $key_b = 'field_5b06279f678e4';
        
        // figure out wich side we're doing and set up variables
        // if the keys are the same above then this won't matter
        // $key_a represents the field for the current posts
        // and $key_b represents the field on related posts
        if ($key_a != $field['key']) {
            // this is side b, swap the value
            $temp = $key_a;
            $key_a = $key_b;
            $key_b = $temp;
        }
        
        // get both fields
        // this gets them by using an acf function
        // that can gets field objects based on field keys
        // we may be getting the same field, but we don't care
        $field_a = acf_get_field($key_a);
        $field_b = acf_get_field($key_b);
        
        // set the field names to check
        // for each post
        $name_a = $field_a['name'];
        $name_b = $field_b['name'];
        
        // get the old value from the current post
        // compare it to the new value to see
        // if anything needs to be updated
        // use get_post_meta() to a avoid conflicts
        $old_values = get_post_meta($post_id, $name_a, true);
        // make sure that the value is an array
        if (!is_array($old_values)) {
            if (empty($old_values)) {
                $old_values = array();
            } else {
                $old_values = array($old_values);
            }
        }
        // set new values to $value
        // we don't want to mess with $value
        $new_values = $value;
        // make sure that the value is an array
        if (!is_array($new_values)) {
            if (empty($new_values)) {
                $new_values = array();
            } else {
                $new_values = array($new_values);
            }
        }
        
        
        // this line is commented out, this line should be used when setting
        // up this filter on a new site. getting values and updating values
        //will more then likely
        // cause your updates to time out.
        $add = array_diff($new_values, $old_values);
        //$add = $new_values;
        $delete = array_diff($old_values, $new_values);
        
        // reorder the arrays to prevent possible invalid index errors
        $add = array_values($add);
        $delete = array_values($delete);
        
        /*
         if (!count($add) && !count($delete)) {
         // there are no changes
         // so there's nothing to do
         return $value;
         }
         */
        
        
        // do deletes first
        // loop through all of the posts that need to have
        // the recipricol relationship removed
        for ($i=0; $i<count($delete); $i++) {
            $related_values = get_post_meta($delete[$i], $name_b, true);
            if (!is_array($related_values)) {
                if (empty($related_values)) {
                    $related_values = array();
                } else {
                    $related_values = array($related_values);
                }
            }
            // we use array_diff again
            // this will remove the value without needing to loop
            // through the array and find it
            
            $related_values = array_diff($related_values, array($post_id));
            // insert the new valuei
            
            
            update_post_meta($delete[$i], $name_b, $related_values);
            
            
            // insert the acf key reference, just in case
            //update_post_meta($delete[$i], '_'.$name_b, $key_b);
        }
        
        // do additions, to add $post_id
        for ($i=0; $i<count($add); $i++) {
            $related_values = get_post_meta($add[$i], $name_b, true);
            
            
            if (!is_array($related_values)) {
                if (empty($related_values)) {
                    $related_values = array();
                } else {
                    $related_values = array($related_values);
                }
            }
            if (!in_array($post_id, $related_values)) {
                // add new relationship if it does not exist
                $related_values[] = $post_id;
            }
            
            // update value
            update_post_meta($add[$i], $name_b, $related_values);
            // insert the acf key reference, just in case
            update_post_meta($add[$i], '_'.$name_b, $key_b);
        }
        
        return $value;
        
    }
    
    
    
    add_filter('acf/update_value/key=field_5a6edd357b877', 'acf_reciprocal_relationship_people_news', 10, 3); // news -> people
    add_filter('acf/update_value/key=field_5b0627603f93d', 'acf_reciprocal_relationship_people_news', 10, 3); // person -> news
    
    function acf_reciprocal_relationship_people_news($value, $post_id, $field) {
        
        
        
        // the field key of one side of the relationship
        $key_a = 'field_5a6edd357b877';
        // the field key of the other side of the relationship
        // as noted above, this can be the same as $key_a
        $key_b = 'field_5b0627603f93d';
        
        if ($key_a != $field['key']) {
            // this is side b, swap the value
            $temp = $key_a;
            $key_a = $key_b;
            $key_b = $temp;
        }
        
        $field_a = acf_get_field($key_a);
        $field_b = acf_get_field($key_b);
        
        // set the field names to check
        // for each post
        $name_a = $field_a['name'];
        $name_b = $field_b['name'];
        
        $old_values = get_post_meta($post_id, $name_a, true);
        // make sure that the value is an array
        if (!is_array($old_values)) {
            if (empty($old_values)) {
                $old_values = array();
            } else {
                $old_values = array($old_values);
            }
        }
        // set new values to $value
        // we don't want to mess with $value
        $new_values = $value;
        // make sure that the value is an array
        if (!is_array($new_values)) {
            if (empty($new_values)) {
                $new_values = array();
            } else {
                $new_values = array($new_values);
            }
        }
        
        
        $add = array_diff($new_values, $old_values);
        //$add = $new_values;
        $delete = array_diff($old_values, $new_values);
        
        // reorder the arrays to prevent possible invalid index errors
        $add = array_values($add);
        $delete = array_values($delete);
        
        /*
         if (!count($add) && !count($delete)) {
         // there are no changes
         // so there's nothing to do
         return $value;
         }
         
         */
        
        // do deletes first
        
        for ($i=0; $i<count($delete); $i++) {
            $related_values = get_post_meta($delete[$i], $name_b, true);
            if (!is_array($related_values)) {
                if (empty($related_values)) {
                    $related_values = array();
                } else {
                    $related_values = array($related_values);
                }
            }
            
            $related_values = array_diff($related_values, array($post_id));
            // insert the new valuei
            
            update_post_meta($delete[$i], $name_b, $related_values);
            
            
            // insert the acf key reference, just in case
            //update_post_meta($delete[$i], '_'.$name_b, $key_b);
        }
        
        // do additions, to add $post_id
        for ($i=0; $i<count($add); $i++) {
            $related_values = get_post_meta($add[$i], $name_b, true);
            
            
            if (!is_array($related_values)) {
                if (empty($related_values)) {
                    $related_values = array();
                } else {
                    $related_values = array($related_values);
                }
            }
            if (!in_array($post_id, $related_values)) {
                // add new relationship if it does not exist
                $related_values[] = $post_id;
            }
            
            // update value
            update_post_meta($add[$i], $name_b, $related_values);
            // insert the acf key reference, just in case;
            update_post_meta($add[$i], '_'.$name_b, $key_b);
        }
        
        return $value;
        
    }
    
    
    
    
    add_filter('acf/update_value/key=field_5a6eaad16e834', 'acf_reciprocal_relationship_people_publications', 10, 3); // people -> pubs
    add_filter('acf/update_value/key=field_5a4c1248e4403', 'acf_reciprocal_relationship_people_publications', 10, 3); // pub -> person
    
    
    function acf_reciprocal_relationship_people_publications($value, $post_id, $field) {
        
        // set the two fields that you want to create
        // a two way relationship for
        // these values can be the same field key
        // if you are using a single relationship field
        // on a single post type
        
        // the field key of one side of the relationship
        $key_a = 'field_5a6eaad16e834';
        // the field key of the other side of the relationship
        // as noted above, this can be the same as $key_a
        $key_b = 'field_5a4c1248e4403';
        
        // figure out wich side we're doing and set up variables
        // if the keys are the same above then this won't matter
        // $key_a represents the field for the current posts
        // and $key_b represents the field on related posts
        if ($key_a != $field['key']) {
            // this is side b, swap the value
            $temp = $key_a;
            $key_a = $key_b;
            $key_b = $temp;
        }
        
        // get both fields
        // this gets them by using an acf function
        // that can gets field objects based on field keys
        // we may be getting the same field, but we don't care
        $field_a = acf_get_field($key_a);
        $field_b = acf_get_field($key_b);
        
        // set the field names to check
        // for each post
        $name_a = $field_a['name'];
        $name_b = $field_b['name'];
        
        // get the old value from the current post
        // compare it to the new value to see
        // if anything needs to be updated
        // use get_post_meta() to a avoid conflicts
        $old_values = get_post_meta($post_id, $name_a, true);
        // make sure that the value is an array
        if (!is_array($old_values)) {
            if (empty($old_values)) {
                $old_values = array();
            } else {
                $old_values = array($old_values);
            }
        }
        // set new values to $value
        // we don't want to mess with $value
        $new_values = $value;
        // make sure that the value is an array
        if (!is_array($new_values)) {
            if (empty($new_values)) {
                $new_values = array();
            } else {
                $new_values = array($new_values);
            }
        }
        
        
        // this line is commented out, this line should be used when setting
        // up this filter on a new site. getting values and updating values
        //will more then likely
        // cause your updates to time out.
        $add = array_diff($new_values, $old_values);
        //$add = $new_values;
        $delete = array_diff($old_values, $new_values);
        
        // reorder the arrays to prevent possible invalid index errors
        $add = array_values($add);
        $delete = array_values($delete);
        
        /*
         if (!count($add) && !count($delete)) {
         // there are no changes
         // so there's nothing to do
         return $value;
         }
         */
        
        
        // do deletes first
        // loop through all of the posts that need to have
        // the recipricol relationship removed
        for ($i=0; $i<count($delete); $i++) {
            $related_values = get_post_meta($delete[$i], $name_b, true);
            if (!is_array($related_values)) {
                if (empty($related_values)) {
                    $related_values = array();
                } else {
                    $related_values = array($related_values);
                }
            }
            // we use array_diff again
            // this will remove the value without needing to loop
            // through the array and find it
            
            $related_values = array_diff($related_values, array($post_id));
            // insert the new valuei
            
            
            update_post_meta($delete[$i], $name_b, $related_values);
            
            
            // insert the acf key reference, just in case
            //update_post_meta($delete[$i], '_'.$name_b, $key_b);
        }
        
        // do additions, to add $post_id
        for ($i=0; $i<count($add); $i++) {
            $related_values = get_post_meta($add[$i], $name_b, true);
            
            
            if (!is_array($related_values)) {
                if (empty($related_values)) {
                    $related_values = array();
                } else {
                    $related_values = array($related_values);
                }
            }
            if (!in_array($post_id, $related_values)) {
                // add new relationship if it does not exist
                $related_values[] = $post_id;
            }
            
            // update value
            update_post_meta($add[$i], $name_b, $related_values);
            // insert the acf key reference, just in case
            update_post_meta($add[$i], '_'.$name_b, $key_b);
        }
        
        return $value;
        
    }
    
    
    
    
    
function order_news_by_date( $args, $field, $post_id ) {
	
    // only show children of the current post being edited
    $args['orderby'] = 'date desc';
    $args['order'] = 'DESC';
	
	
	// return
    return $args;
    
}


// filter for a specific field based on it's name
add_filter('acf/fields/relationship/query/key=field_5a6ecb44e6cbd', 'order_news_by_date', 10, 3);



/* ACF: limit child-page selection to current page’s children */

function childpages_query( $args, $field, $post_ID ) {
    $args['post_parent'] = $post_ID;
    return $args;
}

add_filter('acf/fields/relationship/query/key=field_5c7868ef782eb', 'childpages_query', 10, 3);

