<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>

<head <?php hybrid_attr( 'head' ); ?>>
<?php wp_head(); // Hook required for scripts, styles, and other <head> items. ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27200993-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body <?php hybrid_attr( 'body' ); ?>>
			<nav class="skip-link" aria-label="Skip the header and go straight to the content">
			<a href="#pageContent" class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'drop-shipping' ); ?></a>
		</nav><!-- .skip-link -->
	<section  class="topBar">
		<div class="topbar__searchContainer">
			<?php get_search_form(); ?>
		</div>	
		<nav id="menu-secondary" class="topBar__nav nav nav--secondary"><?php hybrid_get_menu( 'secondary' ); // Loads the menu/secondary.php template. ?></nav>
	</section>

		<header <?php hybrid_attr( 'header' ); ?>>

			<?php if ( display_header_text() ) : // If user chooses to display header text. ?>

				<div <?php hybrid_attr( 'branding' ); ?>>
					<?php hybrid_site_title(); ?>
					<?php hybrid_site_description(); ?>
				</div><!-- #branding -->

			<?php endif; // End check for header text. ?>

				<div id="header-widget" class="headerWidget"><?php hybrid_get_sidebar( 'subsidiary' ); // Loads the sidebar/subsidiary.php template. ?></div>
				<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>
		</header><!-- #header -->

		
		<?php if ( get_header_image() && ! display_header_text() ) : // If there's a header image but no header text. ?>

			<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home"><img class="header-image" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>

		<?php elseif ( get_header_image() ) : // If there's a header image. ?>

			<img class="header-image header__image" src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="" />

		<?php endif; // End check for header image. ?>
		<main class="pageContainer">
			<div id="breadcrumbs-container" class="pageContainer__breadcrumbs breadcrumbs__wrapper"><?php hybrid_get_menu( 'breadcrumbs' ); // Loads the menu/breadcrumbs.php template. ?></div>
		<div class="pageContainer__contentWrapper" id="pageContent">