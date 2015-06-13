<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" charset="utf-8"/>
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />
	<title>简单</title>
	<link rel="shortcut Icon" href="images/head-icon.png">
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<link rel="stylesheet" type="text/css" href="css/mobility.css" media="screen and (max-width:800px)">
</head>
<body>
	<header>
		<div class="header-div">
			<h1>简单</h1>
			<nav>
				<img id="navImg" class="nav-img" src="images/nav.png"/>
				<ul id="label">
					<li class="there" data-label="all">所有</li>
					<li data-label="note">笔记</li>
					<li data-label="work">作品</li>
					<li data-label="life">生活</li>
				</ul>
			</nav>
			<img src="images/easy-life.png"/>
		</div>
	</header>
	<div class="main">
		<div class="left">
			<div class="notice">
				<p>(～￣▽￣)～</p>
			</div>
		</div>
		<div class="right">
			<div id="rightContent">
				<?php
					$dbc=mysqli_connect()or die('Error connect sql');
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