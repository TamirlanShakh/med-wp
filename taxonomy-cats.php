		<?php get_header();?>
		<content>
			<div class="general">
				<div class="general_fix">
					<?php get_sidebar('left'); ?>
					<div class="general_cat">

						<h1 class="cat_title"><?php single_cat_title();?></h1>
						<div class="cat_list">
						<?php if(have_posts()): ?>
						<?php while(have_posts()): the_post();?>
						<?php news_block();?>
						<?php endwhile; ?>
						<?php endif;?>
						</div>
						<div class="general_news_more general_news_more_cat" cat_id="<?php echo get_query_var('cat') ?>">Показать еще</div>
					</div>
					<?php get_sidebar('right'); ?>
				</div>
			</div>
		</content>
		<?php get_footer();?>