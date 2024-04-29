/**
 * WordPress dependencies
 */
import { getContext, store } from '@wordpress/interactivity';

store( 'wporg/themes/preview', {
	state: {
		get isLoaded() {
			return getContext().isLoaded;
		},
	},
	actions: {
		onLoad() {
			const context = getContext();
			context.isLoaded = true;
		},
	},
} );
