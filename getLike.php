<?php
	$dbc=mysqli_connect('qdm149630189.my3w.com','qdm149630189','zhouyi6595891','qdm149630189_db')or die('Error connect sql');
	mysqli_query($dbc,"set names utf8");
	date_default_timezone_set('prc');
	$ip =$_SERVER["REMOTE_ADDR"];
	$blog_title=$_REQUEST["title"];
	$query="INSERT INTO message (blog_title,ip,time) VALUES "." ('$blog_title','$ip',NOW())";
	mysqli_query($dbc,$query);
	$querySec="select * from message where blog_title='$blog_title' ";
	$dataSec=mysqli_query($dbc,$querySec);
	$times    =mysqli_num_rows($dataSec);
	$queryThird="update essay_message set  praise='$times' where blog_title ='$blog_title' ";
	mysqli_query($dbc,$queryThird);
	echo  "$times";
	mysqli_close($dbc);
?>