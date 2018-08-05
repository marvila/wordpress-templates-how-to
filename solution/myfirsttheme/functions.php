<?php
/**
 * My First Theme's functions and definitions.
 *
 * YOU NEED TO CHANGE THIS TO YOUR REQUIREMENTS!
 *
 * @package MyFirstTheme
 * @since MyFirstTheme 1.0
 */

/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 800; /* pixels */
}
if ( ! function_exists( 'myfirsttheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which runs
	 * before the init hook. The init hook is too late for some features, such as indicating
	 * support post thumbnails.
	 */
	function myfirsttheme_setup() {

		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'myfirsttheme', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus(
			array(
				'primary'   => __( 'Primary Menu', 'myfirsttheme' ),
				'secondary' => __( 'Secondary Menu', 'myfirsttheme' ),
			)
		);

		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );
	}
endif; // myfirsttheme_setup.
add_action( 'after_setup_theme', 'myfirsttheme_setup' );

/**
 * Enqueuing scripts and CSS
 */
if ( ! function_exists( 'myfirsttheme_add_theme_scripts' ) ) {
	function myfirsttheme_add_theme_scripts() {
		/**** CSS */

		// myfirsttheme
		wp_enqueue_style(
			'style',
			get_stylesheet_uri(),
			array(),
			filemtime( get_stylesheet_directory() . '/style.css' ), // used as cache buster.
			'all'
		);

		/**** JS */

		// myfirsttheme scripts
		wp_enqueue_script(
			'myfirstthemejs',
			get_theme_file_uri( 'assets/js/myfirsttheme.js' ),
			array(),
			filemtime( get_stylesheet_directory() . '/assets/js/myfirsttheme.js' ), // used as cache buster.
			true
		);

		/*
		Comments script: uncomment if you want comments to work on your site.

		if ( is_singular() ) {
			if ( comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}
		*/
	}
}
add_action( 'wp_enqueue_scripts', 'myfirsttheme_add_theme_scripts' );
