<?php
	$dbc=mysqli_connect('localhost','root','','myblog')or die('Error connect sql');
	mysqli_query($dbc,"set names utf8");
	date_default_timezone_set('prc');
	/*获取ip地址*/
	$ip =$_SERVER["REMOTE_ADDR"];
	/*赞过中查询ip地址*/
	$query    ="select * from message where ip='$ip' and blog_title='$title' ";
	/*查询赞数*/
	$querySec ="select * from message where blog_title='$title' ";
	$data     =mysqli_query($dbc,$query);
	$dataSec  =mysqli_query($dbc,$querySec);
	$times    =mysqli_num_rows($dataSec);
	if(mysqli_num_rows($data)!=1){
	/*	echo '<div class="like icon none" id="like"  title="'.$times.'"></div>';*/
	echo '<div class="like icon none" id="like"  title="赞我<(￣ˇ￣)/"></div>';
	}else{
		/*echo '<div class="like icon" id="like"  title="'.$times.'"></div>';*/
		echo '<div class="like icon" id="like"  title="已经赞过啦(>▽<)"></div>';
	};
	$queryThird="select * from message_view where blog_title='$title' and ip='$ip' ";
	$dataThird=mysqli_query($dbc,$queryThird);
	if(mysqli_num_rows($dataThird)!=1){
		mysqli_query($dbc,"INSERT INTO message_view (blog_title,ip,time) VALUES "." ('$title','$ip',NOW())");
		mysqli_query($dbc,"update essay_message set  view=view+1 where blog_title ='$title' ");
	};
	mysqli_close($dbc);
?>