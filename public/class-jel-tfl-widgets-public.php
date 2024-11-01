<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://jeremywray.co.uk/
 * @since      1.0.0
 *
 * @package    Jel_Tfl_Widgets
 * @subpackage Jel_Tfl_Widgets/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Jel_Tfl_Widgets
 * @subpackage Jel_Tfl_Widgets/public
 * @author     Jeremy Wray <jeremy@jelnet.uk>
 */
class Jel_Tfl_Widgets_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Jel_Tfl_Widgets_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Jel_Tfl_Widgets_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/jel-tfl-widgets-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Jel_Tfl_Widgets_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Jel_Tfl_Widgets_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/jel-tfl-widgets-public.js', array( 'jquery' ), $this->version, false );

	}
	/**
	 * Jel: register the shortcodes.
	 *
	 * @since    1.0.0
	 */
	 
	 public function func_tube_updates( $atts ) {
	 	$atts = shortcode_atts(
		array(
			'width' => '240px',			
		), $atts, 'tube-updates' );		
		if ($atts['width'] == "variable") {
			return '<div class="tfl-widgets-tube-updates"><script language="JavaScript" src="https://www.tfl.gov.uk/tfl/syndication/widgets/serviceboard/embeddable/serviceboard-iframe-stretchy.js"></script></div>';
		} else {
	 		return '<div class="tfl-widgets-tube-updates" style="width:' . $atts['width'] . '"><script language="JavaScript" src="https://www.tfl.gov.uk/tfl/syndication/widgets/serviceboard/embeddable/serviceboard-iframe-stretchy.js"></script></div>';
		}
	 }
	 
	 public function func_tube_map( $atts ) {
	 	$atts = shortcode_atts(
		array(
			'width' => '360px',			
		), $atts, 'tube-map' );		
		if ($atts['width'] == "variable") {
			return '<div class="tfl-widgets-tube-map"><script language="JavaScript" src="https://www.tfl.gov.uk/tfl/syndication/widgets/tubemap/tubemap-iframe-stretchy.js"></script></div>';
		} else {
	 		return '<div class="tfl-widgets-tube-map" style="width:' . $atts['width'] . '"><script language="JavaScript" src="https://www.tfl.gov.uk/tfl/syndication/widgets/tubemap/tubemap-iframe-stretchy.js"></script></div>';
		}
	 }
	 
	 public function func_london_roads() {
	 	
	 		return "<script>(function(w){w.url='https://tfl.gov.uk'; return w; })(window.tfl = window.tfl || {});</script><script src='https://tfl.gov.uk/cdn/static/scripts/specific/widgets/roads-widget.js'></script>";
		
	 }
	 
	public function register_shortcodes() {
		add_shortcode( 'tube-updates', array( $this, 'func_tube_updates') );
		add_shortcode( 'tube-map', array( $this, 'func_tube_map') );
		add_shortcode( 'london-roads', array( $this, 'func_london_roads') );
		//add_shortcode( 'anothershortcode', array( $this, 'another_shortcode_function') );
	}
	/**
	 * Jel: register the WP Widget.
	 *
	 * @since    1.2
	 */
	public function register_WP_widget() {
		register_widget( 'jel_tfl_WP_widget' );
	}

}
