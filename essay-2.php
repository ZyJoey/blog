<!DOCTYPE html>
<html>
<head>
	<title>《css设计指南》笔记整理</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="initial-scale=1.0,width=device-width" />
	<link rel="stylesheet" type="text/css" href="css/essay.css">
</head>
<body>
	<header>
		<div class="header-div">
			<h1>《css设计指南》笔记</h1>
			<img class="head-img" src="images/img-2.jpg">
		</div>
	</header>
	<article>
		<time class="publish-time">发表时间：<span>2015/4/15</span></time>
		<div class="labels">
			<?php
				$title="《css设计指南》笔记";
				require_once('php/getEssay.php');
			?>
			<a class="note-label">笔记</a>
		</div>
		<section>	
			<h2 class="inner_h2">闭合标签与自闭合标签区别</h2>
			<p class="answer">闭合标签包含的是会显示的实际内容，而自闭合标签只是给浏览器提供一个对要显示内容的引用。</p>
			<h2  class="inner_h2">选择符</h2>
			<div  class="essay2_div">
				<h3>1、上下文选择符</h3>
				<ul>
					<li><strong>子选择符 : </strong>
					<em>标签1 > 标签2 </em> 
					标签2 必须是标签1 的子元素</li>
					<li><strong>紧邻同胞选择符 :</strong>
					<em> 标签1 + 标签2</em>
					标签2 必须紧跟在其同胞标签1 的后面</li>
					<li><strong>一般同胞选择符 :</strong>
					<em> 标签1 ~ 标签2</em>
					标签2 必须跟（不一定紧跟）在其同胞标签1 后面。</li>
				</ul>
				<h3>2、ID和类选择符</h3>
				<h3>3、属性选择符</h3>
				<ul>
					<li>
						<strong>属性名选择符</strong>
						<em>标签名[属性名]</em>
					</li>
					<li>
						<strong>属性值选择符</strong>	
						<em>标签名[属性名="属性值"]</em>
					</li>
				</ul>
				<h3>4、伪类</h3>
				<h4>4.1、UI伪类</h4>
				<ul>
					<li>
						<strong>链接伪类</strong>
						<em>：link </em>
						<em>：visited </em>
						<em>：hover  </em>
						<em>：active</em>
					</li>
					<li>
						<strong>:focus伪类</strong>
						&nbsp;&nbsp;获得焦点
					</li>
					<li>
						<strong>:target伪类</strong>
						&nbsp;&nbsp;用户点击一个指向页面中其他元素的链接，则那个元素就是目标
					</li>
				</ul>
				<h4>4.2、结构化伪类</h4>
				<ul>
					<li>
						<strong>:first-child 和:last-child </strong>
						:first-child 代表一组同胞元素中的第一个元素，而:last-child 则代表最后一个
					</li>
					<li>
						<strong>:nth-child</strong>
						<em>e:nth-child(n) </em>
						e 表示元素名，n 表示一个数值（也可以使用odd 或even）
					</li>
				</ul>
				<h3>5、伪元素</h3>
				<ul>
					<li>
						<strong>::first-letter 伪元素</strong>
						段落首字符
					</li>
					<li>
						<strong>::first-line 伪元素</strong>
						段落首行
					</li>
					<li>
						<strong>.::before 和::after 伪元素</strong>
						用于在特定元素前面或后面添加特殊内容,常用于数据库查询生成的结果
					</li>
				</ul>
			</div>
			<h2  class="inner_h2">计算特指度</h2>
			<div class="essay2_div">
				<strong>I - C - E</strong>
				<ol>
					<li> 选择符中有一个ID，就在I 的位置上加1；</li>
					<li>选择符中有一个类，就在C 的位置上加1；</li>
					<li>选择符中有一个元素（标签）名，就在E 的位置上加1；</li>
					<li>得到一个三位数。</li>
				</ol>
			</div>
			<h2 class="inner_h2">层叠要点</h2>
			<div class="essay2_div">
				<ol>
					<li>包含ID的选择符胜过包含类的选择符，包含类的选择符胜过包含标签名的选择符。</li>
					<li>如果几个不同来源都为同一个标签的同一个属性定义了样式，行内样式胜过嵌入样式，嵌入样式胜过链接样式。在链接的样式表中，具有相同特指度的样式，后声明的胜过先声明的。如果选择符更明确（特指度更高），无论它在哪里，都会胜出。</li>
					<li>设定的样式胜过继承的样式，此时不用考虑特指度（即显式设定优先）。</li>
				</ol>
				
			</div>
			<h2 class="inner_h2">css属性值</h2>
			<div class="essay2_div">
				<h3>文本值</h3>
				<h3>数字值</h3>	
				<p class="inner_p">
					<em>绝对值 :  </em>
					英寸(in)、厘米(cm)、毫米(mm)、点(pt)、皮卡(pc)、像素(px)
				</p>
				<p class="inner_p">
					<em>相对值 : </em>
					Em(em，表示一种字体中字母M的宽度)、Ex(ex，给定字体中字母x的高度)、百分比(%)
				</p>
				<h3>颜色值</h3>
				<p class="inner_p">
					<em>颜色名（red） </em>
				</p>
				<p class="inner_p">
					<em>十六进制颜色（#RRGGBB 或#RGB）</em>
				</p>
				<p class="inner_p">
					<em>RGB 颜色值（R, G , B）</em>
				</p>
				<p class="inner_p">
					<em>RGB 百分比值（R%, G%, B%）</em>
				</p>
				<p class="inner_p">
					<em>HSL (色相, 饱和度%, 亮度%)</em>
				</p>
				<p class="inner_p">
					<em>Alpha通道（RGBA 或 HSLA）</em>		
				</p>
			</div>
			<h2 class="inner_h2">盒模型布局</h2>
			<div class="essay2_div">
				<h3>边框（border）</h3>
				<h3>内边距（padding）</h3>
				<h3>外边距</h3>
				<p class="inner_p">
					<em>叠加外边距</em>
					&nbsp;&nbsp;垂直方向上的外边距叠加，水平外边距不叠加。
				</p>
				<p class="inner_p">
					<em>外边距单位</em>
					&nbsp;&nbsp;为文本元素设置外边距时通常需要混合使用不同的单位，如p{margin:.75em 30px;}
				</p>
				<h3>盒子宽度</h3>
				<h5>块级元素</h5>
				<p class="inner_p">没有设置宽度的元素始终会扩展到填满其父元素的宽度为止。添加水平边框、内边距和外边距，会导致内容宽度减少，减少量等于水平边框、内边距和外边距的和。</p>
				<p class="inner_p">为设定了宽度的盒子添加边框、内边距和外边距，会导致盒子扩展得更宽。实际上，盒子的width 属性设定的只是盒子内容区的宽度，而非盒子要占据的水平宽度。</p>
				<h3>浮动与清除</h3>
				<h5>浮动</h5>
				<p class="inner_p">在浮动一张图片或者其他元素时，是在要求浏览器把它往上方推，直到它碰到父元素的内边界。后面的段落不再认为浮动元素在文档流中位于它的前面了，因而它会占据父元素左上角的位置。不过，它的内容会绕开浮动的元素。</p>
				<h5>清除浮动</h5>
				<h5>浮动元素有父元素</h5>
				<img src="images/essay02-code1.png"/>	
				<p class="inner_p"><em>为父元素添加 overfolw:hideen;</em></p>
				<img src="images/essay02-code2.png"/>	
				<p class="inner_p"><em>同时浮动父元素</em>&nbsp;&nbsp; 不管其子元素是否浮动，父元素都会紧紧地包裹住它的子元素。父元素紧邻的同胞元素应用 clear:left；</p>
				<img src="images/essay02-code3.png"/>	
				<p class="inner_p">
					<em>添加非浮动的清除元素</em>
				</p>
				<p class="inner_p">在父元素内容的末尾添加非浮动元素，可以直接在标记中加</p>
				<img src="images/essay02-code4.png"/>	
				<img src="images/essay02-code5.png"/>	
				<p class="inner_p">或通过给父元素添加clearfix 类来加</p>
				<img src="images/essay02-code6.png"/>	
				<img src="images/essay02-code7.png"/>	
				<p class="inner_p">以上代码显示效果如下图</p>
				<img src="images/essay02-code8.png"/>
				<h5>浮动元素没有父元素</h5>	
				<p class="inner_p"><em>为要清除的浮动元素添加 clear:both</em></p>
				<p class="inner_p"><em>为浮动元素添加clearfix类</em></p>
				<h3>定位（position）</h3>
				<h5>静态定位(static)</h5>
				<p class="inner_p">默认定位值</p>
				<h5>相对定位(relative)</h5>
				<p class="inner_p">相对它原来在文档流中的位置定位，该元素原来占据的位置不变，也不影响其他元素位置</p>
				<h5>绝对定位(absolute)</h5>
				<p class="inner_p">完全脱离了常规文档流，它现在是相对于顶级元素body 在定位</p>
				<h5>固定定位(fixed)</h5>
				<p class="inner_p">固定定位元素的定位上下文是视口，不会随页面滚动而移动</p>
				<h5>定位上下文</h5>
				<p class="inner_p">把元素的position 属性设定为relative、absolute 或fixed 后，继而可以使用top、right、bottom 和left 属性，相对于另一个元素移动该元素的位置，即该元素的定位上下文。</p>
				<p class="inner_p">&lowast;绝对定位元素的任何祖先元素都可以成为它的定位上下文，只要把相应祖先元素的position 设定为relative 即可。</p>
				<h3>背景</h3>	
				<h5>简写规则：</h5>
				<p class="inner_p">background-color | background-image  | background-repeat | background-attachment | background-position</p>
				<h5>CSS3背景属性</h5>
				<ul>
					<li><strong>background-clip</strong>&nbsp;&nbsp;控制背景绘制区域的范围</li>
					<li><strong>background-origin</strong>&nbsp;&nbsp;控制背景定位区域的原点</li>
					<li><strong>background-break</strong>&nbsp;&nbsp;控制分离元素（比如跨越多行的行内盒子）的显示效果</li>
				</ul>
				<h5>多背景图片</h5>
				<h5>背景渐变</h5>
			</div>
			<h2 class="inner_h2">字体</h2>
			<div class="essay2_div">
				<h3>字体大小</h3>
				<p class="inner_p">默认情况下1em=16px；如想同时使用px与em可在body中设置font-size:62.5%,即1em=10px。使用相对字体大小，自动调整各层元素。</p>
				<p class="inner_p"><em>rem</em>&nbsp;&nbsp;通过它既可以做到只修改根元素就成比例地调整所有字体大小，又可以避免字体大小逐层复合的连锁反应</p>
				<h3>字体属性简写规则</h3>
				<ul>
					<li>必须声明font-size 和font-family 的值；</li>
					<li>所有值必须按如下顺序声明：font-weight、font-style、font-variant 不分先后；然后是font-size；最后是font-family</li>
				</ul>
			</div>
			<h2 class="inner_h2">页面布局</h2>
			<div class="essay2_div">
				<h3>多栏布局</h3>
				<ul>
					<li><strong>固定宽度布局</strong>&nbsp;&nbsp;不随用户调整浏览器窗口大小而变化，一般960px宽最常见。</li>
					<li><strong>流动布局</strong>&nbsp;&nbsp;随用户调整浏览器窗口大小而变化</li>
					<li><strong>弹性布局</strong>&nbsp;&nbsp;与流动布局类似，在浏览器窗口变宽时，不仅布局变宽，而且所有内容元素的大小也会变化</li>
				</ul>
				<h3>为栏设定内边距和边框</h3>
				<ul>
					<li>重设宽度以抵消内边距和边框</li>
					<li>给容器内部的元素应用内边距和边框</li>
					<li>使用box-sizing:border-box(IE6、IE7不支持，须添加腻子脚本)</li>
				</ul>
				<h3>预防过大元素</h3>
				<p class="inner_p"><strong>图片</strong>&nbsp;&nbsp;给图片添加max-width:100%;声明或给栏（或内部盒子）添加overflow:hidden;</p>
				<p class="inner_p"><strong>文本</strong>&nbsp;&nbsp;栏外添加word-wrap:break-word声明，以便所有栏继承</p>
				<p class="inner_p">&lowast;多行多栏布局等宽的各行，不用设定它们的宽度，让它们自动扩展填充外包装元素即可。各个栏是由浮动元素构成的，为了防止布局变宽导致右边的栏“下滑”，不要给容器添加内边距，而是把水平内边距加到内部div 上。</p>
				<p class="inner_p">&lowast;ID与类的用法：给标记中每个主要区域的顶级元素添加一个ID，这些ID 就会成为HTML 标记中的“路标”，放在上下文选择符开头的时候，它们就能起到框定后代元素的作用。这样可以最少的使用ID和类。</p>
			</div>
			<p>以上。</p>
			<p>我要不是被移动设备逼疯了估计还意识不到自己的CSS基础薄弱，于是赶紧找了本CSS的书来看。花了三天时间把这本书看完，看完之后已经不能再直视自己之前写的页面了TT__TT。好了，让我去拿个模板练手先。</p>
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
</body>
</html>
