<?php
/**
 * Theme setup.
 */

require_once __DIR__ . '/inc/class-require-gutenberg.php';

if ( ! isset( $content_width ) ) {
	$content_width = 750;
}

function bbb_add_theme_supports() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'bbb_add_theme_supports' );

function bbb_enqueue_styles() {
	wp_enqueue_style(
		'bbb-normalize',
		get_stylesheet_directory_uri() . '/css/normalize.css',
		[],
		'8.0.1'
	);

	wp_enqueue_style(
		'bbb-style',
		get_stylesheet_uri(),
		[
			'bbb-normalize'
		],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style( 'bbb-lora', bbb_font_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'bbb_enqueue_styles' );
add_action( 'enqueue_block_editor_assets', 'bbb_enqueue_styles' );

/**
 * Returns the Google font stylesheet URL, if available.
 *
 * The use of Lora by default is localized. For languages that use characters
 * not supported by the font, the font can be disabled.
 *
 * Returns the font stylesheet URL or empty string if disabled.
 */
function bbb_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lora, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lora font: on or off', 'block-based-bosco' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lora:400,700,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}
