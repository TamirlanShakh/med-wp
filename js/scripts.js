$(document).ready(function(){
	$('.gallery_tabs_video').click(function(){
		$('.gallery_tabs_video').addClass('gallery_tabs_active');
		$('.gallery_tabs_photo').removeClass('gallery_tabs_active'); 
		$('.gallery_photo').css({'display':'none'}); 
		$('.gallery_video').css({'display':'block'}); 

	});
	$('.gallery_tabs_photo').click(function(){
		$('.gallery_tabs_photo').addClass('gallery_tabs_active');
		$('.gallery_tabs_video').removeClass('gallery_tabs_active'); 
		$('.gallery_video').css({'display':'none'}); 
		$('.gallery_photo').css({'display':'block'});
	});

	$('#my-calendar tbody').addClass('notranslate');

	//Ajax-подгрузка новостей на главной

	$('.general_news_more_home').click(function(){
		var offset_val = $('.general_news_list').find($('.news_block')).length;
		if(offset_val>=2)
		{
			var data = {
				action: 'general_news_list',
				offset: offset_val
			};
			jQuery.post( ajaxurl, data, function(response){
				if(response!=0){
					$('.general_news_list').html($('.general_news_list').html() + response);
				}else{
					$('.general_news_more_home').css({'display':'none'})
				}
			});
		}
	});	


	//Ajax-подгрузка новостей на главной

	$('.general_news_more_cat').click(function(){
		var offset_val = $('.cat_list').find($('.news_block')).length;
		var cat_id_val = $('.general_news_more_cat').attr('cat_id');
		if(offset_val>=2)
		{
			var data = {
				action: 'cat_list',
				offset: offset_val,
				cat_id: cat_id_val
			};
			jQuery.post( ajaxurl, data, function(response){
				if(response!=0){
					$('.cat_list').html($('.cat_list').html() + response);
				}else{
					$('.general_news_more_cat').css({'display':'none'})
				}
			});
		}
	});

	var open = false; 
	$('.header_menu_mobile').click(function(){
		var h = $('.header_menu')[0].scrollHeight;
		if(open){
			$('.header_menu').animate({'height':'0px'}, 1000);
			open = false;
		}else{
			$('.header_menu').animate({'height':h+'px'}, 1000);
			open = true;
		}
	});	

	
	$('.header_sub_menu_mobile').click(function(){
		var sub_h = $(this).siblings('.children_menu')[0].scrollHeight;
		var parent_sub_h = $(this).siblings('.children_menu').height();
		if(parent_sub_h>0){
			$('.children_menu').animate({'height':'0px'}, 1000);
		}else{
			$('.children_menu').animate({'height':sub_h+'px'}, 1000);
			$('.header_menu').css({'overflow-y':'scroll'});
		}
	});	

	var lm_open = false; 
	$('.left_menu_mobile').click(function(){
		var lm_h = $('.left_menu_m')[0].scrollHeight;
		if(lm_open){
			$('.left_menu_m').animate({'height':'0px'}, 1000);
			setTimeout(function(){
			$('.left_menu_m').css({'overflow':'hidden'});	
			},1500); 
			lm_open = false;
		}else{
			$('.left_menu_m').animate({'height':lm_h+'px'}, 1000);
			setTimeout(function(){
			$('.left_menu_m').css({'overflow':'visible'});	
			},1500); 
			lm_open = true;
		}
	});	

	//подгрузка scroll
	cursor_top = 0;
	$(document).scroll(function () {
	    yes = $(".general_news_more").offset().top;
	    if($(window).scrollTop() + $(window).height()>yes) {
	    	if(cursor_top == 0)
			{   
		    	cursor_top = 1;
		    	setTimeout(function(){
                    $('.general_news_more')[0].click();
                }, 200);
			}
		} else {cursor_top = 0;}
	});
});