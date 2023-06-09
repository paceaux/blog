<?php if ( pings_open() && ! comments_open() ) : ?>

	<p class="comments-closed pings-open">
		<?php
			// Translators: The two %s are placeholders for HTML. The order can't be changed.
			printf( esc_html__( 'Comments are closed, but %strackbacks%s and pingbacks are open.', 'drop-shipping' ), '<a href="' . esc_url( get_trackback_url() ) . '">', '</a>' );
		?>
	</p><!-- .comments-closed .pings-open -->

<?php elseif ( ! comments_open() ) : ?>

	<p class="comments-closed">
		<?php esc_html_e( 'Comments are closed.', 'drop-shipping' ); ?>
	</p><!-- .comments-closed -->

<?php endif; ?>