<div id="comments"></div>

<ol class="commentlist">
  <?php $commentlist_args = array(
  	'style'             => 'ul',
  	'type'              => 'comment',
  	'reply_text'        => '# Reply'
  );

  wp_list_comments( $commentlist_args ); ?>
</ol>

<?php

/*------------------------------
Comment Form
------------------------------*/

$comment_form_args = array(
  'title_reply'           => 'Leave a comment',
  'comment_notes_before'  => '',
  'comment_notes_after'   => '',
  'fields'                => apply_filters( 'comment_form_default_fields', array(
    'author' => '<input id="author" name="author" type="text" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />',
    'email'  => '<input id="email" name="email" type="text" placeholder="Email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' />'
    )
  ),
  'comment_field'         => '<textarea id="comment" name="comment" placeholder="Type your comment here." aria-required="true"></textarea>',
  'cancel_reply_link'     => '# Cancel Reply',
  'label_submit'          => 'Submit'
);

comment_form( $comment_form_args );

?>
