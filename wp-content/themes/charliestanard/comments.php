<div class="post-comments" id="comments">
	<?php if (post_password_required()) : ?>
	<p>Post is password protected. Enter the password to view any comments.</p>
</div>

	<?php return; endif; ?>

<?php if (have_comments()) : ?>

	<div class="post-comments-header">
		<div class="container">
			<h2><?php comments_number(); ?> <a href="#respond" class="comment-reply">Leave a reply</a></h2>
		</div>
	</div>

	<div class="container">
		<div class="post-comments-body">
			<ul class="post-comments-list">
				<?php wp_list_comments('type=comment&callback=html5blankcomments'); // Custom callback in functions.php ?>
			</ul>
		</div>
	</div>

<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<div class="container">
		<div class="post-comments-body">
			<div class="post-comments-closed">
				<p>Comments are closed here.</p>
			</div>
		</div>
	</div>

<?php endif; ?>

<?php

	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields =  array(

		'author' =>
			'<p class="comment-form-author">' .
			'<input id="author" name="author" placeholder="Author'.( $req ? '*' : '' ).'" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="30"' . $aria_req . ' /></p>',

		'email' =>
			'<p class="comment-form-email">' .
			'<input id="email" name="email" placeholder="Email'.( $req ? '*' : '' ).'" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'" size="30"' . $aria_req . ' /></p>',

		'url' =>
			'<p class="comment-form-url">' .
			'<input id="url" name="url" placeholder="Website" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			'" size="30" /></p>',
	);

	$args = array(
		'title_reply' => 'Leave a comment.',
		'title_reply_to' => 'Leave a comment for %s.',
		'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_notes_after' => ''
	);

?>

<div class="container">
	<?php comment_form($args); ?>
</div>

<?php if (comments_open()) : ?>
	<div class="pagination">
		<?php paginate_comments_links(); ?>
	</div>
<?php endif; ?>

</div>