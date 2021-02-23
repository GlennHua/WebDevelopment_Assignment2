<?php
require_once ("settings.php");
date_default_timezone_set('NZ');
$dbtb = 'booking';
		
$action = $_POST['action'];
$con = @mysqli_connect($host, $user, $pswd) or die("Failed to connect to the Server. Error number" . mysqli_errno() . "Error Description:" . mysqli_error());
			@mysqli_select_db($con, $dbnm) or die("Failed to connect to target database, Error Number:" . mysqli_error($con) . "Error Descripution:" . mysqli_error($con));
	
if($action == 'search'){
			
	$sqlStr = "SELECT * FROM $dbtb WHERE status='unassigned'";
	
	if ($result = mysqli_query($con, $sqlStr))
	{
		while($row = mysqli_fetch_assoc($result )){
			$t = strtotime($row['pickdate'] . ' ' . $row['picktime']);
			if($t - time() < 7200){
				echo "<tr>
				<td>".$row['booking_id']."</td>
				<td>".$row['name']."</td>
				<td>".$row['phone']."</td>
				<td>".$row['unit']."</td>
				<td>".$row['streetno']."</td>
				<td>".$row['streetname']."</td>
				<td>".$row['suburb']."</td>
				<td>".$row['destination']."</td>
				<td>".$row['pickdate']."</td>
				<td>".explode('.', $row['picktime'])[0]."</td>
				<td>".$row['status']."</td>
				</tr>";
			}
		}
		
	}
}else if($action == 'assign'){
	$bookingid = $_POST['id'];
	$sql = "UPDATE $dbtb SET status='assigned' WHERE booking_id=$bookingid";
	mysqli_query($con, $sql);
	echo "The booking request $bookingid has been properly assigned";
}
