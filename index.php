<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" charset="utf-8"/>
	<title>简单</title>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
	<header>
		<div class="header-div">
			<h1>简单</h1>
			<nav>
				<ul id="label">
					<li class="there" data-label="all">所有</li>
					<li data-label="front">前端</li>
					<li data-label="life">生活</li>
					<li data-label="other">其它</li>
				</ul>
			</nav>
			<img src="images/easy-life.png"/>
		</div>
	</header>
	<div class="main">
		<div class="left">
			<div class="notice">
				<p></p>
			</div>
		</div>
		<div class="right">
			<div id="rightContent">
				<?php
					$dbc=mysqli_connect('qdm149630189.my3w.com','qdm149630189','zhouyi6595891','qdm149630189_db')or die('Error connect sql');
					mysqli_query($dbc,"set names utf8");
					$query="select * from essay_message order by date desc limit 5";
					$data=mysqli_query($dbc,$query);
					while($row=mysqli_fetch_array($data)){
						echo '<section class=" '.$row["label"].' ">';
						echo '<time class=" '.$row["label"].'-label" >'.$row["date"].'</time>';
						echo '<h2><a href="'.$row["url"].'" target="_blank">'.$row["blog_title"].'</a></h2>';
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
			</div>
			<div id="more" class="more">查看更多文章</div>
		</div>
	</div>
	<img id="top" class="top" title="返回顶部" src="images/top.png"/>
	<script src="js/main.js"></script>
</body>
</html>