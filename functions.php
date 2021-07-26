<?php
/**
 * Theme setup.
 */

function block_based_bosco_add_theme_supports() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'editor-styles' );
	add_editor_style( [
		'css/editor-style.css',
		'css/shared.css',
		block_based_bosco_font_url()
	] );
}
add_action( 'after_setup_theme', 'block_based_bosco_add_theme_supports' );

function block_based_bosco_enqueue_styles() {
	wp_enqueue_style(
		'block-based-bosco-shared-style',
		get_stylesheet_directory_uri() . '/css/shared.css',
		[],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'block-based-bosco-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style( 'block-based-bosco-lora', block_based_bosco_font_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'block_based_bosco_enqueue_styles' );

/**
 * Remove some of the default Gutenberg block styles.
 *
 * This prevents having to overload these in the theme's stylesheet.
 *
 * @param array  $args       Array of arguments for registering a block type.
 * @param string $block_type Block type name including namespace.
 *
 * @return array Filtered block type arguments.
 */
function block_based_bosco_deregister_core_block_styles( $args, $block_type ) {
	if ( $block_type !== 'core/post-author' ) {
		return $args;
	}

	unset( $args['editor_style'] );
	unset( $args['style'] );

	return $args;
}
add_action( 'register_block_type_args', 'block_based_bosco_deregister_core_block_styles', 10, 2 );

/**
 * Returns the Google font stylesheet URL, if available.
 *
 * The use of Lora by default is localized. For languages that use characters
 * not supported by the font, the font can be disabled.
 *
 * Returns the font stylesheet URL or empty string if disabled.
 */
function block_based_bosco_font_url() {
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
