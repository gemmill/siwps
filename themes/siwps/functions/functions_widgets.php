<?

/* the mail widget */

/**
 * Adds Foo_Widget widget.
 */
class Mailchimp_Widget extends WP_Widget {
 
    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'mailchimp_widget', // Base ID
            'Mailchimp_Widget', // Name
            array( 'description' => __( 'Mailchimp Widget', 'text_domain' ), ) // Args
        );
    }
 
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );

        ?>
        
        
<div  class="infobox email">    
  
 </div>
<!--End mc_embed_signup-->
        
        
        
        
        <?php
    } 
} // class Mailchimp_Widget

add_action( 'widgets_init', function(){
	register_widget( 'Mailchimp_Widget' );
});
