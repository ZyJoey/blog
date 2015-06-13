/*折叠导航*/
(function(){
	var navImg=document.getElementById("navImg");
	var label=document.getElementById("label");
	navImg.addEventListener("touchstart",function(){
		if(label.className=="ul-add"){
			label.className="";
		}else{
			label.className="ul-add";
		}
	},false);
	var labelLi=label.getElementsByTagName("li");
	var selectLabel=labelLi[0].onclick;
	var i;
	for(i=0;i<labelLi.length;i++){
		labelLi[i].onclick=null;
		labelLi[i].addEventListener("touchstart",selectLabel,false);
		labelLi[i].addEventListener("touchend",function(event){
			label.className="";
			downSection();
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
		var section=document.getElementById("rightContent").getElementsByTagName("section");
		for(var j=0;j<section.length;j++){
			section[j].addEventListener("mousedown",touch,false);
		};
	};
	downSection();
})();
/*文章链接*/
/*(function(){
	var section=document.getElementById("rightContent").getElementsByTagName("section");
	for(var i=0;i<section.length;i++){
		section[i].addEventListener("mousedown",function(event){
			var a=this.getElementsByTagName("a")[0];
			var href=a.getAttribute("href");
			location.href=href;
			if(event.target==a){
				event.preventDefault();
			}
		},false);
	}
})();*/