<?php
/**
 * Editorial Plus: Social Icons
 *
 * Widget show the social icons which managed from customizer panel.
 *
 * @package Editorial
 * @subpackage Editorial Plus
 * 
 */

add_action( 'widgets_init', 'editorial_plus_register_social_icons_widget' );

function editorial_plus_register_social_icons_widget() {
    register_widget( 'Editorial_Plus_Social_Icons' );
}

class Editorial_Plus_Social_Icons extends WP_widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'editorial_plus_social_icons',
            'description' => __( 'You can place banner as advertisement with links.', 'editorial-plus' )
        );
        parent::__construct( 'editorial_plus_social_icons', __( 'Editorial Plus: Social Icons', 'editorial-plus' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(

            'social_icon_widget_title' => array(
                'editorial_widgets_name'         => 'social_icon_widget_title',
                'editorial_widgets_title'        => __( 'Title', 'editorial-plus' ),
                'editorial_widgets_field_type'   => 'text'
            ),


        );
        return $fields;
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
        if( empty( $instance ) ) {
            return ;
        }

        $editorial_plus_social_icon_widget_title  = empty( $instance['social_icon_widget_title'] ) ? '' : $instance['social_icon_widget_title'];

        echo $before_widget;

    ?>
            <div class="social-icon-wrapper">
                <?php if( !empty( $editorial_plus_social_icon_widget_title ) ) { ?>
                        <h4 class="widget-title"><?php echo esc_html( $editorial_plus_social_icon_widget_title ); ?></h4>
                <?php } ?>
                <div class="social-icons-block">
                <?php editorial_social_icons(); ?>
                </div>
            </div>  
    <?php

        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    editorial_widgets_updated_field_value()     defined in editorial-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$editorial_widgets_name] = editorial_widgets_updated_field_value( $widget_field, $new_instance[$editorial_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.    
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    editorial_widgets_show_widget_field()       defined in editorial-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $editorial_plus_widgets_field_value = !empty( $instance[$editorial_widgets_name] ) ? wp_kses_post( $instance[$editorial_widgets_name] ) : '';
            editorial_widgets_show_widget_field( $this, $widget_field, $editorial_plus_widgets_field_value );
        }
    }
}
