<?php 

//глобальные переменные
$GLOBALS['theme_uri'] = get_template_directory_uri();
$GLOBALS['home_url'] = home_url();

 ?>

 <?php 
//
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
	register_nav_menus([
	 'topmenu' =>'Верхнее меню', 
	 'leftmenu' =>'Левое меню', ]);
}

	//последняя категория
	function cat_end($postid){
		$cats = get_the_category($postid); $cats_id = array();
		foreach ($cats as $cat) {
			$cats_id[] = $cat->cat_ID; 
		}
		rsort($cats_id);
		return $cats_id[0];
	}
function get_post_meta_view($post_ID) {
	$get_post_meta_view = get_post_meta($post_ID,'views',true);	
	if($get_post_meta_view) {
		return $get_post_meta_view;
	}else {
		return 0;
	}
}
?>
<?php 
	function news_block(){
		$cats_id = cat_end(get_the_ID());
?>		
		<div class="news_block obvodka">
			<a href="<?php the_permalink(); ?>" class="news_block_img" style="background: url('<?php echo get_field('фото'); ?>')no-repeat center/cover;"></a>
			<div class="news_block_cat_views">
				<a href="<?php echo get_category_link($cats_id);?>" class="news_block_cat"><?php echo get_cat_name($cats_id);?></a>
				<div class="news_block_views"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/news_block_views.png" alt=""><?php echo get_post_meta_view(get_the_ID())?></div>
			</div>
			<a href="<?php the_permalink();?>" class="news_block_title"><?php the_title();?></a>
			<div class="news_block_date"><?php echo get_the_date(); ?></div>
			<div class="news_block_desc"><?php echo get_field('краткое_описание') ?></div>
		</div>
<?php		
	}
 ?>
 <?php 
 	function right_obv(){
 ?>
<div class="obv_block">
	<a href="<?php the_permalink(); ?>" class="obv_block_img" style="background: url('<?php echo get_field('фото'); ?>')no-repeat center/cover;"></a>
	<a href="<?php the_permalink(); ?>" class="obv_block_title"><?php the_title(); ?></a>
	<div class="obv_block_date_views"><?php echo get_the_date(); ?><span>|</span><img src="<?php echo $GLOBALS['theme_uri'];?>/images/news_block_views.png" alt=""><?php echo get_post_meta_view(get_the_ID())?></div>
</div>
 <?php 
 	}
register_sidebar(
	array (
		'name' =>__('Календарь в сайдбаре',''),
		'id' => 'kalendar',
		'description' => __('',''),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',

	));
//ajax-подгрузка новостей новостей на главной
add_action('wp_ajax_general_news_list','general_news_list');
add_action('wp_ajax_nopriv_general_news_list','general_news_list');

function general_news_list() {
	$offset = $_POST['offset'];
	$query = new WP_Query(
		$args = array (
			'posts_per_page' => 2,
			'category__in'=> array(4),
			'offset' => $offset,
		
		)

	);
	if( $query->have_posts()):
	while( $query->have_posts()): $query->the_post();
	news_block();	
	endwhile; 
	else:
	endif;
	wp_die();
}

//ajax-подгрузка новостей новостей на главной
add_action('wp_ajax_cat_list','cat_list');
add_action('wp_ajax_nopriv_cat_list','cat_list');

function cat_list() {
	$offset = $_POST['offset'];
	$cat_id = $_POST['cat_id'];
	$query = new WP_Query(
		$args = array (
			'posts_per_page' => 2,
			'category__in'=> array($cat_id),
			'offset' => $offset,
		
		)

	);
	if( $query->have_posts()):
	while( $query->have_posts()): $query->the_post();
	news_block();	
	endwhile; 
	else:
	endif;
	wp_die();
}

?>
<?php 
function single_attr(){
?>
<div class="single_attr">
	<div class="single_attr_left">
		<a href="<?php $cats_id = cat_end(get_the_ID()); echo get_category_link(get_the_ID());?>" class="single_attr_cat"><?php echo get_cat_name($cats_id);?></a>
		<div class="single_attr_views"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/news_block_views.png" alt=""><?php echo get_post_meta_view(get_the_ID())?></div>
		<div class="single_attr_date"><img src="<?php echo $GLOBALS['theme_uri'];?>/images/single_attr_date.png" alt=""><?php echo get_the_date(); ?></div>
	</div>
	<div class="single_attr_share">
		<script src="https://yastatic.net/share2/share.js"></script>
		<div class="ya-share2" data-curtain data-services="vkontakte,facebook,odnoklassniki,telegram,whatsapp"></div>
	</div>			
</div>

<?php	
}

 ?>