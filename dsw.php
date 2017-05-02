<?php
		
include_once('data_connect.php');
$sql="select * from events";
$res=mysqli_query($con,$sql);

echo "<table> 
<tr>
<th> Event Name</th>
<th> Event Description</th>
<th> Event Date</th>
<th> Event Venue</th>
<th> Internal Participants</th>
<th> External Participants</th>
<th> Sponsorship</th>
<th> Budget</th>
<th> Contact</th>
<th> Email</th> 
<th> Status</th>

</tr>";
while($row=mysqli_fetch_assoc($res))
{
echo " <tr>
<td> ".$row['eventname']."</td>
<td>" .$row['description']."</td>
<td>" .$row['date']."</td>
<td>" .$row['venue']."</td>
<td>" .$row['int_part']."</td>
<td>" .$row['ext_part']."</td>
<td> ".$row['sponsorship']."</td>
<td> ".$row['budget']."</td>
<td> ".$row['mobile']."</td>
<td>" .$row['email']."</td>
<td>";
if($row['status']==0)
{
	echo '<form action="approved.php" method="POST">
	<input type="hidden" name="name" value="'.$row["eventname"].'">
	<input type="hidden" name="email" value="'.$row["email"].'">
	
	<input type="submit" value="approve" >	';
	
}
else
{
	echo "Approved";
}
echo "</td><tr>";
};
echo "</table>";






?>
