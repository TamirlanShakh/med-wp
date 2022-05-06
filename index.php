		<?php get_header();?>
		<content>
			<div class="slider">
				<div id="cbp-fwslider" class="cbp-fwslider">
					<ul>
						<?php $slider = get_field('слайдер',19);?>
						<?php foreach($slider as $slide): ?>
						<li style="background: url('<?php echo $slide['фото'];?>')no-repeat center/cover;"></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="general">
				<div class="general_fix">
					<?php get_sidebar('left'); ?>
					<div class="general_news">
						<div class="general_news_list">
							<?php $query = new WP_Query('cat=4&showposts=2')?>
							<?php if( $query->have_posts()):?>
							<?php while( $query->have_posts()): $query->the_post();?>
							
							<?php news_block(); ?>
							<?php endwhile; ?>
							<?php else:?>
							<p>Новостей пока нет</p>
							<?php endif; $query = NULL; wp_reset_postdata(); ?>
						</div>
						<div class="general_news_more general_news_more_home">Показать еще</div>
					</div>
					<?php get_sidebar('right'); ?>
				</div>
			</div>
			<div class="gallery">
				<div class="gallery_fix">
					<div class="gallery_tabs">
						<div class="gallery_tabs_photo gallery_tabs_active">Фото</div>
						<div class="gallery_tabs_line">|</div>
						<div class="gallery_tabs_video">Видео</div>
					</div>
					<div class="gallery_blocks">
						<div class="gallery_photo">
							<div class="gallery_photo_list">
								<?php 
									$gallery = get_field('фотографии',55); $i=1;
									foreach($gallery as $img): $i++;
									if($i>5){break;}	
								?>
								<a href="<?php echo $img['url']?>" rel="lightbox" class="obvodka" style="background: url('<?php echo $img['url']?>')no-repeat center/cover;"></a>
								<?php endforeach; ?>
							</div>
							<a href="<?php the_permalink(55); ?>" class="gallery_photo_more">Смотреть все</a>
						</div>
						<div class="gallery_video">
							<div class="gallery_video_list">
								<?php 
									$videos = get_field('видео',57);$i=1;
									foreach($videos as $video): $i++;
									if($i>5){break;}
								?>
								<?php if($video['ссылка_на_видео']): ?>
								<div class="obvodka"><?php echo apply_filters( 'the_content', $video['ссылка_на_видео'] ) ; ?></div>
								<?php else: ?>
								<div class="obvodka"><?php echo wp_video_shortcode( ['src'=> $video['файл_видео']['url'], 'height'=>236, 'width' => 319, 'class' =>'']); ?></div>		
								<?php endif; ?>						
								<?php endforeach; ?>
							</div>
							<a href="<?php the_permalink(57); ?>" class="gallery_video_more">Смотреть всё</a>
						</div>
					</div>
				</div>
			</div>
		</content>
		<?php get_footer();?>