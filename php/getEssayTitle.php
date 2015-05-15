<?php
	$dbc=mysqli_connect('localhost','root','','myblog')or die('Error connect sql');
	mysqli_query($dbc,"set names utf8");
	$query="select blog_title,last_essay,last_essay_url,next_essay,next_essay_url from essay_message where blog_title='$title' limit 1";
	$data=mysqli_query($dbc,$query);
	while($row=mysqli_fetch_array($data)){
		echo '<a class="last-essay" href="'.$row["last_essay_url"].'">上一篇&nbsp;<span>'.$row["last_essay"].'</span></a>';
		echo '<a class="last-essay" href="'.$row["next_essay_url"].'">下一篇&nbsp;<span>'.$row["next_essay"].'</span></a>'; 
	}
	mysqli_close($dbc);
?>