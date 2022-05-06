<?php
function mytheme_comments( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}

	$classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
	?>
    
	<<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
	} ?>
	<div class="godecan_block_comment">
    	<div class="godecan_photo_user"><?php echo get_avatar($comment->user_id, 50); ?></div>
    	<div class="godecan_content_comm">
    		<a href="<?php echo get_the_permalink(6); ?>?user=<?php echo $comment->user_id; ?>" class="godecan_name_comm"><?php echo normname($comment->user_id); ?></a>
    		<div class="godecan_text_comm"><?php comment_text() ?></div>
    		<p class="godecan_date_comm" style="float: left;">
				<?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?> 
				<?php edit_comment_link( __( 'Редактировать' ), ' ' ); ?> 
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth']
						)
					)
				); ?>
			</p>
    		<div class="reply"></div>
    	</div>
    	<div class="clear"></div>
	</div>
	<?php if ( 'div' != $args['style'] ) { ?>
		</div>
	<?php } ?>
<?php }
?>