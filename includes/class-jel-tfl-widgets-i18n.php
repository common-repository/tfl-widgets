<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://jeremywray.co.uk/
 * @since      1.0.0
 *
 * @package    Jel_Tfl_Widgets
 * @subpackage Jel_Tfl_Widgets/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Jel_Tfl_Widgets
 * @subpackage Jel_Tfl_Widgets/includes
 * @author     Jeremy Wray <jeremy@jelnet.uk>
 */
class Jel_Tfl_Widgets_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'jel-tfl-widgets',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
