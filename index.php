<?php
/**
 * Unused file.
 *
 * This file is only present to pass the Theme Check. It's not used by the theme.
 */

add_theme_support( 'title-tag' );
comment_form();
comments_template();
post_class();
the_posts_pagination();
the_tags();
wp_link_pages();

if ( is_singular() ) {
	wp_enqueue_script( 'comment-reply' );
}
