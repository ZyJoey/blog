<?php 
	$dbc=mysqli_connect('localhost','root','','myblog')or die('Error connect sql');
	mysqli_query($dbc,"set names utf8");
	date_default_timezone_set('prc');
	$ip =$_SERVER["REMOTE_ADDR"];
	$username=mysqli_real_escape_string($dbc,trim($_POST["username"]));
	$email=mysqli_real_escape_string($dbc,trim($_POST["email"]));
	$comment=mysqli_real_escape_string($dbc,trim($_POST["comment"]));
	mysqli_query($dbc,"INSERT INTO message_comment  VALUES (0,'$title','$ip','$username','$email',NOW(),'$comment')");
?>
<?php 
		if(isset($_POST["username"])){
			$dbc=mysqli_connect('localhost','root','','myblog')or die('Error connect sql');
			mysqli_query($dbc,"set names utf8");
			date_default_timezone_set('prc');
			$ip =$_SERVER["REMOTE_ADDR"];
			// $username=mysqli_real_escape_string($dbc,trim($_POST["username"]));
			// $email=mysqli_real_escape_string($dbc,trim($_POST["email"]));
			// $comment=mysqli_real_escape_string($dbc,trim($_POST["comment"]));
			// $username=mysqli_real_escape_string($dbc,trim($_POST["username"]));
			// $email=mysqli_real_escape_string($dbc,trim($_POST["email"]));
			// $comment=mysqli_real_escape_string($dbc,trim($_POST["comment"]));
			$username=trim($_POST["username"]);
			$email=trim($_POST["email"]);
			$comment=trim($_POST["comment"]);
			$username=trim($_POST["username"]);
			$email=trim($_POST["email"]);
			$comment=trim($_POST["comment"]);
			mysqli_query($dbc,"INSERT INTO message_comment VALUES "." (0,'$title','$ip','$username','$email',NOW(),'$comment')");
			mysqli_close($dbc);
			echo "hello";
		}
		
	?> 