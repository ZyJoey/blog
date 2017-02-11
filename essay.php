<?php 
	session_start();
	include('./lib/sqlInfo.php');
	date_default_timezone_set('prc');
	$url=$_SERVER["QUERY_STRING"];
	$id=substr($url, 3);
	$query="select * from essay_message where id=$id and isShow=0";
	$data=mysqli_query($dbc,$query) or die("");
	while($row=mysqli_fetch_array($data)){
		global $blog_title,$img,$content,$date,$label_name;
		$title=$row["blog_title"];
		$img=$row["image"];
		$date=$row["date"];
		$essay=$row["essay"];
		$style=$row["style"];
		$script=$row["script"];
		$music=$row["music"];
		$musicName=$row["musicName"];
		$sourceSrc=$row["sourceSrc"];
		$label_name=$row["label_name"];
	};
	mysqli_close($dbc);	
?> 
<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $title; ?>
	</title>
	<meta charset="utf-8"/>
	<link rel="shortcut Icon" href="images/head-icon.png">
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />
	<link rel="stylesheet" type="text/css" href="css/code.min.css">
	<link rel="stylesheet" type="text/css" href="css/essay.css">
	<link rel="stylesheet" type="text/css" href="css/dialog.css">
	<?php 
		if($style){
			echo '<link rel="stylesheet" type="text/css" href="css/'.$style.'">';
		};
	?>
	<link rel="stylesheet" type="text/css" href="css/mobility-essay.css" media="screen and (max-width:800px)">
</head>
<body>
	<header>
		<div class="mobility-nav">
			<div id="mobilityBack" class="mobility-back"></div>
		</div>
		<div class="header-div">
			<?php
				echo "<h1>".$title."</h1>";
				echo '<img class="head-img" src="images/'.$img.'">';
			?>
		</div>	
	</header>
	<article>
		<time class="publish-time">发表时间：<span><?php echo $date; ?></span></time>
		<div class="labels">
			<a class="life-label">
				<?php
					echo $label_name; 
				?>
			</a>
		</div>
		<section>
			<?php
				echo $essay;
			?>
		</section>	
	</article>
	<div class="menu">
		<div class="menu-essay">
			<?php
				require_once('lib/getEssayTitle.php');
			?>
		</div>
		<div class="menu-icon">
			<?php
				if($music==0){
					echo '<div class="music icon" title="'.$musicName.'"id="musicCtl">
						<audio id="music">
							<source src="'.$sourceSrc.'" type="audio/mpeg">
						</audio>
						</div>';
				}else{
					echo "";
				};
				require_once('lib/getEssay.php');
			?>
			<div class="top icon" id="top"  title="戳我带你飞(￣︶￣)↗"  ></div>
		</div>
	</div>
	<div class="comment">
		<div class="comment-container">
			<h2>留言栏</h2>	
			<?php 
				include('./lib/sqlInfo.php');
				date_default_timezone_set('prc');
				$querySec="select * from essay_comment where blog_title='$title' order by date asc ";
				$dataSec=mysqli_query($dbc,$querySec) or die("Error");
				if(mysqli_num_rows($dataSec)<=0){
					echo " <p class='comment-none'>还没有人评论┑(￣Д ￣)┍</p>";
				}else{
					$i=0;
					while($row=mysqli_fetch_array($dataSec)){
						++$i;
						echo "<div class='comment-wrap'>
						<a class='comment-num'>
							<span>{$i}</span>楼
						</a>
						<p class='comment-personal'>
							<span>".htmlentities($row['username'],ENT_QUOTES,'utf-8')."</span> 于 <span>{$row['date']}</span> 发表评论：
						</p>
						<p class='message'>".nl2br(htmlentities($row['comment'],ENT_QUOTES,'utf-8'))."</p>
					</div>";
				};
			};
			mysqli_close($dbc);
			?>
		</div>
		<form id="commentForm" class="comment-form">
			<input type="text" name="username" placeholder="我要怎么称呼你◔ ‸◔?（名字超过十个字记不住~(๑•́ ₃ •̀๑)）" class="comment-text" 
			value=<?php  
				if(isset($_COOKIE["username"])){
					echo $_COOKIE["username"];
				}else{
					echo "";
				}
			?>>
			<input type="email" name="email" placeholder="你的邮箱ლ(╹◡╹ლ我不会告诉别人的~)" class="comment-text"
			value=<?php 
				if(isset($_COOKIE["email"])){
					echo $_COOKIE["email"];
				}else{
					echo "";
				}
			?>>
			<textarea name="comment" class="comment-text" rows="5" placeholder="想说什麽(*/ω╲*)"></textarea>
			<div>
				<input type="text" name="verify" class="comment-text comment-code" value="" placeholder="填这个(。・・)-->">
				<img id="cVerifyCode" class="comment-img" src="lib/createCode.php" alt="验证码呢(。﹏。)?" title="戳我换一张(╯▽╰)">
			</div>
			<button id="submitBtn" type="submit" class="comment-button">提交</button>
		</form>
	</div>
	<script src="js/util.js"></script>
	<script src="js/essay.js"></script>
	<script src="js/dialog.js"></script>
	<script src="js/validator.js"></script>
	<?php
		if($script){
			echo $script;
		};
	?>
</body>
</html>