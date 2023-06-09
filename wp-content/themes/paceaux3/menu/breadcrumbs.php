<?php if ( function_exists( 'breadcrumb_trail' ) ) : // Check for breadcrumb support. ?>

	<?php breadcrumb_trail(
		array( 
			'container'     => 'nav', 
			'separator'     => '>', 
			'show_on_front' => false,

			'labels'        => array( 
				'browse' => esc_html__( 'You are here:', 'drop-shipping' ) 
			) 
		) 
	); ?>
<div id="social" class="social"> 
		<?php if(get_theme_mod('drop-shipping_facebook_link')): ?>
		<a href="<?php echo esc_url (get_theme_mod( 'drop-shipping_facebook_link' )); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
		<?php endif; ?>

		<?php if(get_theme_mod('drop-shipping_twitter_link')): ?>
		<a href="<?php echo esc_url (get_theme_mod( 'drop-shipping_twitter_link' )); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
		<?php endif; ?>

		<?php if(get_theme_mod('drop-shipping_instagram_link')): ?>
		<a href="<?php echo esc_url (get_theme_mod( 'drop-shipping_instagram_link' )); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
		<?php endif; ?>

		<?php if(get_theme_mod('drop-shipping_pinterest_link')): ?>
		<a href="<?php echo esc_url (get_theme_mod( 'drop-shipping_pinterest_link' )); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
		<?php endif; ?>

		<?php if(get_theme_mod('drop-shipping_youtube_link')): ?>
		<a href="<?php echo esc_url (get_theme_mod( 'drop-shipping_youtube_link' )); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
		<?php endif; ?>

		<?php if(get_theme_mod('drop-shipping_bloglovin_link')): ?>
		<a href="<?php echo esc_url (get_theme_mod( 'drop-shipping_bloglovin_link' )); ?>" target="_blank"><i class="fa fa-heart"></i></a>
		<?php endif; ?>
		<?php if(get_theme_mod('drop-shipping_google_plus_link')): ?>
		<a href="<?php echo esc_url (get_theme_mod( 'drop-shipping_google_plus_link' )); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
		<?php endif; ?>

		<?php if(get_theme_mod('drop-shipping_rss_link')): ?>
		<a href="<?php echo esc_url (get_theme_mod( 'drop-shipping_rss_link' )); ?>" target="_blank"><i class="fa fa-rss"></i></a>
		<?php endif; ?>

	</div>
<?php endif; // End check for breadcrumb support. ?>
