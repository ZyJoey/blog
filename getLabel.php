<?php
	$dbc=mysqli_connect('qdm149630189.my3w.com','qdm149630189','zhouyi6595891','qdm149630189_db')or die('Error connect sql');
	mysqli_query($dbc,"set names utf8");
	$label=$_REQUEST["label"];
	if(isset($_REQUEST["line"])){
		$line=$_REQUEST["line"];
		$query="select * from essay_message where label like '%$label%' order by date desc limit $line,5";
	}else{
		$query="select * from essay_message where label like '%$label%' order by date desc limit 5";
		
	}
	$data=mysqli_query($dbc,$query);
	if(mysqli_num_rows($data)<=5){
		echo "no_more";
	}
	while($row=mysqli_fetch_array($data)){
		echo '<section class=" '.$row["label"].' ">';
		echo '<time class=" '.$row["label"].'-label" >'.$row["date"].'</time>';
		echo '<h2><a href=" '.$row["url"].' " target="_blank"> '.$row["blog_title"].'</a></h2>';
		echo '<div class="icon">';
		echo '<img class="view-icon" src="images/view.png"/>';
		echo '<span class="view">'.$row["view"].'</span>';
		echo '<img class="like-icon" src="images/dislike.png"/>';
		echo '<span class="like">'.$row["praise"].'</span></div>';
		echo '<div class="content">'.$row["content"];
		echo '<div class="label-box">';
		if($row["music"]){
			echo '<img class="music" src="images/music.png" />';
		};
		echo '<span class="label '.$row["label"] .'-label">'.$row["label_name"].'</span></div></div></section>';
	}
	mysqli_close($dbc);
?>
