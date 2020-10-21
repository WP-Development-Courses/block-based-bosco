<?php

function bbb_add_theme_supports() {
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
}
add_action( 'wp_enqueue_scripts', 'bbb_enqueue_styles' );

function bbb_enqueue_editor_styles() {
	add_editor_style( 'style.css');
}

add_action( 'after_setup_theme', 'bbb_enqueue_editor_styles' );
