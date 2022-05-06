<?php 

include('functions/mytheme_comments.php');
include('functions/title.php');
include('functions/normname.php');
include('functions/godecan_comments_list.php');

// Выводим комментарии
echo '<div class="comment-box"><div class="comment-list">';
$comments = wp_list_comments(array(
			'avatar_size'       => 55,
	         'reply_text'       => 'Ответить',
	         'callback'          => 'mytheme_comments',
		), $args);
		
echo '</div></div>';
?>

<?php 
if (!get_comments_number())
{
		echo "<p class='nocomments'>Комментариев пока нет, будьте первыми..</p>";
}
?>
<?php //надпись под формой
$comments_args = array(
        'comment_notes_after' => '',
		'label_submit' => 'Опубликовать',
		'title_reply_before'   => '<div id="reply-title" class="comment-reply-title">',
		'title_reply_after'    => '</div>',
		'title_reply'          => __( '' ),
		'logged_in_as'         => '',
		'comment_field' => '<p class="comment-form-comment"> '.get_avatar(get_current_user_id(), 50).' <textarea id="comment" name="comment" onkeyup="textArea(this)" placeholder="Ваш комментарий..." aria-required="true"></textarea></p>'
);
comment_form($comments_args);
?>