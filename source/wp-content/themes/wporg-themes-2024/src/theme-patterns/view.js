/**
 * WordPress dependencies
 */
import { getContext, getElement, store } from '@wordpress/interactivity';

store( 'wporg/themes/theme-patterns', {
	state: {
		get displayCSS() {
			return getContext().hideOverflow ? 'none' : false;
		},
		get buttonCSS() {
			return getContext().hideOverflow ? false : 'none';
		},
	},
	actions: {
		showAll() {
			const context = getContext();
			const { ref } = getElement();
			context.hideOverflow = false;

			setTimeout( () => {
				const container = ref.closest( '.wp-block-wporg-theme-patterns' );
				const firstNewElement = container.querySelectorAll( 'a' )[ context.initialCount ];
				if ( firstNewElement ) {
					firstNewElement.focus();
				}
			}, 0 );
		},
	},
} );
