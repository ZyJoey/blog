/*音乐播放器*/
(function(){
	var play=document.getElementById("play");
	var music=document.getElementById("music");
	var playTime=document.getElementById("playTime");
	var progressBar=document.getElementById("progressBar");
	var currentProgress=document.getElementById("currentProgress");
	window.onload=function(){
		/*获取媒体资源长度*/
		var length=document.getElementById("length");
		var playLength=eval(music.duration/60);
		var regexp=/\d\.\d\d/;
		console.log(playLength);
		var progressTime=regexp.exec(playLength)[0];
		progressBarLength=parseInt(progressTime*60);
		length.innerHTML="0"+progressTime.replace(/\./,":");
	};
	var sum=0;
	function currentPlay(){
		sum+=1/progressBarLength;
		currentProgress.style.width=sum*100+"%";
		current=parseInt(music.currentTime);
		currentS=current%60;
		currentM=parseInt(current/60);
		/*格式化当前播放时间*/
		if(currentS<10){
			playTime.innerHTML="0"+currentM+":"+"0"+currentS;
		}else{
			playTime.innerHTML="0"+currentM+":"+currentS;
		}
		if(music.currentTime>=music.duration){
			clearInterval(interval);
			currentProgress.style.width=0;
		}
	}
	play.onclick=function(){
		var titleValue=this.getAttribute("title");
		if(titleValue=="播放"){
			play.src="images/pause.png";
			music.play();
			this.title="暂停";
			interval=setInterval(currentPlay,1000);
		}else{
			play.src="images/play.png";
			music.pause();
			this.title="播放";
			clearInterval(interval);
		}		
	};
})();

