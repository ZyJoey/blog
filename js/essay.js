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
		var body=document.getElementsByTagName("body");
		var i=scrollTop;
		var set=setInterval(function(){
			var bodyTop=body[0].scrollTop;
			if(bodyTop>0){
				body[0].scrollTop-=100;
			}else if(bodyTop==0){
				clearInterval(set);
			}
		},10);
	};
})();
/*点赞*/
(function(){
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
		var text=document.getElementsByTagName("h1");
		var title=text[0].innerText;
		var request=createRequest();
		if(request==null){
			alert("Unable to create request.");
			return;
		}
		var url="getLike.php?title="+title;
		request.open("GET",url,true);
		request.onreadystatechange=likeBack;
		request.send(null);
	}
	function likeBack(){
		if(request.readyState==4){
			if(request.status==200){
				var span=like.nextSibling;
				span.innerText=request.responseText;
				like.onclick=null;
			}
		}
	}
})();

