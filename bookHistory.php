<!-- PHP code to establish connection with the localserver -->
<?php

$mysqli = new mysqli('localhost','root','','trip_to_nepal');

// Checking for connections
if ($mysqli->connect_error) {
	die('Connect Error (' .
	$mysqli->connect_errno . ') '.
	$mysqli->connect_error);
}
session_start();
// SQL query to select data from database
$sql = "SELECT * FROM booking_tbl WHERE (Email = '" . $_SESSION['Email']. "') and (name = '" .$_SESSION['name']. "')";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Booking Details</title>
	<!-- CSS FOR STYLING THE PAGE -->
	<style>
		:root{
			background-image: linear-gradient(to right, rgba(255,0,0,0), rgba(255,0,0,1));

		}
		a{
			position:absolute;
			top:0;
			margin-left:90%;
			margin-top:19px;
		}
		table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}
		
		h1 {
			text-align: center;
			color: #006600;
			font-size: xx-large;
			font-family: 'Gill Sans', 'Gill Sans MT',
			' Calibri', 'Trebuchet MS', 'sans-serif';
		}

		td {
			background-color: #E4F5D4;
			border: 1px solid black;
		}

		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		td {
			font-weight: lighter;
		}
	</style>
</head>

<body>
	<!-- <section> -->
		<h1>MANAGE BOOKING</h1>
		<!-- TABLE CONSTRUCTION -->
		<table>
			<tr>

                <th>package id</th>

                <th>message</th>
                <th>checkin date</th>
				<th>STATUS</th>

			</tr>
			<!-- PHP CODE TO FETCH DATA FROM ROWS -->
			<?php
				// LOOP TILL END OF DATA
				while($rows=$result->fetch_assoc())
				{
					$bookingId=$rows['booking_id'];
			?>
			<tr>
				<!-- FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN -->
				
				<td><?php echo $rows['packageId'];?></td>
			
                <td><?php echo $rows['message'];?></td>
                <td><?php echo $rows['checkin'];?></td>
				<td><?php echo $rows['status'];?></td>


			</tr>
			<?php
				}
			?>
		</table>
	<!-- </section> -->
    <a style="align:center"href="http://localhost/smart travel/index.php"><input type="button" value="GO TO HOME"/></a>
</body>

</html>
