<?php function godecan_comments_list() { ?>
<div class="godecan_comments_list">
	<p class="caption_block">Комментарии к товару</p>
	<div class="comments">
		<?php if (!is_user_logged_in() ):?>
			<div class="user_logged_reg">Чтобы ответить, вам необходимо <a href="#" class="rcl-login">авторизоваться</a></div>
		<?php endif; ?>
	</div>
</div>
<?php } ?>