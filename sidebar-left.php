<div class="general_left">
	<div class="left_menu_mobile">Навигация</div>
	<div class="left_menu_m">
		<nav class="left_menu obvodka">
			<ul>
				<?php $left_menu = wp_get_nav_menu_items(2);?>
				<?php foreach($left_menu as $item): ?>
				<li><a href="<?php echo $item->url;?>"><?php echo $item->title;?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</div>	
	<div class="resources obvodka">
		<div class="resources_title">Образовательные ресурсы</div>
		<div class="resources_list">
			<?php $resources = get_field('ресурсы',19);?>
			<?php foreach($resources as $resource): ?>
			<a href="<?php echo $resource['ссылка'];?>" class="resources_block" target="_blank">
				<img src="<?php echo $resource['лого'];?>" alt="">
				<div class="resources_block_title"><?php echo $resource['название'];?></div>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</div>