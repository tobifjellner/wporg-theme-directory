<?php

namespace WordPressdotorg\Theme\Theme_Directory_2024;

require_once( __DIR__ . '/inc/block-bindings.php' );
require_once( __DIR__ . '/inc/block-config.php' );

// Block files
require_once( __DIR__ . '/src/business-model-notice/index.php' );
require_once( __DIR__ . '/src/child-theme-notice/index.php' );
require_once( __DIR__ . '/src/ratings-bars/index.php' );
require_once( __DIR__ . '/src/ratings-stars/index.php' );

/**
 * Actions and filters.
 */
add_action( 'init', __NAMESPACE__ . '\fix_term_imports' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
add_filter( 'frontpage_template_hierarchy', __NAMESPACE__ . '\use_archive_template_paged' );
add_filter( 'post_thumbnail_html', __NAMESPACE__ . '\post_thumbnail_html', 10, 5 );

// Remove filters added by plugin.
remove_filter( 'post_thumbnail_html', 'wporg_themes_post_thumbnail_html', 10, 5 );

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

/**
 * Use theme screenshot for post thumbnails, add attributes to image tag.
 *
 * @param string   $html
 * @param int      $post_id
 * @param int      $post_thumbnail_id
 * @param string   $size
 * @param string[] $attr
 *
 * @return string
 */
function post_thumbnail_html( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	$current_post = get_post( $post_id );
	if ( 'repopackage' == $current_post->post_type ) {
		$theme = new \WPORG_Themes_Repo_Package( $current_post );
		$src   = add_query_arg(
			array(
				'w' => $size,
				'strip' => 'all',
			),
			$theme->screenshot_url()
		);

		$html = '<img src="' . esc_url( $src ) . '"';

		if ( is_array( $attr ) ) {
			$attr['alt'] = '';

			foreach ( $attr as $name => $value ) {
				$html .= " $name=" . '"' . $value . '"';
			}
		}

		$html .= ' />';
	}

	return $html;
}

/**
 * Generate the support URL for this theme.
 *
 * @todo Handle rosetta URLs.
 */
function get_support_url( $path ) {
	return 'https://wordpress.org/support/theme/' . $path;
}
