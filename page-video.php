		<?php get_header();?>
		<content>
			<div class="general">
				<div class="general_fix">
					<?php get_sidebar('left'); ?>
					<div class="general_page">
						<?php if(have_posts()): ?>
						<?php while(have_posts()): the_post();?>
						<h1 class="page_title"><?php the_title();?></h1>
						<div class="page_video gallery_video_list">
						<?php 
							$videos = get_field('видео',57);
							foreach($videos as $video): 
						?>
						<?php if($video['ссылка_на_видео']): ?>
						<div class="obvodka"><?php echo apply_filters( 'the_content', $video['ссылка_на_видео'] ) ; ?></div>
						<?php else: ?>
						<div class="obvodka"><?php echo wp_video_shortcode( ['src'=> $video['файл_видео']['url'], 'height'=>236, 'width' => 319, 'class' =>'']); ?></div>		
						<?php endif; ?>						
						<?php endforeach; ?>	

						</div>
						<?php endwhile; ?>
						<?php endif;?>
					</div>
					<?php get_sidebar('right'); ?>
				</div>
			</div>
		</content>
		<?php get_footer();?>