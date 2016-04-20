/*Object
*.hasClass()
*.removeClass()
*.addClass()
*.siblings()
*/
Object.prototype.hasClass = function(str){
	if(this.className.indexOf(str) == -1){
		return false;
	}else{
		return true;
	}
};
Object.prototype.removeClass = function(str){
	var regexp = new RegExp("\\s?"+str+"\\b","i");
	if(this instanceof Array){
		this.forEach(function(target){
			str = target.className.replace(regexp,"");
			return target.className = str;
		});
	}else{
		str = this.className.replace(regexp,"");
		return this.className = str;
	}
	
};
Object.prototype.addClass = function(str){
	if(this.hasClass(str)){
		return false;
	}else{
		return this.className += " "+str;
	}
};
Object.prototype.siblings = function(){
	var currentEle = this.parentNode.firstElementChild;
	var arr = [];
	for(;currentEle;currentEle = currentEle.nextElementSibling){
		if(currentEle !== this){
			arr.push(currentEle);
		};
	}
	return arr;
};

var Ajax = (function(){
	var request,
		createRequest,
		sendRequest;
	createRequest = function() {
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
	sendRequest = function(obj){
		request = createRequest();
		if(request == null){
			console.error("Unable to create request.");
			return;
		}
		request.open(obj.type,obj.url,true);
		request.onreadystatechange = function(){
			if(request.readyState == 4){
				if(request.status == 200){ 
					obj.success(request.responseText);					
				}else{
					obj.error();
				}
			}
		};
		request.send(obj.data);
	};
	return {
		send:sendRequest
	}
})();

/******************返回顶部*********************/
(function(){
	window.onscroll=function(){
		var top=document.getElementById("top");
		var scrollTop=document.body.scrollTop||document.document;
		if(scrollTop>="200"){
			top.addClass("show");
		}else{
			top.removeClass("show");
		}
	};
	var top=document.getElementById("top");
	top.onclick=function(){
		var scrollTop=document.body.scrollTop||document.document.scrollTop;
		var body=document.body;
		var  height = (scrollTop*10)/200;
		var set=setInterval(function(){
			if(body.scrollTop>0){
				body.scrollTop-=height;
			}else if(body.scrollTop==0){
				clearInterval(set);
			}
		},10);
	};
})();

/***************自定义全局对象self***************/
var self = {};

/*随机获取颜色*/
self.getColor = function(){
	var i,
		rgb_list = [];
	for(i = 0;i < 3;i++){
		rgb_list.push(Math.floor(Math.random() * 128) + 128);
	}
	return "rgba(" + rgb_list.join(",") + ",0.8)";
}


/****************左右滑动屏幕**************/
self.move = (function(fn){
	var startX,startY,endX,endY,distanceX,distanceY;
	document.body.addEventListener("touchstart",function(){
		startX=event.touches[0].clientX;
		startY=event.touches[0].clientY;
		document.body.addEventListener("touchend",function(event){
			endX=event.changedTouches[0].clientX;
			endY=event.changedTouches[0].clientY;
			distanceX = startX-endX;
			distanceY = startY-endY;
			fn.call(this,distanceX,distanceY);
		},false);
	},false);
});
