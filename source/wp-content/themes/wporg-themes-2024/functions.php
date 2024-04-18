<?php

namespace WordPressdotorg\Theme\Theme_Directory_2024;

require_once( __DIR__ . '/inc/block-bindings.php' );
require_once( __DIR__ . '/inc/block-config.php' );

// Block files
require_once( __DIR__ . '/src/business-model-notice/index.php' );
require_once( __DIR__ . '/src/child-theme-notice/index.php' );

/**
 * Actions and filters.
 */
add_action( 'init', __NAMESPACE__ . '\fix_term_imports' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
add_filter( 'frontpage_template_hierarchy', __NAMESPACE__ . '\use_archive_template_paged' );

/**
 * Temporary fix for permission problem during local install.
 */
function fix_term_imports() {
	if ( defined( 'WP_CLI' ) ) {
		remove_filter( 'pre_insert_term', 'wporg_themes_pre_insert_term' );
	}
}

/**
 * Enqueue scripts and styles.
 */
function enqueue_assets() {
	// The parent style is registered as `wporg-parent-2021-style`, and will be loaded unless
	// explicitly unregistered. We can load any child-theme overrides by declaring the parent
	// stylesheet as a dependency.
	wp_enqueue_style(
		'wporg-theme-directory-2024-style',
		get_stylesheet_uri(),
		array( 'wporg-parent-2021-style', 'wporg-global-fonts' ),
		filemtime( __DIR__ . '/style.css' )
	);
}

/**
 * Switch to the archive.html template on paged requests.
 *
 * @param string[] $templates A list of template candidates, in descending order of priority.
 */
function use_archive_template_paged( $templates ) {
	if ( is_paged() ) {
		array_unshift( $templates, 'archive.html' );
	}
	return $templates;
}
