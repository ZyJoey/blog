<!DOCTYPE html>
<html>
<head>
	<title>昨夜的咖喱，明日的面包</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />
	<link rel="stylesheet" type="text/css" href="css/essay.css">
</head>
<body>
	<header>
		<div class="header-div">
			<h1>昨夜的咖喱，明日的面包</h1>
			<img class="head-img" src="images/img-1.jpg">
			<div class="audio">
				<audio id="music">
					<source src="music/essay-1.mp3" type="audio/mpeg">
				</audio>
				<div class="audio-style">
					<img id="play" class="play" title="播放" src="images/play.png"/>
					<span class="name">RSP-M～もうひとつのラブストーリー～</span>
					<div id="progressBar" class="progress-bar">
						<div id="currentProgress" class="current-progress"></div>
					</div>
					<time><span id="playTime" class="play-time">00:00</span>/<span id="length" class="length"> 00:00</span></time>	
				</div>
			</div>
		</div>	
	</header>
	<article>
		<time class="publish-time">发表时间：<span>2015/3/28</span></time>
		<div class="labels">
			<?php
				$title="昨夜的咖喱，明日的面包";
				require_once('php/getEssay.php');
			?>
			<a class="life-label">生活</a>
		</div>
		<section>
			<p>"你可以比任何人都幸福。"</p>
			<p>——这是全剧的最后一句话，当徹子问街边卖字画的与过世的丈夫一树有着相同相貌的年轻人：”我还可能获得幸福吗？”，那个年轻人的回答。</p>
			<p>如果让我简短地评价一下这部剧，我会说BGM、画风是非常典型的日式小清新，但故事略有瑕疵，可能是当中的一些情节设置太令人匪夷所思吧：丈夫过世后，妻子与公公住在一起七年，彼此扶持照顾；妻子始终将丈夫的一节骨头带在身上；与过世的丈夫共同长大的邻居姐姐自其过世后再未笑过……这些情节不免让人怀疑是否过分煽情，不过在这部平淡温情又蕴含淡淡感伤的剧里依然有十分打动人的地方。</p>
			<p>我记得当中有一集是说，已故的人可能会回到他们曾经生活居住的地方，但只有三次机会，而他们的至亲至爱之人是看不见的。于是当一树回来的时候，只有与他生前并不认识的、一直在追求着徹子的岩井看见了他。</p>
			<p>岩井说：“我要与你决斗赢得徹子。”</p>
			<p>而一树的回答是：“我觉得你比我占优势啊，你还活着。”</p>
			<p>已故的人生前的伤口会消失，所以身上有伤痕是你还活着的证明。</p>
			<p>以及徹子的那番独白：“如果从那颗星球眺望地球，是否会看到，许多人的伤口在反复打开、愈合，就像以不同的节奏在呼吸一般，打开、愈合。”</p>
			<p>还有一集讲述的是，岩井为了阻止一个试图自杀的陌生女孩，答应了女孩的三个要求，并给了他三张自己的名片，名片上面写着要求的魔法属性，分别是“弱”、“中”、“强”。</p>
			<p>女孩拿着写了“强”的名片说：“我要你借给我你的全部积蓄。”</p>
			<p>然后女孩拿着这笔钱消失了，岩井也得知女孩告诉他的家庭住址是假的。大家都谣传岩井是被美女骗婚赔上了所有积蓄。</p>
			<p>谣言传到了徹子这里，徹子信以为真，于是跑去质问，岩井说他与女孩约定不能把他们之间的秘密告诉第三个人，然后非常抱歉地说：“这是我准备和你结婚所用的钱，但现在你可能需要等等。”</p>
			<p>徹子生气地走了，临走时误拿了岩井的手机接到了来自女孩的电话，女孩告诉了她事情的全部，并把钱偷偷放回了岩井的家中。</p>
			<p>傍晚时分，女孩与徹子的对话。</p>
			<p>"好想告诉八木啊。"</p>
			<p>"什么？"</p>
			<p>"诗人八木重吉，<p>'我自身也好<p>身外的世界也好<p>就没有些真正美好的事物了吗<p>就算是敌人也无所谓<p>无法触及也无妨<p>只要知晓它的存在<p>啊&nbsp;&nbsp; 我长久以来为此拼命追逐而疲惫不堪的心灵。'<p>好想告诉八木啊，告诉他说不定真的有哦。"</p>
			<p>岩井看到钱后第一时间打电话给了徹子，兴奋地说：“我们可以结婚了。”</p>
			<p>知晓一切的徹子在电话这边笑了笑，故意说道：“诶，我有说钱回来了我就会和你结婚吗？”</p>
			<p>那一集的最后，岩井也送给了徹子一张名片。</p>
			<img src="images/blogimg1.jpg"/>
			<p>（os：甜！甜！甜！！岩井君要不要辣么萌！！！）</p>
			<p>我最喜欢这部剧的地方是，故事里的每一个人都有他们的坚强与脆弱，当我们以为自己是不被需要的那一个的时候，有人告诉我，你对我是重要的，这样就很好了。</p>
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
	<script src="js/music.js"></script>
	<script src="js/essay.js"></script>
</body>
</html>