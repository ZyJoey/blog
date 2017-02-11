<?php
	include('./lib/sqlInfo.php');
	$query="select id from essay_message where blog_title='$title' limit 1";
	$data_id=mysqli_query($dbc,$query);
	while($row_id=mysqli_fetch_array($data_id)){
		global $id;
		$id=$row_id["id"];
	};

	$last="select id,blog_title from essay_message where id=$id-1 and isShow=0";
	$next="select id,blog_title from essay_message where id=$id+1 and isShow=0";
	$data_last=mysqli_query($dbc,$last);
	$data_next=mysqli_query($dbc,$next);
	while($row_last=mysqli_fetch_array($data_last)){
		echo '<a id="lastEssay" class="last-essay" href="essay.php?id='.$row_last["id"].'">上一篇&nbsp;<span>'.$row_last["blog_title"].'</span></a>';
	};
	while ($row_next=mysqli_fetch_array($data_next)) {
		echo '<a id="nextEssay" class="next-essay" href="essay.php?id='.$row_next["id"].'">下一篇&nbsp;<span>'.$row_next["blog_title"].'</span></a>';
	};
	mysqli_close($dbc);
?>