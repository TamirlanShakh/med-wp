<?php
function normname($cur_user_id) {
    $first_name = get_the_author_meta('first_name',$cur_user_id);
    if($first_name)
	{ 
		return title($first_name." ".get_the_author_meta('last_name',$cur_user_id),50);
	}else 
	{ 
		return title(get_the_author_meta('display_name',$cur_user_id),40); 
	}
}
?>