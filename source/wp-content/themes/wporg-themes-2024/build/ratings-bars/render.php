<?php

use function WordPressdotorg\Theme\Theme_Directory_2024\get_support_url;

$current_post_id = $block->context['postId'];
if ( ! $current_post_id ) {
	return;
}

$theme_post = get_post( $block->context['postId'] );
$theme = wporg_themes_theme_information( $theme_post->post_name );

if ( ! $theme->num_ratings ) {
	return;
}

?>
<ul <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?>>
<?php
foreach ( range( 5, 1 ) as $stars ) :
	if ( ! isset( $theme->ratings[ $stars ] ) ) {
		continue;
	}
	$count = $theme->ratings[ $stars ];
	$rating_bar_width = 100 * $count / $theme->num_ratings;
	?>
	<li class="wporg-ratings-bars__bar">
		<a href="<?php echo esc_url( get_support_url( $theme->slug . '/reviews/?filter=' . $stars ) ); ?>">
			<span class="screen-reader-text">
			<?php
				// translators: %1$d: count of reviews. %2$d: level of star rating (ex, 5-star).
				echo esc_html( sprintf( _n( '%1$d %2$d-star review', '%1$d %2$d-star reviews', $count, 'wporg-themes' ), $count, $stars ) );
			?>
			</span>
			<span aria-hidden="true" class="wporg-ratings-bars__bar-label">
			<?php
				// translators: %d: star review amount, 1-5; ex "5 stars".
				echo esc_html( sprintf( _n( '%d star', '%d stars', $stars, 'wporg-themes' ), $stars ) );
			?>
			</span>
			<span aria-hidden="true" class="wporg-ratings-bars__bar-background">
				<span class="wporg-ratings-bars__bar-foreground" style="width: <?php echo intval( $rating_bar_width ); ?>%;"></span>
			</span>
			<span aria-hidden="true" class="wporg-ratings-bars__bar-count"><?php echo intval( $count ); ?></span>
		</a>
	</li>
<?php endforeach; ?>
</ul>
