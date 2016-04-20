var strategies = {
	isNonEmpty:function(value,errorMsg){
		if(/^\s*$/.test(value)){
			return errorMsg;
		}
	},
	minLength:function(value,length,errorMsg){
		if(value.trim().length<length){
			return errorMsg;
		}
	},
	maxLength:function(value,length,errorMsg){
		if(value.trim().length>length){
			return errorMsg;
		}
	},
	isCharacter:function(value,errorMsg){
		if(!/^[a-zA-Z0-9_\u4e00-\u9fa5]+$/.test(value)){
			return errorMsg;
		}
	},
	isMobile:function(value,errorMsg){
		if(!/^1[3|5|8][0-9]{9}$/.test(value)){
			return errorMsg;
		}
	},
	isEmail:function(value,errorMsg){
		if(!/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/.test(value)){
			return errorMsg;
		}
	}
}
var Validator = function(){
	this.cache = [];
};
Validator.prototype.add = function(dom,rules){
	var self = this;
	for(var i = 0,rule;rule = rules[i++];){
		(function(rule){
			var strategyAry = rule.strategy.split(":");
			var errorMsg = rule.errorMsg;
			self.cache.push(function(){
				var strategy = strategyAry.shift();
				strategyAry.unshift(dom.value);
				strategyAry.push(errorMsg);
				return strategies[strategy].apply(dom,strategyAry);
			});
		})(rule)
	}
};
Validator.prototype.start = function(){
	for(var i = 0,validatorFunc;validatorFunc = this.cache[i++];){
		var errorMsg = validatorFunc();
		if(errorMsg){
			return errorMsg;
		}
	}
};
var form = document.getElementById("commentForm");
var validatorFunc = function(){
	var validator = new Validator();
	validator.add(form.username,[{
		strategy:"isNonEmpty",
		errorMsg:"要当匿名君吗(⊙︿⊙)"
	},{
		strategy:"minLength:2",
		errorMsg:"名字太短会脸盲(๑•́ ₃ •̀๑)"
	},{
		strategy:"maxLength:10",
		errorMsg:"名字超过十个字记不住(๑•́ ₃ •̀๑)"
	},{
		strategy:"isCharacter",
		errorMsg:"只能记住由数字字母汉字下划线组成的名字(⊙︿⊙)"
	}]);
	validator.add(form.email,[{
		strategy:"isNonEmpty",
		errorMsg:"不肯告诉伦家邮箱嘛(⊙︿⊙)"
	},{
		strategy:"isEmail",
		errorMsg:"邮箱不要糊弄伦家(ノへ￣、)"
	}]);
	validator.add(form.comment,[{
		strategy:"isNonEmpty",
		errorMsg:"没有想对伦家说的嘛(⊙︿⊙)"
	},{
		strategy:"minLength:6",
		errorMsg:"多说一点嘛~高冷君ლ(╹◡╹ლ)"
	},{
		strategy:"maxLength:600",
		errorMsg:"话太多了脑容量装不下(ಥ _ ಥ)"
	}]);
	validator.add(form.verify,[{
		strategy:"isNonEmpty",
		errorMsg:"验证码呢(,,• ₃ •,,)"
	}])
	var errorMsg = validator.start();
	return errorMsg;
};
form.onsubmit = function(){
	var errorMsg = validatorFunc();
	var data = {
		"id" : window.location.search.split('=')[1],
		"username" : form.username,
		"email" : form.email,
		"comment" : form.comment	
	}
	if(errorMsg){
		dialog.error(errorMsg);
		return false;
	}else{
		// dialog.success("您的心意我会帮您转告主人\(^o^)/");
		Ajax.send({
			type : "post",
			url : "lib/comment.php",
			data : data,
			success:function(res){
				if(res.code = 0){
					dialog.success("提交成功\(^o^)/");
				}else{
					dialog.error(res.data.msg);
				}
			}
		})
	}
	return false;
};
