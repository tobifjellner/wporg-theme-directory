<?php
/**
 * Set up some helper API endpoints.
 */

namespace WordPressdotorg\Theme\Theme_Directory_2024\REST_API;

add_action( 'rest_api_init', __NAMESPACE__ . '\init' );

/**
 * Initialize the API endpoint(s).
 */
function init() {
	$namespace = 'wporg-themes/v1';
	$favorite_args = array(
		array(
			'theme_slug' => array(
				'validate_callback' => __NAMESPACE__ . '\check_theme_slug',
				'required' => true,
			),
		),
	);
	register_rest_route(
		$namespace,
		'/favorite',
		array(
			'methods' => \WP_REST_Server::CREATABLE,
			'callback' => __NAMESPACE__ . '\set_favorite',
			'args' => $favorite_args,
			'permission_callback' => 'is_user_logged_in',
		)
	);
	register_rest_route(
		$namespace,
		'/favorite',
		array(
			'methods' => \WP_REST_Server::DELETABLE,
			'callback' => __NAMESPACE__ . '\delete_favorite',
			'args' => $favorite_args,
			'permission_callback' => 'is_user_logged_in',
		)
	);
}

/**
 * Validate the theme slug.
 */
function check_theme_slug( $param ) {
	$theme = wporg_themes_theme_information( $param );
	return ! isset( $theme->error );
}

/**
 * Set the favorite status for a given theme.
 */
function set_favorite( $request ) {
	$result = wporg_themes_add_favorite( $request['theme_slug'] );

	if ( is_wp_error( $result ) ) {
		return $result;
	}

	return new \WP_REST_Response( [ 'success' => true ] );
}

/**
 * Remove the favorite status for a given theme.
 */
function delete_favorite( $request ) {
	$result = wporg_themes_remove_favorite( $request['theme_slug'] );

	if ( is_wp_error( $result ) ) {
		return $result;
	}

	return new \WP_REST_Response( [ 'success' => true ] );
}
