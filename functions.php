<?php

function bbb_enqueue_styles() {
	wp_enqueue_style(
		'bbb-style',
		get_stylesheet_uri()
	);
}
add_action( 'wp_enqueue_scripts', 'bbb_enqueue_styles' );

function bbb_enqueue_editor_styles() {
	add_editor_style( 'style.css');
}

add_action( 'after_setup_theme', 'bbb_enqueue_editor_styles' );
