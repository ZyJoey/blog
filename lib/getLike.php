<?php
	include('./sqlInfo.php');
	date_default_timezone_set('prc');
	$ip =$_SERVER["REMOTE_ADDR"];
	$blog_title=$_REQUEST["title"];
	$queryFir="SELECT * FROM message where blog_title='$blog_title' and ip='$ip' ";
	$dataFir=mysqli_query($dbc,$queryFir);
	if(mysqli_num_rows($dataFir)==0){
		$query="INSERT INTO message (blog_title,ip,time) VALUES "." ('$blog_title','$ip',NOW())";
		mysqli_query($dbc,$query);
		$querySec="select * from message where blog_title='$blog_title' ";
		$dataSec=mysqli_query($dbc,$querySec);
		$times    =mysqli_num_rows($dataSec);
		$queryThird="update essay_message set  praise='$times' where blog_title ='$blog_title' ";
		mysqli_query($dbc,$queryThird);
		echo  "$times";
	}else{
		echo "null";
	}
	mysqli_close($dbc);
?>