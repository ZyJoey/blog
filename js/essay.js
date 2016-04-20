/*点赞*/
(function(){
	var like=document.getElementById("like");
	if(like.hasClass("none")){
		like.addEventListener("click",likeIcon,false);
	}else{
		like.removeEventListener("click",likeIcon,false);
	};
	function likeIcon(){
		like.addClass("likeIcon");
		like.removeClass("none");
		var title=document.getElementsByTagName("h1")[0].firstChild.nodeValue;
		var url="lib/getLike.php?title="+title;
		Ajax.send({
			type : "GET",
			url : url,
			success : likeBack
		})
	}
	function likeBack(data){
		if(data != 'null'){
			like.title="(′▽`〃)";
		};
		like.removeEventListener("click",likeIcon,false);
	}
})();
/*左右滑屏事件及返回*/
(function(){
	if(window.screen.width<=800){
		var back=document.getElementById("mobilityBack");
		back.addEventListener("touchend",function(event){
			location.href="index.php";
		},false);
		function horizontal(distanceX,distanceY){
			distanceY = Math.abs(distanceY);
			if(distanceX>40&&distanceY<5){
				var next=document.getElementById("nextEssay").getAttribute("href");
				location.href=next;
			}else if(distanceX<-40&&distanceY<5){
				var last=document.getElementById("lastEssay").getAttribute("href");
				location.href=last;
			}
		}
		self.move(horizontal);		
	}
})();
(function(){
	try{
		var musicCtl=document.getElementById("musicCtl");
		var music=document.getElementById("music");
		musicCtl.addEventListener("click",function(){
			if(music.paused){
				this.addClass("play");
				music.play();
			}else{
				this.removeClass("play");
				music.pause();
			}
		},false);
	}catch(error){
		return ;
	}
	
})();
/*刷新验证码*/
(function(){
	var cVerifyCode = document.getElementById("cVerifyCode");
	cVerifyCode.addEventListener("click",getCode,false);
	function getCode(){
		var url = "lib/createCode.php";
		Ajax.send({
			type : "GET",
			url : url,
			success : function(){
				cVerifyCode.src = url;
			}
		})
	}

})();
