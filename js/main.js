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
/*标签筛选*/
(function(){
	var more=document.getElementById("more");
	function selectLabel(){
		more.onclick=moreEssay;
		var content=document.createTextNode("查看更多文章");
		more.replaceChild(content,more.firstChild);
		var k;
		var siblings=this.parentNode.children;
		for(k=0;k<siblings.length;k++){
			if(siblings[k].className=="there"){
				siblings[k].className="";
				break;
			}
		}
		this.className="there";
		var text=this.getAttribute("data-label");
		var request=createRequest();
		if(request==null){
			alert("Unable to create request.");
			return;
		}
		var url="php/getLabel.php?label="+escape(text);
		request.open("GET",url,true);
		request.onreadystatechange=displaySection;
		request.send(null);
	}
	function displaySection(){
		if(request.readyState==4){
			if(request.status==200){
				var rightContent=document.getElementById("rightContent");
				var section=rightContent.getElementsByTagName("section");
				var len=section.length;
				for(j=len-1;j>=0;j--){
					rightContent.removeChild(section[j]);
				};
				var result=request.responseText.replace(/no_more/,"");
				var rightContent=document.getElementById("rightContent");
				rightContent.innerHTML+=result;	
			}
		}	
	}
	var label=document.getElementById("label").getElementsByTagName("li");
	var i;
	for(i=0;i<label.length;i++){
		label[i].onclick=selectLabel;
	}
	/*获取更多文章*/
	function moreEssay(){
		var text=this.firstChild;
		var there=document.getElementsByClassName("there")[0];
		var line=document.getElementById("rightContent").getElementsByTagName("section").length;
		var label=there.getAttribute("data-label");
		var regexp=/没有/;
		if(regexp.test(text)){
			return;
		}else{
			this.innerHTML="<image class='loading' src='images/loading.png'/>";
			var request=createRequest();
			if(request==null){
				alert("Unable to create request.");
				return;
			}
			var url="php/getLabel.php?label="+escape(label)+"&line="+escape(line);
			request.open("GET",url,true);
			request.onreadystatechange=addEssay;
			request.send(null);
		}
	}
	function addEssay(){
		if(request.readyState==4){
			if(request.status==200){
				var regexp=/no_more/;
				if(regexp.test(request.responseText)){
					var content=document.createTextNode("没有了(⊙﹏⊙)");
					more.replaceChild(content,more.firstChild);
					more.onclick=null;
					var result=request.responseText.replace("no_more","");
				}else{
					var content=document.createTextNode("查看更多文章");
					more.replaceChild(content,more.firstChild);
				}
				var rightContent=document.getElementById("rightContent");
				rightContent.innerHTML+=result;	
			}
		}
	}
	more.onclick=moreEssay;
})();
/*返回顶部*/
(function(){
	window.onscroll=function(){
		var top=document.getElementById("top");
		var scrollTop=document.body.scrollTop||document.documentElement.scrollTop;
		if(scrollTop>="200"){
			top.style.visibility="visible";
		}else{
			top.style.visibility="hidden";
		}
	};
	var top=document.getElementById("top");
	top.onclick=function(){
		var scrollTop=document.body.scrollTop||document.documentElement.scrollTop;
		var body=document.getElementsByTagName("body");
		var i=scrollTop;
		var set=setInterval(function(){
			var bodyTop=body[0].scrollTop;
			if(bodyTop>0){
				body[0].scrollTop-=40;
			}else if(bodyTop==0){
				clearInterval(set);
			}
		},10);
	};
})();

