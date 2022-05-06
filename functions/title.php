<?php
function title($get_the_title,$limit)
{
	$string = substr($get_the_title,0,800);
	$result = implode(array_slice(explode('<br>',wordwrap($string,$limit,'<br>',false)),0,1));
	if (iconv_strlen($string, 'UTF-8') != iconv_strlen($result, 'UTF-8')) {return $result."...";}else{return $result;}
}
?>