<?php
/*
Plugin Name: Author Bio Box Shortcode
Version: 1.0.0
Description: Adds shortcode for author biographys. *Dependant on Author Bio Box plugin by claudiosmweb
Author: Steven Word
Author URI: http://wpengine.com
Plugin URI: http://wpengine.com
Text Domain: author-bio-box-shortcode
Domain Path: /languages
*/


class Author_Bio_Box_Shortcode {

	/* Shortcode */
	const SHORTCODE = 'biobox';

	/* Define and register singleton */
	private static $instance = false;
	public static function instance() {
		if( ! self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	/**
	 * Clone
	 *
	 * @since 1.0.0
	 */
	private function __clone() { }
	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 */
	private function __construct() {

		// Initialize
		add_action( 'init', array( $this, 'action_init_register_shortcode' ) );
	}

	/**
	 * Register the shortcode(s)
	 *
	 * @since  1.0.0
	 * @uses add_shortcode()
	 * @return null
	 */
	public function action_init_register_shortcode() {
		add_shortcode( self::SHORTCODE, array( $this, 'do_shortcode' ) );
	}
	/**
	 * Render a iframe shortcode
	 *
	 * @since  1.0.0
	 * @return string $html
	 */
	function do_shortcode( $atts ) {
		if ( function_exists( 'get_author_bio_box' ) ) {
        	echo get_author_bio_box();
    	}
	}


} // Class
Author_Bio_Box_Shortcode::instance();