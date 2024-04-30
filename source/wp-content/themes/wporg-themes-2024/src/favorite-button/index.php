<?php
/**
 * Block Name: Favorite Button
 * Description: A button showing to toggle favoriting on the current theme.
 *
 * @package wporg
 */

namespace WordPressdotorg\Theme\Theme_Directory_2024\Favorite_Button_Block;

defined( 'WPINC' ) || die();

add_action( 'init', __NAMESPACE__ . '\init' );

/**
 * Register the block.
 */
function init() {
	register_block_type( __DIR__ . '/../../build/favorite-button' );
}
