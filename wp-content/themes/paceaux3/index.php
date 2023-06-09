<?php get_header(); // Loads the header.php template. ?>

<section class="pageContainer__content" itemprop="mainContentofPage">

	<?php if ( ! is_front_page() && hybrid_is_plural() ) : // If viewing a multi-post page ?>

		<?php locate_template( array( 'misc/archive-header.php' ), true ); // Loads the misc/archive-header.php template. ?>

	<?php endif; // End check for multi-post page. ?>

	<?php if (is_front_page()): ?>
	<?php locate_template( array( 'misc/archive-home.php' ), true ); // Loads the misc/archive-home.php template. ?>
	<?php endif ?> 

	<?php if ( have_posts() ) : // Checks if any posts were found. ?>

		<?php while ( have_posts() ) : // Begins the loop through found posts. ?>

			<?php the_post(); // Loads the post data. ?>

			<?php hybrid_get_content_template(); // Loads the content/*.php template. ?>

			<?php if ( is_singular() ) : // If viewing a single post/page/CPT. ?>
			<?php locate_template( array( 'misc/loop-nav.php' ), true ); // Loads the misc/loop-nav.php template. ?>

			<?php comments_template( '', true ); // Loads the comments.php template. ?>

			<?php endif; // End check for single post. ?>

		<?php endwhile; // End found posts loop. ?>


	<?php else : // If no posts were found. ?>

		<?php locate_template( array( 'content/error.php' ), true ); // Loads the content/error.php template. ?>

	<?php endif; // End check for posts. ?>
	</section><!-- #content -->
	<?php locate_template( array( 'misc/loop-nav.php' ), true ); // Loads the misc/loop-nav.php template. ?>



<?php get_footer(); // Loads the footer.php template. ?>