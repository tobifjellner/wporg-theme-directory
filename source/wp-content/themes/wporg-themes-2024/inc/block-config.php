<?php
/**
 * Set up configuration for dynamic blocks.
 */

namespace WordPressdotorg\Theme\Theme_Directory_2024\Block_Config;

add_filter( 'wporg_query_total_label', __NAMESPACE__ . '\update_query_total_label', 10, 2 );
add_filter( 'wporg_query_filter_options_tags', __NAMESPACE__ . '\get_tags_options' );
add_action( 'wporg_query_filter_in_form', __NAMESPACE__ . '\inject_other_filters' );
add_filter( 'wporg_block_navigation_menus', __NAMESPACE__ . '\add_site_navigation_menus' );
add_filter( 'render_block_wporg/link-wrapper', __NAMESPACE__ . '\inject_permalink_link_wrapper' );

/**
 * Update the query total label to reflect "patterns" found.
 *
 * @param string $label       The maybe-pluralized label to use, a result of `_n()`.
 * @param int    $found_posts The number of posts to use for determining pluralization.
 * @return string Updated string with total placeholder.
 */
function update_query_total_label( $label, $found_posts ) {
	/* translators: %s: the result count. */
	return _n( '%s theme', '%s themes', $found_posts, 'wporg-themes' );
}

/**
 * Provide a list of tag options.
 *
 * @param array $options The options for this filter.
 * @return array New list of tag options.
 */
function get_tags_options( $options ) {
	global $wp_query;
	$selected = isset( $wp_query->query['tag'] ) ? (array) $wp_query->query['tag'] : array();

	$count = count( $selected );
	$label = sprintf(
		/* translators: The dropdown label for filtering, %s is the selected term count. */
		_n( 'Filters <span>%s</span>', 'Filters <span>%s</span>', $count, 'wporg-themes' ),
		$count
	);

	$tags = get_terms(
		array(
			'taxonomy' => 'post_tag',
			'orderby' => 'name',
		)
	);

	return array(
		'label' => $label,
		'title' => __( 'Filters', 'wporg-themes' ),
		'key' => 'tag',
		'action' => home_url( '/' ),
		'options' => array_combine( wp_list_pluck( $tags, 'slug' ), wp_list_pluck( $tags, 'name' ) ),
		'selected' => $selected,
	);
}

/**
 * Add in the other existing filters as hidden inputs in the filter form.
 *
 * Enables combining filters by building up the correct URL on submit,
 * for example sites using a tag, a category, and matching a search term:
 *   ?browse=commercial&tag[]=accessibility-ready&s=blue`
 *
 * @param string $key The key for the current filter.
 */
function inject_other_filters( $key ) {
	global $wp_query;

	$query_vars = [ 'tag', 'browse' ];
	foreach ( $query_vars as $query_var ) {
		if ( ! isset( $wp_query->query[ $query_var ] ) ) {
			continue;
		}
		if ( $key === $query_var ) {
			continue;
		}
		$values = $wp_query->query[ $query_var ];
		if ( is_array( $values ) ) {
			foreach ( $values as $value ) {
				printf( '<input type="hidden" name="%s[]" value="%s" />', esc_attr( $query_var ), esc_attr( $value ) );
			}
		} else {
			printf( '<input type="hidden" name="%s" value="%s" />', esc_attr( $query_var ), esc_attr( $values ) );
		}
	}

	// Pass through search query.
	if ( isset( $wp_query->query['s'] ) ) {
		printf( '<input type="hidden" name="s" value="%s" />', esc_attr( $wp_query->query['s'] ) );
	}
}

/**
 * Provide a list of local navigation menus.
 */
function add_site_navigation_menus( $menus ) {
	global $wp_query;

	$menu = array();
	$categories = array();
	$statuses = array();

	$menu[] = array(
		'label' => __( 'Submit a theme', 'wporg-themes' ),
		'url' => '/getting-started/',
	);
	$menu[] = array(
		'label' => __( 'My favorites', 'wporg-themes' ),
		'url' => '/favorites/',
	);
	$menu[] = array(
		'label' => __( 'Commercial theme companies', 'wporg-themes' ),
		'url' => '/commercial/',
	);

	$current_browse = $wp_query->query['browse'] ?? false;
	$business_model = array(
		array(
			'label' => __( 'All', 'wporg-themes' ),
			'url' => home_url( '/' ),
			'className' => ! $current_browse ? 'current-menu-item' : '',
		),
		array(
			'label' => __( 'Community', 'wporg-themes' ),
			'url' => home_url( '/browse/community/' ),
			'className' => 'community' === $current_browse ? 'current-menu-item' : '',
		),
		array(
			'label' => __( 'Commercial', 'wporg-themes' ),
			'url' => home_url( '/browse/commercial/' ),
			'className' => 'commercial' === $current_browse ? 'current-menu-item' : '',
		),
	);

	return array(
		'main' => $menu,
		'browse' => $business_model,
	);
}

/**
 * Update the link in `wporg/link-wrapper` to use the current post permalink.
 *
 * @param string $block_content The block content.
 *
 * @return array The updated block.
 */
function inject_permalink_link_wrapper( $block_content ) {
	return str_replace( 'href=""', 'href="' . get_permalink() . '"', $block_content );
}
