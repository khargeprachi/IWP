<?php
		
include_once('data_connect.php');
        $eventname=$_POST['eventname'];
		$description=$_POST['description'];
		$eventdate=$_POST['eventdate'];
        $venue=$_POST['venue'];		
		$internal_participants=$_POST['int_participants'];
		$external_participants=$_POST['ext_participants'];
		$sponsorship=$_POST['sponsorship'];
$budget=$_POST['budget'];
$mobile=$_POST['mob'];
       $email=$_POST['email'];
		
		$sql = "insert into events values(0,'$eventname','$description','$eventdate','$venue','$internal_participants','$external_participants','$sponsorship','$budget','$mobile','$email',0,'NULL')";
		mysqli_query($con,$sql);
		
?>