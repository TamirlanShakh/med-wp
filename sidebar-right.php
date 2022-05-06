<div class="general_right">
	<div class="right_form obvodka">
		<div class="right_form_title right_title"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/mail_title.png" alt="">Письмо колледжу</div>
		<?php echo do_shortcode('[contact-form-7 id="54" title="Письмо колледжу"]'); ?>

	</div>
	<div class="right_calendar obvodka">
		<div class="right_calendar_title right_title">Архивный календарь</div>
		<div class="right_calendar_block"><?php dynamic_sidebar('kalendar'); ?></div>
	</div>
	<div class="right_obv obvodka">
		<div class="right_obv_titel right_title">Объявления</div>
		<div class="right_obv_list">
		<?php $query = new WP_Query('cat=5&showposts=6')?>
		<?php if( $query->have_posts()):?>
		<?php while( $query->have_posts()): $query->the_post();?>
		<?php right_obv(); ?>
		<?php endwhile; ?>
		<?php else:?>
		<p>Новостей пока нет</p>
		<?php endif; $query = NULL; wp_reset_postdata();?>
		</div>
	</div>
</div>