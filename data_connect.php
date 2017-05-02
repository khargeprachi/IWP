<?php

$mysql_host='localhost';

$mysql_user='root';

$mysql_pass='';

$mysql_db='event';
$con=mysqli_connect($mysql_host,$mysql_user,$mysql_pass);
if(!$con)
{
echo "connection ot established";
}
if(!@mysqli_select_db($con,$mysql_db))
{
	echo "db not connected";
}
?>