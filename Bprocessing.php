<?php
		
		$dbtb = 'booking';
		
		$name = $_POST['name'];
		
		$phone = $_POST['phone'];
		
		$unit = $_POST['unit'];
		
		$streetno = $_POST['streetno'];
		
		$streetname = $_POST['streetname'];
		
		$suburb = $_POST['suburb'];
		
		$destination = $_POST['destination'];
		
		$pickdate = $_POST['date'];
		
		$picktime = $_POST['time'];
		
		date_default_timezone_set('NZ');
		
		$currentdate = date("Y-m-d H:i:s"); //有待修改！！！！
		
		$pickupTimestamp = strtotime("$pickdate $picktime");
		
		$pickupdate = date(strtotime("$pickdate $picktime")); //有待修改！！！！
		
		$status = "Unassigned";

		if($name == "" ||$phone == "" || $unit== "" || $streetno == "" || $streetname == "" || $suburb == "" || $destination == "" || $pickdate == "" || $picktime == "")
		{
			echo"*Please Fill Out ALL Required Fields.";
		}
		else if($pickupTimestamp > time()) //有待修改！！！！
		{
			
			makeRequest($currentdate, $name, $phone, $unit, $streetno, $streetname, $suburb, $destination, $pickdate, $picktime, $status);
			
		}
		else
		{
			echo"Invalid date or time";
		}
		
		
		
		function makeRequest($bookingdate, $name, $phone, $unit, $streetno, $streetname, $suburb, $destination, $pickdate, $picktime, $status)
		{
			
			//require_once ("../../conf/settings.php");//学校路径
			require_once ("settings.php");
			
			
			$con = @mysqli_connect($host, $user, $pswd) or die("Failed to connect to the Server. Error number" . mysqli_errno() . "Error Description:" . mysqli_error());
			@mysqli_select_db($con, $dbnm) or die("Failed to connect to target database, Error Number:" . mysqli_error($con) . "Error Descripution:" . mysqli_error($con));
			
			$sqlStr = "INSERT INTO $dbtb (booking_date, name, phone, unit, streetno, streetname, suburb, destination, pickdate, picktime, status) 
			VALUES ('$bookingdate', '$name', '$phone', '$unit', '$streetno', '$streetname', '$suburb',
			'$destination', '$pickdate', '$picktime', '$status')";
			
			if (mysqli_query($con, $sqlStr))
			{
				$find = "SELECT MAX(booking_id) FROM booking";
				$result = mysqli_query($con, $find);
				$result = mysqli_fetch_row($result);
				
				echo"<b>Thank you for booking with us, we have received your
					booking request. Here is your booking reference number: $result[0].
					Driver will see you at $picktime on $pickdate </b>";
				
			}
			else
				
			{
				echo"Failed to make a request";
			}
			
			
			//$queryResult = @mysqli_query($con, $sqlStr) or die("Failed to insert data into target database table");
			
		
			exit();
			
		}
	
?>