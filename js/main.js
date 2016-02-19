
/*标签筛选*/
(function(){
	var allLabel = document.getElementById("label"),
		labelLi = allLabel.getElementsByTagName("li"),
		len = labelLi.length,
		rightContent = document.getElementById("rightContent"),
		more = document.getElementById("more"),
		loadTip =  document.getElementById("loadTip"),
		mark = 0,	//判断获取更多文章是否正在执行中
		isSend = 0;	//判断标签切换请求是否正在执行中


/*********************************移动端事件**************************/
	if(window.screen.width>800){
		for(var i=0;i<len;i++){
			labelLi[i].onclick=selectLabel;
		}
	}else{
		var navImg=document.getElementById("navImg");
		var label=document.getElementById("label");
		navImg.addEventListener("touchstart",function(){
			if(label.className=="ul-add"){
				label.className="";
			}else{
				label.className="ul-add";
			}
		},false);
		for(var i=0;i<len;i++){
			labelLi[i].addEventListener("touchstart",selectLabel,false);
			labelLi[i].addEventListener("touchend",function(event){
				label.className="";
			},false);
		}
		function touch(event){
			var a=this.getElementsByTagName("a")[0];
			var href=a.getAttribute("href");
			location.href=href;
			if(event.target==a){
				event.preventDefault();
			}
		}
		function downSection(){
			var section = rightContent.getElementsByTagName("section");
			for(var j=0;j<section.length;j++){
				section[j].addEventListener("mousedown",touch,false);
			};
		};
		downSection();
		/*遮罩层高度及事件*/
		function showMaskLayer(){
			try{
				var maskLayer = document.getElementById("maskLayer");
				maskLayer.style.height  = document.body.scrollHeight + "px";
				function closeLayer(distanceX,distanceY){
					if(Math.abs(distanceX)>100 || Math.abs(distanceY)>50){
						maskLayer.style.display = "none";
					};
				};
				self.move(closeLayer);	
			}catch(error){
				return 0;
			};
		}

		/*下拉获取更多文章*/
		function pushMore(distanceX,distanceY){
			if(distanceY>200 && mark == 0){
				moreEssay();
			}
		}

		showMaskLayer();
		self.move(pushMore);
	}

	//切换标签
	function selectLabel(){
		var old = allLabel.querySelector(".there"),
			text = this.getAttribute("data-label"),
			url;

		//属于当前类别或已有请求正在执行
		if(text == old.getAttribute("data-label") || isSend == 1){
			return false;
		}

		more.addEventListener("mousedown",moreEssay,false);

		//更改界面样式
		old.removeClass("there");
		this.addClass("there");
		loadTip.style.color = self.getColor();
		loadTip.removeClass("none");

		//发送请求
		url = "lib/getLabel.php?label="+escape(text);
		isSend = 1;
		Ajax.send("GET",url,displaySection);
	}
	function displaySection(data){
		var result,content;
		loadTip.addClass("none");
		result = isNoMore(data);
		rightContent.innerHTML = result;

		if(window.screen.width<=800){
			downSection();	
		}

		isSend = 0;	
	}



	/*获取更多文章*/
	function moreEssay(){
		if(mark == 1 || isSend == 1){
			return false;
		}else{
			mark = 1;
		}
		var text=this.firstChild;
		var there=document.getElementsByClassName("there")[0];
		var line=document.getElementById("rightContent").getElementsByTagName("section").length;
		var label=there.getAttribute("data-label");
		var regexp=/没有/;
		if(regexp.test(text)){
			return;
		}else{
			this.innerHTML="<image class='loading' src='images/loading.png'/>";
			var url="lib/getLabel.php?label="+escape(label)+"&line="+escape(line);
			Ajax.send("GET",url,addEssay,function(){
				mark = 0;
			});
		}
	}

	function addEssay(data){
		var result;
		result = isNoMore(data);
		rightContent.innerHTML+=result;
		if(window.screen.width<=800){
			downSection();	
		}
		mark = 0;	
	}
	/*获取请求后判断根据是否仍有可加载文章进行处理*/
	function isNoMore(data){
		var content;
		if(/^no_more/.test(data)){
			content = document.createTextNode("没有了(⊙﹏⊙)");
			more.replaceChild(content,more.firstChild);
			more.removeEventListener("mousedown",moreEssay,false);
			data = data.replace("no_more","");
		}else{
			content = document.createTextNode("查看更多文章");
			more.replaceChild(content,more.firstChild);
		}
		return data;
	}

	more.addEventListener("mousedown",moreEssay,false);
	
})();


/*console.log("站主邮箱zhouyi0112@126.com<(￣ˇ￣)/");*/

