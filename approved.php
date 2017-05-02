<?php
		
include_once('data_connect.php');
$name=$_POST['name'];
$email=$_POST['email'];
$sql1="update  events set status='1' where eventname='$name' ";
	mysqli_query($con,$sql1);
	$sql2="Select max(event_id) from events;";
	$res=mysqli_query($con,$sql2);
	$row=mysqli_fetch_row($res);
	$ref1=$row[0]+1;
	
	$sql3="update events set event_id='$ref1' , gateway='https://academics.vit.ac.in/online_application2/onlinepayment/Online_pay_request1.asp' where eventname='$name' and email='$email' ";
	mysqli_query($con,$sql3);
	
	
	
	
	header('Location: dsw.php');
	?>