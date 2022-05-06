<footer>
			<div class="footer_top">
				<div class="footer_top_fix">
					<div class="footer_logo">
						<img src="<?php echo $GLOBALS['theme_uri'];?>/images/footer_logo.png" alt="">
						<div class="footer_logo_text"><?php echo get_field('текст_в_подвале', 19); ?></div>
					</div>
					<div class="footer_menu">
						<div class="footer_top_title">Меню</div>
						<nav class="footer_menu_list">
							<?php $menu = wp_get_nav_menu_items(3);?>
							<ul>
							<?php foreach($menu as $item):?>
							<?php if ($item->menu_item_parent == 0):?>
							<li><a href="<?php echo $item->url;?>"><?php echo $item->title;?></a></li>
							<?php endif;?>
							<?php endforeach;?>
						</ul>
						</nav>
						<div class="footer_menu_lang"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/globus_top.png" alt=""><?php echo do_shortcode('[gtranslate]'); ?></div>
					</div>
					<div class="footer_contacts">
						<div class="footer_top_title">Контактные данные</div>
						<div class="footer_contacts_list">
							<?php echo get_field('контактные_данные', 19);?>
						</div>
					</div>
					<div class="footer_map">
						<div class="footer_top_title">Мы на карте</div>
						<div class="footer_map_block"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A96cd775ef5a8314b951953beed5a3b1dffa1105012cbd6fe1d3ce5a2b251e3f7&amp;width=370&amp;height=260&amp;lang=ru_RU&amp;scroll=true"></script></div>
					</div>
				</div>
			</div>
			<div class="footer_bottom">
				<div class="footer_bottom_fix">
					<div class="footer_author"><span>Разработка сайтов -</span> <a href="">TRONIUM</a></div>
					<div class="footer_live"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/footer_live.png" alt=""></div>
					<div class="footer_social">
						<a target="_blank" href="<?php echo get_field('вк', 19); ?>"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/vk.png" alt=""></a>
						<a target="_blank" href="<?php echo get_field('инстаграм', 19); ?>"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/insta.png" alt=""></a>
						<a target="_blank" href="https://wa.me/<?php echo get_field('вацап', 19); ?>"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/wp.png" alt=""></a>
					</div>
					<div class="footer_low"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/eye_top.png" alt="">Версия для слабовидящих</div>
				</div>
			</div>
		</footer>
	</main>
		<script src="<?php echo $GLOBALS['theme_uri'];?>/js/jquery.cbpFWSlider.min.js"></script>
		<script>
			$( function() {

				$( '#cbp-fwslider' ).cbpFWSlider();

			} );
		</script>
		<?php wp_footer(); ?>
</body>
</html>