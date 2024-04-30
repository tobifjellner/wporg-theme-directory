<?php
/**
 * Title: Page: Getting Started
 * Slug: wporg-themes-2024/page-getting-started
 * Inserter: no
 */

?>
<!-- wp:group -->
<div class="wp-block-group">
	<!-- wp:heading {"level":1,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}}} -->
	<h1 class="wp-block-heading" style="margin-bottom:var(--wp--preset--spacing--30)"><?php esc_html_e( 'Getting Started', 'wporg-themes' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'The WordPress theme directory is used by millions of WordPress users all over the world. Themes in the directory are available for download from WordPress.org, and WordPress users can also install them directly from their administration screens.', 'wporg-themes' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'By hosting your theme on WordPress.org, you&#8217;ll get:', 'wporg-themes' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:list -->
	<ul>
		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Stats on how many times your theme has been downloaded', 'wporg-themes' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'User feedback in the forums', 'wporg-themes' ); ?></li>
		<!-- /wp:list-item -->

		<!-- wp:list-item -->
		<li><?php esc_html_e( 'Ratings, to see what users think of your theme', 'wporg-themes' ); ?></li>
		<!-- /wp:list-item -->
	</ul>
	<!-- /wp:list -->

	<!-- wp:paragraph -->
	<p>
		<?php esc_html_e( 'The goal of the theme directory isn&#8217;t to host every theme in the world, it&#8217;s to host the best open source WordPress themes around.', 'wporg-themes' ); ?>
		<?php esc_html_e( 'Themes hosted on WordPress.org pass on the same user freedoms as WordPress itself; this means that they are 100% GPL or compatible.', 'wporg-themes' ); ?>
	</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading -->
	<h2 class="wp-block-heading"><?php esc_html_e( 'Guidelines &amp; Resources', 'wporg-themes' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>
		<?php
		echo wp_kses_post(
			sprintf(
				// translators: %s: Theme review handbook URL.
				__( 'To ensure that WordPress users are guaranteed a good experience, every theme in the directory is reviewed by the themes team. Please <a href="%s">review the guidelines before uploading your theme</a>.', 'wporg-themes' ),
				'https://make.wordpress.org/themes/handbook/review/'
			)
		);
		?>
	</p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Themes from sites that support non-GPL (or compatible) themes or that don&#8217;t meet with the theme review guidelines will not be approved.', 'wporg-themes' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p>
		<?php
		echo wp_kses_post(
			sprintf(
				// translators: %s: Theme unit test Codex URL.
				__( 'Your theme will be reviewed using the <a href="%s">Theme Unit Test data</a>. Before uploading your theme please test it with this sample export data.', 'wporg-themes' ),
				__( 'https://codex.wordpress.org/Theme_Unit_Test', 'wporg-themes' )
			)
		);
		?>
	</p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p>
		<?php
		echo wp_kses_post(
			sprintf(
				// translators: %s: Theme handbook on Developer Resources URL.
				__( 'Further resources for theme developers can be found in the <a href="%s">Theme Developer Handbook</a>.', 'wporg-themes' ),
				__( 'https://developer.wordpress.org/themes/', 'wporg-themes' )
			)
		); ?>
	</p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p>
		<?php
		echo wp_kses_post(
			sprintf(
				// translators: %s: URL to the themes forum on support.
				__( 'For questions about theme development please use the <a href="%s">Themes and Templates forum</a>.', 'wporg-themes' ),
				__( 'https://wordpress.org/support/forum/themes-and-templates', 'wporg-themes' )
			)
		); ?>
	</p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/upload/' ) ); ?>"><?php esc_html_e( 'Upload your theme', 'wporg-themes' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"60px","className":"alignwide","style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|50"}}}} -->
<div style="margin-top:0;margin-bottom:var(--wp--preset--spacing--50);height:60px" aria-hidden="true" class="wp-block-spacer alignwide"></div>
<!-- /wp:spacer -->
