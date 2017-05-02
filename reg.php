<?php
		
include_once('data_connect.php');
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];

$branch=$_POST['branch'];
		$mem=$_POST['mem'];
		$inst=$_POST['inst'];
		$address=$_POST['address'];
		$mob=$_POST['mob'];

$email=$_POST['email'];
		$ref=$_POST['ref'];
		$cat=$_POST['cat'];
		
		
if($cat=="msa"){
		$amount=600;
		}
		else if($cat=="mfa"){
		$amount=800;
		}
		else if($cat=="mswa"){
		$amount=400;
		}
		else if($cat=="mfwa"){
		$amount=600;
		}
		else if($cat=="nsa"){
		$amount=700;
		}
		else if($cat=="nfa"){
		$amount=1000;
		}
		else if($cat=="nswa"){
		$amount=500;
		}
		else if($cat=="nfwa"){
		$amount=700;
		}

		$sql = "Select max(ReferenceNumber) from payment;";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_row($res);
                $ref1 = $row[0];

                $sql = "Select Count from payment where ReferenceNumber='$ref1';";
		$res = mysqli_query($con,$sql);
		$row = mysqli_fetch_row($res);
                $count = $row[0] + 1;

                $query="update payment set Count='$count' where ReferenceNumber='$ref1';";
		mysqli_query($con,$query);

		$refno = $ref1 + $count;
		$tran= "ISTE".$refno;

                setcookie("ref",$refno, time() + (86400 * 1), "/");

		$sql="INSERT INTO pre_payment values('$name','$gender','$dob','$branch','$mem','$inst','$address','$mob','$email','$ref','$cat','$amount','$refno')";
		$res=mysqli_query($con,$sql);
/*
		echo '<form id="pay" method="post" action="https://academics.vit.ac.in/online_application2/onlinepayment/Online_pay_request1.asp">';
		echo'	
		<input type="hidden" name="id_trans" value="'.$tran.'">
		<input type="hidden" name="id_name" value="'.$name.'">
		<input type="hidden" name="id_event" value="28">
		<input type="hidden" name="amt_event" value="'.$amount.'">
		<input type="hidden" name="id_Merchant" value="1027">
		<input type="hidden" name="id_Password" value="lkujjsdljf@67B/sa16">';
		echo '</form>';*/
		
		echo '<form id="pay" method="post" action="status.php">';
		echo '<input type="hidden" name="status" value="yes">';
		echo '<input type="hidden" name="refno" value=$refno>';
		echo '<input type="hidden" name="tpsltranid" value="TransID1">';
		echo '<input type="hidden" name="txndate" value="22-04-2017">';
		echo '<input type="hidden" name="bankrefno" value="IDIB008">';
		echo '</form>';
?>
<html>
<script type="text/javascript" src="static1/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){
         $("#pay").submit();
    });
</script>
</html>