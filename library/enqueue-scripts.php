<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts() {

	// Enqueue the main Stylesheet.
	wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/assets/stylesheets/foundation.css', array(), '2.9.2', 'all' );

		// Deregister the jquery version bundled with WordPress.
		//wp_deregister_script( 'jquery' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		//wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false );

		// Deregister the jquery-migrate version bundled with WordPress.
		//wp_deregister_script( 'jquery-migrate' );

		// CDN hosted jQuery migrate for compatibility with jQuery 3.x
		//wp_register_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', false );

		// Enqueue jQuery migrate. Uncomment the line below to enable.
		// wp_enqueue_script( 'jquery-migrate' );

		// Enqueue FontAwesome from CDN. Uncomment the line below if you need FontAwesome.
		wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', array(), '5.6.3', 'all' );

	// If you'd like to cherry-pick the foundation components you need in your project, head over to gulpfile.js and see lines 35-54.
	// It's a good idea to do this, performance-wise. No need to load everything if you're just going to use the grid anyway, you know :)
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/javascript/foundation.js', array('jquery'), '2.9.2', true );

	// Add the comment-reply library on pages where it is necessary
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
	}

	}

	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
endif;

// Defer non-essential/plugin javascript files
// Defer jQuery Parsing using the HTML5 defer property
if (!(is_admin() )) {
    function defer_parsing_of_js ( $url ) {
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return $url;
        if ( strpos( $url, 'foundation.js' ) ) return $url;
        // return "$url' defer ";
        return "$url' defer onload='";
    }
    add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}

//remove Tablepress default styles; use Foundation
add_filter( 'tablepress_use_default_css', '__return_false' );