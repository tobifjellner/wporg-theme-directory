<?php
/**
 * Block Name: Ratings (stars)
 * Description: The avgerage rating of this theme displayed as stars.
 *
 * @package wporg
 */

namespace WordPressdotorg\Theme\Theme_Directory_2024\Ratings_Stars_Block;

defined( 'WPINC' ) || die();

add_action( 'init', __NAMESPACE__ . '\init' );

/**
 * Register the block.
 */
function init() {
	register_block_type( dirname( dirname( __DIR__ ) ) . '/build/ratings-stars' );
}
