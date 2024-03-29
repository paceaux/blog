			

		</div><!-- .pageContainer__contentWrapper -->
		
		<?php locate_template( array( 'misc/loop-nav.php' ), true ); // Loads the misc/loop-nav.php template. ?>

<?php hybrid_get_sidebar( 'primary' ); // Loads the sidebar/primary.php template. ?>
		
	</main> <!--.page -->
		
		<footer <?php hybrid_attr( 'footer' ); ?>>
			<nav id="footer-navigation" class="nav nav--footer g-footer__nav"><?php hybrid_get_menu( 'subsidiary' ); // Loads the menu/subsidiary.php template. ?> </nav>
		
			<small class="credit g-footer__credit">
				<?php printf(
					// Translators: 1 is current year, 2 is site name/link, 3 is WordPress name/link, and 4 is privacy policy link.
					esc_html__('Copyright &#169; %1$s %2$s. Powered by %3$s. %4$s', 'drop-shipping' ), 
					date_i18n( 'Y' ), hybrid_get_site_link(), hybrid_get_wp_link(), hybrid_get_privacy_link()
				); ?>
			</small><!-- .credit -->

		</footer><!-- #footer -->

	

	<?php wp_footer(); // WordPress hook for loading JavaScript, toolbar, and other things in the footer. ?>

</body>
</html>