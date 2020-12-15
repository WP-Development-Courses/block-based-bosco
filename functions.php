<?php
/**
 * Theme setup.
 */

require_once __DIR__ . '/inc/class-require-gutenberg.php';

function block_based_bosco_add_theme_supports() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'experimental-custom-spacing' );
	add_theme_support( 'custom-spacing' );
}
add_action( 'after_setup_theme', 'block_based_bosco_add_theme_supports' );

function block_based_bosco_enqueue_styles() {
	wp_enqueue_style(
		'block-based-bosco-normalize',
		get_stylesheet_directory_uri() . '/css/normalize.css',
		[],
		'8.0.1'
	);

	wp_enqueue_style(
		'block-based-bosco-style',
		get_stylesheet_uri(),
		[
			'block-based-bosco-normalize'
		],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style( 'block-based-bosco-lora', block_based_bosco_font_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'block_based_bosco_enqueue_styles' );
add_action( 'enqueue_block_editor_assets', 'block_based_bosco_enqueue_styles' );

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

/**
 * These functions is only here to pass the Theme Check on WordPress.org.
 */
function block_based_bosco_theme_check_dummy_calls() {
	add_theme_support( 'title-tag' );
	comment_form();
	comments_template();
	paginate_comments_links();
	post_class();
	posts_nav_link();
	wp_enqueue_script( 'comment-reply' );
	wp_list_comments();
	wp_link_pages();
	the_tags();

	global $content_width;
	$content_width = 1200;
}
