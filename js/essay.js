function createRequest() {
  try {
    request = new XMLHttpRequest();
  } catch (tryMS) {
    try {
      request = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (otherMS) {
      try {
        request = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (failed) {
        request = null;
      }
    }
  }	
  return request;
};
/*返回顶部*/
(function(){
	window.onscroll=function(){
		var top=document.getElementById("top");
		var scrollTop=document.body.scrollTop||document.document;
		if(scrollTop>="200"){
			top.style.visibility="visible";
		}else{
			top.style.visibility="hidden";
		}
	};
	var top=document.getElementById("top");
	top.onclick=function(){
		var scrollTop=document.body.scrollTop||document.document;
		var body=document.getElementsByTagName("body")[0];
		var i=scrollTop;
		var set=setInterval(function(){
			var bodyTop=body.scrollTop;
			if(bodyTop>0){
				body.scrollTop-=100;
			}else if(bodyTop==0){
				clearInterval(set);
			}
		},10);
	};
})();
/*点赞*/
/*(function(){
	var like=document.getElementById("like");
	var likeSrc=like.getAttribute("src");
	if(likeSrc=="images/dislike.png"){
		like.onclick=likeIcon;
	}else{
		like.onclick=null;
	};
	function likeIcon(){
		this.className+=" likeIcon";
		this.src="images/like.png";
		var title=document.getElementsByTagName("h1")[0].firstChild.nodeValue;
		var request=createRequest();
		if(request==null){
			alert("Unable to create request.");
			return;
		}
		var url="php/getLike.php?title="+title;
		request.open("GET",url,true);
		request.onreadystatechange=likeBack;
		request.send(null);
	}
	function likeBack(){
		if(request.readyState==4){
			if(request.status==200){
				var span=like.nextSibling;
				var response=request.responseText;
				if(response!='null'){
					span.replaceChild(document.createTextNode(response),span.firstChild);
				};
				like.onclick=null;
			}
		}
	}
})();*/
/*左右滑屏事件及返回*/
(function(){
	if(window.screen.width<=800){
		var startX,startY,endX,endY,distanceX,distanceY;
		function horizontal(event){
			distanceX=startX-endX;
			distanceY=Math.abs(startY-endY);
			if(distanceX>40&&distanceY<5){
				var next=document.getElementById("nextEssay").getAttribute("href");
				location.href=next;
			}else if(distanceX<-40&&distanceY<5){
				var last=document.getElementById("lastEssay").getAttribute("href");
				location.href=last;
			}
		}
		document.body.addEventListener("touchstart",function(event){
			startX=event.touches[0].clientX;
			startY=event.touches[0].clientY;
			document.body.addEventListener("touchmove",function(event){
				endX=event.changedTouches[0].clientX;
				endY=event.changedTouches[0].clientY;
				horizontal();
			},false);
		},false);
		var back=document.getElementById("mobilityBack");
		back.addEventListener("touchend",function(event){
			location.href="index.php";
		},false);
	}
})();

