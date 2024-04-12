<?php
/**
 * Set up custom block bindings.
 */

namespace WordPressdotorg\Theme\Theme_Directory_2024\Block_Bindings;

add_action( 'init', __NAMESPACE__ . '\register_block_bindings' );

/**
 * Register block bindings.
 *
 * This registers some sources which can be used to dynamically inject content
 * into block text or attributes.
 */
function register_block_bindings() {
	register_block_bindings_source(
		'wporg-themes/meta',
		array(
			'label' => 'Theme meta',
			'uses_context' => [ 'postId' ],
			'get_value_callback' => __NAMESPACE__ . '\get_meta_block_value',
		)
	);
}

/**
 * Callback to provide the binding value.
 */
function get_meta_block_value( $args, $block ) {
	if ( ! isset( $args['key'] ) ) {
		return '';
	}

	$p = get_post( $block->context['postId'] );
	$theme = wporg_themes_theme_information( $p->post_name );

	switch ( $args['key'] ) {
		case 'version':
			/* translators: %s: Version number. */
			return sprintf( __( 'Version: %s', 'wporg-themes' ), '<strong>' . esc_html( $theme->version ) . '</strong>' );
		case 'last-updated':
			return sprintf(
				/* translators: %s: update date. */
				__( 'Last updated: %s', 'wporg-themes' ),
				/* translators: localized date format, see http://php.net/date */
				'<strong>' . date_i18n( _x( 'F j, Y', 'last update date format', 'wporg-themes' ), strtotime( $theme->last_updated ) ) . '</strong>'
			);
		case 'active-installs':
			$active_installs = $theme->active_installs;
			if ( $active_installs < 10 ) {
				$active_installs = __( 'Less than 10', 'wporg-themes' );
			} elseif ( $active_installs >= 1000000 ) {
				$active_installs = __( '1+ million', 'wporg-themes' );
			} else {
				$active_installs = number_format_i18n( $active_installs ) . '+';
			}
			return sprintf(
				/* translators: %s: active install count. */
				__( 'Active Installations: %s', 'wporg-themes' ),
				'<strong>' . $active_installs . '</strong>'
			);
		case 'requires-wp':
			if ( ! empty( $theme->requires ) ) {
				return sprintf(
					// translators: %s: "version or higher" string.
					__( 'WordPress Version: %s', 'wporg-themes' ),
					// translators: %s: version number.
					'<strong>' . sprintf( __( '%s or higher', 'wporg-themes' ), esc_html( $theme->requires ) ) . '</strong>'
				);
			}
			return '';
		case 'requires-php':
			if ( ! empty( $theme->requires_php ) ) {
				return sprintf(
					// translators: %s: "version or higher" string.
					__( 'PHP Version: %s', 'wporg-themes' ),
					// translators: %s: version number.
					'<strong>' . sprintf( __( '%s or higher', 'wporg-themes' ), esc_html( $theme->requires_php ) ) . '</strong>'
				);
			}
			return '';
		case 'theme-link':
			if ( ! empty( $theme->theme_url ) ) {
				return sprintf(
					'<a href="%s">%s</a></p>',
					esc_url( $theme->theme_url ),
					__( 'Theme Homepage', 'wporg-themes' )
				);
			}
			return '';
		case 'preview-url':
			return esc_url( $theme->preview_url );
		case 'download-url':
			return esc_url( $theme->download_link );
	}
}
