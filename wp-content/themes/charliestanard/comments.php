<div class="comments">
	<?php if (post_password_required()) : ?>
	<p>Post is password protected. Enter the password to view any comments.</p>
</div>

	<?php return; endif; ?>

<?php if (have_comments()) : ?>

	<div class="comments__header">
		<h3 class="title"><?php comments_number(); ?> <a href="#respond" class="comment__reply btn--outline">Leave a reply</a></h3>
	</div>

	<div class="comments__body">
		<ul class="comments__list">
			<?php wp_list_comments('type=comment'); // Custom callback in functions.php ?>
		</ul>
	</div>

<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

	<div class="comments__body">
		<div class="post-comments-closed">
			<p>Comments are closed here.</p>
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
			'<input id="author" name="author" placeholder="Name'.( $req ? '*' : '' ).'" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
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
		'title_reply' => 'Leave a comment',
		'title_reply_to' => 'Leave a comment for %s',
		'title_reply_before' => '<h3 class="title">',
		'title_reply_after' => '</h3>',
		'comment_field' => '<p class="comment-form-comment"><textarea name="comment" placeholder="Comment" aria-required="true"></textarea></p>',
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_notes_after' => '',
		'class_submit'      => 'submit btn--solid',
	);

?>

<?php comment_form($args); ?>

<?php if (comments_open()) : ?>
	<div class="pagination">
		<?php paginate_comments_links(); ?>
	</div>
<?php endif; ?>

</div>