		<?php get_header();?>
		<content>
			<div class="general">
				<div class="general_fix">
					<?php get_sidebar('left'); ?>
					<div class="general_single">
						<?php if(have_posts()): ?>
						<?php while(have_posts()): the_post();?>
						<h1 class="single_title"><?php the_title();?>kjhkjh</h1>
						<div class="single_info">
							<div class="single_slider">
								<div id="cbp-fwslider" class="cbp-fwslider">
									<ul>
										<li style="background: url('<?php echo get_field('фото');?>') no-repeat center/cover;"></li>
										<?php $slider = get_field('доп_фото'); if($slider):?>
										<?php foreach($slider as $slide): ?>
										<li style="background: url('<?php echo $slide['url'];?>') no-repeat center/cover;"></li>
										<?php endforeach; endif;?>
									</ul>
								</div>
							</div>
							<?php single_attr(); ?>
							<div class="single_text"><?php the_content(); ?></div>
							<?php single_attr(); ?>
						</div>
						<div class="single_comments">
							<div><?php godecan_comments_list();?></div>
						</div>
						<?php endwhile; ?>
						<?php endif;?>
						<div class="single_rel">
							<div class="single_rel_title">Похожие материалы</div>
							<div class="single_rel_list">
								<?php $query = new WP_Query(array(
									'category__in' => cat_end(get_the_ID()),
									'posts_per_page' => 4,
									'post__not_in' => array(get_the_ID())
								));?>
								<?php if( $query->have_posts()):?>
								<?php while( $query->have_posts()): $query->the_post();?>
								
								<?php news_block(); ?>
								<?php endwhile; ?>
								<?php else:?>
								<p>Новостей пока нет</p>
								<?php endif; $query = NULL; wp_reset_postdata(); ?>
							</div>
						</div>
					</div>
					<?php get_sidebar('right'); ?>
				</div>
			</div>
		</content>
		<?php get_footer();?>