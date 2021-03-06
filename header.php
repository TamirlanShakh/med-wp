<?php 
	if($_GET['SiteVersion'])
	{
		setcookie("SiteVersion", $_GET['SiteVersion'], time() + 3600 * 24, '/', $_SERVER['SERVER_NAME']);
		header('Location:./');
	}	
	

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo $GLOBALS['theme_uri'];?>/style.css">
	<title>Медицинский колледж</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['theme_uri'];?>/css/component.css" />
	<?php if($_COOKIE['SiteVersion']=='low'): ?>
	<link rel="stylesheet" type="text/css" href="<?php echo $GLOBALS['theme_uri'];?>/css/low.css" />	
	<?php endif; ?>	
	<?php wp_head(); ?>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?php echo $GLOBALS['theme_uri'];?>/js/scripts.js"></script>
	<script src="<?php echo $GLOBALS['theme_uri'];?>/js/modernizr.custom.js"></script>
	<link rel="stylesheet" href="<?php echo $GLOBALS['theme_uri'];?>/responsive.css">
	<?php wp_enqueue_script('comment-reply'); ?>
</head>
<body>
	<main>
		<header>
			<div class="header_top">
				<div class="header_top_fix">
					<div class="header_menu_mobile"></div>
					<nav class="header_menu">
						<?php $menu = wp_get_nav_menu_items(3); $menu_sub = $menu;?>
						<ul>
							<?php foreach($menu as $item):?>
							<?php if ($item->menu_item_parent == 0):?>
							<li>
								<a href="<?php echo $item->url;?>"><?php echo $item->title;?></a>
								<?php $sub_k = 0; foreach($menu_sub as $sub_item) if($item->ID == $sub_item->menu_item_parent){$sub_k++;}?>
								<?php if($sub_k): ?>
								<div class="header_sub_menu_mobile">+</div>
								<ul class="children_menu">
									<?php foreach($menu_sub as $sub_item):?>
									<?php if($item->ID == $sub_item->menu_item_parent):?>	
									<li><a href="<?php echo $sub_item->url?>"><?php echo $sub_item->title;?></a></li>
									<?php endif;?>
									<?php endforeach;?>
								</ul>
								<?php endif;?>
							</li>
							<?php endif;?>
							<?php endforeach;?>
						</ul>
					</nav>
					<div class="header_login">
						<?php if(is_user_logged_in()): ?>
						<a href="<?php echo get_the_permalink(108)."?user=".get_current_user_id();?>"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/login_top.png" alt="">Личный кабинет</a>	
						<a href="<?php echo get_admin_url();?>"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/login_top.png" alt="">Админ</a>	
						<a href="<?php echo esc_url(wp_logout_url('/'));?>"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/login_top.png" alt="">Выйти</a>	
						<?php else: ?>
						<a href="<?php echo wp_login_url(); ?>" class="rcl-login"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/login_top.png" alt="">Вход</a>
						<a href="<?php echo wp_registration_url(); ?>" class="rcl-register"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/reg_top.png" alt="">Регистрация</a>
					<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="header_bottom">
				<div class="header_bottom_fix">
					<div class="header_bottom_left">
						<a href="<?php echo $GLOBALS['home_url'];?>" class="header_logo"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/header_logo.png" alt=""></a>
					</div>
					<div class="header_bottom_right">
						<div class="header_bottom_right_top">
							<div class="header_search">
								<form action="<?php echo $GLOBALS['home_url'];?>" name="s">
									<input type="text" placeholder="Поиск..." name="s" value="<?php echo $_GET['s'];?>">
									<input type="submit" value="">
								</form>
							</div>

							<?php if($_COOKIE['SiteVersion'] == 'low'): ?>
							<a href="<?php echo $GLOBALS['home_url'];?>/?SiteVersion=def" class="header_low"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/eye_top.png" alt="">Обычная версия</a>	
							<?php else: ?>
							<a href="<?php echo $GLOBALS['home_url'];?>/?SiteVersion=low" class="header_low"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/eye_top.png" alt="">Версия для слабовидящих</a>
							<?php endif; ?>	
							



							<div class="header_lang"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/globus_top.png" alt=""><?php echo do_shortcode('[gtranslate]'); ?></div>
						</div>
						<div class="mobile_logo_icons">
							<a href="<?php echo $GLOBALS['home_url'];?>" class="mobile_header_logo"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/header_logo.png" alt=""></a>
							<div class="mobile_header_icons"><img src="<?php echo get_field('медали', 19) ?>" alt=""></div>
						</div>
						<div class="header_bottom_right_bottom">
							<div class="header_title">
								<?php echo get_field('текст_в_шапке', 19) ?>

							</div>
							<div class="header_icons"><img src="<?php echo get_field('медали', 19) ?>" alt=""></div>
						</div>
					</div>
				</div>
			</div>
		</header>