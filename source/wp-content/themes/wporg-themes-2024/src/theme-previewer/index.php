<?php
/**
 * Block Name: Theme previewer
 * Description: A wrapper for the current theme's preview page.
 *
 * @package wporg
 */

namespace WordPressdotorg\Theme\Theme_Directory_2024\Theme_Previewer;

defined( 'WPINC' ) || die();

add_action( 'init', __NAMESPACE__ . '\init' );

/**
 * Register the block.
 */
function init() {
	register_block_type( dirname( dirname( __DIR__ ) ) . '/build/theme-previewer' );
	register_block_type( dirname( dirname( __DIR__ ) ) . '/build/theme-previewer/iframe' );
}
