/**
 * WordPress dependencies
 */
import { getContext, getElement, store } from '@wordpress/interactivity';

store( 'wporg/themes/theme-patterns', {
	state: {
		get buttonCSS() {
			return getContext().hideOverflow ? false : 'none';
		},
	},
	actions: {
		showAll() {
			const context = getContext();
			const { ref } = getElement();
			context.hideOverflow = false;

			const container = ref.closest( '.wp-block-wporg-theme-patterns' );
			if ( ! container ) {
				return;
			}

			// Trigger the custom "show" event on each image.
			container.querySelectorAll( '.wp-block-wporg-screenshot-preview' ).forEach( ( element ) => {
				const event = new Event( 'wporg-show' );
				element.dispatchEvent( event );
			} );

			// Move focus from the now-removed button to the first-visible element.
			setTimeout( () => {
				const firstNewElement = container.querySelectorAll( 'a' )[ context.initialCount ];
				if ( firstNewElement ) {
					firstNewElement.focus();
				}
			}, 0 );
		},
	},
} );
