<?php
/**
 * Title: Header
 * Slug: wporg-themes-2024/header
 * Inserter: no
 */

?>
<!-- wp:wporg/global-header {"style":{"border":{"bottom":{"color":"var:preset|color|white-opacity-15","style":"solid","width":"1px"}}}} /-->

<!-- wp:wporg/local-navigation-bar {"className":"has-display-contents","backgroundColor":"charcoal-2","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"},":hover":{"color":{"text":"var:preset|color|white"}}}}},"textColor":"white","fontSize":"small"} -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"textColor":"light-grey-1","layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group has-light-grey-1-color has-text-color">
		<!-- wp:site-title {"level":0,"fontSize":"small","textColor":"white"} /-->

		<!-- wp:query-title {"type":"filter","level":0,"fontSize":"small","fontFamily":"inter","className":"wporg-local-navigation-bar__fade-in-scroll"} /-->

		<!-- wp:post-title {"level":0,"fontSize":"small","fontFamily":"inter","className":"wporg-local-navigation-bar__fade-in-scroll"} /-->
	</div>
	<!-- /wp:group -->

	<!-- wp:navigation {"menuSlug":"main","icon":"menu","overlayBackgroundColor":"charcoal-2","overlayTextColor":"white","layout":{"type":"flex","orientation":"horizontal"},"fontSize":"small"} /-->

<!-- /wp:wporg/local-navigation-bar -->

<!-- wp:wporg/language-suggest {"align":"full"} -->
<div class="wp-block-wporg-language-suggest alignfull"></div>
<!-- /wp:wporg/language-suggest -->

<!-- wp:spacer {"height":"var:preset|spacing|40"} -->
<div style="height:var(--wp--preset--spacing--40)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->
