<?php

/**
 * The file that defines the widget class
 *
 *
 * @link       http://jeremywray.co.uk/
 * @since      1.2
 *
 * @package    Jel_Tfl_Widgets
 * @subpackage Jel_Tfl_Widgets/includes
 */

/**
 * The core widget class.
 *
 * Sets up the widget in the WP Admin
 *
 * @since      1.2
 * @package    Jel_Tfl_Widgets
 * @subpackage Jel_Tfl_Widgets/includes
 * @author     Jeremy Wray <jeremy@jelnet.uk>
 */

// Creating the widget class
class jel_tfl_WP_widget extends WP_Widget {

    function __construct() {
        parent::__construct(

        // Base ID of your widget
        'jel_tfl_WP_widget',

        // Widget name will appear in UI
        __('TFL Widgets', 'jel-tfl-widgets'),

        // Widget description
        array( 'description' => __( 'Transport for London Info.', 'jel-tfl-widgets' ), )
        );
    }

    // Creating widget front-end

    public function widget( $args, $instance ) {
    
        $tube_updates = ! empty( $instance['tube_updates'] ) ? $instance['tube_updates'] : '';
        $tube_map = ! empty( $instance['tube_map'] ) ? $instance['tube_map'] : '';

        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
                
        if ($tube_updates){  echo do_shortcode( ' [tube-updates width="variable"] ' );}

        if ($tube_map){  echo do_shortcode( ' [tube-map width="variable"] ' );}

        echo $args['after_widget'];
    
    }

    // Widget Backend

    public function form( $instance ) {

        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';

        $tube_updates = ! empty( $instance['tube_updates'] ) ? $instance['tube_updates'] : '';
    
        $tube_map = ! empty( $instance['tube_map'] ) ? $instance['tube_map'] : '';
        
            ?>

            <!-- Widget Title -->
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'jel-tfl-widgets' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>      
            <p>
            <?php _e( 'Display :', 'jel-tfl-widgets' );?> 
            <br>
            <!-- Tube updates checkbox -->
            <input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tube_updates' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tube_updates' ) ); ?>" <?php checked( $tube_updates, 'on' ); ?>>
            <label for="<?php echo esc_attr( $this->get_field_id( 'tube_updates' ) ); ?>"><?php esc_attr_e( 'Tube updates info', 'jel-tfl-widgets' ); ?></label> 
            <br> 
            <!-- Tube map checkbox -->
            <input type="checkbox" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'tube_map' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'tube_map' ) ); ?>" <?php checked( $tube_map, 'on' ); ?>>
            <label for="<?php echo esc_attr( $this->get_field_id( 'tube_map' ) ); ?>"><?php esc_attr_e( 'Tube map', 'jel-tfl-widgets' ); ?></label>
            </p>
            
            <?php     
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();
            
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';        $instance['tube_updates'] = ( ! empty( $new_instance['tube_updates'] ) ) ? $new_instance['tube_updates'] : '';        $instance['tube_map'] = ( ! empty( $new_instance['tube_map'] ) ) ? $new_instance['tube_map'] : '';
        
        return $instance;
    }


} //end class