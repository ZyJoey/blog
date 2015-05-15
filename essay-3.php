<!DOCTYPE html>
<html>
<head>
	<title>关于蓝芒科技pc端项目的总结</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />
	<link rel="stylesheet" type="text/css" href="css/essay.css">
	<link rel="stylesheet" type="text/css" href="css/essay3.css">
</head>
<body>
	<header>
		<div class="header-div">
			<h1>关于蓝芒科技pc端项目的总结</h1>
			<img class="head-img" src="images/img-3.jpg">
		</div>
	</header>
	<article>
		<div class="publish-time">发表时间：<span>2015/5/13</span></div>
		<div class="labels">
			<?php
				$title="关于蓝芒科技pc端项目的总结";
				require_once('php/getEssay.php');
				
			?>
			<a class="work-label">作品</a>
		</div>
		<section>
			<p>智能家居网站这个项目是同学委托我做的，实际上在pc端页面开发之前就已经做了一个移动端的开发，然后我向我同学提议说做个pc产品展示页更便于用户了解，毕竟它的登陆机制是需要与硬件绑定（这样我还怎么向别人展示我写的东西呢！！）。</p>
			<p>而我想象中的pc端展示是像这样：</p>
			<div class="gallery">
				<div>
					<img id="galleryImg" src="images/essay03-gallery.png"/>
				</div>
			</div>
			<p>(我又想吐槽一下当初做这个的时候适配手机尺寸没把我心堵死，不过也怪当时没有掌握好布局技巧╮(╯﹏╰)╭，移动端因为还有一些细节需要修改，所以等改好以后再写总结。)</p>
			<p>结果我同学显然没有get到我的用意，连夜做好设计图后丢给我还补充说要有加载进度条、整屏滚动、点击进入的打开效果云云，我当时一边听一边内心咆哮：你是不是太看得起我了呢！！！但是嘴上还是说：那我试试(。﹏。)</p>
			<p>然后经过两次修改，进度条被毙掉了，留下了最终效果，挂链接：</p>
			<p><a href="demo/demo1/index.html">蓝芒物联科技</a></p>
			<p>简单说一下思路好了，点击打开的效果是用两个div做了一个遮罩层，点击让高度变为0，因为加了css3的动画时间所以看上去像缓慢拉开的样子。</p>
			<p>整屏滚动是用scrollTop加定时器做的定位效果，不过尝试了很多方法也没能使scrollTop兼容ie，虐哭。</p>
			<p>页面左侧的导航条切换用到了DOM的同辈元素，不过原生js并没有获取所有同辈元素的方法，所以自己写了一个</p>
			<img src="images/essay03-code.png" />
			<p>因为siblings()返回的是数组，所以还要做循环匹配替换。</p>
			<p>以上。做完总结就可以投入到下一个项目啦~</p>
		</section>	
	</article>
	<div class="menu">
		<div>
			<?php
				require_once('php/getEssayTitle.php');
			?>
		</div>
		<img id="top" class="top" title="返回顶部" src="images/top.png"/>	
	</div>	
	<script src="js/essay.js"></script>
	<script>
		var galleryImg=document.getElementById("galleryImg");
		var offset=0; 
		setInterval(function(){	
			var k=0;
			var set=setInterval(function(){
				if(k<4){
					offset+=-49;
					galleryImg.style.left=offset+"px";
					k++;
				}else{
					clearInterval(set);
				}
			},80);
			if(offset==-980){
				galleryImg.style.left=0;
				offset=0;
			}
		},2000);
		
	</script>
</body>
</html>