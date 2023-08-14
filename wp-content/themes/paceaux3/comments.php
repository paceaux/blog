<?php
// If a post password is required or no comments are given and comments/pings are closed, return.
if ( post_password_required() || ( !have_comments() && !comments_open() && !pings_open() ) )
	return;
?>

<section id="comments-template" class="commentsTemplate">

	<?php if ( have_comments() ) : // Check if there are any comments. ?>

		<div id="comments" class="comments">

			<h3 id="comments-number" class="comments__number"><?php comments_number(); ?></h3>

			<ol class="comment-list comment__list">
				<?php wp_list_comments(
					array(
						'style'        => 'ol',
						'callback'     => 'hybrid_comments_callback',
						'end-callback' => 'hybrid_comments_end_callback'
					)
				); ?>
			</ol><!-- .comment-list -->

			<?php locate_template( array( 'misc/comments-nav.php' ), true ); // Loads the misc/comments-nav.php template. ?>

		</div><!-- #comments-->

	<?php endif; // End check for comments. ?>

	<?php locate_template( array( 'misc/comments-error.php' ), true ); // Loads the misc/comments-error.php template. ?>


  <?php
    $comment_send = 'Send';
    $comment_reply = 'Leave a Message';
    $comment_reply_to = 'Reply';

    $comment_author = 'Name';
    $comment_email = 'E-Mail';
    $comment_body = 'Comment';
    $comment_url = 'Website';
    $comment_cookies_1 = ' By commenting you accept the';
    $comment_cookies_2 = ' Privacy Policy';

    $comment_before = 'You don\'t have to register to leave a comment. And your email address won\'t be published.';
    $comment_after = '';

    $comment_cancel = 'Cancel Reply'; 
    $comments_args = array(
      'fields' => array(
          //Author field
          'author' => '<label class="comment-respond__field comment-respond__field--author"><span class="comment-respond__fieldName">' . $comment_author .'</span><input class="comment-respond__fieldInput" id="author" name="author" required /></label>',
          //Email Field
          'email' => '<label class="comment-respond__field comment-respond__field--email"><span class="comment-respond__fieldName">' . $comment_email .'</span><input class="comment-respond__fieldInput" id="email" type="email" name="email" required /></label>',
          //URL Field
          'url' => '<label class="comment-respond__field comment-respond__field--url"><span class="comment-respond__fieldName">' . $comment_url .'</span><input class="comment-respond__fieldInput" id="url" type="url" name="url" /></label>',
        ),
      'comment_field' => '<label class="comment-respond__field comment-respond__field--comment"><span class="comment-respond__fieldName">' . $comment_body .'</span><textarea id="comment" name="comment" required rows="10"></textarea></label>',
      'class_submit' => 'comment-respond',
      'class_form' => 'comment-respond__form',
      'class_submit' => 'comment-respond__submit',
      'title_reply_before' => '<h3 id="reply-title" class="comment-respond__title">',
      'title_reply_after' => '</h3>',
      'comment_notes_before' => '<legend class="comment-respond__notes">' . $comment_before . '</legend>',
      'comment_notes_after' =>  '',
      'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
      'submit_field' => '<fieldset class="comment-respond__submitFields">%1$s %2$s</fieldset>',
      'format' => 'html5'
    );

    comment_form($comments_args); // Loads the comment form. ?>

</section><!-- #comments-template -->