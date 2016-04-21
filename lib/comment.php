<?php
	header('Content-Type: application/json; charset=utf-8');
	session_start();
	$inputJSON = file_get_contents('php://input');
	$input= json_decode( $inputJSON, TRUE );

	$dbc=mysqli_connect('localhost','','','')or die('Error connect sql');
	
	mysqli_query($dbc,"set names utf8");
	date_default_timezone_set('prc');

	class Res {
		public $code = "";
		public $msg = "";
	} 
	if($_SESSION['pass_phrase'] == sha1($input["verify"])){
		$title = findTitle();
		insertMsg();
	}else{
		$data = new Res();
		$data->code = 1;
		$data->msg = "验证码错误";		
		echo json_encode($data);
	}
	function findTitle(){	
		global $dbc,$input;
		$result = mysqli_query($dbc,"SELECT blog_title from essay_message where id=$input[id]");
		$rows = mysqli_fetch_array($result);
		return $rows['blog_title'];
	}
	function insertMsg(){
		global $dbc,$input,$title;
		if(isset($input["username"])&&isset($input["email"])){
			$ip = $_SERVER["REMOTE_ADDR"];
			$username = mysqli_real_escape_string($dbc,trim($input["username"]));
			$email = mysqli_real_escape_string($dbc,trim($input["email"]));
			$comment = mysqli_real_escape_string($dbc,trim($input["comment"]));
			$insert = mysqli_query($dbc,"INSERT INTO essay_comment (blog_title,ip,username,email,date,comment) VALUES ('$title','$ip','$username','$email',NOW(),'$comment')");

			setrawcookie("username",$username,time()+3600*24*7);
			setrawcookie("email",$email,time()+3600*24*7);
			$data = new Res();
			$data->code = 0;
			$data->msg = "提交成功";
			echo json_encode($data);
		}

	}
?>