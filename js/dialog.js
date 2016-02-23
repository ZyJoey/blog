/*
*调用方法
*dialog.success(msg);
*dialog.error(msg);
*/
var dialog = (function(){
	var template,
		tpl,
		dialog,
		time,
		d_close;
	function getTemplate(state,data){
		template = '<div class="d-{{state}}">'
			+'<div id="d_main" class="d-main">'
			+'<div class="d-content">{{data}}</div>'
			+'<i class="d-close"></i>'
			+'</div>'
			+'</div>';
		template = template.replace(/{{state}}/,state).replace(/{{data}}/,data);
		return template;
	}
	function createDialog(state,data){
		tpl = getTemplate(state,data);
		dialog = document.createElement("div");
		dialog.id = "dialog";
		document.body.appendChild(dialog);
		dialog.innerHTML = tpl;
		setTimeout(function(){
			dialog.addClass("d-bg");
		},100);
		closeBtn();
	}
	function closeBtn(){
		d_main = document.getElementById("d_main");
		d_main.addEventListener("mouseup",close,false);
	}
	function close(time){
		if(!dialog){
			return false;
		}
		dialog.removeClass("d-bg");
		setTimeout(function(){
			document.body.removeChild(dialog);
			dialog = undefined;
		},1000);
	}
	function success(data){
		if(dialog){
			return false;
		}
		createDialog("success",data);
		closeBtn(800);
	}
	function error(data){
		if(dialog){
			return false;
		}
		createDialog("error",data);
		closeBtn(800);
	}
	return {
		success:success,
		error:error
	}
})();