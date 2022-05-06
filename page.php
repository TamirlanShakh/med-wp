		<?php get_header();?>
		<content>
			<div class="general">
				<div class="general_fix">
					<?php get_sidebar('left'); ?>
					<div class="general_page">
						<?php if(have_posts()): ?>
						<?php while(have_posts()): the_post();?>
						<h1 class="page_title"><?php the_title();?></h1>
						<div class="page_info"><?php the_content(); ?></div>
						<?php endwhile; ?>
						<?php endif;?>
					</div>
					<?php get_sidebar('right'); ?>
				</div>
			</div>
		</content>
		<?php get_footer();?>